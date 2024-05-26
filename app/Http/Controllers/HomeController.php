<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attachment;
use App\Models\Chat;
use App\Models\Media;
use App\Models\PendancyAttachment;
use App\Models\StudentAttachment;
use App\Models\Agent\Student;
use File;
use Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $id = $id;
        $path = 'https://admitoffer.s3.ap-south-1.amazonaws.com/';
        $attachments = Media::where('path','LIKE','%'.$path.'%')->get();
        dd($attachments);
        foreach ($attachments as $key => $value) {
            // Image path
            $getUrl = $value['path'].'/'.$value['name'];
            $newPath = str_replace($path,'/', $value['path']); 
            $urlm = $newPath.'/'.$value['name'];
            $imgPath = 's3folder/media'.$newPath;
            
        $upattach = Media::where('id',$value['id'])->update(['path' => $imgPath]);
        }
            dd($id);
            

        return view('home');
    }
   
   
}
