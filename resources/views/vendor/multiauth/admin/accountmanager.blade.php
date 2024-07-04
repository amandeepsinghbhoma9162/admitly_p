<style type="text/css">
    .bg-arielle-gray{
        background-image: radial-gradient(circle 248px at center,#9ea2a2 0%,#888b8c 47%,#626263 100%)!important;
    }
    .bg-arielle-org{
        background-image: radial-gradient(circle 248px at center,#e34f16 0%,#ec9830 47%,#f78b46 100%)!important;
    }
</style>
<div class="app-main__inner dashboard">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-notebook icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>
                    <!-- <bgsound src="your-sound.mp3" loop="false"> -->
                    Dashboard
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
          
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-blooms background">
                <div class="widget-content-wrapper text-whites">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Students</div>
                        <!-- <div class="widget-subheading"><small>GLOBAL</small></div> -->
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-whites"><span>{{$students->count()}}</span></div>
                    </div>
                </div>
                <a href="{{route('studentfiles.index')}}">
                <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-blooms background">
                <div class="widget-content-wrapper text-whites">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Applications</div>
                        <div class="widget-subheading"><small>Programs selected by {{$students->count()}} students</small></div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-whites"><span>{{sizeof($submittedFiles)}}</span></div>
                    </div>
                </div>
                <a href="{{route('application.index')}}">
                <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smiles background">
                <div class="widget-content-wrapper text-whites">
                    <div class="widget-content-left">
                        <div class="widget-heading">New Applications</div>
                        <div class="widget-subheading"><small>Applications on first stage</small></div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-whites"><span>{{sizeof($newApplications)}}</span></div>
                    </div>
                </div>
                <a href="{{route('status.applicatons.list',base64_encode(1))}}">
                <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                </a>
            </div>
        </div>
       
       
    </div>
    <!-- <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-blooms background">
                <div class="widget-content-wrapper text-whites">
                    <div class="widget-content-left">
                        <div class="widget-heading">Rejected Applications</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-whites"><span>{{$rejectedApplications->count()}}</span></div>
                    </div>
                </div>
                <a href="{{route('status.applicatons.list',base64_encode(12))}}">
                <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-earlys background">
                <div class="widget-content-wrapper text-whites">
                    <div class="widget-content-left">
                        <div class="widget-heading">Processed </div>
                        <div class="widget-subheading"><small>Applications</small></div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-whites"><span>{{$processedApplications->count()}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div> -->
   
       
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Agents</div>
                            <!-- <div class="widget-subheading">India, China, Nepal</div> -->
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-successs">{{$agents->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Activated Agents</div>
                            <!-- <div class="widget-subheading">Sep 2019 intake</div> -->
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warnings">{{$activeAgents->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Deactivated Agent</div>
                            <!-- <div class="widget-subheading">Fee Paid</div> -->
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-dangers">{{$deActiveAgents->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Pending Final Submission</div>
                            <!-- <div class="widget-subheading">India, China, Nepal</div> -->
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-successs">{{sizeof($notSubmittedFiles)}}</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('pending.final.submit')}}">
                    <i class="pe-7s-exapnd2" style="color:black;position:absolute;right:2px;top:2px;front-size:17px;"></i></a>
            </div>
        </div>
        
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Active Agents</div>
                            <!-- <div class="widget-subheading">Sep 2019 intake</div> -->
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warnings">{{$activeAgentsLogs->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Inactive Agents</div>
                            <!-- <div class="widget-subheading">Fee Paid</div> -->
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-dangers">{{(int)$InactiveAgentsLogs->count() + (int)$InactiveAgentsNull->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Income</div>
                            <div class="widget-subheading">Expected totals</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-focus">$147</div>
                        </div>
                    </div>
                    <div class="widget-progress-wrapper">
                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                        </div>
                        <div class="progress-sub-label">
                            <div class="sub-label-left">Expenses</div>
                            <div class="sub-label-right">100%</div>
                        </div>
                    </div>
                </div>
            </div>
            </div> -->
    </div>
    <div class="row">
        
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Students for shortlisting</div>
                            <!-- <div class="widget-subheading">Fee Paid</div> -->
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-dangers">{{$totalStudentForShortlist->count()}}</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('total.application.Shortlist')}}">
                <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Pending Students for shortlisting</div>
                            <!-- <div class="widget-subheading">Fee Paid</div> -->
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-dangers">{{sizeof($pendingShortlistStudent)}}</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('application.Shortlist')}}">
                <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Today Students for shortlisting</div>
                            <!-- <div class="widget-subheading">Fee Paid</div> -->
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-dangers">{{sizeof($todayTotalShortlistStudent)}}</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('today.application.Shortlist')}}">
                <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Today shortlisted</div>
                            <!-- <div class="widget-subheading">Fee Paid</div> -->
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-dangers">{{sizeof($todayTotalShortlisted)}}</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('today.Shortlisted')}}">
                <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                </a>
            </div>
        </div>
    </div>
   
</div>