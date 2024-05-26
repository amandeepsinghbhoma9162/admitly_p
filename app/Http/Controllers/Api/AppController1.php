<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agent\AppliedStudentFile;
use Auth;

class AppController extends Controller
{


    /**
     * Show the Applicant dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $students = AppliedStudentFile::all();
        
        return json_decode(['status' => 'true','data' =>$students);
    }

}