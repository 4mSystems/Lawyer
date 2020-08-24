<?php

namespace App\Http\Controllers;

use App\ClientAttachment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Up;

use Session;

class ClientAttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $client_id = $id;
        $client_attachment = ClientAttachment::where('client_id', $id)->get();

        return view('clientattachment.index', compact('client_attachment', 'client_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $client_id = $id;
        return view('clientattachment.create', compact('client_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'img_Description' => 'required',
                'img_Url' => 'required',
                'client_id' => ''
            ]);


        if ($data['img_Url'] != null) {
            // This is Image Information ...
            $file = $request->file('img_Url');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $size = $file->getSize();
            $path = $file->getRealPath();
            $mime = $file->getMimeType();

            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/client/attachments'), $fileNewName);

            $data = $request->all();
            $data['img_Url'] = $fileNewName;
        }


        $data['client_Id'] = $id;
        ClientAttachment::create($data);
        return redirect(url('clientattachment/' . $id));
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
        $attachment = ClientAttachment::findOrFail($id);
        return view('clientattachment.edit', compact('attachment'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'img_Description' => 'required',
                'img_Url' => '',
                'case_id' => ''
            ]);


        if ($request['img_Url'] != null) {

            $slash = trim("uploads/client/attachments/ ");
            $file_name = ClientAttachment::where('id', $id)->first('img_Url');
            //  dd($file_name);
            unlink(public_path($slash . $file_name->img_Url));

            // This is Image Information ...
            $file = $request->file('img_Url');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $size = $file->getSize();
            $path = $file->getRealPath();
            $mime = $file->getMimeType();

            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/client/attachments'), $fileNewName);

            $data = $request->all();
            $data['img_Url'] = $fileNewName;
        } else {
            unset($data['img_Url']);
        }


        $client_id = ClientAttachment::where('id', $id)->first('client_Id');
        $cid = $client_id->client_Id;
        //   dd($cid);
        ClientAttachment::find($id)->update($data);
        return redirect(url('clientattachment/' . $cid));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attachment = ClientAttachment::find($id);
        $slash = trim("uploads/client/attachments/ ");
        unlink(public_path($slash . $attachment->img_Url));
        $cid = $attachment->client_Id;
        $attachment->delete();
        session()->flash('success', trans('admin.deleted'));
        return redirect(url('clientattachment/' . $cid));

    }
}
