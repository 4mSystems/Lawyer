<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $permission = Permission::where('user_id', $user_id)->first();
        $enabled = $permission->clients;
        if ($enabled == 'yes') {
            $clients = DB::table('clients')
                ->orderBy('id', 'desc')
                ->get();
            return view('clients/clients', compact('clients'));
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
    if ($request->ajax()) {

        $attribute = [
            'client_Name' => trans('usersValidations.client_Name'),
            'client_Unit' => trans('usersValidations.client_Unit'),
            'client_Address' => trans('usersValidations.client_Address'),
            'notes' => trans('usersValidations.notes'),

        ];
        $data = $this->validate(request(), [
            'client_Name' => 'required',
            'client_Unit' => 'required|unique:users,email',
            'client_Address' => 'required',
            'notes' => 'required',
            'type' => 'required|in:client,khesm'
        ], [], $attribute);
        $client = Clients::create($data);
        $html = view('clients.clients_item', compact('client'))->render();
        return response(['status' => true, 'result' => $html, 'msg' => trans('site_lang.public_success_text')]);
    }
    return redirect()->route('users.users')->with('success', 'Client Added successfully');

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
        $attribute = [
            'client_Name' => trans('usersValidations.client_Name'),
            'client_Unit' => trans('usersValidations.client_Unit'),
            'client_Address' => trans('usersValidations.client_Address'),
            'notes' => trans('usersValidations.notes')
        ];
        $data = $this->validate(request(), [
            'client_Name' => 'required',
            'client_Unit' => 'required|unique:users,email',
            'client_Address' => 'required',
            'notes' => 'required',
            'type' => 'required|in:client,khesm'
        ], [], $attribute);
        $clients = Clients::find($request->id);
        $clients->client_Name = $request->input('client_Name');
        $clients->client_Unit = $request->input('client_Unit');
        $clients->client_Address = $request->input('client_Address');
        $clients->notes = $request->input('notes');
        $clients->type = $request->input('type');
        $clients->update();
        if ($clients->type == 'client') {
            $clients->type = trans('site_lang.clients_client_type_client');
        } else {
            $clients->type = trans('site_lang.clients_client_type_khesm');
        }
        return response(['msg' => trans('site_lang.public_success_text'), 'result' => $clients]);
    }
}

public
function destroy($id)
{
    $data = Clients::findOrFail($id);
    $data->delete();
}
}
