<?php
$studentUser =Auth::guard('student')->check();
?>

@extends(($studentUser === false) ? 'admin.layouts.admin' : 'applicant.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Applications List &nbsp;
                    <span class="float-right">
                        <!-- <a href="{{route('student.create')}}" class="btn btn-sm btn-success">Add New Student</a> -->
                    </span>
                    <span class="float-right">
                        <!-- <a href="{{route('student.index')}}" class="btn btn-sm btn-danger float-right">Back</a> -->
                    </span>
                </div>
                <div class="card-body">
                    @include('multiauth::message')
                    <table data-order='[[ 0, "desc" ]]' class="align-middle text-truncate mb-0 table table-hover tableID" >
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Applied At</th>
                            <!-- <th class="text-center">Course</th> -->
                            <!-- <th class="text-center">Student ID</th> -->
                            <th class="text-center">Agent </th>
                            <!-- <th class="text-center">Agent Company name</th> -->
                            <!-- <th class="text-center">Agent Mobile</th> -->
                            <th class="text-center">Institutes</th>
                            <th class="text-center">Program</th>
                            <th class="text-center">Intake</th>
                            <th class="text-center">Status  </th>
                            <th class="text-center">Pendency </th>
                            <th class="text-center">Last update </th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($appliedStudentFiles as $Pendstudent)
                        <tr>
                            <td class="text-center capitalize">
                                <div class="badge badge-pill badge-danger num_1">{{ $Pendstudent['id'] }}</div>
                            </td>
                            <td class="text-center capitalize">
                                <div class="stdDetail">
                                	@if($Pendstudent->student)
                                    <div>
                                        <a href="{{route('student.show',base64_encode($Pendstudent->student->id))}}" class="">
                                        	{{ $Pendstudent->student['firstName'] }} {{ $Pendstudent->student['middleName'] }} {{ $Pendstudent->student['lastName'] }}
                                        </a>
                                        	@endif
                                    </div>
                                    AO: <div class="badge badge-pill badge-warnings">
                                    @if($Pendstudent->student)
                                    {{ $Pendstudent->student->student_unique_id }}
                                    @endif
                                </div>
                                @if($Pendstudent->offerLettr)   
                                @if($Pendstudent->offerLettr['college_student_id'])   
                                    <div class="widget-subheading text-center"><a href="javascript:;"><small>UNI ID: </small>
                                    {{$Pendstudent->offerLettr['college_student_id'] }}
                                    
                                </a></div>
                                @endif    
                                @endif
                                <!-- <div class="widget-subheading text-center"><small>DOB: </small>
                                	@if($Pendstudent->student)
                                	{{ $Pendstudent->student['dateOfBirth'] }}</div>
                                	@endif
                                </div> -->
                            </td>
                            <td class="text-center capitalize">
                                <div class="stdDetail">
                                <div class="badge badge-pill badge-danger text-center">
                                    @if($Pendstudent->student)
                                    {{ $Pendstudent->student['applied_at'] }}</div>
                                    @endif
                                </div>
                            </td>
                            <!-- <td class="text-center">
                                    
                            </td> -->
                            <td class="text-center capitalize">
                                <div class="stdDetail">
                                <div class=" text-center">
                                    @if($Pendstudent->agent)
                                    {{ $Pendstudent->agent['name'] }}</div>
                                    @endif
                                </div>
                                <div class=" text-center">
                                    @if($Pendstudent->agent)
                                    {{ $Pendstudent->agent['company_name'] }}</div>
                                    @endif
                                </div>
                                <div class=" text-center">
                                    @if($Pendstudent->agent)
                                    {{ $Pendstudent->agent['mobileno'] }}</div>
                                    @endif
                                </div>
                            </td>
                            <!-- <td class="text-center capitalize">
                                <div class="stdDetail">
                                
                            </td>
                            <td class="text-center capitalize">
                                <div class="stdDetail">
                                
                            </td>
                             -->
                            
                        <td class="text-center">
                            @if($Pendstudent->course)
                            {{$Pendstudent->course->college['name']}}
                            <!-- <div class="widget-subheading text-center"><strong>Campus: </strong> -->
                            <!-- {{$Pendstudent->course->college['name'] }} -->
                            @endif
                        </div>
                        
                    </td>
                    <td class="text-center">{{ $Pendstudent->course['name'] }}
                        <div class="widget-subheading text-center">LEVEL: 
                        @if($Pendstudent->course)
                                @if($Pendstudent->course->course_levels)
                                    <strong>{{$Pendstudent->course->course_levels['name'] }}</strong>
                                @endif
                            @endif
                        </div>
                        
                    </td>
                    <td class="capitalize text-center">
                        @if($Pendstudent->course)
                        {{$Pendstudent->course->intakes['name']}}
                        @endif
                        
                                </td>
                                <td class="text-center">
                                    @if($Pendstudent)
                                    @if($Pendstudent->applicationStatus['name'])
                                    <span class="text-success">{{$Pendstudent->applicationStatus['name']}}</span>
                                    
                                    @endif
                                    @endif
                                </td>
                                <td class="text-center p_link">
                                    @if( $Pendstudent->pendencies)
                                    @if( $Pendstudent->pendencies->count() > 0)
                                    <a href="{{route('student.viewApplicationPendencies',base64_encode($Pendstudent['id']))}}"><span class="text-danger"> {{ $Pendstudent->pendencies->count() }}</span></a>&nbsp;
                                    @else
                                    <div class="text-success">{{ $Pendstudent->pendencies->count() }} </div>
                                @endif
                                @endif
                            </td>
                            <td class="text-center p_link">
                                    @if( $Pendstudent)
                                    
                                     {{ $Pendstudent['updated_at'] }}
                                    
                                @endif
                            </td>
                            <td class="text-center profile_btn">
                                @if($Pendstudent->student)
                                @if($Pendstudent->student['lock_status'] == 0)
                                <a href="#" class="btn btn-sm btn-danger  delete del_1" data_id="{{$Pendstudent->student->id}}" data-toggle="tooltip" title="Delete"><i class="pe-7s-trash"></i></a>
                                <input type="hidden" class="deleteID" value="{{$Pendstudent->student->id}}">
                                <form id="delete-form-{{ $Pendstudent->id }}" class="form" action="{{ route('student.destroy',[$Pendstudent->student->id]) }}" method="POST" style="display: none;">
                                    @csrf @method('delete')
                                </form>
                                <a href="{{route('student.edit',base64_encode($Pendstudent->student->id))}}" class="btn btn-sm btn-info edit_1" data-toggle="tooltip" title="Edit"><i class="pe-7s-note"></i></a>
                                @else
                                <div class="badge badge-danger badge-pill"><i class="fa fa-lock"></i></div>
                                @endif
                                @endif
                                @if($studentUser === true)
                                <a href="{{route('applicant.student.application.View',base64_encode($Pendstudent['id']))}}" class=" btn btn-sm btn-info view_1" data-toggle="tooltip" title="View"><i class="pe-7s-look"></i></a>
                                @else
                                <a href="{{route('application.show',base64_encode($Pendstudent['id']))}}" class=" btn btn-sm btn-info view_1" data-toggle="tooltip" title="View"><i class="pe-7s-look"></i></a>
                                @endif
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
