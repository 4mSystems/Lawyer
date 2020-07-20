<?php

namespace App\Http\Controllers;

use App\Cases;
use App\category;
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
        $user_type = auth()->user()->type;

        $user_id = auth()->user()->id;
        $permission = Permission::where('user_id', $user_id)->first();

        $enabled = $permission->mohdreen;
        if ($enabled == 'yes') {
            if (request()->ajax()) {
                if ($user_type == 'admin') {
                    return datatables()->of(mohdr::get())
                        ->addColumn('status', function ($data) {
                            if ($data->status == trans('site_lang.public_no_text')) {
                                $html = '<p class="btn btn-sm" data-moh-Id="' . $data->moh_Id . '">
                            <span class="label label-danger text-bold"> ' . $data->status . '</span></p>';
                            } else {
                                $html = '<p class="btn btn-sm" data-moh-Id="' . $data->moh_Id . '">
                            <span class="label label-success text-bold"> ' . $data->status . '</span></p>';
                            }

                            return $html;
                        })
                        ->addColumn('action', function ($data) {
                            $button = '<button data-moh-Id="' . $data->moh_Id . '" id="editMohdar" class="btn btn-xs btn-blue tooltips" ><i
                        class="fa fa-edit"></i>&nbsp;&nbsp;' . trans('site_lang.public_edit_btn_text') . '</button>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button data-moh-Id="' . $data->moh_Id . '" id="deleteMohadr"  class="btn btn-xs btn-red tooltips" ><i
                        class="fa fa-times fa fa-white"></i>&nbsp;&nbsp;' . trans('site_lang.public_delete_text') . '</button>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button data-moh-Id="' . $data->moh_Id . '" id="showMohdar"  class="btn btn-xs btn-blue tooltips" ><i
                        class="fa fa-eye-slash"></i>&nbsp;&nbsp;' . trans('site_lang.home_more_options') . '</button>';

                            return $button;
                        })
                        ->rawColumns(['status', 'action'])
                        ->make(true);


                } else {
                    return datatables()->of(mohdr::query()->where('cat_id', '=', auth()->user()->cat_id)->get())
                        ->addColumn('status', function ($data) {
                            if ($data->status == trans('site_lang.public_no_text')) {
                                $html = '<p class="btn btn-sm" data-moh-Id="' . $data->moh_Id . '">
                            <span class="label label-danger text-bold"> ' . $data->status . '</span></p>';
                            } else {
                                $html = '<p class="btn btn-sm" data-moh-Id="' . $data->moh_Id . '">
                            <span class="label label-success text-bold"> ' . $data->status . '</span></p>';
                            }

                            return $html;
                        })
                        ->addColumn('action', function ($data) {

                            $button = '<button data-moh-Id="' . $data->moh_Id . '" id="showMohdar"  class="btn btn-xs btn-blue tooltips" ><i
                        class="fa fa-eye-slash"></i>&nbsp;&nbsp;' . trans('site_lang.home_more_options') . '</button>';

                            return $button;
                        })
                        ->rawColumns(['status', 'action'])
                        ->make(true);
                }


            }
            $categories = category::select('id', 'name')->get();
            return view('mohdareen/mohdareen', compact('categories'));
        } else {
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
        $cat_id = 0;
        if (auth()->user()->type == 'User') {
            $data = $this->validate(request(), [
                'court_mohdareen' => 'required',
                'paper_type' => 'required',
                'deliver_data' => 'required',
                'mokel_Name' => 'required',
                'khesm_Name' => 'required',
                'paper_Number' => 'required',
                'session_Date' => 'required',
                'case_number' => 'required',

            ]);
           $cat_id = auth()->user()->cat_id;
        } else {
            $data = $this->validate(request(), [
                'court_mohdareen' => 'required',
                'paper_type' => 'required',
                'deliver_data' => 'required',
                'mokel_Name' => 'required',
                'khesm_Name' => 'required',
                'paper_Number' => 'required',
                'session_Date' => 'required',
                'case_number' => 'required',
                'cat_id' => 'required'
            ]);
            $cat_id = $request->cat_id;
        }
        $mokel = implode(',', $request->mokel_Name);
        $khesm = implode(',', $request->khesm_Name);
        $mohdar = new mohdr();
        $mohdar->mokel_Name = $mokel;
        $mohdar->khesm_Name = $khesm;
        $mohdar->cat_id = $cat_id;
        $mohdar->court_mohdareen = $request->court_mohdareen;
        $mohdar->deliver_data = $request->deliver_data;
        $mohdar->paper_type = $request->paper_type;
        $mohdar->paper_Number = $request->paper_Number;
        $mohdar->session_Date = $request->session_Date;
        $mohdar->case_number = $request->case_number;
        $mohdar->notes = $request->notes;
        $mohdar->save();
        return response()->json(['success' => trans('site_lang.public_success_text')]);
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
        if ($mohdar->status == trans('site_lang.public_no_text')) {
            $mohdar->status = 'Yes';
            $status = true;
        } else {
            $mohdar->status = 'No';
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
            $cat_id = 0;
            if (auth()->user()->type == 'User') {
                $data = $this->validate(request(), [
                    'court_mohdareen' => 'required',
                    'paper_type' => 'required',
                    'deliver_data' => 'required',
                    'paper_Number' => 'required',
                    'session_Date' => 'required',
                    'case_number' => 'required',

                ]);
                $cat_id = auth()->user()->cat_id;
            } else {
                $data = $this->validate(request(), [
                    'court_mohdareen' => 'required',
                    'paper_type' => 'required',
                    'deliver_data' => 'required',
                    'paper_Number' => 'required',
                    'session_Date' => 'required',
                    'case_number' => 'required',
                    'cat_id' => 'required'
                ]);
                $cat_id = $request->cat_id;
            }
            $mohdar = mohdr::find($request->id);
            $mohdar->court_mohdareen = $request->input('court_mohdareen');
            $mohdar->paper_type = $request->input('paper_type');
            $mohdar->deliver_data = $request->input('deliver_data');
            $mohdar->session_Date = $request->input('session_Date');
            $mohdar->case_number = $request->input('case_number');
            $mohdar->paper_Number = $request->input('paper_Number');
            $mohdar->cat_id = $cat_id;
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
