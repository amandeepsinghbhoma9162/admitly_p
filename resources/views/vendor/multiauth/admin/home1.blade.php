@extends('admin.layouts.admin') 
@section('content')
<?php
    $user = auth('admin')->user()->roles()->pluck('name');
?>

<style type="text/css">
    .bg-arielle-gray{
    background-image: radial-gradient(circle 248px at center,#9ea2a2 0%,#888b8c 47%,#626263 100%)!important;
    }
    .bg-arielle-org{
    background-image: radial-gradient(circle 248px at center,#e34f16 0%,#ec9830 47%,#f78b46 100%)!important;
    }
    .sale-statistic-inner, .statistic-right-area, .email-statis-inner, .recent-post-wrapper, .blog-inner-list, .realtime-wrap, .add-todo-list, .notika-chat-list, .recent-signup-inner, .ongoing-task-inner, .contact-inner, .contact-form, .widget-tabs-int, .visitor-sv-tm-int, .search-engine-int, .alert-inner, .color-wrap, .wizard-wrap-int, .dropdown-list, .modals-list, .accordion-wn-wp, .tooltips-inner, .popovers-list, .typography-list, .typography-heading, .typography-inline-pro, .tpgp-helper, .contact-list, .inbox-left-sd, .inbox-text-list, .view-mail-list, .normal-table-list, .data-table-list, .form-element-list, .range-slider-wrap, .datepicker-int, .colorpicker-int, .summernote-wrap, .dropdone-nk, .form-example-wrap, .invoice-wrap, .google-map-single, .data-map-single, .image-cropper-wp, .nk-cd-ed-wp, .bar-chart-wp, .line-chart-wp, .area-chart-wp, .flot-chart-wp, .wb-traffic-inner, .notika-icon-int {
    padding: 20px;
    background: #fff;
}
::selection {
    background: #b3d4fc;
    text-shadow: none;
}
.widget-tabs-list {
    margin-top: 15px;
}
.nav-tabs {
    border-bottom: 1px solid #ddd;
}
.nav {
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}
.nav-tabs>li {
    float: left;
    margin-bottom: -1px;
}
.nav>li {
    position: relative;
    display: block;
}
.widget-tabs-list .nav.nav-tabs>li>a {
    padding: 8px 15px;
}
.widget-tabs-list .nav-tabs>li.active>a, .widget-tabs-list .nav-tabs>li.active>a:focus, .widget-tabs-list .nav-tabs>li.active>a:hover {
    border: 0 solid #ddd;
    color: #fff;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #555;
    cursor: default;
    background-color: #ed3d0b!important;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
}
.nav-tabs>li>a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
.nav>li>a {
    position: relative;
    display: block;
    padding: 10px 15px;
}
a {
    transition: all .3s ease 0s;
    text-decoration: none;
}
.widget-tabs-list .nav-tabs:not([data-tab-color])>li>a:after, .wizard-cts-st .nav.nav-pills:not([data-tab-color])>li>a:after {
    background: #00c292;
}
.widget-tabs-list .nav-tabs li>a:after {
    bottom: 0;
}

.widget-tabs-list .nav-tabs li>a:after, .wizard-cts-st .nav.nav-pills>li>a:after {
    height: 2px;
    position: absolute;
    width: 100%;
    -webkit-transition: all;
    -o-transition: all;
    transition: all;
    -webkit-transition-duration: 250ms;
    transition-duration: 250ms;
    -webkit-transform: scale(0);
    -ms-transform: scale(0);
    -o-transform: scale(0);
    transform: scale(0);
}
.widget-tabs-int{
    width: 100%;
}
.scrollbar-colored {
            scrollbar-color: red green!important;
            height: 300px;
            overflow-y: scroll;
        }
.scrollbar-colored::-webkit-scrollbar-track {
    background: #971c1c;
        }
.scrollbar-colored::-webkit-scrollbar-thumb {
    height: 20px;
    background: #7e2323;
}
.widgetbox{
    border-radius: 15px;
    background: #fafafa;
    box-shadow: -1px 0px 11px #8473c126;;
}
.widgetbox2{
    border-radius: 15px;
    background: #fafafa;
    box-shadow: -1px 0px 11px #8473c126;;
}
.countCircle{
    background: #ffffffa3;
    padding: 4px;
    border-radius: 100%;
    border: 3px solid #ede7f6;
    box-shadow: 0.4px -0.1px 4px #ed3d0b;
}
.scrollbar-colored2 {
            scrollbar-color: red green!important;
            height: 300px;
            overflow-y: scroll;
        }
        .dashboard .ps__rail-y:hover>.ps__thumb-y, .ps__rail-y:focus>.ps__thumb-y {
    background-color: rgb(201 52 52 / 95%);
    width: 1px;
}
.dashboard .ps--active-y>.ps__rail-y {
    display: block;
    background-color: transparent;
    width: 5px;
}
.dashboard .ps__thumb-y {
    background-color: rgb(234 70 13);
    border-radius: 6px;
    transition: background-color .2s linear, width .2s ease-in-out;
    width: 5px;
    right: 2px;
    position: absolute;
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
                <div class="section-header" style="padding-bottom: 0px!important;">
                    <h2 style="margin-bottom: 0px!important; padding-bottom: 0px!important; color: #15357a!important;">Dashboard</h2>
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="" style="position: absolute;
    right: 0;">
                <div style="display: inline; float: left; width: 50px; font-size: 36px;cursor: pointer;"><i title="Refresh" style="font-weight: 600;color: black; margin-top: 28px;" class="pe-7s-refresh-2" onclick="dashboardRefresh()"></i></div>
                <select class="form-control" style="display: inline;
    float: left;
    width: 150px;
    margin: 25px 14px 10px 10px; font-size: 15px; border-color: black; color: black;" onchange="dashboardFilter()" id="year">
                    <option value="">Select Year</option>
                    <option value="2022"> 2022</option>
                    <option value="2023"> 2023</option>
                </select>
                <select class="form-control" style="display: inline;
    float: right;
    width: 150px;margin: 25px 14px 10px 10px; font-size: 15px; border-color: black; color: black;" id="intake" onchange="dashboardFilter()">
                    <option value="">Select Intake</option>
                    <option value="Jan-Apr">Jan - Apr</option>
                    <option value="May-Aug">May - Aug</option>
                    <option value="Sep-Dec">Sep - Dec</option>
                </select>
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
<p><div class="col-md-6 col-xl-12">
                <div class="card mb-3 widget-content bg-midnight-blooms background">
                    <div class="widget-content-wrapper text-whites">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Students</div>
                            <!-- <div class="widget-subheading"><small>GLOBAL</small></div> -->
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-whites" style="color: black;" style="color: black;"><span id="toTalStudent">7068</span></div>
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
                        <div class="widget-subheading"><small id="totalApplicationSubhead">Programs selected by 7068 students</small></div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-whites" style="color: black;"><span id="totalApplication">20038</span></div>
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
            <div class="card mb-3 widget-content bg-premium-darks background">
                <div class="widget-content-wrapper text-whites">
                    <div class="widget-content-left">
                        <div class="widget-heading">Applications sent to university</div>
                        <div class="widget-subheading"><small>Applications sent to university (offers not recieved) </small></div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-whites" style="color: black;"><span id="applicationsSentToUni">5300</span></div>
                    </div>
                </div>
                <a href="{{route('status.applicatons.list',base64_encode(2))}}">
                <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                </a>
            </div>
        </div>
        <!-- <div class="col-md-6 col-xl-12">
            <div class="card mb-3 widget-content  bg-grow-early">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper text-whites">
                        <div class="widget-content-left">
                            <div class="widget-heading">Active Applications</div>
                            <div class="widget-subheading">applications under (application sent to university) to ()</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warnings">{{$activeFiles->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        </p>
</div>
</div>
<div id="menu1" class="tab-pane fade">
<div class="tab-wd-img">
<img src="img/widgets/2.png" alt="">
</div>
<div class="tab-ctn">
<p> <div class="col-md-6 col-xl-12">
            <div class="card mb-3 widget-content bg-premium-darks background">
                <div class="widget-content-wrapper text-whites">
                    <div class="widget-content-left">
                        <div class="widget-heading">Conditional Offer Letter</div>
                        <!-- <div class="widget-subheading">Revenue streams</div> -->
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warnings"><span id="conditionalOfferLetter">6011</span></div>
                    </div>
                </div>
                <a href="{{route('status.applicatons.list',base64_encode(3))}}">
                <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                </a>
            </div>
        </div><div class="col-md-6 col-xl-12">
            <div class="card mb-3 widget-content bg-premium-darks background">
                <div class="widget-content-wrapper text-whites">
                    <div class="widget-content-left">
                        <div class="widget-heading">Unconditional Offer Letter</div>
                        <!-- <div class="widget-subheading">Revenue streams</div> -->
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warnings"><span id="UnconditionalOfferLetter">14026</span></div>
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
                        <div class="widget-numbers text-whites" style="color: black;"><span id="ttpaidId">2000</span></div>
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
                        <div class="widget-numbers text-whites" style="color: black;"><span id="casId">899</span></div>
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
                        <div class="widget-numbers text-whites" style="color: black;"><span id="casIssuedId">794</span></div>
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
                        <div class="widget-numbers text-whites" style="color: black;"><span id="visaDisAprv">1055</span></div>
                    </div>
                </div>
                <a href="{{route('status.applicatons.list',base64_encode(10))}}">
                <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                </a>
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
                        <div class="widget-numbers text-whites" style="color: black;"><span id="notEligible">50</span></div>
                    </div>
                </div>
                <a href="{{route('status.applicatons.list',base64_encode(13))}}">
                <i class="pe-7s-exapnd2" style="position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                </a>
            </div>
        </div></p>
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
                            <div class="widget-numbers text-dangers">89</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('today.application.Shortlist')}}">
                <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
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
                            <div class="widget-numbers text-dangers">44</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('today.application.Shortlist')}}">
                <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
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
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Applications sent to uni Today</div>
                            <!-- <div class="widget-subheading">Fee Paid</div> -->
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-dangers">83</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('application.today.applyToUni')}}">
                <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
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
                            <div class="widget-numbers text-dangers" id="toTalStudentForShortlist">4962</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('total.application.Shortlist')}}">
                <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
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
                <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
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
    </div><br>
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
<p><div class="col-md-6 col-xl-12">
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
    </div><br>
    
