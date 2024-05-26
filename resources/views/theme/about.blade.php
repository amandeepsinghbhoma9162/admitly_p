<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
<meta charset="utf-8" />
<title>Admitly.ai - Higher Education Redefined.</title>
<meta name="description" content="Creative Agency, Marketing Agency Template">
<meta name="keywords" content="Creative Agency, Marketing Agency">
<meta name="author" content="rajesh-doot">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link href="images/favicon.png" rel="icon">

<link href="../../cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

<link href="{{ asset('admitoffer/theme/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/fonts.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/darkmode.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/demo-css.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/gdpr-cookie.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/ihavecookie.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/plugin.min.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/swiper.min.css') }}" rel="stylesheet">
</head>
<body>

<header class="header-pr nav-bg-w main-header navfix fixed-top menu-white">
<div class="container-fluid m-pad">
<div class="menu-header">
<div class="dsk-logo"><a class="nav-brand" href="index.html">
<img src="{{asset('admitoffer/img/logo.png')}}" alt="Logo" class="mega-white-logo" />
<img src="{{asset('admitoffer/img/logo.png')}}" alt="Logo" class="mega-darks-logo" />
</a>
</div>
<div class="custom-nav" role="navigation">
<ul class="nav-list">
<li class="sbmenu">
<a href="{{route('home')}}" class="menu-links">Home</a>
</li>
<li class="sbmenu">
<a href="{{route('aboutus')}}" class="menu-links">About Us</a>
</li>
<li class="sbmenu">
<a href="{{route('contactus')}}" class="menu-links">Contact Us</a>
</li>
<li class="sbmenu rpdropdown">
<a href="{{route('gallery')}}" class="menu-links">Gallery</a>
</li>
<li class="sbmenu rpdropdown">
<a href="#" class="menu-links">Solution</a>
</li>
</ul>

<ul class="nav-list right-end-btn">
<!-- <li class="hidemobile"><a data-bs-toggle="offcanvas" href="#offcanvasExample" class="btn-round- btn-br bg-btn2"><i class="fas fa-phone-alt"></i></a></li> -->
<li class="hidemobile"><a href="{{route('agent.login')}}" class="btn-br bg-btn3 btshad-b2 lnk">Agent Login <span class="circle"></span></a> </li>
<!-- <li class="hidedesktop darkmodeswitch"><div class="switch-wrapper"> <label class="switch" for=""> <input type="checkbox" id="" /> <span class="slider round"></span> </label> </div> </li> -->
<li class="hidedesktop"><a data-bs-toggle="offcanvas" href="#offcanvasExample" class="btn-round- btn-br bg-btn2"><i class="fas fa-phone-alt"></i></a></li>
<li class="navm- hidedesktop"> <a class="toggle" href="#"><span></span></a></li>
</ul>
</div>
</div>

<nav id="main-nav">
<ul class="first-nav">
<li>
<a href="#">Home</a>
<ul>
<li>
<a href="#">Multi-Page Demo</a>
</li>
<li>
<a href="#">One-Page Demo</a></li>
<li>
<a href="#">Pages</a></li>
<li>
<a href="#">Shortcodes</a></li>
<li>
<a href="#">Portfolio</a></li>
<li>
<a href="#">Blog</a>
</li>
</ul>
<ul class="bottom-nav">
<li class="prb">
<a href="tel:+11111111111">
<svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 384 384">
<path d="M353.188,252.052c-23.51,0-46.594-3.677-68.469-10.906c-10.719-3.656-23.896-0.302-30.438,6.417l-43.177,32.594
								  c-50.073-26.729-80.917-57.563-107.281-107.26l31.635-42.052c8.219-8.208,11.167-20.198,7.635-31.448
								  c-7.26-21.99-10.948-45.063-10.948-68.583C132.146,13.823,118.323,0,101.333,0H30.813C13.823,0,0,13.823,0,30.813
								  C0,225.563,158.438,384,353.188,384c16.99,0,30.813-13.823,30.813-30.813v-70.323C384,265.875,370.177,252.052,353.188,252.052z" />
