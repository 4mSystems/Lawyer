<?php

namespace App\Http\Controllers;

use App\category;
use App\Permission;
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
        $user_id = auth()->user()->id;
        $permission = Permission::where('user_id', $user_id)->first();
        $enabled = $permission->users;
        if ($enabled == 'yes') {
            $users = User::all();
            $categories = category::select('id', 'name')->get();
            return view('users/users', compact('users', 'categories'));
        } else {
            return redirect(url('home'));
        }
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        if ($request->ajax()) {
            $data = $this->validate(request(), [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'type' => 'required',
                'cat_id' => 'required'
            ]);

            $data['password'] = bcrypt(request('password'));

            $user = User::create($data);
            $user->save();
            $user_id = $user->id;
            $permissions['user_id'] = $user_id;
            $per = Permission::create($permissions);
            $per->save();


            $html = view('users.users_item', compact('user'))->render();
            return response(['status' => true, 'result' => $html, 'msg' => trans('site_lang.public_success_text')]);
        }
        return redirect()->route('users.users')->with('success', trans('site_lang.public_success_text'));
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
                'email' => 'required|unique:users,email,' . $request->id,
                'password' => 'required',
                'type' => 'required'
            ], [], $attribute);
            $users = User::find($request->id);
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->password = $request->input('password');
            $users->type = $request->input('type');
            $users->update();
            return response(['msg' => trans('site_lang.public_success_text'), 'result' => $users]);
        }
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
    }
}
