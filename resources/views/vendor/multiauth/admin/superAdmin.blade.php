<div class="app-main__inner dashboard">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-notebook icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div class="section-header" style="padding-bottom: 0px!important;">
                    <h2 style="margin-bottom: 0px!important; padding-bottom: 0px!important; color: #7bab66!important;font-weight: 700!important;">Dashboard</h2>
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-8">
            <div class="bg-white p-3">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="row">
                <div class="widget-tabs-int widgetbox sm-res-mg-t-30 tb-res-mg-t-30 tb-res-ds-n dk-res-ds">
                    <div class="contact-hd tm-activity">
                        <h2 style="font-weight: 700!important;"><span  class="theme-gradient">Student</span> Activity</h2>
                        <p>Applications applied by recruiters on portal. </p>
                    </div>
                    <div class="widget-tabs-list">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home" aria-expanded="true" class="">Students</a></li>
                            <li class=""><a data-toggle="tab" href="#menu1" aria-expanded="false">Converstions</a></li>
                            <li class=""><a data-toggle="tab" href="#menu2" aria-expanded="false">Today</a></li>
                        </ul>
                        <div class="tab-content scrollbar-colored">
                            <div id="home" class="tab-pane fade active in show">
                                <div class="tab-wd-img">
                                    <img src="img/widgets/6.png" alt="">
                                </div>
                                <div class="tab-ctn " >
                                    <p>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content bg-midnight-blooms background">
                                            <div class="widget-content-wrapper text-whites">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Total Students</div>
                                                    <!-- <div class="widget-subheading"><small>GLOBAL</small></div> -->
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-whites" style="color: black;"><span>{{$students->count()}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('studentfiles.index')}}">
                                            <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content bg-midnight-blooms background">
                                            <div class="widget-content-wrapper text-whites">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Total Applications</div>
                                                    <div class="widget-subheading"><small id="totalApplicationSubhead">Programs selected by {{$students->count()}} students</small></div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-whites" style="color: black;"><span id="totalApplication">{{sizeof($submittedFiles)}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('application.index')}}">
                                            <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content bg-arielle-smiles background">
                                            <div class="widget-content-wrapper text-whites">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">New Applications</div>
                                                    <div class="widget-subheading"><small>Applications on first stage</small></div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-whites" style="color: black;"><span id="newApplications">{{sizeof($newApplications)}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('status.applicatons.list',base64_encode(1))}}">
                                            <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content bg-premium-darks ">
                                            <div class="widget-content-wrapper text-whites">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Applications sent to university</div>
                                                    <div class="widget-subheading"><small>Applications sent to university (offers not recieved) </small></div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-whites" style="color: black;"><span id="applicationsSentToUni">{{sizeof($applicationsSentToUni)}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('status.applicatons.list',base64_encode(2))}}">
                                            <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Pending Students for shortlisting</div>
                                                        <!-- <div class="widget-subheading">Fee Paid</div> -->
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-dangers" id="pendingStudentForShortlist">{{sizeof($pendingShortlistStudent)}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{route('application.Shortlist')}}">
                                            <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Pending Final Submission</div>
                                                        <!-- <div class="widget-subheading">India, China, Nepal</div> -->
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-successs" id="pendingFinalSubmit">{{sizeof($notSubmittedFiles)}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{route('pending.final.submit')}}">
                                            <i class="pe-7s-exapnd2" style="color:black;position:absolute;right:2px;top:2px;front-size:17px;"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content bg-arielle-orgs background">
                                            <div class="widget-content-wrapper text-whites">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Not Eligible</div>
                                                    <!-- <div class="widget-subheading"><small>Rejected VISAS: {{$visaDisApproved->count()}}</small></div> -->
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-whites" style="color: black;"><span id="notEligible">{{$notEligible->count()}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('status.applicatons.list',base64_encode(13))}}">
                                            <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="tab-wd-img">
                                    <img src="img/widgets/2.png" alt="">
                                </div>
                                <div class="tab-ctn">
                                    <p> 
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content bg-premium-darks background">
                                            <div class="widget-content-wrapper text-whites">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Conditional Offer Letter</div>
                                                    <!-- <div class="widget-subheading">Revenue streams</div> -->
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-warnings" style="color: black;"><span id="conditionalOfferLetter">{{$applicationsconditioOfferUpload->count()}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('status.applicatons.list',base64_encode(3))}}">
                                            <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content bg-premium-darks background">
                                            <div class="widget-content-wrapper text-whites">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Unconditional Offer Letter</div>
                                                    <!-- <div class="widget-subheading">Revenue streams</div> -->
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-warnings" style="color: black;"><span id="UnconditionalOfferLetter">{{$applicationsUnconditioOfferUpload->count()}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('status.applicatons.list',base64_encode(4))}}">
                                            <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content bg-arielle-grays background">
                                            <div class="widget-content-wrapper text-whites">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">TT Paid</div>
                                                    <!-- <div class="widget-subheading"><small>GLOBAL</small></div> -->
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-whites" style="color: black;"><span id="ttpaidId">{{$ttpaid->count()}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('status.applicatons.list',base64_encode(5))}}">
                                            <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content bg-arielle-grays background">
                                            <div class="widget-content-wrapper text-whites">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Provide CAS Request</div>
                                                    <!-- <div class="widget-subheading"><small>GLOBAL</small></div> -->
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-whites" style="color: black;"><span id="casId">{{$provideCAS->count()}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('status.applicatons.list',base64_encode(9))}}">
                                            <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content bg-arielle-grays background">
                                            <div class="widget-content-wrapper text-whites">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">CAS Issued</div>
                                                    <!-- <div class="widget-subheading"><small>GLOBAL</small></div> -->
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-whites" style="color: black;"><span id="casIssuedId">{{$casIssued->count()}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('status.applicatons.list',base64_encode(9))}}">
                                            <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content bg-arielle-orgs background">
                                            <div class="widget-content-wrapper text-whites">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Approved VISAS</div>
                                                    <!-- <div class="widget-subheading"><small>Rejected VISAS: {{$visaDisApproved->count()}}</small></div> -->
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-whites" style="color: black;"><span id="visaDisAprv">{{$visaApproved->count()}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('status.applicatons.list',base64_encode(10))}}">
                                            <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade ">
                                <div class="tab-wd-img">
                                    <img src="img/widgets/4.png" alt="">
                                </div>
                                <div class="tab-ctn">
                                    <p>
                                    <div class="col-md-6 col-xl-12">
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
                                            <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
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
                                            <a href="{{route('today.application.Shortlist')}}">
                                            <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Today Students</div>
                                                        <!-- <div class="widget-subheading">Sep 2019 intake</div> -->
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-warnings">{{$todayApplied->count()}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{route('today.application.Shortlist')}}">
                                            <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Applications sent to uni Today</div>
                                                        <!-- <div class="widget-subheading">Fee Paid</div> -->
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-dangers">{{$todaySentToUni->count()}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{route('application.today.applyToUni')}}">
                                            <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Total Students for shortlisting</div>
                                                        <!-- <div class="widget-subheading">Fee Paid</div> -->
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-dangers" id="toTalStudentForShortlist">{{$totalStudentForShortlist->count()}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{route('total.application.Shortlist')}}">
                                            <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="row">
                <div class="widget-tabs-int widgetbox2 sm-res-mg-t-30 tb-res-mg-t-30 tb-res-ds-n dk-res-ds">
                    <div class="contact-hd tm-activity">
                        <h2 class="text-center" style="font-weight: 700!important;"><span  class="theme-gradient">Recruiter</span> Activity</h2>
                        <p class="text-center">Registerd recruiters with Admitly AI portal. </p>
                    </div>
                    <div class="widget-tabs-list">
                        <div class="tab-content scrollbar-colored2">
                            <div id="home" class="tab-pane fade active in show">
                                <div class="tab-ctn " >
                                    <p>
                                    <div class="col-md-6 col-xl-12">
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
                                    <div class="col-md-6 col-xl-12">
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
                                    <div class="col-md-6 col-xl-12">
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
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">New Agents Registered Today </div>
                                                        <div class="widget-subheading"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-successs">{{$newRegAgents->count()}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
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
                                    <div class="col-md-6 col-xl-12">
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
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-8">
            <div class="bg-white p-3">
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>
    <br>
    
    <div class="row">
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-6">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title" style="color: #7bab66!important">
                        <i class="fa fa-university" aria-hidden="true" style="font-size: 25px"></i> &nbsp;
                        <h3 style="font-weight: 700!important; margin-top: 10px;"><span  class="theme-gradient">University</span> Applications</h3>
                    </div>
                    <ul class="nav">
                        <!-- <li class="nav-item"><a href="javascript:void(0);" class="active nav-link">Last</a></li> -->
                        <!-- <li class="nav-item"><a href="javascript:void(0);" class="nav-link second-tab-toggle">Current</a></li> -->
                    </ul>
                </div>
                <div class="card-body" style="padding:0px;">
                    <div class="tab-content" style="font-size: 15px!important;">
                        <div class="tab-pane fade show active" id="tabs-eg-77">
                            <div class="" style="padding:10px;overflow-y: scroll;height: 400px;" >
                                <div class="scrollbar-container">
                                    <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                        @foreach($fileds as $file)
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img width="42" class="rounded-circle" src="assets/images/avatars/9.jpg" alt="">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">
                                                            @if($file->college)
                                                            @if($file->college)
                                                            {{$file->college['name']}}
                                                            @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-right ">
                                                        <div class="font-size-xlg text-muted">
                                                            <small class="opacity-5 pr-1"></small>
                                                            @if($file->college)
                                                            <span style="color: black!important;">{{$file['total']}}</span>
                                                            &nbsp;
                                                            <i class="pe-7s-graph1 icon-gradient bg-mean-fruit" style="border: 1px solid;padding: 3px 8px;font-size: 20px;border-radius: 5px; color: #7862a2!important;"></i>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title" style="color: #7bab66!important">
                        <i class="fa fa-users" aria-hidden="true" style="font-size: 25px"></i> &nbsp;
                        <h3 style="font-weight: 700!important; margin-top: 10px;"><span  class="theme-gradient">Agent</span> Applications</h3>
                    </div>
                    <ul class="nav">
                        <!-- <li class="nav-item"><a href="javascript:void(0);" class="active nav-link">Last</a></li> -->
                        <!-- <li class="nav-item"><a href="javascript:void(0);" class="nav-link second-tab-toggle">Current</a></li> -->
                    </ul>
                </div>
                <div class="card-body" style="padding:0px;">
                    <div class="tab-content" style="font-size: 15px!important;">
                        <div class="tab-pane fade show active" id="tabs-eg-77">
                            <div class="" style="padding:10px;overflow-y: scroll;height: 400px;" >
                                <div class="scrollbar-container">
                                    <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                        @foreach($agentApplications as $key=> $agentApplication)
                                        <li class="list-group-item mb-2">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img width="42" class="rounded-circle" src="assets/images/avatars/9.jpg" alt="">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">
                                                            @if(!$agentApplication['agent_id'])
                                                            <b>Students</b>
                                                            @endif
                                                            @if($agentApplication)
                                                            <div>{{$agentApplication->agent['name']}}</div>
                                                            <small>{{$agentApplication->agent['company_name']}}</small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="font-size-xlg text-muted ">
                                                            <small class="opacity-5 pr-1"></small>
                                                            @if($agentApplication)
                                                            <span style="color: black!important;">{{$agentApplication['total']}}</span>
                                                            &nbsp;
                                                            <i class="pe-7s-graph icon-gradient bg-mean-fruit" style="font-size: 28px; style="color: #7862a2!important;"></i>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>
<!-- end -->