</svg>
</a>
</li>
<li class="prb">
<a href="#">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24">
<path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
<path d="M0 0h24v24H0z" fill="none" />
</svg>
</a>
</li>
<li class="prb">
<a href="#">
<svg enable-background="new 0 0 24 24" height="18" viewbox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
<path d="m23.309 14.547c1.738-7.81-5.104-14.905-13.139-13.543-4.362-2.707-10.17.352-10.17 5.542 0 1.207.333 2.337.912 3.311-1.615 7.828 5.283 14.821 13.311 13.366 5.675 3.001 11.946-2.984 9.086-8.676zm-7.638 4.71c-2.108.867-5.577.872-7.676-.227-2.993-1.596-3.525-5.189-.943-5.189 1.946 0 1.33 2.269 3.295 3.194.902.417 2.841.46 3.968-.3 1.113-.745 1.011-1.917.406-2.477-1.603-1.48-6.19-.892-8.287-3.483-.911-1.124-1.083-3.107.037-4.545 1.952-2.512 7.68-2.665 10.143-.768 2.274 1.76 1.66 4.096-.175 4.096-2.207 0-1.047-2.888-4.61-2.888-2.583 0-3.599 1.837-1.78 2.731 2.466 1.225 8.75.816 8.75 5.603-.005 1.992-1.226 3.477-3.128 4.253z" />
</svg>
</a>
</li>
</ul>
</nav>
</div>
</header>



<section class="breadcrumb-area banner-1" data-background="{{asset('admitoffer/theme/images/banner/9.jpg')}}">
<div class="text-block">
<div class="container">
<div class="row">
<div class="col-lg-12 v-center">
<div class="bread-inner">
<div class="bread-menu">
<ul>
<li><a href="index-2.html">Home</a></li>
<li><a href="#">About Us</a></li>
</ul>
</div>
<div class="bread-title">
<h2>About Admitly.ai</h2>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="about-agency pad-tb block-1">
<div class="container">
<div class="row">
<div class="col-lg-6 v-center">
<div class="about-image">
<img src="{{asset('admitoffer/theme/images/about/company-about.png')}}" alt="about us" class="img-fluid" />
</div>
</div>
<div class="col-lg-6">
<div class="common-heading text-l ">
<span>About Us</span>
<h2>About Admit Offer</h2>
<p>Admilty is an advanced online platform for international student recruitment, providing a wide range of services to enhance the enrollment process. Our platform offers Gen-AI counseling support, employs anti-counterfeit AI technology to prevent document falsification, and provides a suite of innovative services such as university application immunity, free document verification, video assessment mock interviews, and much more. With a strong focus on promoting diversity and maintaining high-quality student enrollments, Admilty is dedicated to revolutionizing the international student recruitment landscape.</p>

