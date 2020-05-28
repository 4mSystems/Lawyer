<?php

namespace App\Http\Controllers;

use App\attachment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Up;

class CaseAttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $case_id = $id;
      $case_attachment=  attachment::where('case_id',$id)->get();
//      dd($case_attachment);
        return view('attachment.index',compact('case_attachment','case_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $case_id = $id;
        return view('attachment.create',compact('case_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$id)
    {
        $data=$this->validate(\request(),
            [
                'img_Description'=>'required',
                'img_Url'=>'required',
                'case_id'=>''
            ]);



        if($data['img_Url'] != null)
        {
            // This is Image Information ...
            $file	 = $request->file('img_Url');
            $name    = $file->getClientOriginalName();
            $ext 	 = $file->getClientOriginalExtension();
            $size 	 = $file->getSize();
            $path 	 = $file->getRealPath();
            $mime 	 = $file->getMimeType();

            // Move Image To Folder ..
            $fileNewName = 'img_'.time().'.'.$ext;
            $file->move(public_path('uploads/attachments'), $fileNewName);

            $data = $request->all();
            $data['img_Url'] = $fileNewName;
        }


        $data['case_Id'] = $id;
        attachment::create($data);
        return redirect(url('attachment/'.$id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
