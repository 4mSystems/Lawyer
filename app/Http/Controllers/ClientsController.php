<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Permission;
use App\category;
use Illuminate\Http\Request;
use Yajra\DataTables\Services\DataTable;


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_type = auth()->user()->type;


        $user_cat_id = auth()->user()->cat_id;

        $user_id = auth()->user()->id;
        $permission = Permission::where('user_id', $user_id)->first();
        $enabled = $permission->clients;
        if ($enabled == 'yes') {
            if (request()->ajax()) {
                if ($user_type == 'admin') {
                    return datatables()->of(Clients::latest()->get())
                        ->addColumn('action', function ($data) {
                            $button = '<button data-client-id="' . $data->id . '" id="editClient" class="btn btn-xs btn-blue tooltips" ><i
                                    class="fa fa-edit"></i>&nbsp;&nbsp;' . trans('site_lang.public_edit_btn_text') . '</button>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<a href = "profile/' . $data->id . '" data-client-id="' . $data->id . '" id="viewClient" class="btn btn-xs btn-green tooltips" ><i
                                    class="fa fa-view"></i>&nbsp;&nbsp;' . trans('site_lang.public_view_btn_text') . '</a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button data-client-id="' . $data->id . '" id="deleteClient"  class="btn btn-xs btn-red tooltips" ><i
                                    class="fa fa-times fa fa-white"></i>&nbsp;&nbsp;' . trans('site_lang.public_delete_text') . '</button>';
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                } else {
                    return datatables()->of(Clients::where('cat_id', $user_cat_id)->latest()->get())
                        ->addColumn('action', function ($data) {

                            $button = '<a href = "profile/' . $data->id . '" data-client-id="' . $data->id . '" id="viewClient" class="btn btn-xs btn-green tooltips" ><i
                                    class="fa fa-view"></i>&nbsp;&nbsp;' . trans('site_lang.public_view_btn_text') . '</a>';
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }


            }


            $categories = category::select('id', 'name')->get();
            return view('clients/clients', compact('categories'));
        } else {
            return redirect(url('home'));

        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        //
    }


    public
    function store(Request $request)
    {

        if (auth()->user()->type == 'User') {
            $data = $this->validate(request(), [
                'client_Name' => 'required',
                'client_Unit' => 'required',
                'client_Address' => 'required',
                'notes' => 'required',
                'type' => 'required|in:client,khesm'
            ]);
            $data['cat_id'] = auth()->user()->cat_id;
        } else {
            $data = $this->validate(request(), [
                'client_Name' => 'required',
                'client_Unit' => 'required',
                'client_Address' => 'required',
                'notes' => 'required',
                'type' => 'required|in:client,khesm',
                'cat_id' => 'required'
            ]);
            $data['cat_id'] = $request->cat_id;
        }


        Clients::create($data);
        return response()->json(['success' => trans('site_lang.public_success_text')]);
    }


    public
    function show($id)
    {

    }


    public
    function edit($id)
    {
        if (request()->ajax()) {
            $data = Clients::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }


    public
    function update(Request $request)
    {
        if ($request->ajax()) {

            $data = $this->validate(request(), [
                'client_Name' => 'required',
                'client_Unit' => 'required',
                'client_Address' => 'required',
                'notes' => 'required',
                'type' => 'required|in:client,khesm',
                'cat_id' => 'required'
            ]);
            $data['cat_id'] = $request->cat_id;
            Clients::find($request->id)->update($data);
            return response(['success' => trans('site_lang.public_success_text')]);
        }
    }

    public
    function destroy($id)
    {
        $data = Clients::findOrFail($id);
        $data->delete();
    }
}
