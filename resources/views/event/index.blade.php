@include('event._head')
<style>
    #home1
    {
    }
</style>
<script src='https://www.google.com/recaptcha/api.js' type="7a4c22487d30c2425ade14fe-text/javascript"></script>
<body id="home">
    @include('event.header')
    @include('event.slider')
    <div class="zoom-banner text-center" id="zoom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="heading">
                        <h3>Student Recruitment Agents</h3>
                    </div>
                    <h4>Get access to the Highest Commission Structure & 250+ revenue sharing institutions</h4>
                    <p>Venue: Hotel Everest, Thamel, Nepal<br>
                        <i class="fa fa-calendar"></i> 4th December, from 7:00PM Onwards
                    </p>
                </div>
            </div>
        </div>
    </div>
    <main id="main">
        <div class="span1" id="aboutus">
            <div class="container">
                <div class="span11 abt">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-sm-12">
                            <div class="heading">
                                <h5>Greetings & welcome</h5>
                                <h2>ADMIT OFFER AGENT NETWORKING EVENT</h2>
                            </div>
                            <p>Admit Offer cordially invites Existing Registered Partners on its student recruitment platform to attend Recruitment Partner Networking Event Get access to – AdmitOffer.com – an online admission application platform of more than 300+ UK and Canadian Universities</p>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="slider-form" id="register-now">
                                <h3>Register Now</h3>
                                <!-- <h6 class="text-center">Don't have Admit Offer UI Code? Register with Admit Offer and get your code on your dashboard. <a href="https://admitoffer.com/agent/registers" target="_blank">click here..</a></h6> -->
                                <!-- <h6 class="text-center">If have registration with Admit Offer get your code on your Admit Offer dashboard. <a href="https://admitoffer.com/agent/login" target="_blank">Login</a></h6> -->
                                <h6 class="text-center">Visit ADMIT OFFER Portal. <a href="https://admitoffer.com" target="_blank">Click here</a></h6>
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
                                <form id="contact-form" method="POST" action="{{route('event.post')}}" role="form" novalidate="true">
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
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class=" input form-group">
                                                    <input id="form_firstname" type="text" name="firstname" value="{{ old('firstname') }}" required placeholder="First Name*" class="form-control cont" data-error="First name is required.">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class=" input form-group">
                                                    <input id="form_lastname" type="text" name="lastname" value="{{ old('lastname') }}" required placeholder="Last Name*" class="form-control cont" data-error="Last name is required.">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input form-group">
                                                    <input id="form_email" type="email" name="email" required placeholder="Email*" value="{{ old('email') }}" class="form-control cont" data-error="Valid email is required.">
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
                                                    <input id="form_city" type="text" name="city" required placeholder="City*" value="{{ old('city') }}" class="form-control cont" data-error="City is required.">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="input form-group">
                                                    <input id="form_organization" type="text" name="organization" value="{{ old('organization') }}" required placeholder="Organization*" class="form-control cont" data-error="Organization is required.">
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
                                <p>For <strong>quick assistance</strong> please call us on <strong><a href="tel:+917087078585">+91-70870-78585</a></strong> / <strong><a href="tel:+917087478585">+91-70874-78585</a></strong></p>
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