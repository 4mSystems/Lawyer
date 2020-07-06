<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clients;
use App\Client_Note;
use App\Cases;
use App\Case_client;
use Yajra\DataTables\Services\DataTable;

use App\DataTables\ClientNoteDataTable;


class ClientProfileController extends Controller
{
    public function profile($id)
    {

        $client_data = Clients::findOrFail($id);
        $user_type = auth()->user()->type;
        if ($user_type == 'User') {
            if (request()->ajax()) {
                return datatables()->of(Client_Note::where('client_id', $id)->with('user_id')->get())
                    ->addColumn('action', function ($data) {

                    })->rawColumns(['action'])->make(true);
            }
        } else {
            if (request()->ajax()) {
                return datatables()->of(Client_Note::where('client_id', $id)->with('user_id')->get())
                    ->addColumn('action', function ($data) {
                        $button = '<button  data-client-id="' . $data->id . '" id="editnote" class="btn btn-xs btn-green tooltips" ><i
                            class="fa fa-edit"></i>&nbsp;&nbsp;' . trans('site_lang.edit') . '</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a  data-client-id="' . $data->id . '" id="deletenote" class="btn btn-xs btn-red tooltips" ><i
                            class="fa fa-trash"></i>&nbsp;&nbsp;' . trans('site_lang.delete') . '</a>';
                        return $button;
                    })->rawColumns(['action'])->make(true);
            }

        }


        return view('clients/profile', compact('client_data'));

    }

    public
    function store(Request $request, $id)
    {
        $data = $this->validate(request(), [
            'notes' => 'required',
        ]);
        $data['user_id'] = auth()->user()->id;
        // dd( $data['user_id']);
        $data['client_id'] = $id;
        Client_Note::create($data);
        return response()->json(['success' => trans('site_lang.public_success_text')]);
    }

    public function delete_Note($id)
    {

        Client_Note::findOrFail($id)->delete();
        return \redirect()->back();
    }

    public function edit_note($id)
    {
        if (request()->ajax()) {
            $data = Client_Note::findOrFail($id);
            return response()->json(['data' => $data]);
        }

    }

    public
    function update_note(Request $request)
    {
        if ($request->ajax()) {

            $data = $this->validate(request(), [
                'notes' => 'required',
            ]);
            Client_Note::find($request->id)->update($data);
            return response(['success' => trans('site_lang.public_success_text')]);
        }
    }


    public function client_cases($id)
    {
        $client_data = Clients::findOrFail($id);
        $cases_id = Case_client::where('client_id', $id)->pluck('case_id')->toArray();


        if (request()->ajax()) {

            return datatables()->of(Cases::whereIn('id', $cases_id)->with('to_whome'))->make(true);

        }


        return view('clients/profile', compact('client_data'));

    }


}
