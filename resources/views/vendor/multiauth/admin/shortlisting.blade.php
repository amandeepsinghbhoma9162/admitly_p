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
                    Dashboard
                    <div class="page-title-subheading">
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