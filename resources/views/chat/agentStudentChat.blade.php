
@extends('agent.layouts.app') 
@section('content')
<style>
.green{
    background-color:#58b666;
}
.orange{
    background-color:#ff725d;
}
.blue{
    background-color:#6fbced;
    margin-right:0;
    margin-left:7px;
}
#chat{
    padding-left:0;
    margin:0;
    list-style-type:none;
    overflow-y:scroll;
    height:535px;
    border-top:2px solid #fff;
    border-bottom:2px solid #fff;
}
#chat li{
    padding:10px 30px;
}
#chat h2,#chat h3{
    display:inline-block;
    font-size:13px;
    font-weight:normal;
}
#chat h3{
    color:#bbb;
}
#chat .entete{
    margin-bottom:5px;
}
#chat .message{
    padding:20px;
    color:#fff;
    line-height:25px;
    max-width:90%;
    display:inline-block;
    text-align:left;
    border-radius:5px;
}
#chat .me{
    text-align:right;
}
#chat .you .message{
    background-color:#6fbced;
}
#chat .me .message{
    background-color:#58b666;
}
#chat .triangle{
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 10px 10px 10px;
}
#chat .you .triangle{
        border-color: transparent transparent #6fbced transparent;
        margin-left:15px;
}
#chat .me .triangle{
        border-color: transparent transparent #58b666 transparent;
        float: right;
    margin-top: -10px;
}
</style>
<div class="container">
    <div class="row ">
        <div class="col-md-12" >
            <div class="card" style="box-shadow: none">
                <div class="card-body" style="background: #fafafa">
                    @include('multiauth::message')
                    
                    
                    <div class="form-group row capitalize">
                        <!-- <label for="input-id" class="col-sm-3 chatSidebar">
                            
                            <div class="chatSidebarName">
                                <div>
                                    <h5>Student Details:</h5>
                                    
                                </div>
                                
                                <div class="charSideDetail">
                                    <strong>Name: </strong> {{$student['firstName']}} {{$student['middleName']}} {{$student['lastName']}}
                                  </div>
                                <div class="charSideDetail">
                                    <strong> mobile: </strong> {{$student['mobileNo']}}
                                </div>
                                <div class="charSideDetail">
                                    <strong>DOB: </strong> {{$student['dateOfBirth']}}
                                </div>
                                <div class="charSideDetail">
                                    <strong>Email: </strong> {{$student['email']}}
                                </div>
                                <div class="charSideDetail">
                                    <strong>Gender: </strong> {{$student['gender']}}
                                </div>
                                
                                
                            </div>
                           
                        </label> -->
                        <div class="col-md-11" style="border: 1px solid lavender; margin-left: 43px;background: white;">
                                <div class="row">
                                    
                                    <div class="col-md-12" style="background: white;border-bottom: 1px solid #f1eeee;padding: 15px 15px 0px 15px;">
                                        <h5><i class="fa fa-user" style="    padding: 10px; border-radius: 52%; border: 1px solid #80808036; font-size: 26px; background: green; color: white; position: absolute; margin-top: -10px;"></i> 
                                            <span style="padding-left: 50px">{{$student['firstName']}} {{$student['middleName']}} {{$student['lastName']}}</span></h5>
                                        <p style="padding-left: 50px">{{$student['mobileNo']}}  </p>
                                    </div>
                                    <!-- <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_star.png" alt="" style="float: right;color: green"> -->
                                </div>
                            <div class="scrollBottom">
                                <div class="" style="margin-bottom:75px;">
                                    <div class="container appendAllMessages" id="chat" style=" margin: 10px">
                                        <br>
                                    @foreach($messages as $message)
                                    @if($message['admin_role'] == 'agent')
                                    <br>
                                        <div class="you" >
                                            <div class="entete" style="margin-left: 10px;margin-top: 20px;">
                                                <span class="status green"></span>
                                                <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Admitly ({{date('d-M-Y h:i A',strtotime($message['created_at']))}})</h6>
                                            </div>
                                            <div class="">
                                                @if($message['path'])
                                                <?php
                                                 $ext = pathinfo($message['path'], PATHINFO_EXTENSION);
                                                ?>
                                                @if($ext == 'pdf')
                                                <a href="{{asset($message['path'])}}" target="_blank">
                                                <img src="{{asset('images/site/pdfIcon.png')}}" width="40">
                                                </a>
                                                @elseif($ext == "docx")
                                                <a href="{{asset($message['path'])}}" target="_blank">
                                                <img src="{{asset('images/site/doc.png')}}" width="50">
                                                </a>
                                                @else
                                                <a href="{{route('student.chat.ChatimgOpen',$message['id'])}}" target="_blank">
                                                    <img src="{{asset($message['path'])}}" width="80">
                                                </a>
                                                @endif
                                                @else
                                                <div class="triangle"></div>
                                                    <div class="message">
                                                       {{$message['message']}}  
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    <br>
                                    @else
                                    <?php
                                     $ext = pathinfo($message['path'], PATHINFO_EXTENSION);
                                    ?>
                                         <br>
                                         <div class="me">
                                            <div class="entete" style="margin-left: 10px;margin-top: 20px;">
                                                <span class="status green"></span>
                                                <h6 style="margin-right: 17px; margin-top: 14px;">Recruiter ({{date('d-M-Y h:i A',strtotime($message['created_at']))}})</h6>
                                            </div>
                                            <div class="mr-10">
                                                @if($message['path'])
                                                @if($ext == "docx")
                                                <a href="{{asset($message['path'])}}" target="_blank">
                                                <img src="{{asset('images/site/doc.png')}}" width="50">
                                                </a>
                                                @elseif($ext == 'pdf')
                                                <a href="{{asset($message['path'])}}" target="_blank">
                                                <img src="{{asset('images/site/pdfIcon.png')}}" width="80">
                                                </a>
                                                @else
                                                <a href="{{route('student.chat.ChatimgOpen',$message['id'])}}" target="_blank">
                                                    <img src="{{asset($message['path'])}}" width="80">
                                                </a>
                                                @endif
                                                @else
                                                <div class="triangle" style="margin-right: 13px;"></div>
                                                    <div class="message">
                                                       {{$message['message']}}  
                                                    </div>
                                                @endif 
                                            </div>
                                        </div>
                                        
                                    <br>
                                    @endif
                                    @endforeach
                                    </div>
                                    <span class="newMessage"></span>  
                                </div>  
                                <div class="row ">
                                    <div class=" col-md-12 chatInput">
                                    <div class="col-md-12 hide appendShow" >
                                        <div class="msgImg " style="width: 30%; height: 150px; background: #00000014;"> 
                                            <img src="" id="output" style="width: 100%">
                                        </div>
                                    </div>
                                    <form method="POST" class="studentChatRequestForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class=" row">
                                            <div class="col-md-12 ">
                                                <input type="hidden" name="agent_id" class="agent_id" value="{{$student['agent_id']}}">
                                                <input type="hidden" name="student_id" class="student_id" value="{{$student['id']}}">
                                                <input type="hidden" name="student" class="student" value="yes">
                                                <input type="text" style="display: inline; width:70%;" placeholder="Enter Message" name="message" class="mb-2 form-control messageInput" >
                                                <label class="btn  btn-primary" style="padding: 10px;margin: auto;background: #5a587c;border: 1px solid #5a587c">Uploads
                                                    
                                                <input type="file" id="chatImg" name="chatImg" class="hide">
                                                </label>
                                                <button type="submit" style="width: 16%; height: 66%;" class=" btn btn-success btn-default-color">Send</button>
                                            </div>  
                                            <!-- <div class="col-md-2 ">
                                            </div>   -->
                                        </div>  
                                    </form>  
                                                <p class="error"></p>
                                    </div>  
                                </div>  
                            </div>
                            
                        </div>
                    </div>
                        <!-- <button type="submit" class="btn btn-info btn-sm float-right">Send</button> -->
                        <!-- <a href="{{route('studentQualificationGrades.index')}}" class="btn btn-sm btn-danger float-right">Back</a> -->
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection