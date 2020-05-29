<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Clients;
use App\Exports\MohdareenExport;
use App\Mohdareen;
use App\mohdr;
use App\Permission;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class MohdareenController extends Controller
{

    public function index()
    {
        $user_id=auth()->user()->id;
        $permission = Permission::where('user_id',$user_id)->first();
        $enabled =  $permission->mohdreen;
        if($enabled == 'yes') {
            $mohdareen = mohdr::get();
            return view('mohdareen.mohdareen', compact('mohdareen'));
        }else {
            return redirect(url('home'));
        }
    }

    public function create()
    {
        //
    }

    public function getClients()
    {
        $clients = Clients::query()->where('type', '=', 'client')->get();
        $khesm = Clients::query()->where('type', '=', 'khesm')->get();
        return response(['status' => true, 'clients' => $clients, 'khesm' => $khesm]);
    }


    public function getCaseToSelect($case_num)
    {
        $Cases = Cases::where('invetation_num', 'LIKE', '%' . $case_num . '%');

        return response(['status' => true, 'result' => $Cases]);
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
                'case_number' => 'required',
            ]);
//            dd($request);
            $mokel = implode(',', $request->mokel_Name);
            $khesm = implode(',', $request->khesm_Name);
            $mohdar = new mohdr();
            $mohdar->mokel_Name = $mokel;
            $mohdar->khesm_Name = $khesm;
            $mohdar->status = 'لا';
            $mohdar->court_mohdareen = $request->court_mohdareen;
            $mohdar->deliver_data = $request->deliver_data;
            $mohdar->paper_type = $request->paper_type;
            $mohdar->paper_Number = $request->paper_Number;
            $mohdar->session_Date = $request->session_Date;
            $mohdar->case_number = $request->case_number;
            $mohdar->notes = $request->notes;
            $mohdar->save();
//            $mohdar = mohdr::create(array_merge($request->except('mokel_Name', 'khesm_Name'), ['mokel_Name' => $mokel, 'khesm_Name' => $khesm]));
            $html = view('mohdareen.mohdareen_item', compact('mohdar'))->render();
            return response(['status' => true, 'result' => $html, 'msg' => trans('site_lang.public_success_text')]);
        }
        return redirect()->route('mohdareen.mohdareen')->with('success', trans('site_lang.public_success_text'));
    }

    public function getCase($search)
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
        return response(['msg' => trans('site_lang.public_success_text'), 'result' => $mohdar, 'status' => $status]);

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
            return response(['msg' => trans('site_lang.public_success_text'), 'result' => $mohdar]);
        }
    }


    public function destroy($id)
    {
        $data = mohdr::findOrFail($id);
        $data->delete();
    }
}
