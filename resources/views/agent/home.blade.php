@extends('agent.layouts.app')
@section('content')
<style type="text/css">
    /*.bellCount{
    background: #7862a2!important;
    }
    .msgCount {
    background: #7862a2!important;
    }*/
    .dropdown-menu-header .dropdown-menu-header-inner{
    background: #7862a2!important;   
    }
    .hamburger-inner{
    background: #7862a2!important;
    }
    .hamburger-inner, .hamburger-inner::before, .hamburger-inner::after{
    background: #7862a2!important;
    }
    .badge-warning{
    color: white!important;
    }
    .widget-content .widget-content-left .widget-heading{
    color: #0000008f!important;
    }
    .vertical-nav-menu li a.mm-active
    {
    background-color: #7862a21f;
    color: #7862a2;
    font-weight: normal;
    border-left: 3px solid #7862a2;
    border-radius: 0;
    padding-top: 4px;
    padding-bottom: 4px;
    height: auto;
    }
    .vertical-nav-menu li a:hover
    {
    background-color: #7862a21f;
    color: #7862a2;
    border-left: 3px solid #7862a2;
    }
    marquee p:before
    {
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    line-height: 1;
    position:absolute;
    left:0;
    content: "\f061";
    color:#7862a2!important;
    top:14px;
    }
    .body{
    color: black!important;
    }
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
    background-color: #7862a2!important;
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
    box-shadow: 0.4px -0.1px 4px #ff6000;
    }
    .scrollbar-colored2 {
    scrollbar-color: red green!important;
    height: 300px;
    overflow-y: scroll;
    }
