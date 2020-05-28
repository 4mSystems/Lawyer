<?php

namespace App\Http\Controllers;

use App\Cases;
use Illuminate\Http\Request;
use App\Sessions;
use Illuminate\Support\Facades\DB;
use PDF;


class ReportsController extends Controller
{
    public $objectName;
    public $folderView;
    public $flash;


    public function __construct(Sessions $model)
    {
        // $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'Reports.';
        $this->flash = 'Product Data Has Been ';

    }

    public function index()
    {

        return view('Reports.CasesDailyReport');
    }
    public function monthlyPage()
    {
        return view('Reports.CasesMonthlyReport');
    }


    public function create()
    {
        //
    }

    public function search(Request $request)
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($searchDate,$type)
    {
        $sessions_table = array();


        if($type=='all'){
            $results = Sessions::with('cases', 'Printnotes')
                ->where('session_date', '=', $searchDate)
                ->get();
        }else{
            $results = Sessions::with('cases', 'Printnotes')
                ->where('session_date', '=', $searchDate)
                ->whereHas('cases', function($q) use ($type) {
                    $q->where('to_whome','=',$type);
                })
                ->get();
        }

        foreach ($results as  $result) {
            $case = Cases::findOrFail($result->case_Id);
            $clients = $case->clients;

            foreach ($clients as $key => $client) {
                if ($client->type == 'khesm') {
                    $khesm =$client ;
                } else {
                    $clients=$client;
                }
            }

            $sessions_table [] = view('Reports.reports_daily_item', compact('result','clients','khesm'))->render();
        }
        return response(['status' => true, 'result' => $sessions_table]);
    }

    public function searchMonthly($month,$year,$type)
    {
        $sessions_table = array();

        if($type=='all'){
            $results = Sessions::with('cases', 'Printnotes')
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->get();
        }else{
            $results = Sessions::with('cases', 'Printnotes')
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->whereHas('cases', function($q) use ($type) {
                    $q->where('to_whome','=',$type);
                })
                ->get();
        }


        foreach ($results as $result) {
            $case = Cases::findOrFail($result->case_Id);
            $clients = $case->clients;

            foreach ($clients as $key => $client) {
                if ($client->type == 'khesm') {
                    $khesm =$client ;
                } else {
                    $clients=$client;
                }
            }
            $sessions_table [] = view('Reports.reports_daily_item', compact('result','khesm','clients'))->render();
        }
        return response(['status' => true, 'result' => $sessions_table]);
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function pdfexport($id,$type)
    {
        if($type=='all'){
            $data = Sessions::with('cases', 'Printnotes')
                ->where('session_date', '=', $id)
                ->get();
        }else{
            $data = Sessions::with('cases', 'Printnotes')
                ->where('session_date', '=', $id)
                ->whereHas('cases', function($q) use ($type) {
                    $q->where('to_whome','=',$type);
                })
                ->get();
        }
        foreach ($data as $result) {
            $case = Cases::findOrFail($result->case_Id);
            $clients = $case->clients;

        foreach ($clients as $key => $client) {
            if ($client->type == 'khesm') {
                $khesm =$client ;
            } else {
                $clients=$client;
            }
        }
        }
        $pdf = PDF::loadView('Reports.DailyPDF', ['data' => $data,'search_date'=>$id,'khesm'=>$khesm,'clients'=>$clients]);

        return $pdf->stream('My PDF' . 'pdf');
    }

    public function pdfMonthexport($month,$year,$type)
    {
        if($type=='all'){
            $data = Sessions::with('cases', 'Printnotes')
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->get();
        }else{
            $data = Sessions::with('cases', 'Printnotes')
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->whereHas('cases', function($q) use ($type) {
                    $q->where('to_whome','=',$type);
                })
                ->get();
        }
        foreach ($data as $result) {
            $case = Cases::findOrFail($result->case_Id);
            $clients = $case->clients;

            foreach ($clients as $key => $client) {
                if ($client->type == 'khesm') {
                    $khesm =$client ;
                } else {
                    $clients=$client;
                }
            }
        }
        $pdf = PDF::loadView('Reports.MonthlyPDF', ['data' => $data,'month'=>$month, 'year'=>$year,'khesm'=>$khesm,'clients'=>$clients]);


        return $pdf->stream('My PDF' . 'pdf');
    }
}