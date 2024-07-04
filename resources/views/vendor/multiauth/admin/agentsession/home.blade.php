@extends('admin.layouts.admin')
@section('content')
<style type="text/css">
    table td{
    font-size: 7px;
    color: white;
    }
    body{
    }
    
</style>
<div class="container">
<div class="row">
        <div class="col-lg-4">
           <div class="profile-card-4 z-depth-3">
            <div class="card">
              <div class="card-body text-center rounded-top" style="background-color: white!important;">
            {{$agent->accountManager['name']}}
               <div class="user-box">
                <img src="{{asset($agent->attachment['path'].'/'.$agent->attachment['name'])}}" alt="user avatar" width="80" height="120">
              </div>
              <h5 class="mb-1 " style="color: #da251d;">{{$agent->name}}</h5>
              <h6 class="text-black">{{$agent->company_name}}</h6>
              <h6 class="text-black">Last Login -  {{$agent->last_login}} </h6>
             </div>
              <div class="card-body">
                <ul class="list-group shadow-none">
                <li class="list-group-item">
                  <div class="list-icon">
                    <i class="fa fa-phone-square"></i>
                  </div>
                  <div class="list-details">
                    <span>{{$agent->mobileno}}</span>
                    <small>Mobile Number</small>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="list-icon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <div class="list-details">
                    <span>{{$agent->email}}</span>
                    <small>Email Address</small>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="list-icon">
                    <i class="fa fa-globe"></i>
                  </div>
                  <div class="list-details">
                    <span>{{$city->name}}</span>
                    <small>Website Address</small>
                  </div>
                </li>
                </ul>
                <div class="row text-center mt-4">
                  <div class="col p-2">
                   <h4 class="mb-1 line-height-5">{{$studentFiles->count()}}</h4>
                    <small class="mb-0 font-weight-bold">Total Applications</small>
                   </div>
                    <div class="col p-2">
                      <h4 class="mb-1 line-height-5">{{$students->count()}}</h4>
                     <small class="mb-0 font-weight-bold">Applied Application</small>
                    </div>
                    <div class="col p-2">
                     <h4 class="mb-1 line-height-5">{{$studentshort->count()}}</h4>
                     <small class="mb-0 font-weight-bold">Shortlisting</small>
                    </div>
                 </div>
                 <div class="row text-center mt-4">
                  <div class="col p-2">
                   <h4 class="mb-1 line-height-5">{{$todayApplied->count()}}</h4>
                    <small class="mb-0 font-weight-bold">Today Applications</small>
                   </div>
                    <div class="col p-2">
                      <h4 class="mb-1 line-height-5">{{$todaySentToUni->count()}}</h4>
                     <small class="mb-0 font-weight-bold">Today Application sent to uni</small>
                    </div>
                    <div class="col p-2">
                     <h4 class="mb-1 line-height-5">{{$pendstudentshort->count()}}</h4>
                     <small class="mb-0 font-weight-bold">Pending for Shortlisting</small>
                    </div>
                 </div>
               </div>
               <div class="card-footer text-center">
                 <a href="javascript:void()" class="btn-social btn-facebook waves-effect waves-light m-1"><i class="fa fa-facebook"></i></a>
                 <a href="javascript:void()" class="btn-social btn-google-plus waves-effect waves-light m-1"><i class="fa fa-google-plus"></i></a>
                 <a href="javascript:void()" class="list-inline-item btn-social btn-behance waves-effect waves-light"><i class="fa fa-behance"></i></a>
                 <a href="javascript:void()" class="list-inline-item btn-social btn-dribbble waves-effect waves-light"><i class="fa fa-dribbble"></i></a>
               </div>
             </div>
           </div>
        </div>
        <div class="col-lg-8">
           <div class="card z-depth-3">
            <div class="card-body">
            <ul class="nav nav-pills nav-pills-primary nav-justified">
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active show"><i class="icon-user"></i> <span class="hidden-xs">Student List</span></a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#messages" data-toggle="pill" class="nav-link"><i class="icon-envelope-open"></i> <span class="hidden-xs">Notifications</span></a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                </li>
            </ul>
                <hr>
            <div class="tab-content p-3">
                <div class="col-md-12 tab-pane active show" id="profile">
                    <h5 class="mb-3"></h5>
                    <div class="row">
                        <div class="card-body">
                    @include('multiauth::message')
                    <table data-order='[[ 0, "desc" ]]' class="align-middle text-truncate mb-0 table table-borderless " >
                        <thead>
                            <tr>
                                <!-- <th class="text-center">#</th> -->
                                <!-- <th class="text-center">Applied_at</th> -->
                                <th class="text-center">Name</th>
                                <!-- <th class="text-center">Student ID</th> -->
                                <!-- <th class="text-center">Agent</th> -->
                                <th class="text-center">Email</th>
                                <th class="text-center">Applications</th>
                                <!-- <th class="text-center">Proceed</th> -->
                                <!-- <th class="text-center">Qualification</th> -->
                                <!-- <th class="text-center">Pendency </th> -->
                                <!-- <th class="text-center">Comment </th> -->
                                <th class="text-center">Shortlist </th>
                                <!-- <th class="text-center">Apply_for_shortlist </th> -->
                                <!-- <th class="text-center">shortlisted at </th> -->
                                <!-- <th class="text-center">Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $user =Auth::guard('admin')->user();
                                       
                                
                                ?>
                            @foreach($appliedStudentFiles as $appliedStudentFile)
                            @if($user->roles)
                            @if($user->roles[0]['name'] == 'preprocess')
                            @if(in_array($appliedStudentFile['id'],$isMatchPreProcess))
                            <tr>
                                <td class="text-center capitalize">
                                    <span class="float-left padding-5px stdImg">
                                    @if($appliedStudentFile->studentImage)
                                    <img class="rounded-circle" src="{{asset($appliedStudentFile->studentImage->path.'/'.$appliedStudentFile->studentImage->name)}}" width="40"  >
                                    @else
                                    <img class="rounded-circle" src="{{asset('images/site/user-img.png')}}" width="40" alt="your image" />
                                    @endif
                                    </span>
                                    <div>
                                    <a href="{{route('studentfiles.show',base64_encode($appliedStudentFile->id))}}" class="">{{ $appliedStudentFile->firstName }}&nbsp;{{$appliedStudentFile->lastName}}</a></div>
                                    <div class="badge badge-pill badge-warnings">{{ $appliedStudentFile->student_unique_id }}</div>
                                    @if($appliedStudentFile->nationality)
                                    <div class="widget-subheading text-center"><small>Nationality: </small><i><img class="" src="{{asset($appliedStudentFile->countryAddress['path'].'/'.$appliedStudentFile->countryAddress['image_name'])}}" width="20"  ></i></div>
                                    @endif
                                    <!-- <div class="widget-subheading text-left"><small> {{ $appliedStudentFile->agent['name'] }}</small></div> -->
                                </td>
                                <td class="text-center">
                                    @if($appliedStudentFile->country['path'])
                                    {{$appliedStudentFile->appliedStudentFiles->count()}} X <img class="" src="{{asset($appliedStudentFile->country['path'].'/'.$appliedStudentFile->country['image_name'])}}" width="25"  >
                                    @else
                                    {{$appliedStudentFile->appliedStudentFiles->count()}} X Flag
                                    @endif
                                </td><!-- 
                                <td class="text-center">
                                    <span class="text-success">{{ $appliedStudentFile->appliedStudentFilesByAdmin->count() }}</span> ~
                                    <span class="text-danger"> {{ ((int)$appliedStudentFile->appliedStudentFiles->count() - (int)$appliedStudentFile->appliedStudentFilesByAdmin->count()) }} </span>
                                </td> -->
                                <!-- <td class=" capitalize">
                                    <a href="javascript:void;"><strong>Completed :</strong> {{$appliedStudentFile->previousQualifications['name']}}</a>
                                    <div class="widget-subheading">
                                        <a href="javascript:void;"><strong>Grade10 :</strong>
                                        @if($appliedStudentFile->grade10)
                                        @if($appliedStudentFile->grade10->totals)
                                        @if($appliedStudentFile->grade10->boards)
                                        {{$appliedStudentFile->grade10->totals['name']}} ({{$appliedStudentFile->grade10->boards['name']}})
                                        @endif
                                        @endif
                                        @endif
                                        </a>
                                    </div>
                                    <div class="widget-subheading">
                                        <a href="javascript:void;"><strong>Grade12 :</strong>
                                        @if($appliedStudentFile->grade12)
                                        @if($appliedStudentFile->grade12->totals)
                                        @if($appliedStudentFile->grade12->boards)
                                        {{$appliedStudentFile->grade12->totals['name']}} ({{$appliedStudentFile->grade12->boards['name']}})
                                        @endif
                                        @endif
                                        @endif
                                        </a>
                                    </div>
                                </td> -->
                                <td class="text-center">
                                    @if($appliedStudentFile['IsShortlisting'] == 'yes')
                                    Short list by team
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{route('studentfiles.show',base64_encode($appliedStudentFile->id))}}" class=" btn btn-sm btn-info view_1"data-toggle="tooltip" title="View"><i class="pe-7s-look"> </i></a>
                                    <a href="{{route('studentfiles.allDocs',base64_encode($appliedStudentFile->id))}}" class=" btn btn-sm btn-info view_1"data-toggle="tooltip" title="View"><i class="pe-7s-file"> </i></a>
                                    <a href="{{route('student.program.add',base64_encode($appliedStudentFile->id))}}" class=" btn btn-sm btn-info edit_1"data-toggle="tooltip" title="Add Programs"><i class="pe-7s-plus"> </i></a>
                                    <a href="{{route('admin.student.chat',base64_encode($appliedStudentFile['id']))}}" class="btn btn-success"data-toggle="tooltip" title="Student Chat"><i class="fa fa-comment"> </i><span style="    position: absolute;
                                        background: #e1000a;
                                        padding: 10px;
                                        border-radius: 50%;
                                        margin-top: 10px;
                                        font-weight: 800;
                                        top: -23px;">
                                        @if($appliedStudentFile->studentNotifications)
                                        {{$appliedStudentFile->studentNotifications->count()}}
                                        @endif
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            @endif
                            @else
                            <tr>
                                
                                <td class="text-center capitalize">
                                    <span class="float-left padding-5px stdImg">
                                    @if($appliedStudentFile->studentImage)
                                    <img class="rounded-circle" src="{{asset($appliedStudentFile->studentImage->path.'/'.$appliedStudentFile->studentImage->name)}}" width="40"  >
                                    @else
                                    <img class="rounded-circle" src="{{asset('images/site/user-img.png')}}" width="40" alt="your image" />
                                    @endif
                                    </span>
                                    <div>
                                    <a href="{{route('studentfiles.show',base64_encode($appliedStudentFile->id))}}" class="" style="font-size: 11px;">{{ $appliedStudentFile->firstName }}&nbsp;{{$appliedStudentFile->lastName}}</a>
                                    </div>
                                    <div class="badge badge-pill badge-warnings" style="font-size: 11px;">{{ $appliedStudentFile->student_unique_id }}</div>
                                    @if($appliedStudentFile->nationality)
                                    <div class="widget-subheading text-center"><small>Nationality: </small><i><img class="" src="{{asset($appliedStudentFile->countryAddress['path'].'/'.$appliedStudentFile->countryAddress['image_name'])}}" width="20"  ></i></div>
                                    @endif
                                    <!-- <div class="widget-subheading text-left"><small> {{ $appliedStudentFile->agent['name'] }}</small></div> -->
                                </td>
                                
                                <td class="text-center" style="text-transform: lowercase; font-size: 11px;!important">{{ $appliedStudentFile->email }}</td>
                                <td class="text-center">
                                    @if($appliedStudentFile->country['path'])
                                    {{$appliedStudentFile->appliedStudentFiles->count()}} X <img class="" src="{{asset($appliedStudentFile->country['path'].'/'.$appliedStudentFile->country['image_name'])}}" width="25"  >
                                    @else
                                    {{$appliedStudentFile->appliedStudentFiles->count()}} X Flag
                                    @endif
                                </td><!-- 
                                <td class="text-center">
                                    <span class="text-success">{{ $appliedStudentFile->appliedStudentFilesByAdmin->count() }}</span> ~
                                    <span class="text-danger"> {{ ((int)$appliedStudentFile->appliedStudentFiles->count() - (int)$appliedStudentFile->appliedStudentFilesByAdmin->count()) }} </span>
                                </td> -->
                                <!-- <td class=" capitalize">
                                    <a href="javascript:void;"><strong>Completed :</strong> {{$appliedStudentFile->previousQualifications['name']}}</a>
                                    <div class="widget-subheading">
                                        <a href="javascript:void;"><strong>Grade10 :</strong>
                                        @if($appliedStudentFile->grade10)
                                        @if($appliedStudentFile->grade10->totals)
                                        @if($appliedStudentFile->grade10->boards)
                                        {{$appliedStudentFile->grade10->totals['name']}} ({{$appliedStudentFile->grade10->boards['name']}})
                                        @endif
                                        @endif
                                        @endif
                                        </a>
                                    </div>
                                    <div class="widget-subheading">
                                        <a href="javascript:void;"><strong>Grade12 :</strong>
                                        @if($appliedStudentFile->grade12)
                                        @if($appliedStudentFile->grade12->totals)
                                        @if($appliedStudentFile->grade12->boards)
                                        {{$appliedStudentFile->grade12->totals['name']}} ({{$appliedStudentFile->grade12->boards['name']}})
                                        @endif
                                        @endif
                                        @endif
                                        </a>
                                    </div>
                                </td> -->
                                <!-- <td class="text-center">
                                    @if( $appliedStudentFile->pendeciesStudentFiles->count() > 0)
                                    <div class="text-danger">{{ $appliedStudentFile->pendeciesStudentFiles->count() }} </div>
                                    @else
                                    <div class="text-success">{{ $appliedStudentFile->pendeciesStudentFiles->count() }} </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form method="POST" action="{{route('student.comment')}}"> 
                                        @csrf 
                                        <input type="text" name="comment" placeholder="comment" style="width: 250px;" class="form-control" value="{{$appliedStudentFile['comment']}}">
                                        <input type="hidden" name="studentId"  class="form-control" value="{{$appliedStudentFile->id}}">
                                        <button class="btn btn-info">Save</button>
                                    </form>
                                </td> -->
                                <td class="text-center" style="font-size: 11px!important;">
                                    @if($appliedStudentFile['IsShortlisting'] == 'yes')
                                    Short list by team
                                    @endif
                                </td>
                                
                                <!-- <td class="text-center">
                                    <a href="{{route('studentfiles.show',base64_encode($appliedStudentFile->id))}}" class=" btn btn-sm btn-info view_1" data-toggle="tooltip" title="View"><i class="pe-7s-look"></i></a>
                                    <a href="{{route('studentfiles.edit',base64_encode($appliedStudentFile->id))}}" class=" btn btn-sm btn-info edit_1" data-toggle="tooltip" title="Edit"><i class="pe-7s-note"></i></a>
                                    <a href="{{route('studentfiles.allDocs',base64_encode($appliedStudentFile->id))}}" class=" btn btn-sm btn-info view_1"data-toggle="tooltip" title="docs"><i class="pe-7s-file"> </i></a>
                                    <a href="{{route('student.program.add',base64_encode($appliedStudentFile->id))}}" class=" btn btn-sm btn-info edit_1"data-toggle="tooltip" title="Add Programs"><i class="pe-7s-plus"></i></a>
                                    <a href="{{route('admin.student.chat',base64_encode($appliedStudentFile['id']))}}" class="btn btn-success"data-toggle="tooltip" title="Student Chat"><i class="fa fa-comment"> </i><span style="position: absolute; background: #e1000a; padding: 10px; border-radius: 50%; margin-top: 10px; font-weight: 800; top: -23px;">
                                        @if($appliedStudentFile->studentNotifications)
                                        {{$appliedStudentFile->studentNotifications->count()}}
                                        @endif
                                        </span>
                                    </a>
                                </td> -->
                            </tr>
                            @endif
                            @endif
                            @endforeach 
                            <span class="pagiSpan">{{$appliedStudentFiles->links()}}</span>
                        </tbody>
                    </table>
                </div>
                </div>
                  </div>

                <div class="tab-pane" id="messages">
                    <div class="" role="alert">
                   
                    <div class="alert-icon">
                     <i class="icon-info"></i>
                    </div>
                    <div class="alert-message">
                      
                    </div>
                  </div>
                <div class="card-body">
                    @include('multiauth::message')
                <table data-order='[[ 0, "desc" ]]' class="align-middle text-truncate mb-0 table cell-border " >
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Notification</th>
                            <th class="text-center">Date</th>
                            <!-- <th class="text-center">Action</th> -->
                        </tr>
                    </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach ($notifications as $key=>$notification)
                        <tr>
                            <td class="text-center" style="font-size: 7px;">{{ $i++ }}</td>
                            <td class="">
                                <div class="" style="font-size: 7px;">{{$notification['message']}}</div>
                            </td>
                            <td class="text-center">
                                <div class="" style="font-size: 7px;">{{ date('d-M-Y',strtotime($notification['created_at']))  }}</div>
                            </td>
                        </tr>
                        
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
                <div class="tab-pane" id="edit">
                    <form>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="{{$agent->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" value="{{$agent->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="number" value="{{$agent->mobileno}}">
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="file">
                            </div>
                        </div> -->
                       
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Address</label>
                            <div class="col-lg-6">
                                <input class="form-control" type="text" value="{{$agent->country->name}}" placeholder="City">
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" type="text" value="{{$agent->state->name}}" placeholder="State">
                            </div>
                        </div>
                       
                        
                        
                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Cancel">
                                <input type="button" class="btn btn-primary" value="Save Changes" style="background-color: #E1000A!important;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      </div>
        
    </div>
</div>

@endsection