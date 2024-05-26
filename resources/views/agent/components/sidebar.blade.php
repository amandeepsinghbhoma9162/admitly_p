<div class="app-sidebar sidebar-shadow" style="overflow: scroll;">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <!-- <li class="app-sidebar__heading">Navigation</li> -->
                <li>
                    <a href="{{route('agent.dashboard')}}" class="{{ \Request::routeIs('agent.dashboard') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                                
              <!--   <li>
                    <a href="{{route('chat.create.agent')}}" class="">
                        <i class="metismenu-icon pe-7s-chat"></i>
                        Chat
                    </a>
                </li> -->

                <li>
                    <a href="#" class="{{ \Request::routeIs('student.create') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-user"></i>
                        Students
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('add.new.student.session')}}" class="{{ \Request::routeIs('student.create') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Add Student
                            </a>
                        </li>
                        <li>
                            <a href="{{route('student.index')}}" class="{{ \Request::routeIs('student.index') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Students List
                            </a>
                        </li>
                        <li>
                            <a href="{{route('all.Applications')}}" class="{{ \Request::routeIs('all.Applications') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Applications List
                            </a>
                        </li>
                        <!-- <li>
                            <a href="{{route('student.studentsPendencies')}}" class="{{ \Request::routeIs('agent.dashboard') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Pendencies List
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li>
                    <a href="#" class="{{ \Request::routeIs('quick.shortlisting.create') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-user"></i>
                        Quick Shortlisting
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('add.new.quick.short')}}" class="{{ \Request::routeIs('quick.shortlisting.create') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Add Quick Shortlisting
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="{{ \Request::routeIs('student.studentsApplPendencies') ? 'mm-active' : '' }} {{ \Request::routeIs('student.studentsPendencies') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-note"></i>
                        Pendencies
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('student.studentsApplPendencies')}}" class="{{ \Request::routeIs('student.studentsApplPendencies') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Application Pendencies 
                            </a>
                        </li>
                        <li>
                            <a href="{{route('student.studentsPendencies')}}" class="{{ \Request::routeIs('student.studentsPendencies') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Student Pendencies 
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                      <a href="{{route('all.PendingTTCopy')}}" class="{{ \Request::routeIs('all.PendingTTCopy') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon"><img src="{{asset('images/paid.png')}}" width="24px" ></i>
                        Pending TT / Tuition Fee
                    </a>
                </li>
                <li>
                    <a href="#" class="{{ \Request::routeIs('student.ApplicationOffers') ? 'mm-active' : '' }} {{ \Request::routeIs('student.visaReceived') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-ticket"></i>
                        Offers & Visa
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('student.ApplicationOffers')}}" class="{{ \Request::routeIs('student.ApplicationOffers') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Offer List
                            </a>
                        </li>
                        <li>
                            <a href="{{route('student.visaReceived')}}" class="{{ \Request::routeIs('student.visaReceived') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Visa Received List
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="{{ \Request::routeIs('search.index') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-search"></i>
                        Course
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('search.index')}}" class="{{ \Request::routeIs('search.index') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Search
                            </a>
                        </li>
                      
                    </ul>
                </li>
                <li>
                    <a href="#" class="{{ \Request::routeIs('media.gallery',base64_encode(230)) ? 'mm-active' : '' }} {{ \Request::routeIs('media.gallery',base64_encode(38)) ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-cash"></i>
                       Media</a>
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('media.gallery',base64_encode(230))}}" class="{{ \Request::routeIs('media.gallery',base64_encode(230)) ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                UK
                            </a>
                        </li>
                        <li>
                            <a href="{{route('media.gallery',base64_encode(38))}}" class="{{ \Request::routeIs('media.gallery',base64_encode(38)) ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Canada
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-cash"></i>
                       Commissions
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('agent.dashboard')}}" class="{{ \Request::routeIs('agent.dashboard') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Current Performance
                            </a>
                        </li>
                        <li>
                            <a href="{{route('agent.dashboard')}}" class="{{ \Request::routeIs('agent.dashboard') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Previous Intake Performance
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="#" class="{{ \Request::routeIs('total.report') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-graph3"></i>
                       Reports
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('totalConversions.report')}}" class="{{ \Request::routeIs('totalConversions.report') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Total Conversions
                            </a>
                        </li>
                        <li>
                            <a href="{{route('commission.report')}}" class="{{ \Request::routeIs('commission.report') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                               Commissions
                            </a>
                        </li>
                        <li>
                            <a href="{{route('university.report')}}" class="{{ \Request::routeIs('university.report') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                               University Wise Report
                            </a>
                        </li>
                        <!-- <li>
                            <a href="{{route('location.report')}}" class="{{ \Request::routeIs('agent.dashboard') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                               Location Wise Report
                            </a>
                        </li> -->
                        <li>
                            <a href="{{route('total.report')}}" class="{{ \Request::routeIs('total.report') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                               Total Report
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="mb-2">
                    
                     <li>
                        @if(auth()->guard('agent')->check() == true)
                                <?php 
                                    $agentUser = auth()->guard('agent')->user();
                                ?>
                        <a href="#" class="{{ \Request::routeIs('comission.structure',base64_encode($agentUser['country_id'])) ? 'mm-active' : '' }}">
                            <i class="metismenu-icon pe-7s-study"></i>
                        Commission Structure
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        @endif
                        <ul>
                           
                            @if(auth()->guard('agent')->check() == true)
                                <?php 
                                    $agentUser = auth()->guard('agent')->user();
                                ?>
                                @if($agentUser['country_id'] == '153')

                                <li>
                                    <a href="{{route('comission.structure',base64_encode(153))}}" class="{{ \Request::routeIs('comission.structure',base64_encode(153)) ? 'mm-active' : '' }}">
                                        <i class="metismenu-icon"></i>
                                        Canada  
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('comission.structure',base64_encode(153-230))}}" class="{{ \Request::routeIs('comission.structure',base64_encode(153-230)) ? 'mm-active' : '' }}">
                                        <i class="metismenu-icon"></i>
                                        UK 
                                    </a>
                                </li>
                                @else
                                <li>
                                    <a href="{{route('comission.structure',base64_encode(230))}}" class="{{ \Request::routeIs('comission.structure',base64_encode(230)) ? 'mm-active' : '' }}">
                                        <i class="metismenu-icon"></i>
                                        UK 
                                    </a>
                                </li>
                                @if(in_array('38',CheckCountry::allowCountry()))

                                <li>
                                    <a href="{{route('comission.structure',base64_encode(38))}}" class="{{ \Request::routeIs('comission.structure',base64_encode(38)) ? 'mm-active' : '' }}">
                                        <i class="metismenu-icon"></i>
                                        Canada 
                                    </a>
                                </li>
                                @endif
                                @endif
                            @endif

                           
                        </ul>
                     </li>
                    <li><a href="#" class="{{ \Request::routeIs('allUk.universities.structure') ? 'mm-active' : '' }}">
                            <i class="metismenu-icon pe-7s-study"></i>
                        Uni Entry Requirements
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="{{route('allUk.universities.structure')}}" class="{{ \Request::routeIs('allUk.universities.structure') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon"></i>
                                    UK
                                </a>
                            </li>
                           @if(auth()->guard('agent')->check() == true)
                                @if(in_array('38',CheckCountry::allowCountry()))

                                <!-- <li>
                                    <a href="{{route('allUk.universities.structure')}}" class="{{ \Request::routeIs('agent.dashboard') ? 'mm-active' : '' }}">
                                        <i class="metismenu-icon"></i>
                                        Canada 
                                    </a>
                                </li> -->
                                @endif
                            @endif
                           
                        </ul>
                     </li>
                     
                </li>
                     <li><a href="#">
                            &nbsp;
                        </a>
                        <ul>
                            <li>
                                &nbsp;
                            </li> 
                        </ul>
                     </li>
                     <li class="app-sidebar__heading">SCROLL TOP</li>
            </ul>
        </div>
    </div>
</div>   