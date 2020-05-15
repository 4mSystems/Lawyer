<?php

namespace App\Http\Controllers;

use App\Case_client;
use App\Cases;
use App\Clients;
use App\Sessions;
use Illuminate\Http\Request;

class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getClients()
    {
        $clients = Clients::select('id', 'client_Name')->where('type', 'client')->get();
        $khesm = Clients::select('id', 'client_Name')->where('type', 'khesm')->get();

        return view('cases.add_case', compact(['clients', 'khesm']));
    }

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
//                'mokel_name' => 'required',
//                'khesm_name' => 'required',
                'invetation_num' => 'required',
                'circle_num' => 'required',
                'court' => 'required',
                'first_session_date' => 'required',
                'inventation_type' => 'required',
                'to_whome' => 'required'
            ]);
            $month = date('m', strtotime($request->first_session_date));
            $year = date('yy', strtotime($request->first_session_date));
//            // saving case data
            $case = Cases::create($data);
            $case['month'] = $month;
            $case['year'] = $year;
            $case->save();
            //saving session data
            $sessions = new Sessions();
            $sessions->session_date = $request->first_session_date;
            $sessions->case_Id = $case->id;
            $sessions->month = $month;
            $sessions->year = $year;
            $sessions->save();
            // saving case clients data
            $res = array_merge($request->mokel_name, $request->khesm_name);
            foreach ($res as $client) {
                Case_client::create(['case_id' => $case->id, 'client_id' => $client]);
            }
            return response(['status' => true, 'msg' => "تمت الاضافه بنجاح"]);
        }
        return redirect()->route('cases.add_case')->with('success', 'Case Added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        dd($request);
//        $data = $this->validate(request(), [
//            'invetation_num' => 'required',
//            'circle_num' => 'required',
//            'court' => 'required',
//            'inventation_type' => 'required',
//            'to_whome' => 'required|in:private,company'
//        ]);
//
//
//
//        Cases::where('id',$id)->update($data);
//        return redirect()->route('cases.add_case')->with('success', 'Case updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}