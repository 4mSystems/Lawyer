<?php

namespace App\Http\Controllers;

use App\attachment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Up;

use Session;
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
        $attachment=attachment::findOrFail($id);
        return view('attachment.edit',compact('attachment'));

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
        $data=$this->validate(\request(),
            [
                'img_Description'=>'required',
                'img_Url'=>'',
                'case_id'=>''
            ]);



        if($request['img_Url'] != null)
        {

                $slash =trim("uploads\attachments\ ");
            $file_name = attachment::where('id',$id)->first('img_Url');
          //  dd($file_name);
             unlink(public_path($slash.$file_name->img_Url));

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
        }else
        {
            unset($data['img_Url']);
        }


        $case_id= attachment::where('id',$id)->first('case_Id');
           $cid = $case_id->case_Id;
//           dd($cid);
        attachment::find($id)->update($data);
        return redirect(url('attachment/'.$cid));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attachment =  attachment::find($id);
        $slash =trim("uploads\attachments\ ");
        //  dd($file_name);
        unlink(public_path($slash.$attachment->img_Url));
        $attachment->delete();
        $cid = $attachment->case_Id;
        session()->flash('success',trans('admin.deleted'));
        return redirect(url('attachment/'.$cid));

    }
}