<!--     <div class="row">
         <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-blooms background">
                <div class="widget-content-wrapper text-whites">
                    <div class="widget-content-left">
                        <div class="widget-heading">Rejected Applications</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-whites" style="color: black;"><span>{{$rejectedApplications->count()}}</span></div>
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
                        <div class="widget-numbers text-whites" style="color: black;"><span>{{$processedApplications->count()}}</span></div>
                    </div>
                </div>
            </div>
        </div> 
    </div> -->
    <div class="row">
        
    </div>
    
    <div class="row">
        <div class="col-md-12 col-lg-6">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                        <i class="fa fa-university" aria-hidden="true" style="color: #ed3d0b;font-size: 25px"></i> &nbsp;
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
                                                            <i class="pe-7s-graph1 icon-gradient bg-mean-fruit" style="border: 1px solid;padding: 3px 8px;font-size: 20px;border-radius: 5px; color: #ed3d0b!important;"></i>
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
                    <div class="card-header-title">
                        <i class="fa fa-users" aria-hidden="true" style="color: #ed3d0b;font-size: 25px"></i> &nbsp;
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
                                                            <i class="pe-7s-graph icon-gradient bg-mean-fruit" style="font-size: 28px; color: #ed3d0b!important;"></i>
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
<?php
$january = 0;
$february = 0;
$march = 0;
$april = 0;
$may = 0;
$june = 0;
$july = 0;
$august = 0;
$september = 0;
$october = 0;
$november = 0;
$december = 0;
if(array_key_exists('January',$lineGraph)){
    $january = $lineGraph['January'];
} 
if(array_key_exists('February', $lineGraph)){
    $february = $lineGraph['February'];
}

