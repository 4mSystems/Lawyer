<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Exports\MohdareenExport;
use App\Mohdareen;
use App\mohdr;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class MohdareenController extends Controller
{

    public function index()
    {
        $mohdareen = mohdr::get();
        return view('mohdareen.mohdareen', compact('mohdareen'));
    }

    public function create()
    {
        //
    }

    public function getClients()
    {
        $clients = Clients::all();
        return response(['status' => true, 'result' => $clients]);
    }


    public function store(Request $request)
    {
        if ($request->ajax()) {

            $data = $this->validate(request(), [
                'court_mohdareen' => 'required',
                'paper_type' => 'required',
                'deliver_data' => 'required',
                'paper_Number' => 'required',
                'session_Date' => 'required',
                'mokel_Name' => 'required',
                'khesm_Name' => 'required',
                'case_number' => 'required',
            ]);
            $mokel = implode(',', $request->mokel_Name);
            $khesm = implode(',', $request->khesm_Name);
            $mohdar = mohdr::create(array_merge($request->except('mokel_Name', 'khesm_Name'), ['mokel_Name' => $mokel, 'khesm_Name' => $khesm]));
            $html = view('mohdareen.mohdareen_item', compact('mohdar'))->render();
            return response(['status' => true, 'result' => $html, 'msg' => 'تم إضافة المحضر بنجاح']);
        }
        return redirect()->route('mohdareen.mohdareen')->with('success', 'تم إضافة المحضر بنجاح');
    }

    public function show($id)
    {
        //
    }

    public function updateStatus($id)
    {
        $status = false;
        $mohdar = mohdr::find($id);
        if ($mohdar->status == "لا") {
            $mohdar->status = "نعم";
            $status = true;
        } else {
            $mohdar->status = "لا";
            $status = false;
        }
        $mohdar->update();
        return response(['msg' => 'تم التعديل بنجاح', 'result' => $mohdar, 'status' => $status]);

    }

    public function export()
    {
//        return (new MohdareenExport())->view();
        $mohdareen = mohdr::get();
//        return view('exports.mohdar_export', compact('mohdareen'));
        $pdf = PDF::loadView('exports.mohdar_export', compact('mohdareen'));
        return $pdf->stream('document.pdf');
    }

    public function edit($id)
    {
        if (request()->ajax()) {
            $data = mohdr::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->validate(request(), [
                'court_mohdareen' => 'required',
                'paper_type' => 'required',
                'deliver_data' => 'required',
                'paper_Number' => 'required',
                'session_Date' => 'required',
                'case_number' => 'required',
            ]);
            $mohdar = mohdr::find($request->id);
            $mohdar->court_mohdareen = $request->input('court_mohdareen');
            $mohdar->paper_type = $request->input('paper_type');
            $mohdar->deliver_data = $request->input('deliver_data');
            $mohdar->session_Date = $request->input('session_Date');
            $mohdar->case_number = $request->input('case_number');
            $mohdar->paper_Number = $request->input('paper_Number');
            $mohdar->update();
            return response(['msg' => 'تم التعديل بنجاح', 'result' => $mohdar]);
        }
    }


    public function destroy($id)
    {
        $data = mohdr::findOrFail($id);
        $data->delete();
    }
}
