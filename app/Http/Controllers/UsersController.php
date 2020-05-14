<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users/users', compact('users'));
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
                'name' => trans('usersValidations.name'),
                'email' => trans('usersValidations.email'),
                'password' => trans('usersValidations.password'),
                'type' => trans('usersValidations.type')
            ];
            $data = $this->validate(request(), [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'type' => 'required'
            ], [], $attribute);
            $user = User::create($data);
            $html = view('users.users_item', compact('user'))->render();
            return response(['status' => true, 'result' => $html, 'msg' => 'Users Added successfully']);
        }
        return redirect()->route('users.users')->with('success', 'Users Added successfully');
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
        if (request()->ajax()) {
            $data = User::findOrFail($id);
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
                'name' => trans('usersValidations.name'),
                'email' => trans('usersValidations.email'),
                'password' => trans('usersValidations.password'),
                'type' => trans('usersValidations.type')
            ];
            $data = $this->validate(request(), [
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$request->id,
                'password' => 'required',
                'type' => 'required'
            ], [], $attribute);
            $users = User::find($request->id);
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->password = $request->input('password');
            $users->type = $request->input('type');
            $users->update();
//
//            $user = User::findOrFail($id)->update($request->only('name', 'email'));
//            $html = view('users.users_item', compact('users'))->render();
            return response(['msg' => 'Users Updated successfully', 'result' => $users]);
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
        $data = User::findOrFail($id);
        $data->delete();
    }
}
