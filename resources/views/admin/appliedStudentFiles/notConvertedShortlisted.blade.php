@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Shortlisted Not converted  &nbsp;
                    <!-- <span class="float-right">
                        <a href="{{route('studentfiles.create')}}" class="btn btn-sm btn-success">Apply New Student File</a>
                    </span> -->
                    <span class="float-right">
                        <!-- <a href="{{route('studentfiles.index')}}" class="btn btn-sm btn-danger float-right">Back</a> -->
                    </span>
                </div>
                <div class="card-body">
                    @include('multiauth::message')
                <table data-order='[[ 0, "desc" ]]' class="align-middle text-truncate mb-0 table table-borderless table-hover tableID" >
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Aply_for_shortlist </th>
                            <th class="text-center">shortlisted at </th>
                            <th class="text-center">Account Manager </th>
                            <th class="text-center">Name</th>
                            <!-- <th class="text-center">Student ID</th> -->
                            <th class="text-center">Agent</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Applications</th>
                            <!-- <th class="text-center">Proceed</th> -->
                            <!-- <th class="text-center">Qualification</th> -->
                            <th class="text-center">Pendency </th>
                            <th class="text-center">Comment </th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
       
                    @foreach($appliedStudentFiles as $appliedStudentFile)
                    
                        <tr>
                             <td class="text-center">
                                <div class="badge badge-pill badge-danger num_1">{{ $appliedStudentFile->id }}</div>
                            </td>
                            <td class="text-center">
                                <div class="badge badge-pill badge-danger">{{ $appliedStudentFile->apply_for_shortlist_at }}</div>
                            </td>
                            <td class="text-center">
                                <div class="badge badge-pill badge-danger">{{ $appliedStudentFile->shortlist_compleate_at }}</div>
                            </td>
                            <td class="text-center">
                                <div class="badge badge-pill badge-danger">
                                    @if($appliedStudentFile->agent)
                                    @if($appliedStudentFile->agent->accountManager)
                                    {{ $appliedStudentFile->agent->accountManager['name'] }}
                                    @endif
                                    @endif
                                </div>
                            </td>
                            <td class="text-center capitalize">
                                <span class="float-left padding-5px stdImg">
                                @if($appliedStudentFile->studentImage)
                                    <img class="rounded-circle" src="{{asset($appliedStudentFile->studentImage->path.'/'.$appliedStudentFile->studentImage->name)}}" width="40"  >
                                @else
                                    <img class="rounded-circle" src="{{asset('images/site/user-img.png')}}" width="40" alt="your image" />

                                @endif
                                </span>
                                <div>
                                <a href="#" class="">{{ $appliedStudentFile->firstName }}&nbsp;{{$appliedStudentFile->lastName}}</a>
                                </div>
                                @if($appliedStudentFile->nationality)
                                <div class="widget-subheading text-center"><small>Nationality: </small><i><img class="" src="{{asset($appliedStudentFile->countryAddress['path'].'/'.$appliedStudentFile->countryAddress['image_name'])}}" width="20"  ></i></div>
                                @endif
                                <div class="badge badge-pill badge-warnings">{{ $appliedStudentFile->student_unique_id }}</div>
                                <!-- <div class="widget-subheading text-left"><small> {{ $appliedStudentFile->agent['name'] }}</small></div> -->
                            </td>
                              <td class="text-center">
                                <div >{{ $appliedStudentFile->agent['name'] }}</div>
                                    <div>{{ $appliedStudentFile->agent['company_name'] }}</div>
                                    <!-- <div>{{ $appliedStudentFile->agent['email'] }}</div> -->
                                    <div>{{ $appliedStudentFile->agent['mobileno'] }}</div>
                                </div>
                            </td>
                            <td class="text-center" style="text-transform: lowercase;">{{ $appliedStudentFile->email }}</td>
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
                            </td> --><!-- 
                            <td class=" capitalize"><a href="javascript:void;"><strong>Completed :</strong> {{$appliedStudentFile->previousQualifications['name']}}</a>
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
                            </td>
                             -->
                            <td class="text-center">
                                @if( $appliedStudentFile->pendeciesStudentFiles->count() > 0)
                                <div class="text-danger">{{ $appliedStudentFile->pendeciesStudentFiles->count() }} </div>
                                @else
                                <div class="text-success">{{ $appliedStudentFile->pendeciesStudentFiles->count() }} </div>
                                @endif
                            </td>
                            <td class="text-center">
                                <form method="POST" action="{{route('student.comment')}}"> 
                                @csrf 
                                    <input type="text" name="comment" placeholder="comment" class="form-control" value="{{$appliedStudentFile['comment']}}">
                                    <input type="hidden" name="studentId"  class="form-control" value="{{$appliedStudentFile->id}}">
                                    <button class="btn btn-sm btn-info">Save</button>
                                </form>
                            </td>

                          
                            <td class="text-center">
                                <a href="{{route('studentfiles.show',base64_encode($appliedStudentFile->id))}}" class=" btn btn-sm btn-info "data-toggle="tooltip" title="View"><i class="pe-7s-look"></i></a>
                                <a href="{{route('student.program.add',base64_encode($appliedStudentFile->id))}}" class=" btn btn-sm btn-info "data-toggle="tooltip" title="Add Programs"><i class="pe-7s-plus"></i></a>
                                <a href="{{route('admin.student.chat',base64_encode($appliedStudentFile['id']))}}" class="btn btn-success"data-toggle="tooltip" title="Student Chat"><i class="fa fa-comment"></i>  <span style="    position: absolute;
                        background: #e1000a;
                        padding: 10px;
                        border-radius: 50%;
                        margin-top: 10px;
                            font-weight: 800;
                        top: -23px;">
                        @if($appliedStudentFile->studentNotifications)
                                    {{$appliedStudentFile->studentNotifications->count()}}
                                @endif
                                </span></a>
                                
                            </td>
                        </tr>
                        
                        @endforeach 
                    </tbody>
                    </table>


                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('addjavascript')
<script src="{{ asset('js/app.js') }}" ></script>

@endsection