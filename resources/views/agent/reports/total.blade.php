
<?php
$admin =Auth::guard('admin')->check();
?>

@extends(($admin === false) ? 'agent.layouts.app' : 'admin.layouts.admin')
@section('content')

<div class="app-main__inner dashboard my-element">
    <button class="btn btn-success btn-default-color mb-3" onclick="toggleElement('my-element')">Filter</button>
    <div class="app-page-title hide" id="my-element" >
          
      @if($admin)
        <form method="POST" action="{{route('admin.total.report')}}" style="width: 55%">
      @else
        <form method="POST" action="{{route('get.total.report')}}">
      @endif
                @csrf
                
                <!-- <div class="col-md-4">
                    <label>To Date</label>
                    <input type="date" class="form-control" name="toDate">
                    </div> -->
            <br>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="row">
                      <div class="col-md-4">
                          
                        <label>Country <i class="fa fa-map-marker"></i></label>
                        <select class="form-control" name="country">
                        <option value=""> Select Any Country</option>
                           @foreach($countries as $country)
                              @if ($data != null)
                                 @if ($data['country'] == $country['id'])
                                    <option value="{{$country['id']}}" selected>{{$country['name']}}</option>
                                 @else
                                     <option value="{{$country['id']}}">{{$country['name']}}</option>
                                 @endif
                              @else
                                 <option value="{{$country['id']}}">{{$country['name']}}</option>
                              @endif
                           @endforeach
                        </select>
                     </div>
                        <div class="col-md-4">
                            <label>Year <i class="fa fa-calendar"></i></label>
                            <select class="form-control" name="year" >
                               <option value="">Select Any Year</option>
                                @if ($data != null)
                                    @if ($data['year'] != 'NULL')
                                        <option value="2020"{{ ( $data['year'] == '2020') ? 'selected' : '' }} >2020</option>
                                        <option value="2021" {{ ( $data['year'] == '2021') ? 'selected' : '' }} >2021</option>
                                        <option value="2021" {{ ( $data['year'] == '2022') ? 'selected' : '' }} >2022</option>
                                        <option value="2021" {{ ( $data['year'] == '2023') ? 'selected' : '' }} >2023</option>
                                    
                                    @endif
                                 @else
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2023</option>
                                 @endif
                               
                               
                            </select>
                        </div>
                         <div class="col-md-4">
                            <label>Intake <i class="fa fa-calendar"></i></label>
                            <select class="form-control" name="intake" >
                               <option value="">Select Any Intake</option>
                               @foreach($intakes as $intake)
                                 @if ($data != null)
                                    @if ($data['intake'] == $intake['id'])
                                       <option value="{{$intake['id']}}" selected class="capitalize">{{$intake['name']}}</option>
                                    @else
                                       <option value="{{$intake['id']}}" class="capitalize">{{$intake['name']}}</option>
                                    @endif
                                 @else
                                    <option value="{{$intake['id']}}" class="capitalize">{{$intake['name']}}</option>
                                 @endif
                               @endforeach
                            </select>
                        </div>                        
                        <div class="col-md-4">
                              <label>From Date <i class="fa fa-calendar"></i></label>
                              @if ($data != null)
                                 @if ($data['fromDate'] != null)
                                 <input type="date" class="form-control " name="fromDate" placeholder="DD/MM/YY" value="{{$data['fromDate']}}" >
                                 @else
                                 <input type="date" class="form-control " placeholder="DD/MM/YY" name="fromDate" >
                                 @endif
                              @else
                              <input type="date" class="form-control " placeholder="DD/MM/YY" name="fromDate" >
                              @endif
                          </div>
                          <div class="col-md-4">
                              <label>To Date <i class="fa fa-calendar"></i></label>
                              @if ($data != null)
                                 @if ($data['toDate'] != null)
                                 <input type="date" class="form-control " name="toDate"  placeholder="DD/MM/YY"  value="{{$data['toDate']}}" >
                                 @else
                                 <input type="date" class="form-control " name="toDate"  placeholder="DD/MM/YY"  >
                                 @endif
                              @else
                              <input type="date" class="form-control " name="toDate"  placeholder="DD/MM/YY"  >
                              @endif
                          </div>
                          <div class="col-md-4">
                            <label>Account Manager <i class="fa fa-user"></i></label>
                            <select class="form-control" name="account_manager" >
                               <option value="">Select Any AM</option>
                               @foreach($accountManagersList as $key => $accountMan)
                                 @if ($data != null)
                                    @if ($data['account_manager'] == $accountMan)
                                       <option value="{{$accountMan}}" selected class="capitalize">{{$key}}</option>
                                    @else
                                       <option value="{{$accountMan}}" class="capitalize">{{$key}}</option>
                                    @endif
                                 @else
                                    <option value="{{$accountMan}}" class="capitalize">{{$key}}</option>
                                 @endif
                               @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                          
                        <label>Agent <i class="fa fa-user"></i></label>
                        <select class="form-control" name="agent">
                        <option value=""> Select Any Agent</option>
                           @foreach($agents as $agent)
                              @if ($data != null)
                                 @if ($data['agent'] == $agent['id'])
                                    <option value="{{$agent['id']}}" selected>{{$agent['name']}}</option>
                                 @else
                                     <option value="{{$agent['id']}}">{{$agent['name']}}</option>
                                 @endif
                              @else
                                 <option value="{{$agent['id']}}">{{$agent['name']}}</option>
                              @endif
                           @endforeach
                        </select>
                     </div> 
                        
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="row">
                        
                       <div class="col-md-12">
                        <label >&nbsp;</label>
                        <div class="row">
                              <!-- <a href="javascript:;" class="btn btn-success toggleFilter">Filter</a> -->
                              <button type="submit" class="btn btn-success btn-default-color"><i class="fas fa-search"></i>&nbsp; Apply</button>
                        </div>
                        <!-- <label>From Date</label>
                              <input type="date" class="form-control" name="fromDate"> -->
                     </div>
                       
                    </div>
                </div>
            </div>
        </form>
          
    </div>
    <?php
    $admin = Auth::guard('admin')->user();
    ?>
    @if($admin)
    <!-- <ul class="nav nav-tabs">
        <li class=" " ><a class="text-white uprTabs active"  data-toggle="tab" href="#home">Total Students ({{$students->count()}})</a></li>
    </ul> -->
    <div class="tab-content bg-white card">
          <div id="home" class="tab-pane fade active show">
              <div class="row ">
                <div class="col-md-12">
                    <div class="">
                        <div class="card-header">
                            Search Students &nbsp; <h1 class="badge badge-pill badge-warning"></h1>
                        </div>
                        <div class="card-body">
                            @include('multiauth::message')
                            <table data-order='[[ 0, "desc" ]]' class="align-middle text-truncate mb-0 table table-borderless cell-border table-hover tableID" >
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Applied_at</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Student ID</th>
                                        <th class="text-center">Agent</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Applications</th>
                                        <th class="text-center">Country</th>
                                        <th class="text-center">Proceed</th>
                                        <th class="text-center">AM</th>
                                        <th class="text-center">Pendency </th>
                                        <th class="text-center">Comment </th>
                                        <th class="text-center">Shortlist By</th>
                                        <th class="text-center">App_Rcvd_for_shortlist </th>
                                        <th class="text-center">Shortlisted at </th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $user =Auth::guard('admin')->user();
                                    ?>
                                    @foreach($students as $appliedStudentFile)
                                    <tr>
                                        <td class="text-center">
                                            <div class="badge badge-pill badge-warning">{{ $appliedStudentFile->id }}</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="badge badge-pill badge-warning">{{ $appliedStudentFile->applied_at }}</div>
                                        </td>
                                        <td class="text-center capitalize">
                                            <span class="float-left padding-5px stdImg">
                                            @if($appliedStudentFile->studentImage)
                                            <img class="rounded-circle" src="{{asset($appliedStudentFile->studentImage->path.'/'.$appliedStudentFile->studentImage->name)}}" width="40"  >
                                            @else
                                            <img class="rounded-circle" src="{{asset('images/site/user-img.png')}}" width="40" alt="your image" />
                                            @endif
                                            </span>
                                            <a href="#" class="">{{ $appliedStudentFile->firstName }}&nbsp;{{$appliedStudentFile->lastName}}</a>
                                            <div class="widget-subheading text-center">DOB: <small> {{ $appliedStudentFile['dateOfBirth'] }}</small></div>
                                        </td>
                                        <td class="text-center">
                                            <div class="badge badge-pill badge-warning">{{ $appliedStudentFile->student_unique_id }}</div>
                                        </td>
                                        <td class="text-center">
                                            <div >
                                                <a href="{{route('admin.session.agent.home',base64_encode($appliedStudentFile->agent['id']))}}">{{ $appliedStudentFile->agent['name'] }}</a>
                                                <p>{{ $appliedStudentFile->agent['company_name'] }}</p>
                                                <p>{{ $appliedStudentFile->agent['email'] }}</p>
                                                <p>{{ $appliedStudentFile->agent['mobileno'] }}</p>
                                            </div>
                                        </td>
                                        <td class="text-center" style="text-transform: lowercase;">{{ $appliedStudentFile->email }}</td>
                                        <td class="">
                                            @foreach($appliedStudentFile->appliedStudentFiles as $asapplication)
                                                <div class="widget-heading">
                                                    <a href="javascript:void;"><strong>Course :</strong>
                                                    @if($asapplication->course)
                                                   <strong> {{$asapplication->course['name']}}</strong>
                                                    @endif
                                                    </a>
                                                </div>
                                                <div class="widget-subheading">
                                                    <a href="javascript:void;">Institute :
                                                    @if($asapplication->college)
                                                    {{$asapplication->college['name']}}
                                                    @endif
                                                    </a>
                                                </div>
                                                <div class="widget-subheading">
                                                    <a href="javascript:void;">Intake :
                                                    @if($asapplication->studentintake)
                                                    {{$asapplication->studentintake['name']}}
                                                    @endif
                                                    </a>
                                                </div>
                                                <div class="widget-subheading">
                                                    <a href="javascript:void;">Status :
                                                    @if($asapplication->applicationStatus)
                                                    {{$asapplication->applicationStatus['name']}}
                                                    @endif
                                                    </a>
                                                </div> <br>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @if($appliedStudentFile->country['path'])
                                            
                                            {{$appliedStudentFile->appliedStudentFiles->count()}} X  &nbsp; <img class="" src="{{asset($appliedStudentFile->country['path'].'/'.$appliedStudentFile->country['image_name'])}}" width="25"  >
                                            @else
                                            {{$appliedStudentFile->appliedStudentFiles->count()}} X Flag
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <span class="text-success">{{ $appliedStudentFile->appliedStudentFilesByAdmin->count() }}</span> ~
                                            <span class="text-danger"> {{ ((int)$appliedStudentFile->appliedStudentFiles->count() - (int)$appliedStudentFile->appliedStudentFilesByAdmin->count()) }} </span>
                                        </td>
                                        <td class=" capitalize">
                                            <div class="widget-subheading">
                                                <a href="javascript:void;">
                                                @if($appliedStudentFile->agent)
                                                @if($appliedStudentFile->agent->accountManager)
                                                    {{$appliedStudentFile->agent->accountManager['name']}}
                                                @endif
                                                @endif
                                                </a>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            @if( $appliedStudentFile->pendeciesStudentFiles->count() > 0)
                                            <div class="badge badge-pill badge-danger">{{ $appliedStudentFile->pendeciesStudentFiles->count() }} </div>
                                            @else
                                            <div class="badge badge-pill badge-success">{{ $appliedStudentFile->pendeciesStudentFiles->count() }} </div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                                <input type="text" name="comment" placeholder="comment" class="form-control" value="{{$appliedStudentFile['comment']}}">
                                        </td>
                                        <td class="text-center">
                                            @if($appliedStudentFile['IsShortlisting'] == 'yes')
                                            Short list by team
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="badge badge-pill badge-warning">{{ $appliedStudentFile->apply_for_shortlist_at }}</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="badge badge-pill badge-warning">{{ $appliedStudentFile->shortlist_compleate_at }}</div>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('studentfiles.show',base64_encode($appliedStudentFile->id))}}" class=" btn btn-sm btn-info ">View</a>
                                            <div class=""><a href="{{route('admin.student.chat',base64_encode($appliedStudentFile['id']))}}" class="btn btn-success">Student Chat <span style="    position: absolute;
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
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                                    <span class="pagiSpan">{{$students->links()}}</span>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
    @else
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <!-- <div class="card-header">
                    Total Report
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                        </div>
                    </div>
                </div> -->
                <div class="col-md-12">
                <div class="row">
                    <div class="table-responsive">
                        <table class="align-middle text-truncate mb-0 table table-borderless table-hover reprotTable" >
                            <thead class="reprotTableDesign">
                                <tr>
                                    <th class="text-center">Report Types</th>
                                    <th class="text-center">No. Of Applications</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <tr>
                                    <td class="text-center capitalize">
                                        <b>Total Applications</b>
                                    </td>
                                    <td class="text-center">{{ $total }}</td>
                                </tr>
                                 <tr>
                                    <td class="text-center capitalize">
                                        <b>Total Offers</b>
                                    </td>
                                    <td class="text-center">{{ $offers }}</td>
                                </tr>
                                 <tr>
                                    <td class="text-center capitalize">
                                        <b>Students</b>
                                    </td>
                                    <td class="text-center">{{ $students }}</td>
                                </tr>
                                 <tr>
                                    <td class="text-center capitalize">
                                        <b>Fee Deposit</b>
                                    </td>
                                    <td class="text-center"><i class="fa fa-dollar-sign"></i> {{ $offers }}</td>
                                </tr>
                                 <tr>
                                    <td class="text-center capitalize">
                                        <b>Comission</b>
                                    </td>
                                    <td class="text-center"><i class="fa fa-dollar-sign"></i> {{ $offers }}</td>
                                </tr>
                                 <tr>
                                    <td class="text-center capitalize">
                                        <b>Earn Comission</b>
                                    </td>
                                    <td class="text-center"><i class="fa fa-dollar-sign"></i> {{ $offers }}</td>
                                </tr>
                                <!-- @foreach ($applications as $key => $application)
                                <tr>
                                    <td class="text-center capitalize">
                                        {{$key+1}}
                                    </td>
                                    <td class="text-center capitalize">
                                        @if($application)
                                        {{ $application['name'] }}
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $application->total }}</td>
                                </tr>
                                @endforeach  -->
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
<script>
function toggleElement(elementId) {
  var element = document.getElementById(elementId);
  if (element.style.display === 'none') {
    element.style.display = 'block';
  } else {
    element.style.display = 'none';
  }
}
</script>




