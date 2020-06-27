<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Cases;
use App\mohdr;
use App\Sessions;
use Carbon\Carbon;
use App\Session_Notes;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $users = User::all();
        $cases = Cases::all();
        $sessions = Sessions::all();
        $mohdreen = mohdr::all();
        $today = Carbon::today();
        $date = Carbon::today()->addDays(10);
        $session = Sessions::whereBetween('session_date', array($today, $date))->get();
        $sessionNo = Sessions::where('session_date', '<=', $today)->where('status', 'No')->get();
        $datee = Carbon::today()->addDays(15);
        $mohder = mohdr::whereBetween('session_date', array($today, $datee))->get();

        return view('home', compact(['users', 'cases', 'mohdreen', 'session', 'mohder', 'sessionNo','sessions']));

    }


    public function showMohData($id)
    {
        if (request()->ajax()) {
            $data = mohdr::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function showSessionNotes($id)
    {
        $session_notes = Session_Notes::where('session_Id', $id)->orderBy('id', 'desc')->get();
        $note_table = array();

        foreach ($session_notes as $note) {
            $note_table [] = view('cases.session_note_home_item', compact('note'))->render();
        }
        return response()->json(['result' => $note_table]);
    }


}
