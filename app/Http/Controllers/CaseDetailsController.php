<?php

namespace App\Http\Controllers;

use App\attachment;
use App\Case_client;
use App\Cases;
use App\Clients;
use App\Sessions;
use App\Session_Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;
use App\Permission;


class CaseDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id = auth()->user()->id;
        $permission = Permission::where('user_id', $user_id)->first();
        $enabled = $permission->search_case;
        if ($enabled == 'yes') {
            if (request()->ajax()) {
                $user_type = auth()->user()->type;
                $case = '';
                if ($user_type == 'User') {
                    $case = Cases::query()
                        ->where('to_whome', '=', auth()->user()->cat_id)
                        ->with('clients')
                        ->get();

                } else {  //
                    $case = Cases::query()->with('clients')
                        ->get();
                }
                return datatables()->of($case)
                    ->addColumn('client_Name', function ($data) {
                        $button = '';
                        foreach ($data->clients as $client) {
                            if ($button == '') {
                                $button = $client->client_Name;
                            } else
                                $button = $button . '  , ' . $client->client_Name;
                        }
                        return $button;
                    })
                    ->addColumn('action', function ($data) {
                        $button = '<button data-case-id="' . $data->id . '" id="showCaseData" class="btn btn-m btn-blue tooltips" ><i
                                    class="fa fa-edit"></i>&nbsp;&nbsp;' . trans('site_lang.home_see_more') . '</button>';
                        $button .= '&nbsp;&nbsp;';
                        if (auth()->user()->type == 'admin') {
                            $button .= '<a  data-case-id="' . $data->id . '" id="deletecase" class="btn btn-m btn-red tooltips" ><i
                                    class="fa fa-trash"></i>&nbsp;&nbsp;' . trans('site_lang.delete') . '</a>';
                        }
                        return $button;
                    })
                    ->rawColumns(['client_Name', 'action'])
                    ->make(true);

            }
            return view('cases.search_case');
        } else {
            return redirect(url('home'));
        }
    }

    public function getSearchResult($search)
    {
        $cases_table = array();
        if (!empty($search)) {
            $results = Cases::join('case_clients', 'case_clients.case_id', 'cases.id')
                ->join('clients', 'clients.id', 'case_clients.client_id')
                ->where('cases.to_whome', '=', auth()->user()->cat_id)
                ->where('cases.circle_num', 'LIKE', "%{$search}%")
                ->orWhere('clients.client_Name', 'LIKE', "%{$search}%")
                ->orWhere('cases.invetation_num', 'LIKE', "%{$search}%")
                ->select('cases.id', 'clients.client_Name', 'cases.invetation_num', 'cases.court')
                ->get();
            //            ->orWhereHas('clients', function ($q) use ($search) {
//                return $q->where('clients.client_Name', 'LIKE', '%' . $search . '%');
//            })->with(['clients' => function ($query)use ($search) {
//                return $query->where('clients.client_Name', 'LIKE', '%' . $search . '%');
//            }])
            foreach ($results as $key => $result) {
                $cases_table [] = view('cases.session_result_case_item', compact('result'))->render();
            }
            return response(['status' => true, 'result' => array_unique($cases_table)]);
        }
    }

    // update session status from waiting to done
    public function updateStatus($id)
    {
        $status = false;
        $session = Sessions::find($id);
        if ($session->status == trans('site_lang.public_no_text')) {
            $session->status = "Yes";
            $status = true;
        } else {
            $session->status = "No";
            $status = false;
        }
        $session->update();
        return response(['msg' => trans('site_lang.public_success_text'), 'status' => $status]);

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if ($request->ajax()) {

            $data = $this->validate(request(), [
                'session_date' => 'required',
            ]);
            $month = date('m', strtotime($request->session_date));
            $year = date('yy', strtotime($request->session_date));
            $case_Id = $request->case_Id;
            $session = Sessions::create(array_merge($request->except('month', 'year', 'case_Id'), ['month' => $month, 'year' => $year, 'case_Id' => $case_Id]));
            $html = view('cases.session_item', compact('session'))->render();
            return response(['status' => true, 'result' => $html, 'msg' => trans('site_lang.public_success_text')]);
        }
    }


    public function show($id)
    {

    }


    public function showSessionData($id)
    {
        if (request()->ajax()) {
            $data = Sessions::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function edit($id)
    {
        if (request()->ajax()) {
            $res = [];
            $case = Cases::findOrFail($id);
            $attachments = DB::table('attachments')->where('case_Id', '=', $id)->get();
            $clients = $case->clients;
            $clients_array = [];
            $khesm_array = [];
            foreach ($clients as $key => $client) {
                if ($client->type == trans('site_lang.clients_client_type_khesm')) {
                    $khesm_array[] = view('cases.mokel_item', compact('client'))->render();
                } else {
                    $clients_array[] = view('cases.mokel_item', compact('client'))->render();
                }

            }

            $res = [
                "case" => $case,
                "attachments" => $attachments,
                "sessions_counts" => Sessions::query()->where('case_Id', '=', $id)->count(),
                "sessions_notes_counts" => "0",
                "clients" => $clients_array,
                "khesm" => $khesm_array,
                "attachments_counts" => $attachments->count(),
            ];
            return response()->json(['result' => $res]);
        }
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->validate(request(), [
                'session_date' => 'required'
            ]);
            $session = Sessions::find($request->sessionId);
            $month = date('m', strtotime($request->session_date));
            $year = date('yy', strtotime($request->session_date));
            $session->month = $month;
            $session->year = $year;
            $session->session_date = $request->input('session_date');
            $session->update();
            return response(['msg' => trans('site_lang.public_success_text')]);
        }
    }

    public function destroy($id)
    {
        $data = Sessions::findOrFail($id);
        $data->delete();
    }

    public function deleteClient($case_id, $client_id)
    {
        $data = DB::table('case_clients')->where("case_id", "=", $case_id)
            ->where("client_id", "=", $client_id);
        $data->delete();

    }

    //sessions notes operations
    // get sessions notes for one session
    public function getSessionNotes($id)
    {

        return datatables()->of(Session_Notes::query()->where('session_Id', '=', $id)->orderBy('id', 'desc')->get())
            ->addColumn('status', function ($data) {
                if ($data->status == trans('site_lang.public_no_text')) {
                    $html = '<p class="btn btn-sm" data-notes-Id="' . $data->id . '" id="change-note-status">
                            <span class="label label-danger text-bold"> ' . $data->status . '</span></p>';
                } else {
                    $html = '<p class="btn btn-sm" data-notes-Id="' . $data->id . '" id="change-note-status">
                            <span class="label label-success text-bold"> ' . $data->status . '</span></p>';
                }

                return $html;
            })
            ->addColumn('action', function ($data) {
                $user_type = auth()->user()->type;
                if ($user_type == 'admin') {
                    $button = '<button data-notes-Id="' . $data->id . '" id="editNote" class="btn btn-s btn-blue tooltips" ><i
                                    class="fa fa-edit"></i>&nbsp;' . trans('site_lang.public_edit_btn_text') . '</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button data-notes-Id="' . $data->id . '" id="deleteNote"  class="btn btn-s btn-red tooltips" ><i
                                    class="fa fa-times fa fa-white"></i>&nbsp;' . trans('site_lang.public_delete_text') . '</button>';

                    return $button;
                }
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }


    public function getSessions($id)
    {
        return datatables()->of(Sessions::query()->where('case_Id', '=', $id)->orderBy('id', 'desc')->get())
            ->addColumn('status', function ($data) {
                if ($data->status == trans('site_lang.public_no_text')) {
                    $html = '<p class="btn btn-sm" data-session-Id="' . $data->id . '" id="change-session-status">
                            <span class="label label-danger text-bold"> ' . $data->status . '</span></p>';
                } else {
                    $html = '<p class="btn btn-sm" data-session-Id="' . $data->id . '" id="change-session-status">
                            <span class="label label-success text-bold"> ' . $data->status . '</span></p>';
                }

                return $html;
            })
            ->addColumn('action', function ($data) {
                $user_type = auth()->user()->type;
                if ($user_type == 'admin') {
                    $button = '<button data-session-Id="' . $data->id . '" id="editSession" class="btn btn-s btn-blue tooltips" ><i
                                    class="fa fa-edit"></i>&nbsp;' . trans('site_lang.public_edit_btn_text') . '</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button data-session-Id="' . $data->id . '" id="deleteSession"  class="btn btn-s btn-red tooltips" ><i
                                    class="fa fa-times fa fa-white"></i>&nbsp;' . trans('site_lang.public_delete_text') . '</button>';
                    $button .= '&nbsp;&nbsp;';

                    $button .= '<button data-session-Id="' . $data->id . '" id="showSessionNotes"  class="btn btn-blue tooltips" ><i
                                    class="fa fa-eye-slash"></i>&nbsp;' . trans('site_lang.mohdar_notes') . '</button>';
                } else {
                    $button = '<button data-session-Id="' . $data->id . '" id="showSessionNotes"  class="btn btn-blue tooltips" ><i
                                    class="fa fa-eye-slash"></i>&nbsp;' . trans('site_lang.mohdar_notes') . '</button>';
                }
                return $button;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function getClientByType($type, $caseId)
    {
        $exists_clients_ids = Case_client::select('client_id')->where("case_id", "=", $caseId)->get();
        $clients = Clients::query()->orWhereNotIn('id', $exists_clients_ids)
            ->where("type", "=", $type)->get();
        $clientsArr = array();
        foreach ($clients as $key => $client) {
            $id = $client['id'];
            $name = $client['client_Name'];
            $clientsArr [] = '<option value=' . $id . '>' . $name . '</option>';
        }
        return response()->json(['result' => $clientsArr]);
    }

    public function updateCase(Request $request)
    {

        $data = $this->validate(request(), [
            'invetation_num' => 'required',
            'circle_num' => 'required',
            'court' => 'required',
            'inventation_type' => 'required',
        ]);

        Cases::where('id', $request->case_Id)->update($data);
        return response(['status' => true, 'msg' => trans('site_lang.public_success_text')]);

    }

    public function addNewClient(Request $request)
    {
        if ($request->ajax()) {

            $data = $this->validate(request(), [
                'mokel_name' => 'required',
            ]);
            $res = array_merge($request->mokel_name);
            $clients = array();
            foreach ($res as $item) {
                Case_client::create(['case_id' => $request->case_id, 'client_id' => $item]);
                $client = Clients::select('id', 'client_Name')->where('id', '=', $item)->first();
                $clients[] = view('cases.mokel_item', compact('client'))->render();
            }
            return response(['status' => true, 'msg' => trans('site_lang.public_success_text'), 'result' => $clients]);
        }
        return redirect()->route('cases.add_case')->with('success', 'Case Added successfully');

    }

    public function printSessionNotes($id)
    {

        $session_notes = Session_Notes::with('Session')
            ->where('session_Id', '=', $id)
            ->orderBy('id', 'desc')
            ->get();


        $pdf = PDF::loadView('Reports.SessionNotesPDF', ['data' => $session_notes]);

        return $pdf->stream('My PDF' . 'pdf');
    }

    public function printCase($id)
    {
        $cases = Cases::query()->where("id", "=", $id)->get();

        $case = Cases::findOrFail($id);
        $clients = array();
        $khesm = array();
        foreach ($case->clients as $key => $client) {
            if ($client->type == trans('site_lang.clients_client_type_khesm')) {
                $khesm[] = $client;
            } else {
                $clients [] = $client;
            }
        }

        $Sessions = Sessions::with('notes')
            ->where('case_Id', '=', $id)
            ->get();

        $pdf = PDF::loadView('Reports.CasePDF', ['data' => $cases, 'clients' => $clients, 'khesm' => $khesm, 'Sessions' => $Sessions]);

        return $pdf->stream('My PDF' . 'pdf');

    }

    public function delete($id)
    {
        $caseclient = Case_client::where('case_id', $id)->get();

        foreach ($caseclient as $caseclient) {
            $caseclient->delete();
        }
        $caseAttachments = attachment::where('case_Id', $id)->get();

        foreach ($caseAttachments as $caseAttachment) {
            $caseAttachment->delete();
        }
        $caseSessions = Sessions::where('case_id', $id)->get();

        foreach ($caseSessions as $caseSessions) {
            $session_id = $caseSessions->id;

            $session_note = Session_Notes::where('session_Id', $session_id)->get();

            foreach ($session_note as $session_note) {
                $session_note->delete();
            }
            $caseSessions->delete();

        }

        Cases::where('id', $id)->delete();

        return response(['status' => true, 'msg' => trans('site_lang.public_success_text')]);
    }

}
