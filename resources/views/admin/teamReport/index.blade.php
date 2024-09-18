@extends('admin.layouts.admin')
@section('content')
<style type="text/css">
    table td{
    font-size: 16px!important;
    color: white;
    }
    
</style>
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Daily Report &nbsp;
                    <!-- <span class="float-right">
                        <a href="{{route('studentfiles.create')}}" class="btn btn-sm btn-success">Apply New Student File</a>
                        </span> -->
                    <span class="float-right">
                        <!-- <a href="{{route('studentfiles.index')}}" class="btn btn-sm btn-danger float-right">Back</a> -->
                    </span>
                </div>
                <div class="card-body">
                    @include('multiauth::message')
                    @if(auth()->user()->roles[0]['name'] == 'super')
                    <ul class="nav nav-tabs">
                        <li class="btn btn-danger nav-tab-toogle active "  style="margin: 2px!important;"><a class="text-white uprTabs active"  data-toggle="tab" href="#menu12">Total Reports</a></li><br>
                        <li class="btn btn-danger nav-tab-toogle " style="margin: 2px!important;"><a class="text-white uprTabs"  data-toggle="tab" href="#home">AM's</a></li><br>
                        <li class="btn btn-danger nav-tab-toogle " style="margin: 2px!important;"><a class="text-white uprTabs" data-toggle="tab"  href="#menu1">Pre Processing Team</a></li><br>
                        <li class="btn btn-danger nav-tab-toogle " style="margin: 2px!important;"><a class="text-white uprTabs" data-toggle="tab"  href="#menu4">Process Team</a></li><br>
                        <li class="btn btn-danger nav-tab-toogle " style="margin: 2px!important;"><a class="text-white uprTabs"  data-toggle="tab" href="#menu2">Shortlisting Team</a></li><br>
                        <li class="btn btn-danger nav-tab-toogle " style="margin: 2px!important;"><a class="text-white uprTabs" data-toggle="tab" href="#menu3">Attendance</a></li><br>
                    </ul>
                    <hr>
                    <div class="tab-content ">
                        <div id="home" class="tab-pane fade ">
                            <h3>Account Managers</h3>
                            <table data-order='[[ 0, "desc" ]]' class="align-middle text-truncate mb-0 table table-borderless cell-border table-hover tableID" >
                                <thead>
                                    <tr>
                                        <th class="text-center">#id</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Calls</th>
                                        <th class="text-center">Emails </th>
                                        <th class="text-center">Canada Applications </th>
                                        <th class="text-center">UK Applications</th>
                                        <th class="text-center">AUS Applications</th>
                                        
                                        <th class="text-center">Canada Payments</th>
                                        <th class="text-center">UK Payments</th>
                                        <th class="text-center">AUS Payments</th>
                                        
                                        <th class="text-center">Canada Offers</th>
                                        <th class="text-center">UK Offers</th>
                                        <th class="text-center">AUS Offers</th>
                                        
                                        <th class="text-center">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($accountManagers as $accountManager)
                                    <tr>
                                        <td class="text-center bg-success bg-succes">
                                            <div class="">{{$accountManager['id']}}</div>
                                        </td>
                                        <td class="text-center bg-success bg-succes">
                                            <div class="">{{$accountManager['date']}}</div>
                                        </td>
                                        <td class="text-center bg-success bg-succes">
                                            <div class=""><a href="{{route('taskmanager.edit',base64_encode($accountManager['admin_id']))}}" class="text-white mr-3">{{$accountManager['name']}}</a></div>
                                        </td>
                                        <td class="text-center {{($accountManager['calls']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$accountManager['calls']}}</div>
                                        </td>
                                        <td class="text-center {{($accountManager['emails']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$accountManager['emails']}}</div>
                                        </td>
                                        <td class="text-center {{($accountManager['canada_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$accountManager['canada_applications']}}</div>
                                        </td>
                                        <td class="text-center {{($accountManager['uk_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$accountManager['uk_applications']}}</div>
                                        </td>
                                        <td class="text-center {{($accountManager['aus_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$accountManager['aus_applications']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($accountManager['canada_payments']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$accountManager['canada_payments']}}</div>
                                        </td>
                                        <td class="text-center {{($accountManager['uk_payments']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$accountManager['uk_payments']}}</div>
                                        </td>
                                        <td class="text-center {{($accountManager['aus_payments']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$accountManager['aus_payments']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($accountManager['canada_offers']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$accountManager['canada_offers']}}</div>
                                        </td>
                                        <td class="text-center {{($accountManager['uk_offers']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$accountManager['uk_offers']}}</div>
                                        </td>
                                        <td class="text-center {{($accountManager['aus_offers']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$accountManager['aus_offers']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($accountManager['remarks']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$accountManager['remarks']}}</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <h3>Pre process Team</h3>
                            <table data-order='[[ 0, "desc" ]]' class="align-middle text-truncate mb-0 table table-borderless cell-border table-hover tableID" >
                                <thead>
                                    <tr>
                                        <th class="text-center">#id</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Received Applications </th>
                                        <th class="text-center">Canada Applications </th>
                                        <th class="text-center">UK Applications</th>
                                        <th class="text-center">AUS Applications</th>
                                        
                                        <th class="text-center">Canada Payments</th>
                                        <th class="text-center">UK Payments</th>
                                        <th class="text-center">AUS Payments</th>
                                        
                                        <th class="text-center">Canada Offers</th>
                                        <th class="text-center">UK Offers</th>
                                        <th class="text-center">AUS Offers</th>
                                        
                                        <th class="text-center">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($preprocessors as $preprocess)
                                    <tr>
                                        <td class="text-center bg-success bg-succes">
                                            <div class="">{{$preprocess['id']}}</div>
                                        </td>
                                        <td class="text-center bg-success bg-succes">
                                            <div class="">{{$preprocess['date']}}</div>
                                        </td>
                                        <td class="text-center bg-success bg-succes">
                                            <div class=""><a href="{{route('taskmanager.edit',base64_encode($preprocess['admin_id']))}}" class="text-white mr-3">{{$preprocess['name']}}</a></div>
                                        </td>
                                        <td class="text-center {{($preprocess['received_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$preprocess['received_applications']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($preprocess['canada_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$preprocess['canada_applications']}}</div>
                                        </td>
                                        <td class="text-center {{($preprocess['uk_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$preprocess['uk_applications']}}</div>
                                        </td>
                                        <td class="text-center {{($preprocess['aus_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$preprocess['aus_applications']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($preprocess['canada_payments']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$preprocess['canada_payments']}}</div>
                                        </td>
                                        <td class="text-center {{($preprocess['uk_payments']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$preprocess['uk_payments']}}</div>
                                        </td>
                                        <td class="text-center {{($preprocess['aus_payments']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$preprocess['aus_payments']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($preprocess['canada_offers']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$preprocess['canada_offers']}}</div>
                                        </td>
                                        <td class="text-center {{($preprocess['uk_offers']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$preprocess['uk_offers']}}</div>
                                        </td>
                                        <td class="text-center {{($preprocess['aus_offers']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$preprocess['aus_offers']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($preprocess['remarks']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$preprocess['remarks']}}</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="menu4" class="tab-pane fade">
                            <h3>Process Team</h3>
                            <table data-order='[[ 0, "desc" ]]' class="align-middle text-truncate mb-0 table table-borderless cell-border table-hover tableID" >
                                <thead>
                                    <tr>
                                        <th class="text-center">#id</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Received Applications</th>
                                        <th class="text-center">Canada Applications </th>
                                        <th class="text-center">UK Applications</th>
                                        <th class="text-center">AUS Applications</th>
                                        
                                        <th class="text-center">Canada Payments</th>
                                        <th class="text-center">UK Payments</th>
                                        <th class="text-center">AUS Payments</th>
                                        
                                        <th class="text-center">Canada Offers</th>
                                        <th class="text-center">UK Offers</th>
                                        <th class="text-center">AUS Offers</th>
                                        
                                        <th class="text-center">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($processors as $process)
                                    <tr>
                                        <td class="text-center bg-success bg-succes">
                                            <div class="">{{$process['id']}}</div>
                                        </td>
                                        <td class="text-center bg-success bg-succes">
                                            <div class="">{{$process['date']}}</div>
                                        </td>
                                        <td class="text-center bg-success bg-succes">
                                            <div class=""><a href="{{route('taskmanager.edit',base64_encode($process['admin_id']))}}" class="text-white mr-3">{{$process['name']}}</a></div>
                                        </td>
                                        <td class="text-center {{($process['received_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$process['received_applications']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($process['canada_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$process['canada_applications']}}</div>
                                        </td>
                                        <td class="text-center {{($process['uk_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$process['uk_applications']}}</div>
                                        </td>
                                        <td class="text-center {{($process['aus_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$process['aus_applications']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($process['canada_payments']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$process['canada_payments']}}</div>
                                        </td>
                                        <td class="text-center {{($process['uk_payments']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$process['uk_payments']}}</div>
                                        </td>
                                        <td class="text-center {{($process['aus_payments']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$process['aus_payments']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($process['canada_offers']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$process['canada_offers']}}</div>
                                        </td>
                                        <td class="text-center {{($process['uk_offers']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$process['uk_offers']}}</div>
                                        </td>
                                        <td class="text-center {{($process['aus_offers']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$process['aus_offers']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($process['remarks']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$process['remarks']}}</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <h3>Shortlisting Team</h3>
                            <table data-order='[[ 0, "desc" ]]' class="align-middle text-truncate mb-0 table table-borderless cell-border table-hover tableID" >
                                <thead>
                                    <tr>
                                        <th class="text-center">#id</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Received Applications</th>
                                        
                                        <th class="text-center">Canada Applications </th>
                                        <th class="text-center">UK Applications</th>
                                        <th class="text-center">AUS Applications</th>
                                        
                                        <th class="text-center">Canada Payments</th>
                                        <th class="text-center">UK Payments</th>
                                        <th class="text-center">AUS Payments</th>
                                        
                                        <th class="text-center">Canada Offers</th>
                                        <th class="text-center">UK Offers</th>
                                        <th class="text-center">AUS Offers</th>
                                        
                                        <th class="text-center">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($shortlistings as $shortlisting)
                                    <tr>
                                        <td class="text-center bg-success bg-succes">
                                            <div class="">{{$shortlisting['id']}}</div>
                                        </td>
                                        <td class="text-center bg-success bg-succes">
                                            <div class="">{{$shortlisting['date']}}</div>
                                        </td>
                                        <td class="text-center bg-success bg-succes">
                                            <div class=""><a href="{{route('taskmanager.edit',base64_encode($shortlisting['admin_id']))}}" class="text-white mr-3">{{$shortlisting['name']}}</a></div>
                                        </td>
                                        <td class="text-center {{($shortlisting['received_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$shortlisting['received_applications']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($shortlisting['canada_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$shortlisting['canada_applications']}}</div>
                                        </td>
                                        <td class="text-center {{($shortlisting['uk_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$shortlisting['uk_applications']}}</div>
                                        </td>
                                        <td class="text-center {{($shortlisting['aus_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$shortlisting['aus_applications']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($shortlisting['canada_payments']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$shortlisting['canada_payments']}}</div>
                                        </td>
                                        <td class="text-center {{($shortlisting['uk_payments']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$shortlisting['uk_payments']}}</div>
                                        </td>
                                        <td class="text-center {{($shortlisting['aus_payments']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$shortlisting['aus_payments']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($shortlisting['canada_offers']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$shortlisting['canada_offers']}}</div>
                                        </td>
                                        <td class="text-center {{($shortlisting['uk_offers']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$shortlisting['uk_offers']}}</div>
                                        </td>
                                        <td class="text-center {{($shortlisting['aus_offers']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$shortlisting['aus_offers']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($shortlisting['remarks']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$shortlisting['remarks']}}</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="menu12" class="tab-pane fade active show">
                            <h3>Total Report</h3>
                            <table data-order='[[ 0, "desc" ]]' class="align-middle text-truncate mb-0 table table-borderless cell-border table-hover tableID" >
                                <thead>
                                    <tr>
                                        <th class="text-center">#id</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Calls</th>
                                        <th class="text-center">Emails</th>
                                        <th class="text-center">Total Received Applications</th>
                                        <th class="text-center">Total Pending Applications</th>
                                        
                                        <th class="text-center">Total Canada Applications </th>
                                        <th class="text-center">Total UK Applications</th>
                                        <th class="text-center">Total AUS Applications</th>
                                        <th class="text-center">Total Canada Payments</th>
                                        <th class="text-center">Total UK Payments</th>
                                        <th class="text-center">Total AUS Payments</th>
                                        <th class="text-center">Total Canada Offers</th>
                                        <th class="text-center">Total UK Offers</th>
                                        <th class="text-center">Total AUS Offers</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($totalDataReports as $totalDataReport)
                                    
                                    <tr>
                                        <td class="text-center bg-success bg-succes">
                                            @if($totalDataReport->teamreportId)
                                            <div class="">{{$totalDataReport->teamreportId['id']}}</div>
                                            @endif
                                        </td>
                                        <td class="text-center bg-success bg-succes">
                                            <div class="">{{$totalDataReport['date']}}</div>
                                        </td>
                                        <td class="text-center bg-success bg-succes">
                                            <div class="">{{$totalDataReport['total_calls']}}</div>
                                        </td>
                                        <td class="text-center bg-success bg-succes">
                                            <div class="">{{$totalDataReport['total_emails']}}</div>
                                        </td>
                                        <td class="text-center {{($totalDataReport['total_received_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$totalDataReport['total_received_applications']}}</div>
                                        </td>
                                        <td class="text-center {{($totalDataReport['total_pending_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$totalDataReport['total_pending_applications']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($totalDataReport['total_canada_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$totalDataReport['total_canada_applications']}}</div>
                                        </td>
                                        <td class="text-center {{($totalDataReport['total_uk_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$totalDataReport['total_uk_applications']}}</div>
                                        </td>
                                        <td class="text-center {{($totalDataReport['total_aus_applications']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$totalDataReport['total_aus_applications']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($totalDataReport['total_canada_payments']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$totalDataReport['total_canada_payments']}}</div>
                                        </td>
                                        <td class="text-center {{($totalDataReport['total_uk_payments']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$totalDataReport['total_uk_payments']}}</div>
                                        </td>
                                        <td class="text-center {{($totalDataReport['total_aus_payments']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$totalDataReport['total_aus_payments']}}</div>
                                        </td>
                                        
                                        <td class="text-center {{($totalDataReport['total_canada_offers']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$totalDataReport['total_canada_offers']}}</div>
                                        </td>
                                        <td class="text-center {{($totalDataReport['total_uk_offers']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$totalDataReport['total_uk_offers']}}</div>
                                        </td>
                                        <td class="text-center {{($totalDataReport['total_aus_offers']) ?  'bg-success bg-succes' : 'bg-danger bg-dnger'}}">
                                            <div class="">{{$totalDataReport['total_aus_offers']}}</div>
                                        </td>
                                        
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <h3>Attendance</h3>
                            <p>Coming Soon</p>
                        </div>
                    </div>
                    @else
                    <div>
                        <form method="POST" action="{{route('teamreport.store')}}">
                            @csrf
                            <table class="align-middle text-truncate mb-0 table table-borderless cell-border table-hover" >
                            @if(auth()->user()->roles[0]['name'] == 'preprocess' || auth()->user()->roles[0]['name'] == 'process')
                                <thead>
                                    <tr>
                                        <th class="text-center">Received Applications </th>
                                        <th class="text-center">Canada Applications </th>
                                        <th class="text-center">UK Applications</th>
                                        <th class="text-center">AUS Applications</th>
                                        @if(auth()->user()->roles[0]['name'] == 'preprocess')
                                        <th class="text-center">Canada Payments</th>
                                        <th class="text-center">UK Payments</th>
                                        <th class="text-center">AUS Payments</th>
                                        
                                        <th class="text-center">Canada Offers</th>
                                        <th class="text-center">UK Offers</th>
                                        <th class="text-center">AUS Offers</th>
                                        
                                        @endif
                                        <th class="text-center">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="received_applications" value="{{$todayData['received_applications']}}" class="form-control" ></div>
                                        </td>
                                        
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="canada_applications" value="{{$todayData['canada_applications']}}" class="form-control" ></div>
                                        </td>
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="uk_applications" value="{{$todayData['uk_applications']}}" class="form-control" ></div>
                                        </td>
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="aus_applications" value="{{$todayData['aus_applications']}}" class="form-control" ></div>
                                        </td>
                                        
                                        @if(auth()->user()->roles[0]['name'] == 'preprocess')
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="canada_payments" value="{{$todayData['canada_payments']}}" class="form-control" ></div>
                                        </td>
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="uk_payments" value="{{$todayData['uk_payments']}}" class="form-control" ></div>
                                        </td>
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="aus_payments" value="{{$todayData['aus_payments']}}" class="form-control" ></div>
                                        </td>
                                        
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="canada_offers" value="{{$todayData['canada_offers']}}" class="form-control" ></div>
                                        </td>
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="uk_offers" value="{{$todayData['uk_offers']}}" class="form-control" ></div>
                                        </td>
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="aus_offers" value="{{$todayData['aus_offers']}}" class="form-control" ></div>
                                        </td>
                                        
                                        @endif
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="text" name="remarks" value="{{$todayData['remarks']}}" class="form-control" ></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif

                            @if(auth()->user()->roles[0]['name'] == 'account manager')
                                <thead>
                                    <tr>
                                        <th class="text-center">Calls</th>
                                        <th class="text-center">Emails </th>
                                        <th class="text-center">Canada Applications </th>
                                        <th class="text-center">UK Applications</th>
                                        <th class="text-center">AUS Applications</th>
                                        
                                        <th class="text-center">Canada Payments</th>
                                        <th class="text-center">UK Payments</th>
                                        <th class="text-center">AUS Payments</th>
                                        
                                        <th class="text-center">Canada Offers</th>
                                        <th class="text-center">UK Offers</th>
                                        <th class="text-center">AUS Offers</th>
                                        
                                        <th class="text-center">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="calls" value="{{$todayData['calls']}}" class="form-control" ></div>
                                        </td>
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="emails" value="{{$todayData['emails']}}" class="form-control" ></div>
                                        </td>
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="canada_applications" value="{{$todayData['canada_applications']}}" class="form-control" ></div>
                                        </td>
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="uk_applications" value="{{$todayData['uk_applications']}}" class="form-control" ></div>
                                        </td>
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="aus_applications" value="{{$todayData['aus_applications']}}" class="form-control" ></div>
                                        </td>
                                        
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="canada_payments" value="{{$todayData['canada_payments']}}" class="form-control" ></div>
                                        </td>
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="uk_payments" value="{{$todayData['uk_payments']}}" class="form-control" ></div>
                                        </td>
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="aus_payments" value="{{$todayData['aus_payments']}}" class="form-control" ></div>
                                        </td>
                                        
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="canada_offers" value="{{$todayData['canada_offers']}}" class="form-control" ></div>
                                        </td>
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="uk_offers" value="{{$todayData['uk_offers']}}" class="form-control" ></div>
                                        </td>
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="number" name="aus_offers" value="{{$todayData['aus_offers']}}" class="form-control" ></div>
                                        </td>
                                        
                                        <td class="text-center">
                                            <div class=" badge-warning"><input type="text" name="remarks" value="{{$todayData['remarks']}}" class="form-control" ></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif
                            @if(auth()->user()->roles[0]['name'] == 'shortlisting')
                            <thead>
                                <tr>
                                    <th class="text-center">Received Applications </th>
                                    <th class="text-center">Canada Applications </th>
                                    <th class="text-center">UK Applications</th>
                                    <th class="text-center">AUS Applications</th>
                                    
                                    <th class="text-center">Pending Applications</th>
                                    <th class="text-center">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        <div class=" badge-warning"><input type="number" name="received_applications" value="{{$todayData['received_applications']}}" class="form-control" ></div>
                                    </td>
                                    <td class="text-center">
                                        <div class=" badge-warning"><input type="number" name="canada_applications" value="{{$todayData['canada_applications']}}" class="form-control" ></div>
                                    </td>
                                    <td class="text-center">
                                        <div class=" badge-warning"><input type="number" name="uk_applications" value="{{$todayData['uk_applications']}}" class="form-control" ></div>
                                    </td>
                                    <td class="text-center">
                                        <div class=" badge-warning"><input type="number" name="aus_applications" value="{{$todayData['aus_applications']}}" class="form-control" ></div>
                                    </td>
                                    
                                    <td class="text-center">
                                        <div class=" badge-warning"><input type="number" name="pending_applications" value="{{$todayData['pending_applications']}}" class="form-control" ></div>
                                    </td>
                                    <td class="text-center">
                                        <div class=" badge-warning"><input type="text" name="remarks" value="{{$todayData['remarks']}}" class="form-control" ></div>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                            @endif
                            <button class="btn btn-primary mt-3" style="background: linear-gradient(#e77817, #D80D05);border-color: #e35712;" >Submit Report</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(auth()->user()->roles[0]['name'] == 'preprocess' || auth()->user()->roles[0]['name'] == 'process')
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Daily Report &nbsp;
                    <!-- <span class="float-right">
                        <a href="{{route('studentfiles.create')}}" class="btn btn-sm btn-success">Apply New Student File</a>
                        </span> -->
                    <span class="float-right">
                        <!-- <a href="{{route('studentfiles.index')}}" class="btn btn-sm btn-danger float-right">Back</a> -->
                    </span>
                </div>
                <div class="card-body">
                    <div class="mt-3">
                        <table data-order='[[ 0, "desc" ]]' class="align-middle text-truncate mb-0 table table-borderless cell-border table-hover tableID" >
                            <thead>
                                <tr>
                                    <th class="text-center">#id</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Received Applications </th>
                                    <th class="text-center">Canada Applications </th>
                                    <th class="text-center">UK Applications</th>
                                    <th class="text-center">AUS Applications</th>
                                    
                                    @if(auth()->user()->roles[0]['name'] == 'preprocess')
                                    <th class="text-center">Canada Payments</th>
                                    <th class="text-center">UK Payments</th>
                                    <th class="text-center">AUS Payments</th>
                                    
                                    <th class="text-center">Canada Offers</th>
                                    <th class="text-center">UK Offers</th>
                                    <th class="text-center">AUS Offers</th>
                                    
                                    @endif
                                    <th class="text-center">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teamReports as $teamReport)
                                <tr>
                                    <td class="text-center">
                                        <div class="badge badge-pill badge-warning">{{$teamReport['id']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-pill badge-warning">{{$teamReport['date']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['received_applications']}}</div>
                                    </td>
                                    
                                    <td class="text-center">
                                        <div class="">{{$teamReport['canada_applications']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['uk_applications']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['aus_applications']}}</div>
                                    </td>
                                    
                                    @if(auth()->user()->roles[0]['name'] == 'preprocess')
                                    <td class="text-center">
                                        <div class="">{{$teamReport['canada_payments']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['uk_payments']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['aus_payments']}}</div>
                                    </td>
                                    
                                    <td class="text-center">
                                        <div class="">{{$teamReport['canada_offers']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['uk_offers']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['aus_offers']}}</div>
                                    </td>
                                    
                                    @endif
                                    <td class="text-center">
                                        <div class="">{{$teamReport['remarks']}}</div>
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
    @endif 
    @if(auth()->user()->roles[0]['name'] == 'account manager')
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Daily Report &nbsp;
                    <!-- <span class="float-right">
                        <a href="{{route('studentfiles.create')}}" class="btn btn-sm btn-success">Apply New Student File</a>
                        </span> -->
                    <span class="float-right">
                        <!-- <a href="{{route('studentfiles.index')}}" class="btn btn-sm btn-danger float-right">Back</a> -->
                    </span>
                </div>
                <div class="card-body">
                    <div class="mt-3">
                        <table data-order='[[ 0, "desc" ]]' class="align-middle text-truncate mb-0 table table-borderless cell-border table-hover tableID" >
                            <thead>
                                <tr>
                                    <th class="text-center">#id</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Calls</th>
                                    <th class="text-center">Emails </th>
                                    <th class="text-center">Canada Applications </th>
                                    <th class="text-center">UK Applications</th>
                                    <th class="text-center">AUS Applications</th>
                                    
                                    <th class="text-center">Canada Payments</th>
                                    <th class="text-center">UK Payments</th>
                                    <th class="text-center">AUS Payments</th>
                                    
                                    <th class="text-center">Canada Offers</th>
                                    <th class="text-center">UK Offers</th>
                                    <th class="text-center">AUS Offers</th>
                                    
                                    <th class="text-center">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teamReports as $teamReport)
                                <tr>
                                    <td class="text-center">
                                        <div class="badge badge-pill badge-warning">{{$teamReport['id']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-pill badge-warning">{{$teamReport['date']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['calls']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['emails']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['canada_applications']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['uk_applications']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['aus_applications']}}</div>
                                    </td>
                                    
                                    <td class="text-center">
                                        <div class="">{{$teamReport['canada_payments']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['uk_payments']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['aus_payments']}}</div>
                                    </td>
                                    
                                    <td class="text-center">
                                        <div class="">{{$teamReport['canada_offers']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['uk_offers']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['aus_offers']}}</div>
                                    </td>
                                   
                                    <td class="text-center">
                                        <div class="">{{$teamReport['remarks']}}</div>
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
    @endif                      
    @if(auth()->user()->roles[0]['name'] == 'shortlisting')
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Daily Report &nbsp;
                    <!-- <span class="float-right">
                        <a href="{{route('studentfiles.create')}}" class="btn btn-sm btn-success">Apply New Student File</a>
                        </span> -->
                    <span class="float-right">
                        <!-- <a href="{{route('studentfiles.index')}}" class="btn btn-sm btn-danger float-right">Back</a> -->
                    </span>
                </div>
                <div class="card-body">
                    <div class="mt-3">
                        <table data-order='[[ 0, "desc" ]]' class="align-middle text-truncate mb-0 table table-borderless cell-border table-hover tableID" >
                            <thead>
                                <tr>
                                    <th class="text-center">#id</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Received Applications</th>
                                    <th class="text-center">Canada Applications </th>
                                    <th class="text-center">UK Applications</th>
                                    <th class="text-center">AUS Applications</th>
                                    
                                    <th class="text-center">Pending Applications</th>
                                    <th class="text-center">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teamReports as $teamReport)
                                <tr>
                                    <td class="text-center">
                                        <div class="badge badge-pill badge-warning">{{$teamReport['id']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-pill badge-warning">{{$teamReport['date']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['received_applications']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['canada_applications']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['uk_applications']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['aus_applications']}}</div>
                                    </td>
                                    
                                    <td class="text-center">
                                        <div class="">{{$teamReport['pending_applications']}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">{{$teamReport['remarks']}}</div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif    
</div>
@if(auth()->user()->roles[0]['name'] != 'super')
@if(!$todayData)
<button type="button" class="btn btn-primary hide openPop " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<div class="modal fade mt-5 mb-5 pb-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog mb-5" role="document">
        @if(auth()->user()->roles[0]['name'] == 'account manager')
        <div class="modal-content mb-5" style="min-width: 600px;">
            <form method="POST" action="{{route('teamreport.store')}}">
                @csrf
                <div class="modal-header bg-white" >
                    <h5 class="modal-title" id="exampleModalLabel">Daily Report &nbsp; <i class="fa fa-file-invoice"></i> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="number" name="uk_applications" class="form-control" placeholder="UK applications" >
                            <input type="number" name="uk_offers" class="form-control" placeholder="UK offers" >
                            <input type="number" name="uk_payments" class="form-control" placeholder="UK payments" >
                            <input type="number" name="emails" class="form-control" placeholder="emails" >
                            
                        </div>
                        <div class="col-md-4">
                            <input type="number" name="canada_applications" class="form-control" placeholder="Canada applications">
                            <input type="number" name="canada_offers" class="form-control" placeholder="Canada offers" >
                            <input type="number" name="canada_payments" class="form-control" placeholder="Canada payments">
                            
                            <input type="number" name="calls" class="form-control" placeholder="calls">
                        </div>
                        <div class="col-md-4">
                            <input type="number" name="aus_applications" class="form-control" placeholder="AUS applications">
                            <input type="number" name="aus_offers" class="form-control" placeholder="AUS offers" >
                            <input type="number" name="aus_payments" class="form-control" placeholder="AUS payments" >
                            
                            <input type="text" name="remarks" class="form-control" placeholder="Remarks" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-danger nav-tab-toogle" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="background: linear-gradient(#e77817, #D80D05);border-color: #e35712;">Submit</button>
                </div>
            </form>
        </div>
        <!-- shortlisting -->
        @endif
        @if(auth()->user()->roles[0]['name'] == 'shortlisting')
        <div class="modal-content mb-5" style="min-width: 600px;">
            <form method="POST" action="{{route('teamreport.store')}}">
                @csrf
                <div class="modal-header bg-white" >
                    <h5 class="modal-title" id="exampleModalLabel">Daily Report &nbsp; <i class="fa fa-file-invoice"></i> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="number" name="canada_applications" class="form-control" placeholder="Canada applications">
                            <input type="number" name="uk_applications" class="form-control" placeholder="UK applications" >
                            <input type="number" name="aus_applications" class="form-control" placeholder="AUS applications">
                            
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="received_applications" class="form-control" placeholder="Received applications" >
                            <input type="number" name="pending_applications" class="form-control" placeholder="Pending applications">
                            <input type="text" name="remarks" class="form-control" placeholder="Remarks" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-danger nav-tab-toogle" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="background: linear-gradient(#e77817, #D80D05);border-color: #e35712;">Submit</button>
                </div>
            </form>
        </div>
        @endif 
        @if(auth()->user()->roles[0]['name'] == 'preprocess' || auth()->user()->roles[0]['name'] == 'process')

        <div class="modal-content mb-5" style="min-width: 600px;">
            <form method="POST" action="{{route('teamreport.store')}}">
                @csrf
                <div class="modal-header bg-white" >
                    <h5 class="modal-title" id="exampleModalLabel">Daily Report &nbsp; <i class="fa fa-file-invoice"></i> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="number" name="canada_applications" class="form-control" placeholder="Canada applications">
                            @if(auth()->user()->roles[0]['name'] == 'preprocess')
                            <input type="number" name="canada_payments" class="form-control" placeholder="Canada payments">
                            
                            <input type="number" name="canada_offers" class="form-control" placeholder="Canada offers" >
                            @endif
                            <input tyspe="number" name="received_applications" class="form-control" placeholder="Received applications" >
                        </div>
                        <div class="col-md-4">
                            <input type="number" name="uk_applications" class="form-control" placeholder="UK applications" >
                            @if(auth()->user()->roles[0]['name'] == 'preprocess')
                            <input type="number" name="uk_payments" class="form-control" placeholder="UK payments" >
                            <input type="number" name="uk_offers" class="form-control" placeholder="UK offers" >
                            @endif
                            
                        </div>
                        <div class="col-md-4">
                            <input type="number" name="aus_applications" class="form-control" placeholder="AUS applications">
                            @if(auth()->user()->roles[0]['name'] == 'preprocess')
                            <input type="number" name="aus_payments" class="form-control" placeholder="AUS payments" >
                            <input type="number" name="aus_offers" class="form-control" placeholder="AUS offers" >
                            @endif
                            <input type="text" name="remarks" class="form-control" placeholder="Remarks" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-danger nav-tab-toogle" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="background: linear-gradient(#e77817, #D80D05);border-color: #e35712;">Submit</button>
                </div>
            </form>
        </div>
        @endif



    </div>
</div>
@endif
@endif
@endsection
@section('addjavascript')
<script >
    $(document).ready(function(){

    $(document).on('click','.nav-tab-toogle',function(){
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    });
    });
</script>
<script src="{{ asset('js/app.js') }}" ></script>
<script >
    $(document).ready(function(){
       $('.openPop').click(); 
       $('.modal-backdrop').css('position','inherit');
       setTimeout(function(){$('.modal-backdrop').css('position','inherit');},1000);
    });
    
    
    
</script>
@endsection