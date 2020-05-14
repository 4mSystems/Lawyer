<?php

namespace App\Http\Controllers;

use App\Cases;
use App\mohdr;
use App\Sessions;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

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
                ->where('mokel_name', 'LIKE', "%{$search}%")
                ->orWhere('khesm_name', 'LIKE', "%{$search}%")
                ->orWhere('invetation_num', 'LIKE', "%{$search}%")
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
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
//                dd($sessions_table);
            }
            $res = [
                "case" => $case,
                "sessions" => $sessions_table,
                "attachments" => $attachments,
                "sessions_counts" => $sessions->count(),
                "sessions_notes_counts" => "0",
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

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Sessions::findOrFail($id);
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


}
