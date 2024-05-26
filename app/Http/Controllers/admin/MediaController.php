<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Media;
use Session;
use Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::all();
        return view('admin.media.list',compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.media.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $file = $request->file;
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        
            $destinationPath = 'uploads/media/'.$request->type;

          $path = $file->store($destinationPath,'s3');
         $basename = basename($path);
         $replacePath = '/'.$basename;
        $s3Path = Storage::disk('s3')->url($path);
        $srsPath = str_replace($replacePath,'', $s3Path);
       
            $attachment = Media::create([
                'country_id' => $request->country_id,
                'title' => $request->title,
                'path' => $srsPath.'/'.$basename,
                'type' => $request->type,
                'description' => $request->description,
                ]);
            $attachment->save();
        
        Session::flash('success','Attachment saved');
        return back();
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
        $id = base64_decode($id);
        $media = Media::where('id',$id)->first();
        return view('admin.media.edit',compact('media'));

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

        $hasAttachment = Media::where('id',$id)->first();
        if($request->file){

        if($hasAttachment){
             $hasAttachment['path'] = str_replace('https://admitoffer.s3.ap-south-1.amazonaws.com/','', $hasAttachment['path']);
            $delete = Storage::disk('s3')->delete($hasAttachment['path'].'/'.$hasAttachment['name']);

        }


         $file = $request->file;
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        
            $destinationPath = 'uploads/media/'.$request->type;
         $path = $file->store($destinationPath,'s3');
         $basename = basename($path);
         $replacePath = '/'.$basename;
        $s3Path = Storage::disk('s3')->url($path);
        $srsPath = str_replace($replacePath,'', $s3Path);
        $srsfinalPath = $srsPath.'/'.$basename;
        }else{
         
        $srsfinalPath = $hasAttachment['path'];

        }
        $attachment = Media::where('id',$id)->update([
                'country_id' => $request->country_id,
                'title' => $request->title,
                'path' => $srsfinalPath,
                'type' => $request->type,
                'description' => $request->description,
                ]);
        Session::flash('success','Attachment updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getattachment = Media::where('id',$id)->first();
    
         $getattachment['path'] = str_replace('https://admitoffer.s3.ap-south-1.amazonaws.com/','', $getattachment['path']);
       $delete = Storage::disk('s3')->delete($getattachment['path'].'/'.$getattachment['name']);
        Media::where('id',$id)->delete();
        
    Session::flash('success','Attachment Deleted');
        return back();
    }
}
