<?php // Code within app\Helpers\ImageUpload.php

namespace App\Http\Helpers;
use App\Models\Attachment;
use App\Models\StudentAttachment;
use Auth;
use Storage;

class ImageUpload
{
    // upload image
    
    public static function uploadAttachment($file,$type,$id=NULL)
    {
        
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        if($id != NULL){
            $destinationPath = date('Y').'/'.date('M').'/uploads/'.$type.'/'.$id;
        }else{
            $destinationPath = date('Y').'/'.date('M').'/uploads/'.$type.'/';
        }
         $file->move($destinationPath, $fileName);    
       $attachment = Attachment::create([
            'name' => $fileName,
            'path' => $destinationPath,
            'type' => $type,
            'attachment_id' => $id
            ]);
        $attachment->save();    
        return $attachment->id;
    //      $path = $file->store($destinationPath,'s3');
    //      $basename = basename($path);
    //      $replacePath = '/'.$basename;
    //     $s3Path = Storage::disk('s3')->url($path);
    //     $srsPath = str_replace($replacePath,'', $s3Path);    
    //   $attachment = Attachment::create([
    //         'name' => $basename,
    //         'path' => $srsPath,
    //         'type' => $type,
    //         'attachment_id' => $id
    //         ]);
    //     $attachment->save();    
    //     return $attachment->id;
    }
    // update Iamge
    public static function updateAttachment($file,$type,$id=NULL,$imageId)
    {
       $getattachment = Attachment::where('id',$imageId)->first();
    
         $getattachment['path'] = str_replace('https://admitoffer.s3.ap-south-1.amazonaws.com/','', $getattachment['path']);
       $delete = Storage::disk('s3')->delete($getattachment['path'].'/'.$getattachment['name']);
       
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        if($id != NULL){
            $destinationPath = date('Y').'/'.date('M').'/uploads/'.$type.'/'.$id;
        }else{
            $destinationPath = date('Y').'/'.date('M').'/uploads/'.$type.'/';
        }
        $file->move($destinationPath, $fileName);    
       $attachment = Attachment::where('id',$imageId)->update([
            'name' => $fileName,
            'path' => $destinationPath,
            ]);
        return true;
    //      $path = $file->store($destinationPath,'s3');
    //      $basename = basename($path);
    //      $replacePath = '/'.$basename;
    //     $s3Path = Storage::disk('s3')->url($path);
    //     $srsPath = str_replace($replacePath,'', $s3Path); 
    //   $attachment = Attachment::where('id',$imageId)->update([
    //         'name' => $basename,
    //         'path' => $srsPath,
    //         ]);
    
    //     return true;
    }

// upload student documents

public static function uploadStudentDocuments($file,$attachmentName=NULL,$type,$id=NULL,$attachmentId=NULL)
    {
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        if($id != NULL){
            $destinationPath = date('Y').'/'.date('M').'/uploads/student/'.$type.'/'.$id;
        }else{
            $destinationPath = date('Y').'/'.date('M').'/uploads/student/'.$type.'/';
        }
        $file->move($destinationPath, $fileName);    
       $attachment = StudentAttachment::create([
            'name' => $fileName,
            'path' => $destinationPath,
            'type' => $type,
            'student_id' => $id,
            'attachment_id' => $attachmentId,
            'attachment_name' => $attachmentName,
            ]);
        $attachment->save();    
        return $attachment->id;
    //       $path = $file->store($destinationPath,'s3');
    //          $basename = basename($path);
    //          $replacePath = '/'.$basename;
    //         $s3Path = Storage::disk('s3')->url($path);
    //         $srsPath = str_replace($replacePath,'', $s3Path);    
    //   $attachment = StudentAttachment::create([
    //         'name' => $basename,
    //         'path' => $srsPath,
    //         'type' => $type,
    //         'student_id' => $id,
    //         'attachment_id' => $attachmentId,
    //         'attachment_name' => $attachmentName,
    //         ]);
    //     $attachment->save();    
    //     return $attachment->id;
    }
public static function updateStudentDocuments($file,$attachmentName=NULL,$type,$id=NULL,$attachmentId=NULL)
    {
        $getattachment = StudentAttachment::where('student_id',$id)->where('attachment_id',$attachmentId)->where('type',$type)->first();
    
         $getattachment['path'] = str_replace('https://admitoffer.s3.ap-south-1.amazonaws.com/','', $getattachment['path']);
       $delete = Storage::disk('s3')->delete($getattachment['path'].'/'.$getattachment['name']);
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        if($id != NULL){
            $destinationPath = date('Y').'/'.date('M').'/uploads/student/'.$type.'/'.$id;
        }else{
            $destinationPath = date('Y').'/'.date('M').'/uploads/student/'.$type.'/';
        }
        $file->move($destinationPath, $fileName); 
        $attachment = StudentAttachment::where('student_id',$id)->where('attachment_id',$attachmentId)->where('type',$type)->update([
            'name' => $fileName,
            'path' => $destinationPath,
            'type' => $type,
            'student_id' => $id,
            'attachment_id' => $attachmentId,
            'attachment_name' => $attachmentName,
            ]);
            
        return true;
    //   $path = $file->store($destinationPath,'s3');
    //      $basename = basename($path);
    //      $replacePath = '/'.$basename;
    //     $s3Path = Storage::disk('s3')->url($path);
    //     $srsPath = str_replace($replacePath,'', $s3Path); 
    //     $attachment = StudentAttachment::where('student_id',$id)->where('attachment_id',$attachmentId)->where('type',$type)->update([
    //         'name' => $basename,
    //         'path' => $srsPath,
    //         'type' => $type,
    //         'student_id' => $id,
    //         'attachment_id' => $attachmentId,
    //         'attachment_name' => $attachmentName,
    //         ]);
            
    //     return true;
    }
public static function updateStudentDocumentsProfile($file,$attachmentName=NULL,$type,$id=NULL,$attachmentId=NULL)
    {
        $getattachment = StudentAttachment::where('student_id',$id)->where('attachment_name',$attachmentName)->where('type',$type)->first();
    
         $getattachment['path'] = str_replace('https://admitoffer.s3.ap-south-1.amazonaws.com/','', $getattachment['path']);
       $delete = Storage::disk('s3')->delete($getattachment['path'].'/'.$getattachment['name']);
        
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        if($id != NULL){
            $destinationPath = date('Y').'/'.date('M').'/uploads/student/'.$type.'/'.$id;
        }else{
            $destinationPath = date('Y').'/'.date('M').'/uploads/student/'.$type.'/';
        }
        $file->move($destinationPath, $fileName);    
        $attachment = StudentAttachment::where('student_id',$id)->where('attachment_name',$attachmentName)->where('type',$type)->update([
            'name' => $fileName,
            'path' => $destinationPath,
            'type' => $type,
            'student_id' => $id,
            'attachment_id' => $attachmentId,
            'attachment_name' => $attachmentName,
            ]);
            
        return true;
        // $path = $file->store($destinationPath,'s3');
        //  $basename = basename($path);
        //  $replacePath = '/'.$basename;
        // $s3Path = Storage::disk('s3')->url($path);
        // $srsPath = str_replace($replacePath,'', $s3Path);  
        // $attachment = StudentAttachment::where('student_id',$id)->where('attachment_name',$attachmentName)->where('type',$type)->update([
        //     'name' => $basename,
        //     'path' => $srsPath,
        //     'type' => $type,
        //     'student_id' => $id,
        //     'attachment_id' => $attachmentId,
        //     'attachment_name' => $attachmentName,
        //     ]);
            
        // return true;
    }
public static function agentImage()
    {
       if(Auth::guard('agent')->check()){
           $user = Auth::guard('agent')->user();
        }else{
            $user = Auth::guard('admin')->user();
        }
        if($user){
            $agentImage = Attachment::where('type','agent')->where('attachment_id',$user['id'])->first();
            return $agentImage;
        }else{
            
            return '';
        }
    }


}