<p>Admitly, an initiative of Admission Overseas Ltd., brings over 20 years of expertise in international student counselling, query resolution, study abroad processes, and student recruitment.
</p>
<p>With our extensive expertise in international student recruitment, we have successfully helped students pursue their educational aspirations in top destinations such as Canada, UK, USA, Australia, New Zealand, and Europe. Our in-depth knowledge and experience in these regions allow us to provide comprehensive guidance and support throughout the entire study abroad journey.
</p>
<p>For students aspiring to study in Canada, we have established strong partnerships with renowned Canadian institutions, enabling us to offer a wide range of program options and ensure a smooth application process. Our understanding of Canadian immigration policies and study permit requirements ensures that students receive accurate and up-to-date information.
</p>
<p>In the UK, we have a deep understanding of the higher education landscape and can guide students in selecting the most suitable universities and courses. Our expertise in navigating the UCAS application system and assisting with visa procedures ensures a seamless transition for students.
</p>
<p>The USA, known for its prestigious universities, presents unique challenges in terms of the application process and visa requirements. Our experienced team is well-versed in the intricacies of the American education system, providing personalized support to students aiming to study in the USA.
</p>
<p>Australia and New Zealand are popular destinations among international students, offering high-quality education and a multicultural environment. Our expertise in these countries includes comprehensive knowledge of university programs, visa regulations, and the process of securing admissions.
</p>
<p>Expanding our reach to Europe, we assist students in exploring study opportunities across various European countries. Whether it's Germany, France, Netherlands, or any other European nation, our team is equipped with the necessary insights to guide students in selecting the right institutions and programs.
</p>
<p>Our expertise in international student recruitment extends beyond geographical boundaries, as we continually strive to stay updated with the latest trends, policies, and changes in the education landscape of these regions. We are dedicated to empowering students in making informed decisions and realizing their academic and career aspirations in their chosen destinations.
.</p>
</div>
<div class="row in-stats small about-statistics">
<div class="col-lg-4 col-sm-4">
<div class="statistics">
<div class="statnumb counter-number">
<span class="counter">450</span>
<p>Happy Clients</p>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-4">
<div class="statistics">
<div class="statnumb">
<span class="counter">95</span><span>k</span>
<p>Hours Worked</p>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-4">
<div class="statistics mb0">
<div class="statnumb counter-number">
<span class="counter">850</span>
<p>Projects Done</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<!-- <section class="why-choose pad-tb">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-6">
<div class="common-heading">
<span>We Are Awesome</span>
<h2 class="mb30">Why Choose Us</h2>
</div>
</div>
</div>
<div class="row upset">
<div class="col-lg-3 col-sm-6 mt30">
<div class="s-block up-hor">
<div class="s-card-icon"><img src="images/icons/research.svg" alt="service" class="img-fluid" /></div>
<h4>Reasearch and Analysis</h4>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
</div>
</div>
<div class="col-lg-3 col-sm-6 mt30">
<div class="s-block up-hor">
<div class="s-card-icon"><img src="images/icons/chat.svg" alt="service" class="img-fluid" /></div>
<h4>Negotiation and power</h4>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
</div>
</div>
<div class="col-lg-3 col-sm-6 mt30">
<div class="s-block up-hor">
<div class="s-card-icon"><img src="images/icons/monitor.svg" alt="service" class="img-fluid" /></div>
<h4>Creative and innovative solutions</h4>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
</div>
</div>
<div class="col-lg-3 col-sm-6 mt30">
<div class="s-block up-hor">
<div class="s-card-icon"><img src="images/icons/trasparency.svg" alt="service" class="img-fluid" /></div>
<h4>Trasparency and ease of work</h4>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
</div>
</div>
</div>
</div>
</section>
 -->
