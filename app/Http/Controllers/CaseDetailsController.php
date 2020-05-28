<?php

namespace App\Http\Controllers;

use App\Case_client;
use App\Cases;
use App\Clients;
use App\Sessions;
use App\Session_Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class CaseDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cases.search_case');
    }

    public function getSearchResult($search)
    {
        if (!empty($search)) {
            $cases = Cases::query()
                ->Where('invetation_num', 'LIKE', "%{$search}%")
                ->orWhere('circle_num', 'LIKE', "%{$search}%")
                ->get();
            return response(['status' => true, 'result' => $cases]);
        }
    }

    // update session status from waiting to done
    public function updateStatus($id)
    {
        $status = false;
        $session = Sessions::find($id);
        if ($session->status == "waiting") {
            $session->status = "Done";
            $status = true;
        } else {
            $session->status = "waiting";
            $status = false;
        }
        $session->update();
        return response(['msg' => 'تم التعديل بنجاح', 'result' => $session, 'status' => $status]);

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
            return response(['status' => true, 'result' => $html, 'msg' => 'تم إضافة الجلسة بنجاح']);
        }
        return redirect()->route('cases.session_item')->with('success', 'تم إضافة الجلسة بنجاح');
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
            $sessions = DB::table('sessions')->where('case_Id', '=', $id)->orderBy('id', 'desc')->get();
            $attachments = DB::table('Attachements')->where('case_Id', '=', $id)->get();
            $sessions_table = array();;
            foreach ($sessions as $session) {
                $sessions_table [] = view('cases.session_item', compact('session'))->render();
            }

            $clients = $case->clients;
            $clients_array = [];
            $khesm_array = [];
            foreach ($clients as $key => $client) {
                if ($client->type == 'khesm') {
                    $khesm_array[] = view('cases.mokel_item', compact('client'))->render();
                } else {
                    $clients_array[] = view('cases.mokel_item', compact('client'))->render();
                }

            }
            $res = [
                "case" => $case,
                "sessions" => $sessions_table,
                "attachments" => $attachments,
                "sessions_counts" => $sessions->count(),
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
            return response(['msg' => 'تم التعديل بنجاح', 'result' => $session]);
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
        $session_notes = DB::table('session__notes')->where('session_Id', '=', $id)->orderBy('id', 'desc')->get();
        $note_table = array();

        foreach ($session_notes as $note) {
            $note_table [] = view('cases.session_note_item', compact('note'))->render();
        }
        return response()->json(['result' => $note_table]);
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
            'to_whome' => 'required|in:private,company'
        ]);

        Cases::where('id', $request->case_Id)->update($data);
        return response(['status' => true, 'msg' => "تم التعديل بنجاح"]);

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
            return response(['status' => true, 'msg' => "تمت الاضافه بنجاح", 'result' => $clients]);
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

        $cases = Cases::query()->where("id","=",$id)->get();

//dd($cases);
        $pdf = PDF::loadView('Reports.CasePDF', ['data' => $cases]);

        return $pdf->stream('My PDF' . 'pdf');

    }

}
