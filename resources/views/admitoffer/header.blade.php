<style >
     .canvus ul.menu li a {
        font-weight: 500px!important        
    }
</style>
<header id="header" class="header d-flex align-items-center">

        <div class="container-fluid container-xl d-flex align-items-right">
            <a href="{{route('home')}}" class="logo d-flex align-items-center">

                <img src="{{asset('assets/assets/img/logo.png')}}" alt="Admit Offer">

            </a>
            <nav id="navbar" class="navbar margin-left-auto">
                <ul>
                <li><a style="font-size: 17px!important" href="{{route('for-students')}}">Students</a></li>
                 <li><a style="font-size: 17px!important" href="{{route('for-recruiters')}}">Agents</a></li>
                            <li><a style="font-size: 17px!important" href="{{route('for-instituties')}}">Schools</a></li>
                            <li><a style="font-size: 17px!important" href="{{route('agent.login')}}">Login</a></li>
                            
                    <!-- <li><a href="{{route('home')}}" id="home">Home</a></li> -->
                    <!-- <li class="dropdown" ><a href="#" id="about"><span>Company</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="{{route('aboutus')}}">About</a></li>
                         
                            <li><a href="{{route('event')}}">Events</a></li>
                            
                            <li><a href="{{route('recognition')}}">Recognition</a></li>
                            <li><a href="{{route('press-releases')}}">Press Releases</a></li>

                        </ul>
                    </li>
                    <li class="dropdown" ><a href="#" id="solutions"><span>Solutions</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="{{route('for-recruiters')}}">For Recruiter</a></li>
                            <li><a href="{{route('for-instituties')}}">For Institutes</a></li>
                            <li><a href="{{route('for-students')}}">For Students</a></li>
                            

                        </ul>
                    </li>
                    <li><a href="{{route('pricing')}}" id="pricing">Pricing</a></li>
                    <li><a href="{{route('blog')}}" id="blog">Blog</a></li>
                    <li class="dropdown" ><a href="" id="resources"><span>Resources </span><i class="bi bi-chevron-down dropdown-indicator"></i></a>
                  <ul>
                    <li><a href="{{route('careers')}}">Careers</a></li>
                    <li><a href="{{route('contactus')}}">Contact us</a></li>
                   </ul>
                                 
                     </li> -->
                    
                    <li><a href="{{route('local.search.index')}}">Find Programs</a></li>
                </ul>


            </nav><!-- .navbar -->

            <div class="login_btns">
                <!-- <div class="login"><a href="{{route('agent.login')}}">Login</a></div> -->
                <div class="req1"><a href="{{route('local.search.index')}}" class="btn" id="req_1"><span data-text="Find Programs">Find Programs</span></a>
                </div>
            </div> 
             
             <div class="bars_1">
               <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
               <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            </div>
            
            <div class="canvus">
               <button class="btn canvus_1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-list"></i></button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <div id="offcanvasRightLabel"><img src="{{asset('assets/assets/img/logo.png')}}" alt="Admit Offer" style="width:150px"></div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
       <ul class="menu" style="font-weight: 500px!important;">
          <li><a style="font-size: 17px!important; font-weight: 500px!important" href="{{route('aboutus')}}">About</a></li>
          <li><a style="font-size: 17px!important; font-weight: 500px!important" href="{{route('careers')}}">Careers</a></li>
          <!-- <li><a style="font-size: 17px!important; font-weight: 500px!important" href="{{route('event')}}">Events</a></li> -->
          <!-- <li><a href="{{route('recognition')}}">Recognition</a></li> -->
          <li><a style="font-size: 17px!important; font-weight: 500px!important" href="{{route('pressreleases')}}">Press Releases</a></li>
          
         <li><a style="font-size: 17px!important; font-weight: 500px!important" href="{{route('blog')}}" id="blog">Blog</a></li>
       </ul>
  </div>
</div>
            </div>

        </div>
    </header>