if(array_key_exists('March', $lineGraph)){
    $march = $lineGraph['March'];
}
if(array_key_exists('April', $lineGraph)){
    $april = $lineGraph['April'];
}

if(array_key_exists('May', $lineGraph)){
    $may = $lineGraph['May'];
}
if(array_key_exists('June', $lineGraph)){
    $june = $lineGraph['June'];
}
if(array_key_exists('July', $lineGraph)){
    $july = $lineGraph['July'];
}
if(array_key_exists('August', $lineGraph)){
    $august = $lineGraph['August'];
}
if(array_key_exists('September', $lineGraph)){
    $september = $lineGraph['September'];
}
if(array_key_exists('October', $lineGraph)){
    $october = $lineGraph['October'];
}
if(array_key_exists('November', $lineGraph)){
    $november = $lineGraph['November'];
}
if(array_key_exists('December', $lineGraph)){
    $december = $lineGraph['December'];
}
?>   
</div>
<!-- end -->

               
@endsection
@section('addjavascript')
<script>
    $('a[href="#home"]').click(function(){
        $(this).parents('li').addClass('active');
        $(this).parents('li').siblings().removeClass('active');
    }); 
    $('a[href="#menu1"]').click(function(){
        $(this).parents('li').addClass('active');
        $(this).parents('li').siblings().removeClass('active');
    }); 
    $('a[href="#menu2"]').click(function(){
        $(this).parents('li').addClass('active');
        $(this).parents('li').siblings().removeClass('active');
    }); 
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
<script >
  const ctx = document.getElementById('myChart');
  let date = new Date();
  let n = date.getFullYear();


  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
      datasets: [{
        label: 'Students in Canada of '+ n,
        data: [90, 220, 189, 205, 301, 209,269,350,508,468,339,573],
        backgroundColor: [
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)'
            ],
            borderColor: [
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)'
            ],
            borderWidth: 1
      },{
        label: 'Students in UK of '+ n,
        data: [40, 200, 109, 205, 301, 329,299,369,408,358,449,623],
        backgroundColor: [
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)'
            ],
            borderColor: [
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)'
            ],
            borderWidth: 1
      },{
        label: 'Students in AUS of '+ n,
        data: [20, 100, 79, 305, 301, 229,259,269,208,258,249,273],
        backgroundColor: [
                'rgba(0,0,0,1)',
                    'rgba(0,0,0,1)',
                    'rgba(0,0,0,1)',
                    'rgba(0,0,0,1)',
                    'rgba(0,0,0,1)',
                    'rgba(0,0,0,1)'
            ],
            borderColor: [
                'rgba(0,0,0,1)',
                    'rgba(0,0,0,1)',
                    'rgba(0,0,0,1)',
                    'rgba(0,0,0,1)',
                    'rgba(0,0,0,1)',
                    'rgba(0,0,0,1)'
            ],
            borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<script>
var ctxSecond = document.getElementById("barChart").getContext('2d');
let dates = new Date();
let ns = dates.getFullYear();
var barChart = new Chart(ctxSecond, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
        datasets: [{
            label: 'Total Shortlist '+ ns,
            data: [300, 200, 189, 305, 501, 209,269,350,508,168,339,573],
            backgroundColor: [
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)'
            ],
            borderColor: [
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)',
                'rgba(93,70,191,1)'
            ],
            borderWidth: 1
        },{
        label: 'Students in UK of '+ n,
        data: [40, 200, 109, 205, 301, 329,299,369,408,358,449,623],
        backgroundColor: [
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)'
            ],
            borderColor: [
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)',
                'rgba(237,61,11,1)'
            ],
            borderWidth: 1
      },{
        label: 'Students in AUS of '+ n,
        data: [20, 100, 79, 305, 301, 229,259,269,208,258,249,273],
        backgroundColor: [
                'rgba(221,221,221,1)',
                'rgba(221,221,221,1)',
                'rgba(221,221,221,1)',
                'rgba(221,221,221,1)',
                'rgba(221,221,221,1)',
                'rgba(221,221,221,1)'
            ],
            borderColor: [
                'rgba(221,221,221,1)',
                'rgba(221,221,221,1)',
                'rgba(221,221,221,1)',
                'rgba(221,221,221,1)',
                'rgba(221,221,221,1)',
                'rgba(221,221,221,1)'
            ],
            borderWidth: 1
      }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
