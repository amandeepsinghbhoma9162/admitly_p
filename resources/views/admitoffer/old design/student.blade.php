@include('event._head')
<style>
    #home1
    {
    }
img {
    width: 250px;
    margin: 2px;
   
}

</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js' type="7a4c22487d30c2425ade14fe-text/javascript"></script>
<body id="home" background-image: src="{{asset('images/satti.png')}}";>
    <div class="wrapper">
<style>
.body {
  
  color: #fffff;
}
</style>
<header id="header">
    <div class="container">

      <div id="logo" class="cy_logo_box">
         <a href="index.php"><img src="{{asset('images/admission-overseas-logo.png')}}" alt="" title="" /></a>
      </div>

      <?php /*
      <nav id="nav-menu-container" class="main-nav float-right">
        <ul class="nav-menu">
          <li><a href="index.php#home1" id="">Home</a></li>
          <li><a href="index.php#zoom" id="">Book Counseling</a></li>          
          <li><a href="index.php#aboutus" id="">About Us</a></li>        
          <li><a href="index.php#team" id="">Meet the Team</a></li>                
        </ul>
      </nav>
      */ ?>

    </div>
  </header>
 </div>
    <br>
    <br>
    <br>
    <br>
    <main id="main">
        <div class="span1" id="aboutus">
            <div class="container">
                <div class="span11 abt">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-sm-12">
                            <div class="heading">
                                <h5 style>Greetings & welcome</h5>
                            </div>
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                  <li data-target="#myCarousel" data-slide-to="1"></li>
                                  <li data-target="#myCarousel" data-slide-to="2"></li>
                                  <li data-target="#myCarousel" data-slide-to="3"></li>
                                  <li data-target="#myCarousel" data-slide-to="4"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                  <div class="item active">
                                    <img src="{{asset('images/student-03.jpeg')}}" alt="Los Angeles" style="width:100%;">
                                  </div>

                                  <div class="item">
                                    <img src="{{asset('images/student-01.jpeg')}}" alt="Chicago" style="width:100%;">
                                  </div>
                                
                                  <div class="item">
                                    <img src="{{asset('images/student-02.jpeg')}}" alt="New york" style="width:100%;">
                                  </div>
                                  <div class="item">
                                    <img src="{{asset('images/student-04.jpeg')}}" alt="New york" style="width:100%;">
                                  </div>
                                  <div class="item">
                                    <img src="{{asset('images/student-05.jpeg')}}" alt="New york" style="width:100%;">
                                  </div>
                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                  <span class="glyphicon glyphicon-chevron-left"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                  <span class="glyphicon glyphicon-chevron-right"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </div>
                        </div>
                        <br>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="slider-form" id="register-now">
                                <h3>Register Now</h3>
                                <!-- <h6 class="text-center">Don't have Admit Offer UI Code? Register with Admit Offer and get your code on your dashboard. <a href="https://admitoffer.com/agent/registers" target="_blank">click here..</a></h6> -->
                                <!-- <h6 class="text-center">If have registration with Admit Offer get your code on your Admit Offer dashboard. <a href="https://admitoffer.com/agent/login" target="_blank">Login</a></h6> -->
                                <!-- <h6 class="text-center">Visit ADMIT OFFER Portal. <a href="https://admitoffer.com" target="_blank">Click here</a></h6> -->
                                @if(Session::has('success'))
                                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                                @endif
                                @if(!Session::has('success') && !Session::has('dangers'))
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li><small>{{ $error }}</small></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @endif
                                <form id="contact-form" method="POST" action="{{route('student.post')}}" role="form" novalidate="true">
                                    @csrf
                                    <div class="messages"></div>
                                    <div class="controls">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class=" input form-group">
                                                    <!-- <input id="form_agent_uid" type="text" name="agent_uid" value="{{ old('agent_uid') }}"  placeholder="Admit Offer Partner Unique Identification Code (UIC)*" class="form-control cont" data-error="Admit Offer Partner Unique Identification Code (UIC)* is required." > -->
                                                    @if(Session::has('danger'))
                                                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('danger') }} <a href="https://admitoffer.com/agent/registers" target="_blank">Register</a></p>
                                                    @endif
                                                    @if(Session::has('dangers'))
                                                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('dangers') }} </p>
                                                    @endif
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <div class=" input form-group">
                                                    <input id="form_firstname" type="text" name="name" value="{{ old('name') }}" required placeholder="Name*" class="form-control cont" data-error="Name is required.">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input form-group">
                                                    <input id="form_email" type="email" name="email"  placeholder="Email" value="{{ old('email') }}" class="form-control cont" data-error="Valid email is required.">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="input form-group">
                                                    <input id="form_phone" type="tel" name="phone" required placeholder="Phone*" value="{{ old('phone') }}" class="form-control cont" data-error="Phone Number is required.">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="input form-group">
                                                    <select id="form_am" name="country" value="{{ old('Country') }}" placeholder="Country Country *" class="form-control cont" data-error="Concern person is required.">
                                                        <option value="">Select Country*</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="UK">UK</option>
                                                        <option value="USA">USA</option>
                                                        <option value="Europe">Europe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="input form-group">
                                                    <select id="form_am" name="ielts" value="{{ old('Ielts') }}" placeholder="Ielts*" class="form-control cont" data-error="Concern person is required.">
                                                        <option value="">Select</option>
                                                        <option value="IELTS/PTE">IELTS/PTE</option>
                                                        <option value="Preparing for Test">Preparing for Test</option>
                                                        <option value="Exam given and Waiting for Result">Exam given and Waiting for Result</option>
                                                        <option value="Score Received">Score Received</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="input form-group">
                                                    <input id="form_city" type="text" name="reffer_by" required placeholder="Reffer by*" value="{{ old('Reffer by') }}" class="form-control cont" data-error="Country is required.">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="input form-group">
                                                    

                                                    <select id="form_am" name="accountManager" value="{{ old('accountManager') }}" placeholder="Referred By *" class="form-control cont" data-error="Concern person is required.">
                                                        <option value="">Select Referred By </option>
                                                        <option value="Shubham Roy">Shubham Roy</option>
                                                        <option value="Sakshi Dogra">Sakshi Dogra</option>
                                                        <option value="Aanchal Sharma">Aanchal Sharma</option>
                                                        <option value="Ravina Rai">Ravina Rai</option>
                                                        <option value="Aradhya Vashisht">Aradhya Vashisht</option>
                                                        <option value="Email">Email </option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                                <div class="g-recaptcha" data-theme="light" data-sitekey="6LfXKBAaAAAAAPlNeEHqmJlIf_g_xYxXwFgDJWrK" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <input type="submit" class="btn2" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <p>For <strong>quick assistance</strong> please call us on <strong><a href="tel:+917087078585">+91-70870-78585</a></strong> / <strong><a href="tel:+917000076668">+91-70000-76668</a></strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dates-section" id="event">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <!-- <img style="width:100%" src="images/event/img/team.jpg" /> -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    @include('event.footer')