</style>
<div class="app-main__inner dashboard">
    <!--  <div class="amBlock" style="position: fixed; right: 0; bottom: 0px; font-size: 23px; background: #da251d; padding: 11px 14px; color: #ffffff; z-index: 999999; border-radius: 60%; width: 50px; height: 50px;"><i class="fa fa-phone"></i></div>
        <div class="app-page-title AmPop">
            <div class="page-title-wrapper">
                
                <div class="page-title-actions " style="height:100%; width:100%; min-height:500px; display:none;    background: white;color:black;border-left: 1px solid red;" id="amBlock">
                    <h5><i class="pe-7s-user icon-gradient bg-mean-fruit">
                        </i> &nbsp; {{$agent->accountManager['name']}}<br>
                    </h5>
                    <h6 ><i class="pe-7s-call icon-gradient bg-mean-fruit">
                        </i> &nbsp; <a href="tel:{{$agent->accountManager['mobile']}}">+91: {{$agent->accountManager['mobile']}}</a>
                    </h6>
                    <hr>
                </div>
            </div>
        </div> -->
    <div class="app-page-title " style="border-radius: 15px;">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div style="margin-top: 30px!important;">
                    <h2 style="margin-bottom: 0px!important; padding-bottom: 0px!important; font-weight: 700!important; ">Welcome {{$agent['name']}}</h2>
                    <div class="page-title-subheading" style="color: #7862a2!important;">Simplifying Overseas Education for international students
                    </div>
                    <!-- <a href="{{route('quick.shortlisting.create')}}" class="btn btn-sm btn-success btn-default-colors ml-5 " style="background: #ff6000; border: 1px solid #ff6000; margin-left: 500px!important; margin-top: -90px;"><i class="fa fa-plus"></i> Quick Shortlist <br><small class="page-title-subheading">Easy steps for shortlisting</small></a> -->
                </div>
            </div>
            <div class="page-title-actions" style="margin-top: 28px!important;">
                <span class="" style="margin-right: 10px; "><strong class="text-dangers " style=""> Switch Dashboard </strong> <span style=""><i class="fa fa-arrow-right" style=" padding: 4px;font-size: 13px;"></i>
                </span></span>
                <div class="d-inline-block ">
                    <select class="form-control" id="switchDashboard" style="border: 2px solid #7862a2; border-radius: 15px;">
                    @foreach($allowCountry as $cntry)
                    <option value="{{$cntry['id']}}" {{$switchCountry['id'] == $cntry['id'] ? 'selected' : ''}}>{{$cntry['name']}}</option>
                    @endforeach
                    </select> 
                </div>
                <i class="fa fa-arrows-repeat"></i>
            </div>
        </div>
    </div>
    <!-- <div class=" ">
        @switch($switchCountry['id'])
        @case('230')
        <div class="col-md-6 switchBtn background" >
            <a class="btn btn-lg background" href="{{route('agent.dashboard',base64_encode(38))}}">UK Dashboard&nbsp; <img src="{{asset($switchCountry['path'].''.$switchCountry['image_name'])}}" width="40"> </a>
            <a class="btn btn-lg switchBtnLinkeds background" href="{{route('agent.dashboard',base64_encode(38))}}">Switch To Canada &nbsp; <img src="https://admitoffer.com/uploads/country/flag/48793b41c7bff410dd5c6f98162db0e2.png" width="20"> </a>
        </div>
        @break
        @case('38')
        <div class="col-md-6 switchBtn background" >
            <a class="btn btn-lg background" href="{{route('agent.dashboard',base64_encode(230))}}" >Canada Dashboard&nbsp;<img src="{{asset($switchCountry['path'].''.$switchCountry['image_name'])}}" width="40"></a>
            <a class="btn btn-lg switchBtnLinkeds background" href="{{route('agent.dashboard',base64_encode(230))}}" >Switch To Uk&nbsp; <img src="https://admitoffer.com/uploads/country/flag/a00ba1c4edcccdb0a69261b5a153dac6.png" width="20"></a>
        </div>
        @break
        @endswitch
        </div> -->
    <div class="row">
        <div class="col-md-6 col-xl-8">
            <div class="bg-white p-3" style="border-radius: 15px;">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="row">
                <div class="widget-tabs-int widgetbox sm-res-mg-t-30 tb-res-mg-t-30 tb-res-ds-n dk-res-ds" style="max-height: 405px!important;">
                    <div class="contact-hd tm-activity" style="margin-left: 30px;">
                        <h2 style="font-weight: 700!important;"><span  class="theme-gradient">Student</span> Activity</h2>
                    </div>
                    <div class="widget-tabs-list">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home" aria-expanded="true" class="">Students</a></li>
                            <li class=""><a data-toggle="tab" href="#menu1" aria-expanded="false">Converstions</a></li>
                            <li class=""><a data-toggle="tab" href="#menu2" aria-expanded="false">Today</a></li>
                        </ul>
                        <div class="tab-content scrollbar-colored" style="max-height: 240px!important;">
                            <div id="home" class="tab-pane fade active in show">
                                <div class="tab-wd-img">
                                    <img src="img/widgets/6.png" alt="">
                                </div>
                                <div class="tab-ctn " >
                                    <p>
                                    <div class="">
                                        <div class="card mb-3 widget-content bg-midnight-blooms ">
                                            <div class="widget-content-wrapper text-whites">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading ">Total Students</div>
                                                    <!-- <div class="widget-subheading"><small>GLOBAL</small></div> -->
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-whites "><span class="count">{{$students->count()}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('agent.student.countryindex',base64_encode($switchCountry['id']))}}">
                                            <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="card mb-3 widget-content bg-arielle-grays ">
                                            <div class="widget-content-wrapper text-whites ">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading ">Total Applications</div>
                                                    <!-- <div class="widget-subheading"><small>GLOBAL</small></div> -->
                                                    <div class="widget-subheading text-whites"><small >Programs selected by {{$students->count()}} students</small></div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-whites "><span class="count">{{sizeof($submittedFiles)}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('all.Applications',base64_encode($switchCountry['id']))}}">
                                            <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="">
                                        <div class="card mb-3 widget-content bg-premium-darks ">
                                            <div class="widget-content-wrapper text-white background">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading background">
                                                        Offer Letters Received
                                                    </div>
                                                    <!-- <div class="widget-subheading">Revenue streams</div> -->
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-warning background"><span class="count">{{$applicationsUnconditioOfferUpload->count()}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('all.Applications.status',[base64_encode(17),base64_encode($switchCountry['id'])])}}">
                                            <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="card mb-3 widget-content bg-midnight-blooms background">
                                            <div class="widget-content-wrapper text-white background">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading background">TT Paid</div>
                                                    <!-- <div class="widget-subheading"><small>GLOBAL</small></div> -->
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-white background"><span class="count">{{$ttpaid->count()}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('all.Applications.status',[base64_encode(18),base64_encode($switchCountry['id'])])}}">
                                            <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
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
                                    <div class="">
                                        <div class="card mb-3 widget-content bg-premium-darks background">
                                            <div class="widget-content-wrapper text-white background">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading background">Final Offer/LOA Received</div>
                                                    <!-- <div class="widget-subheading">Revenue streams</div> -->
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-warning background"><span class="count">{{$applicationsconditioOfferUpload->count()}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('all.Applications.status',[base64_encode(19),base64_encode($switchCountry['id'])])}}">
                                            <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="card mb-3 widget-content bg-premium-darks background">
                                            <div class="widget-content-wrapper text-white background">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading background">
                                                        Conditional Offer Letter
                                                    </div>
                                                    <!-- <div class="widget-subheading">Revenue streams</div> -->
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-warning background"><span class="count">{{$applicationsUnconditioOfferUpload->count()}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('all.Applications.status',[base64_encode(3),base64_encode($switchCountry['id'])])}}">
                                            <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="card mb-3 widget-content bg-premium-darks background">
                                            <div class="widget-content-wrapper text-white background">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading background">Unconditional Offer Letter</div>
                                                    <!-- <div class="widget-subheading">Revenue streams</div> -->
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-warning background"><span class="count">{{$applicationsUnconditioOfferUpload->count()}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('all.Applications.status',base64_encode(4))}}">
                                            <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="card mb-3 widget-content bg-midnight-blooms background">
                                            <div class="widget-content-wrapper text-white background">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading background">TT Paid</div>
                                                    <!-- <div class="widget-subheading"><small>GLOBAL</small></div> -->
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-white background"><span class="count">{{$ttpaid->count()}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('all.Applications.status',base64_encode(5))}}">
                                            <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
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
                                    <div class="">
                                        <div class="card mb-3 widget-content bg-arielle-orgs background">
                                            <div class="widget-content-wrapper text-white background">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading background">Approved VISAS</div>
                                                    <div class="widget-subheading"><small >Rejected VISAS: {{$visaDisApproved->count()}}</small></div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-white background"><span class="count">{{$visaApproved->count()}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('all.Applications.status',base64_encode(10))}}">
                                            <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="card mb-3 widget-content">
                                            <div class="widget-content-wrapper ">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading background">Rejected Applications</div>
                                                    <!-- <div class="widget-subheading"><small>GLOBAL</small></div> -->
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers "><span class="count">{{$rejectedApplications->count()}}</span></div>
                                                </div>
                                            </div>
                                            <a href="{{route('all.Applications.status',base64_encode(12))}}">
                                            <i class="pe-7s-exapnd2" style="color: black;position:absolute;right:2px;top:2px; font-size:17px;"></i> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="card mb-3 widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading background">Pending Final Submission</div>
                                                        <div class="widget-subheading">UK,Canada</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-successs background"><span class="count">{{sizeof($notSubmittedFiles)}}</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="card mb-3 widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading background">Today Applications</div>
                                                        <!-- <div class="widget-subheading">Sep 2019 intake</div> -->
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-warning background"><span class="count">{{sizeof($todayApplied)}}</span></div>
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
    </div>
    <div class="col-xl-12 mtResponsive80" >
        <div class="row" >
            <div class="col-md-4" style="margin-top: 13px;">
                <div class="row">
                    <div class="widget-tabs-int widgetbox2 sm-res-mg-t-30 tb-res-mg-t-30 tb-res-ds-n dk-res-ds" style="background: white; margin-left: -13px;">
                        <div class="contact-hd tm-activity">
                            <h2 class="text-center" style="margin-top: 16px;font-weight: 700!important;"><span  class="theme-gradient">Announcements </span></h2>
                        </div>
                        <hr>
                        <div class="widget-tabs-list">
                            <div id="home" class="tab-pane fade active in show">
                                <div class="tab-ctn " >
                                    <p>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="tab-eg-55">
                                            <div class="widget-chart p-3 marq" >
                                                <marquee direction="up" scrollamount="3" >
                                                    @foreach($announcements as $announcement)
                                                    <p class="" >{{$announcement['name']}}</p>
                                                    @endforeach
                                                </marquee>
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
            <div class="col-md-8" style="margin-top: 40px;">
                <div class="bg-white p-3" style="border-radius: 15px;">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class=" col-lg-6" style="margin-top: 10px; margin-left: 18px;">
            <div class="mb-6 card" style="border-radius: 15px;">
                <div class="card-header-tab card-header-tab-animation card-header" style="border-radius: 15px;">
                    <div class="card-header-title" style="color: #7bab66!important;">
                        <h2 class="text-center" style="margin-top: 16px;font-weight: 700!important;"><span  class="theme-gradient">University </span>Applications</h2>
                    </div>
                    <ul class="nav">
                        <!-- <li class="nav-item"><a href="javascript:void(0);" class="active nav-link">Last</a></li> -->
                        <!-- <li class="nav-item"><a href="javascript:void(0);" class="nav-link second-tab-toggle">Current</a></li> -->
                    </ul>
                </div>
                <div class="card-body" style="padding:0px;">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabs-eg-77">
                            <div class="" style="padding:10px; height: 302px;" >
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
                                                        <div class="widget-heading background" style="color: #888!important;">
                                                            @if($file->college)
                                                            @if($file->college->attachment)
                                                            <img class="blah" style="width:10%;"  src="{{asset($file->college->attachment['path'].'/'.$file->college->attachment['name'])}}" alt="your image" />
                                                            @endif
                                                            {{$file->college['name']}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="font-size-xlg text-muted">
                                                            <small class="opacity-5 pr-1"></small>
                                                            @if($file->college)
                                                            <span style="margin-left: -36px;">{{$file['total']}}
                                                            </span> &nbsp;
                                                            <i class="pe-7s-graph1 icon-gradient bg-mean-fruit" style="border: 1px solid;padding: 3px 8px;font-size: 20px;border-radius: 5px; color: #ff6000;"></i>
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
        <div class="col-lg-6" style="    max-width: 584px!important;margin-left: 625px;margin-top: -360px;">
            <div class="mb-6 card activity" style="border-radius: 15px;">
                <div class="card-header-tab card-header-tab-animation card-header" style="border-radius: 15px; color: #7bab66!important;">
                    <h2 class="text-center" style="margin-top: 16px;font-weight: 700!important;"><span  class="theme-gradient">Recent </span>Activity</h2>
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                            <!-- <button class="active btn btn-focus">Last Week</button>
                                <button class="btn btn-focus">All Month</button> -->
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover ">
                        <!-- <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th class="text-center">Program</th>
                                <th class="text-center">Applied Date</th>
                                <th class="text-center">Current Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead> -->
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="d-block text-center card-footer" style="height: 300px;overflow-y: scroll;">
                    <!-- <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                        <button class="btn-wide btn btn-success">Save</button> -->
                    <div class="table-responsive">
                        <table data-order='[[ 0, "desc" ]]' class="align-middle mb-0 table table-borderless table-striped table-hover ">
                            <thead>
                                <!-- <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-left">Activities</th>
                                    <th>Date</th>
                                     <th class="text-center">Actions</th> 
                                    </tr>-->
                            </thead>
                            <tbody>
                                @foreach($notifications as $key=>$notification)
                                <tr>
                                    <!-- <td class="text-center text-muted badge badge-pill badge-warning">#{{$notification['id']}}</td>-->
                                    <td class="text-left text-muted capitalize activity_icon"><i class="fa fa-angle-double-right" style="color: #7862a2!important"></i> {{$notification['message']}}</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading badge badge-pill badge-danger" style="color: #7862a2!important;">{{$notification['created_at']->format('d/M/Y')}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- <td class="text-center">
                                        <a href="{{$notification['link']}}" id="PopoverCustomT-1" class="btn-shadow btn btn-primary activeAppliBack">Details</a>
                                        </td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($notifications->count() == 0)
                        <p class="text-center">No recent activity</p>
                        @endif
                    </div>
                    <a href="{{route('notification.list')}}" class="btn-pill btn-shadow btn-wide fsize-1 btn btn-dark btn-lg btn-default-color"><span class="mr-2 opacity-7"><i class="fa fa-cog fa-spin"></i></span><span class="mr-1">View All</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content zoom">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading background uppercase">Total Conversions</div>
                            <div class="widget-subheading"></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-successs background"> {{$conversion->count()}}</div>
                        </div>
                    </div>
                    <div class=" progress" style="height: 8px; color: lightgray;">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: {{$conversion->count()}}%;background-color: #a39c9c;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content zoom">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading background uppercase">Active Applications</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warnings background">{{$activeApplication->count()}}</div>
                        </div>
                    </div>
                    <div class=" progress" style="height: 8px; color: lightgray!important;">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: {{$activeApplication->count()}}%;background-color: #a39c9c;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content zoom">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading background uppercase">Total Applications</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-dangerr background">{{$totalApplication->count()}}</div>
                        </div>
                    </div>
                    <div class=" progress" style="height: 8px;">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: {{$totalApplication->count()}}%;background-color: #a39c9c;"></div>
    
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<!--  -->
@if($pendancy->count() > 0)
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="top:50px; max-width: 700px!important;">
        <div class="modal-content" style="">
            <div class="modal-header" style=" background: #da251deb!important;">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #f9f8f8; width: 285px; background: #da251d; padding: 26px; margin: -16px; border-radius: 0px 85px 0px;border: 1px double #ffffff87;"> &nbsp;Applications Pendencies </h5>
                <button type="button" id="paymentpopClose" class=" close" style="color: white;" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-3" style="padding:0px;overflow-y: scroll;height: 350px; margin-top: 0px!important;">
                <table data-order='[[ 0, "desc" ]]' class="align-middle text-truncate mb-0 table table-borderless table-hover  cell-border pendecyPopupStyle" >
                    <thead style="background: #dd362f; color: white; ">
                        <tr>
                            
                            <th class="text-center">Sr. no</th>
                            <th class="text-center">Student name</th>
                            <th class="text-center">pendency name</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        $i = 1;
        ?>
                        @foreach($pendancy as $pend)
                        <tr style=" border-bottom: 1px solid #e1d7d6cf; font-weight: 16px!important; ">
                            
                            <td class="text-center" >
                                <div class="text-center" style="background: #dd362fcf;color: white;padding: 6px; border-radius: 55px; width: 50%; font-weight: 15px!important;">
                                {{$i++}}
                            </div>
                            </td>
                            <td class="text-center" >
                                <div class="text-center" style="padding: 17px 10px;color: #000000b0 !important; font-size: 15px;font-weight: 700;">{{ $pend->student['firstName'] }} {{ $pend->student['lastName'] }}</div>
                            </td>
                            <td class="text-center" >
                                <div class="text-center" style="padding: 17px 10px;color: #000000b0 !important; font-size: 15px;font-weight: 700;">
                                    @if(is_numeric($pend['type']))
                                    @if($pend->qualification)
                                    {{ $pend->qualification['qualification_grade'] }}
                                    @else
                                    {{ $pend['type'] }}
                                    @endif
                                    @else
                                    {{ $pend['type'] }}
                                    @endif
                                    &nbsp;{{ $pend['name'] }}&nbsp;{{ $pend['title'] }}
                                </div>
                                @if($pend['reason'])
                                <p>{{ $pend['reason']}}</p>
                                @endif
                            </td>
                            <td class="text-center profile_btn">
                                @if($pend)
                                @if($pend['application_id'])
                                <a href="{{route('student.application.View',base64_encode($pend['application_id']))}}" class="btn btn-sm btn-info" style="font-size: 13px" > <i class="fa fa-eye"></i> View </a>
                                @else
                                <a href="{{route('student.show',base64_encode($pend->student['id']))}}" class=" btn btn-sm btn-info" data-toggle="tooltip" title="View" style="font-size: 13px"> <i class="fa fa-eye"></i> View</a>
                                @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
                <hr>
                <div class="text-center">
                </div>
            </div>
        </div>
    </div>
    </div> -->
<!-- <div class="row">
    <div class="col-md-12 col-lg-12 background">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header" style="border-radius: 15px;">
                <div class="card-header-title">
                    <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                    Pendencies &nbsp;({{$pendancy->count()}})
                </div>
                <ul class="nav">
                     <li class="nav-item"><a href="javascript:void(0);" class="active nav-link">Last</a></li> 
                    <li class="nav-item"><a href="javascript:void(0);" class="nav-link second-tab-toggle">Current</a></li> 
                  </ul>
            </div>
            <div class="card-body" style="padding:0px;">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="" style="padding:10px;overflow-y: scroll;height: 300px;" >
                            <div class="scrollbar-container">
                                <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="card-body">
                                                    @include('multiauth::message')
                                                    <table data-order='[[ 0, "desc" ]]' class="align-middle text-truncate mb-0 table table-borderless table-hover tableID cell-border" >
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">#</th>
                                                                <th class="text-center">Student name</th>
                                                                <th class="text-center">pendency name</th>
                                                                <th class="text-center">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($pendancy as $pend)
                                                            <tr style="">
                                                                <td class="text-center" >
                                                                    <div class="badge badge-pill badge-warning num_1 background" style="width: auto!important;">{{ $pend->student['id'] }}</div>
                                                                </td>
                                                                <td class="text-center" >
                                                                    <div class="text-center">{{ $pend->student['firstName'] }} {{ $pend->student['lastName'] }}</div>
                                                                </td>
                                                                <td class="text-center" >
                                                                    <div class="text-center">
                                                                        @if(is_numeric($pend['type']))
                                                                        @if($pend->qualification)
                                                                        {{ $pend->qualification['qualification_grade'] }}
                                                                        @else
                                                                        {{ $pend['type'] }}
                                                                        @endif
                                                                        @else
                                                                        {{ $pend['type'] }}
                                                                        @endif
                                                                        &nbsp;{{ $pend['name'] }}&nbsp;{{ $pend['title'] }}
                                                                    </div>
                                                                    <p>{{ $pend['reason']}}</p>
                                                                </td>
                                                                <td class="text-center profile_btn">
                                                                    @if($pend)
                                                                    @if($pend['application_id'])
                                                                    <a href="{{route('student.application.View',base64_encode($pend['application_id']))}}" class="btn btn-sm btn-info mb-4" > View </a>
                                                                    @else
                                                                    <a href="{{route('student.show',base64_encode($pend->student['id']))}}" class=" btn btn-sm btn-info mb-4" data-toggle="tooltip" title="View">View</a>
                                                                    @endif
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @endforeach 
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="widget-content-left">
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="font-size-xlg text-muted">
                                                        <small class="opacity-5 pr-1"></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> -->
@endif   
<div>
    <?php
        $cad = $lineGraph;
        $cadShortlist = $lineGraphShortlist
        ?>
</div>
<button type="button" class="btn btn-primary pendenfinalPop hide" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
</div>
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
<script >
    $(document).on('click','.amBlock',function(){
       $('#amBlock').toggle();     
    });
</script>
<script type="text/javascript">
    $('.pendenfinalPop').click();$('.modal-backdrop').css('position','inherit');setTimeout(function(){$('.modal-backdrop').css('position','inherit');},1000);
</script>
<script >
    $('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
    });
</script>
<script >
    const ctx = document.getElementById('myChart');
    let date = new Date();
    let n = date.getFullYear();
    var cad = @json($cad);
    
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
        datasets: [{
          label: 'No. of Students in '+ n,
          data: cad,
          backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
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
    
     var cadShortlist = @json($cadShortlist);
    var barChart = new Chart(ctxSecond, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
                label: 'Total Shortlist '+ ns,
                data: cadShortlist,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
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
<script>
    $(document).on('change','#switchDashboard',function(){
        
        document.location.href = '/agent/home/'+btoa($(this).val());
    });
</script>
@endsection