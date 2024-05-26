<?php // Code within app\Helpers\Notify.php

namespace App\Http\Helpers;
use Bitfumes\Multiauth\Model\Role;
use App\Models\StudentAttachment;
use App\Models\Notification;
use App\Models\Announcement;
use Auth;

class Notify
{
    // Notify
    public static function notifications()
        {
            if(Auth::guard('agent')->check()){

            $agent = Auth::guard('agent')->user();
            $notifications = Notification::where('agent_id',$agent['id'])->where('status','0')->where('type','!=','status Chat')->orderBy('id','Desc')->get();
            }elseif(Auth::guard('student')->check()){
                $student = Auth::guard('student')->user();
            $notifications = Notification::where('student_id',$student['id'])->where('type','!=','admin')->where('agent_id',NULL)->where('type','!=','status Chat')->where('status','0')->orderBy('id','Desc')->get();
            }
            return $notifications;
        }

        public static function messages()
        {
            if(Auth::guard('agent')->check()){

            $agent = Auth::guard('agent')->user();
            $messages = Notification::where('agent_id',$agent['id'])->where('status','0')->where('type','status Chat')->orderBy('id','Desc')->get();
            }elseif(Auth::guard('student')->check()){
                $student = Auth::guard('student')->user();
            $messages = Notification::where('student_id',$student['id'])->where('type','!=','admin')->where('agent_id',NULL)->where('type','status Chat')->where('status','0')->orderBy('id','Desc')->get();
            }
            return $messages;
        }
    public static function adminNotifications()
        {
            if(Auth::guard('admin')->check()){
                $admin = Auth::guard('admin')->user();
                $role = Role::where('id',$admin['id'])->first();
            }
            if($admin->roles[0]['id'] == 3){

                $notifications = Notification::where('type','admin')->where('to',$admin['id'])->where('status','0')->where('admin_role','!=','shortlisting')->where('application_status','!=','chat')->orderBy('id','Desc')->get();
            }elseif($admin->roles[0]['id'] == 4){

                $notifications = Notification::where('user',$admin['id'])->where('type','admin')->where('application_status','!=','chat')->where('status','0')->orderBy('id','Desc')->get();
            }elseif($admin->roles[0]['name'] == 'shortlisting'){

                $notifications = Notification::where('to',$admin['id'])->where('type','admin')->where('application_status','!=','chat')->where('status','0')->orderBy('id','Desc')->get();
            }elseif($admin->roles[0]['name'] == 'account manager'){

                $notifications = Notification::where('user',$admin['id'])->where('type','admin')->where('application_status','!=','chat')->where('status','0')->where('admin_role','account manager')->orderBy('id','Desc')->get();
            }else{

                $notifications = Notification::where('type','admin')->where('status','0')->where('admin_role','!=','account manager')->where('application_status','!=','chat')->orderBy('id','Desc')->get();
            }
            return $notifications;
        }
        public static function adminMessages()
        {
            if(Auth::guard('admin')->check()){
                $admin = Auth::guard('admin')->user();
                $role = Role::where('id',$admin['id'])->first();
            }
            if($admin->roles[0]['id'] == 3){

                $messages = Notification::where('type','admin')->where('to',$admin['id'])->where('application_status','chat')->where('status','0')->orderBy('id','Desc')->get();
            }elseif($admin->roles[0]['id'] == 4){

                $messages = Notification::where('user',$admin['id'])->where('to',$admin['id'])->where('application_status','chat')->where('type','admin')->where('status','0')->orderBy('id','Desc')->get();
            }elseif($admin->roles[0]['name'] == 'shortlisting'){

                $messages = Notification::where('type','admin')->where('to',$admin['id'])->where('application_status','chat')->where('status','0')->orderBy('id','Desc')->get();
            }else{

                $messages = Notification::where('type','admin')->where('application_status','chat')->where('status','0')->orderBy('id','Desc')->get();
            }
            return $messages;
        }


         public static function announcements()
        {
            if(Auth::guard('agent')->check()){

            $anouncment = Announcement::where('id',1)->first();
            return $anouncment;
            }
        }
         public static function whatsappnotif($numbers,$text)
        {
            if($numbers){
                $client = new \GuzzleHttp\Client(); 
                $numbers[] = '917986048544';
                $numbers[] = '917087078585';
                $numbers[] = '916284027946';
                $numbers[] = '919781178611';
                $numbers[] = '919915482378';
                $numbers[] = '919871506611';
                foreach($numbers as $number) {
                $response = $client->request('POST', 'https://live-server-11674.wati.io/api/v1/sendTemplateMessage?whatsappNumber='.$number.'', [
                  'body' => '{"parameters":[{"name":"name","value":"'.$text.'"}],"broadcast_name":"status_admitly","template_name":"status_admitly"}',
                  'headers' => [
                    'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI5YWQzMjlmZi03ZDZiLTQyYjQtYjRhNS1jOGI1ZjE5ZmIzZWUiLCJ1bmlxdWVfbmFtZSI6InRlY2hAYWRtaXRvZmZlci5jb20iLCJuYW1laWQiOiJ0ZWNoQGFkbWl0b2ZmZXIuY29tIiwiZW1haWwiOiJ0ZWNoQGFkbWl0b2ZmZXIuY29tIiwiYXV0aF90aW1lIjoiMDgvMDMvMjAyMiAwNjoyNDo0MSIsImRiX25hbWUiOiIxMTY3NCIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvcm9sZSI6IkFETUlOSVNUUkFUT1IiLCJleHAiOjI1MzQwMjMwMDgwMCwiaXNzIjoiQ2xhcmVfQUkiLCJhdWQiOiJDbGFyZV9BSSJ9.vbCCE80lLnMKggmHPHtnDLWRjtzmJIoDiNmPFZ2TFdw',
                    'Content-Type' => 'text/json',
                  ],
                ]);

                }
            }
            
        }
        


}