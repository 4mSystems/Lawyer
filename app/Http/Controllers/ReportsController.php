<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Permission;
use Illuminate\Http\Request;
use App\Sessions;
use App\category;
use Illuminate\Support\Facades\DB;
use PDF;
// use Dompdf\Dompdf;


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
        $user_id = auth()->user()->id;
        $permission = Permission::where('user_id', $user_id)->first();
        $enabled = $permission->daily_report;
        $categories = category::select('id', 'name')->get();

        if ($enabled == 'yes') {
            return view('Reports.CasesDailyReport',compact('categories'));
        } else {
            return redirect(url('home'));
        }
    }

    public function monthlyPage()
    {
        $user_id = auth()->user()->id;
        $permission = Permission::where('user_id', $user_id)->first();
        $categories = category::select('id', 'name')->get();
        $enabled = $permission->monthly_report;
        if ($enabled == 'yes') {
            return view('Reports.CasesMonthlyReport',compact('categories'));

        } else {
            return redirect(url('home'));
        }
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


    public function edit($searchDate, $type)
    {
        $sessions_table = array();
        $khesm;
        $clients;
   
        if ($type == 'all') {
            $results = Sessions::with('cases', 'Printnotes')
            ->where('session_date', '=', $searchDate)
            ->get();
        } else {
            $results = Sessions::with('cases', 'Printnotes')
                ->where('session_date', '=', $searchDate)
                ->whereHas('cases', function ($q) use ($type) {
                    $q->where('to_whome', '=', $type);
                })
                ->get();
        }

        foreach ($results as $result) {
            $case = Cases::findOrFail($result->case_Id);
            $clients = $case->clients;

            foreach ($clients as $key => $client) {
                if ($client->type == trans('site_lang.clients_client_type_khesm')) {
                    $khesm = $client;
                } else {
                    $clients = $client;
                }
            }

            $sessions_table [] = view('Reports.reports_daily_item', compact('result', 'clients', 'khesm'))->render();
        }
        return response(['status' => true, 'result' => $sessions_table]);
    }

    public function searchMonthly($month, $year, $type)
    {
        $sessions_table = array();

        if ($type == 'all') {
            $results = Sessions::with('cases', 'Printnotes')
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->get();
        } else {
            $results = Sessions::with('cases', 'Printnotes')
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->whereHas('cases', function ($q) use ($type) {
                    $q->where('to_whome', '=', $type);
                })
                ->get();
        }


        foreach ($results as $result) {
            $case = Cases::findOrFail($result->case_Id);
            $clients = $case->clients;

            foreach ($clients as $key => $client) {
                if ($client->type == trans('site_lang.clients_client_type_khesm')) {
                    $khesm = $client;
                } else {
                    $clients = $client;
                }
            }
            $sessions_table [] = view('Reports.reports_daily_item', compact('result', 'khesm', 'clients'))->render();
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

    public function pdfexport($id, $type)
    {
        if ($type == 'all') {
            $data = Sessions::with('cases', 'Printnotes')
                ->where('session_date', '=', $id)
                ->get();
        } else {
            $data = Sessions::with('cases', 'Printnotes')
                ->where('session_date', '=', $id)
                ->whereHas('cases', function ($q) use ($type) {
                    $q->where('to_whome', '=', $type);
                })
                ->get();
        }
        foreach ($data as $result) {
            $case = Cases::findOrFail($result->case_Id);
            $clients = $case->clients;

            foreach ($clients as $key => $client) {
                if ($client->type == trans('site_lang.clients_client_type_khesm')) {
                    $khesm = $client;
                } else {
                    $clients = $client;
                }
            }
        }
        $pdf = PDF::loadView('Reports.DailyPDF', ['data' => $data, 'search_date' => $id, 'khesm' => $khesm, 'clients' => $clients]);

        return $pdf->stream('My PDF' . 'pdf');
    }

    public function pdfMonthexport($month, $year, $type)
    {if ($type == 'all') {
        $data = Sessions::with('cases', 'Printnotes')
            ->where('month', '=', $month)
            ->where('year', '=', $year)
            ->get();
    } else {
        $data = Sessions::with('cases', 'Printnotes')
            ->where('month', '=', $month)
            ->where('year', '=', $year)
            ->whereHas('cases', function ($q) use ($type) {
                $q->where('to_whome', '=', $type);
            })
            ->get();
    }
    foreach ($data as $result) {
        $case = Cases::findOrFail($result->case_Id);
        $clients = $case->clients;

        foreach ($clients as $key => $client) {
            if ($client->type == trans('site_lang.clients_client_type_khesm')) {
                $khesm = $client;
            } else {
                $clients = $client;
            }
        }
    }
    $pdf = PDF::loadView('Reports.MonthlyPDF', ['data' => $data, 'month' => $month, 'year' => $year, 'khesm' => $khesm, 'clients' => $clients]);


    return $pdf->stream('My PDF' . 'pdf');
    }
}
