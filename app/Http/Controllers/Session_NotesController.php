<?php

namespace App\Http\Controllers;

use App\Session_Notes;
use App\Sessions_Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class Session_NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                'note' => 'required',
            ]);
            $session_Id = $request->session_Id;
            $note = Session_Notes::create(array_merge($request->except('session_Id', 'updated_by'), ['session_Id' => $session_Id, 'updated_by' => '1']));
            $html = view('cases.session_note_item', compact('note'))->render();
            return response(['status' => true, 'result' => $html, 'msg' => 'تم الإضافة بنجاح']);
        }
        return redirect()->route('cases.session_note_item')->with('success', 'تم الإضافة بنجاح');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Session_Notes::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->validate(request(), [
                'note' => 'required'
            ]);
            $note = Session_Notes::find($request->noteId);
            $note->note = $request->input('note');
            $note->update();
            return response(['msg' => 'تم التعديل بنجاح', 'result' => $note]);
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
        $data = Session_Notes::findOrFail($id);
        $data->delete();
    }

    // update note status from waiting to done
    public function updateStatus($id)
    {
        $status = false;
        $note = Session_Notes::find($id);
        if ($note->status == "لا") {
            $note->status = "نعم";
            $status = true;
        } else {
            $note->status = "لا";
            $status = false;
        }
        $note->update();
        return response(['msg' => 'تم التعديل بنجاح', 'result' => $note, 'status' => $status]);

    }

    public function exportNotes($id)
    {
        $notes = DB::table('session__notes')->where('session_Id', '=', $id)->orderBy('id', 'desc')->get();
        $pdf = PDF::loadView('exports.session_notes_export', compact('notes'));
        return $pdf->stream('document.pdf');
    }

}
