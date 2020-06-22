<?php

namespace App\Http\Controllers;

use App\category;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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
            $categories = DB::table('categories')
                ->orderBy('id', 'desc')
                ->get();
            return view('categories/categories', compact('categories'));
        } else {
            return redirect(url('home'));
        }
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
            $data = $this->validate(request(), [
                'name' => 'required',
            ]);
            $category = category::create($data);
            $html = view('categories.category_item', compact('category'))->render();
            return response(['status' => true, 'result' => $html, 'msg' => trans('site_lang.public_success_text')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\category $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\category $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = category::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }


    public function update(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->validate(request(), [
                'name' => 'required',
            ]);
            $category = category::find($request->id);
            $category->name = $request->input('name');
            $category->update();
            return response(['msg' => trans('site_lang.public_success_text'), 'result' => $category]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = category::findOrFail($id);
        $data->delete();
    }
}