<footer>
<!-- <div class="footer-row1">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="email-subs">
<h3>Get New Insights Weekly</h3>
<p>News letter dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt. Enter your email</p>
</div>
</div>
<div class="col-lg-6 v-center">
<div class="email-subs-form">
<form>
<input type="email" placeholder="Email Your Address" name="emails">
<button type="submit" name="submit" class="lnk btn-main bg-btn">Subscribe <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></button>
</form>
</div>
</div>
</div>
</div>
</div> -->
<div class="footer-row2">
<div class="container">
<div class="row justify-content-between">
<div class="col-lg-3 col-sm-6  ftr-brand-pp">
<a class="navbar-brand mt30 mb25 f-dark-logo" href="#"> <img src="{{asset('admitoffer/img/logo.png')}}" alt="Logo" /></a>
<a class="navbar-brand mt30 mb25 f-white-logo" href="#"> <img src="{{asset('admitoffer/img/logo.png')}}" alt="Logo" /></a>
<p>Admilty is an online platform for international student recruitment, providing Gen-AI counseling, anti-counterfeit AI, and innovative services like university application immunity, document verification, video assessments, and more, ensuring diverse and high-quality student enrollments.</p>
<a href="{{route('agent.registers')}}" class="btn-main bg-btn3 lnk mt20">Become Partner <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></a>
</div>
<div class="col-lg-3 col-sm-6">
<h5>Contact Us</h5>
<ul class="footer-address-list ftr-details">
<li>
<span><i class="fas fa-envelope"></i></span>
<p>Email <span> <a href="#"><span >contact@admitoffer.com</span></a></span></p>
</li>
<li>
<span><i class="fas fa-phone-alt"></i></span>
<p>Phone <span> <a href="tel:(+91) 7087078585">(+91) 7087078585</a></span></p>
</li>
<li>
<span><i class="fas fa-map-marker-alt"></i></span>
<p>Address <span> Genesis Centre, 100 Signal Hill Rd #0100, St. John's, NL A1A 1B3, Canada</span></p>
</li>
</ul>
</div>
<div class="col-lg-2 col-sm-6">
<h5>Company</h5>
<ul class="footer-address-list link-hover">
<li><a href="get-quote.html">Contact</a></li>
<li><a href="javascript:void(0)">Customer's FAQ</a></li>
<li><a href="javascript:void(0)">Refund Policy</a></li>
<li><a href="javascript:void(0)">Privacy Policy</a></li>
<li><a href="javascript:void(0)">Terms and Conditions</a></li>
<li><a href="javascript:void(0)">License & Copyright</a></li>
</ul>
</div>
<!-- <div class="col-lg-4 col-sm-6 footer-blog-">
<h5>Latest Blogs</h5>
<div class="single-blog-">
<div class="post-thumb"><a href="#"><img src="images/blog/blog-small.jpg" alt="blog"></a></div>
<div class="content">
<p class="post-meta"><span class="post-date"><i class="far fa-clock"></i>April 15, 2020</span></p>
<h4 class="title"><a href="#">We Provide you Best &amp; Creative Consulting Service</a></h4>
</div>
</div>
<div class="single-blog-">
<div class="post-thumb"><a href="#"><img src="images/blog/blog-small.jpg" alt="blog"></a></div>
<div class="content">
<p class="post-meta"><span class="post-date"><i class="far fa-clock"></i>April 15, 2020</span></p>
<h4 class="title"><a href="#">We Provide you Best &amp; Creative Consulting Service</a></h4>
</div>
</div>
</div>
</div> -->
</div>
</div>
<div class="footer-row3">
<div class="copyright">
<div class="container">
<div class="row">
<div class="col-lg-12">
<!-- <div class="footer-social-media-icons">
<a href="javascript:void(0)" target="blank"><i class="fab fa-facebook"></i></a>
<a href="javascript:void(0)" target="blank"><i class="fab fa-twitter"></i></a>
<a href="javascript:void(0)" target="blank"><i class="fab fa-instagram"></i></a>
<a href="javascript:void(0)" target="blank"><i class="fab fa-linkedin"></i></a>
<a href="javascript:void(0)" target="blank"><i class="fab fa-youtube"></i></a>
<a href="javascript:void(0)" target="blank"><i class="fab fa-pinterest-p"></i></a>
<a href="javascript:void(0)" target="blank"><i class="fab fa-vimeo-v"></i></a>
<a href="javascript:void(0)" target="blank"><i class="fab fa-dribbble"></i></a>
<a href="javascript:void(0)" target="blank"><i class="fab fa-behance"></i></a>
</div> -->
<div class="footer-">
<p>© 2023. All Rights Reserved By <a href="#" target="blank">Admission Overseas Ltd.</a></p>
</div>
</div>
</div>
</div>
</div>
</div>
</footer>


<script src="{{asset('admitoffer/theme/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<script src="{{asset('admitoffer/theme/js/jquery.min.js')}}"></script>
<script src="{{asset('admitoffer/theme/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admitoffer/theme/js/plugin.min.js')}}"></script>
<script src="{{asset('admitoffer/theme/js/preloader.js')}}"></script>

<script src="{{asset('admitoffer/theme/js/main.js')}}"></script>
</body>

</html>