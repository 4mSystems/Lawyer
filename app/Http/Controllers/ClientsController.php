<?php

namespace App\Http\Controllers;

use App\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::all();

        return view('clients/clients', compact('clients'));
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
                'type'=>'required|in:client,khesm'
            ], [], $attribute);
            $client = Clients::create($data);
            $html = view('clients.clients_item', compact('client'))->render();
            return response(['status' => true, 'result' => $html, 'msg' => 'Client Added successfully']);
        }
        return redirect()->route('users.users')->with('success', 'Client Added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Clients::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
                'type'=>'required|in:client,khesm'
            ], [], $attribute);
            $clients = Clients::find($request->id);
            $clients->client_Name = $request->input('client_Name');
            $clients->client_Unit = $request->input('client_Unit');
            $clients->client_Address = $request->input('client_Address');
            $clients->notes = $request->input('notes');
            $clients->type = $request->input('type');
            $clients->update();
//
//            $user = User::findOrFail($id)->update($request->only('name', 'email'));
//            $html = view('users.users_item', compact('users'))->render();
            return response(['msg' => 'Client Updated successfully', 'result' => $clients]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Clients::findOrFail($id);
        $data->delete();
    }
}