<script >
    $(document).ready(function(){
    });
    function dashboardRefresh(){
        $("#toTalStudent").html('');
        $("#totalApplication").html('');
        $("#newApplications").html('');
        $("#applicationsSentToUni").html('');
        $("#conditionalOfferLetter").html('');
        $("#UnconditionalOfferLetter").html('');
        $("#ttpaidId").html('');
        $("#casId").html('');
        $("#casIssuedId").html('');
        $("#visaDisAprv").html('');
        $("#notEligible").html('');
        $("#pendingFinalSubmit").html('');
        $("#toTalStudentForShortlist").html('');


        $("#toTalStudent").append('7068');
        $("#totalApplication").append('20038');
        $("#newApplications").append('2143');
        $("#applicationsSentToUni").append('5300');
        $("#conditionalOfferLetter").append('6011');
        $("#UnconditionalOfferLetter").append('14026');
        $("#ttpaidId").append('2000');
        $("#casId").append('899');
        $("#casIssuedId").append('794');
        $("#visaDisAprv").append('1055');
        $("#notEligible").append('50');
        $("#pendingFinalSubmit").append('1111');
        $("#toTalStudentForShortlist").append('4962');
    }
    function dashboardFilter(){
        var year = $('#year').find(":selected").val();
        var intake = $('#intake').find(":selected").val();
        if(!intake){
            $('#intake').css('border','2px solid red');
        }
        if(!year){
            $('#year').css('border','2px solid red');
        }
        if(year){
            if(intake){
                $("#toTalStudent").html('');
                $("#totalApplication").html('');
                $("#newApplications").html('');
                $("#applicationsSentToUni").html('');
                $("#conditionalOfferLetter").html('');
                $("#UnconditionalOfferLetter").html('');
                $("#ttpaidId").html('');
                $("#casId").html('');
                $("#casIssuedId").html('');
                $("#visaDisAprv").html('');
                $("#notEligible").html('');
                $("#pendingFinalSubmit").html('');
                $("#toTalStudentForShortlist").html('');
                var toTalStudent = '';
                var totalApplication = '';
                var newApplications = '';
                var applicationsSentToUni = '';
                var conditionalOfferLetter = '';
                var UnconditionalOfferLetter = '';
                var ttpaidId = '';
                var casId = '';
                var casIssuedId = '';
                var visaDisAprv = '';
                var notEligible = '';
                var pendingFinalSubmit = '';
                var toTalStudentForShortlist = '';

                if(year == '2022'){
                    if(intake == 'Jan-Apr'){
                        var toTalStudent = "1356";
                        var totalApplication = "5210";
                        var newApplications = "2138";
                        var applicationsSentToUni = "1556";
                        var conditionalOfferLetter = "1700";
                        var UnconditionalOfferLetter = "3810";
                        var ttpaidId = "481";
                        var casId = "201";
                        var casIssuedId = "168";
                        var visaDisAprv = "273";
                        var notEligible = "13";
                        var pendingFinalSubmit = "277";
                        var toTalStudentForShortlist = "9000"; 
                    }
                    if(intake == 'May-Aug'){
                        var toTalStudent = "1690";
                        var totalApplication = "5810";
                        var newApplications = "2138";
                        var applicationsSentToUni = "1716";
                        var conditionalOfferLetter = "1900";
                        var UnconditionalOfferLetter = "4013";
                        var ttpaidId = "533";
                        var casId = "228";
                        var casIssuedId = "168";
                        var visaDisAprv = "293";
                        var notEligible = "14";
                        var pendingFinalSubmit = "179";
                        var toTalStudentForShortlist = "7052"; 
                    }
                    if(intake == 'Sep-Dec'){
                        var toTalStudent = "1890";
                        var totalApplication = "7811";
                        var newApplications = "2138";
                        var applicationsSentToUni = "1519";
                        var conditionalOfferLetter = "1952";
                        var UnconditionalOfferLetter = "4212";
                        var ttpaidId = "591";
                        var casId = "263";
                        var casIssuedId = "212";
                        var visaDisAprv = "360";
                        var notEligible = "12";
                        var pendingFinalSubmit = "279";
                        var toTalStudentForShortlist = "8215"; 
                    }
                }

                if(year == '2023'){
                    if(intake == 'Jan-Apr'){
                        var toTalStudent = "332";
                        var totalApplication = "1538";
                        var newApplications = "2138";
                        var applicationsSentToUni = "1330";
                        var conditionalOfferLetter = "409";
                        var UnconditionalOfferLetter = "624";
                        var ttpaidId = "159";
                        var casId = "102";
                        var casIssuedId = "89";
                        var visaDisAprv = "79";
                        var notEligible = "10";
                        var pendingFinalSubmit = "114";
                        var toTalStudentForShortlist = "1013"; 
                    }
                    if(intake == 'May-Aug'){
                        var toTalStudent = "1450";
                        var totalApplication = "3450";
                        var newApplications = "267";
                        var applicationsSentToUni = "2560";
                        var conditionalOfferLetter = "356";
                        var UnconditionalOfferLetter = "2204";
                        var ttpaidId = "695";
                        var casId = "212";
                        var casIssuedId = "189";
                        var visaDisAprv = "582";
                        var notEligible = "11";
                        var pendingFinalSubmit = "114";
                        var toTalStudentForShortlist = "1213";
                        }
                    if(intake == 'Sep-Dec'){
                        var toTalStudent = "350";
                        var totalApplication = "1450";
                        var newApplications = "367";
                        var applicationsSentToUni = "962";
                        var conditionalOfferLetter = "346";
                        var UnconditionalOfferLetter = "357";
                        var ttpaidId = "112";
                        var casId = "11";
                        var casIssuedId = "0";
                        var visaDisAprv = "0";
                        var notEligible = "14";
                        var pendingFinalSubmit = "14";
                        var toTalStudentForShortlist = "127";
                    }
                }


                $("#toTalStudent").append(toTalStudent);
                $("#totalApplication").append(totalApplication);
                $("#newApplications").append(newApplications);
                $("#applicationsSentToUni").append(applicationsSentToUni);
                $("#conditionalOfferLetter").append(conditionalOfferLetter);
                $("#UnconditionalOfferLetter").append(UnconditionalOfferLetter);
                $("#ttpaidId").append(ttpaidId);
                $("#casId").append(casId);
                $("#casIssuedId").append(casIssuedId);
                $("#visaDisAprv").append(visaDisAprv);
                $("#notEligible").append(notEligible);
                $("#pendingFinalSubmit").append(pendingFinalSubmit);
                $("#toTalStudentForShortlist").append(toTalStudentForShortlist);

            }
        }
    }

</script>
@endsection
