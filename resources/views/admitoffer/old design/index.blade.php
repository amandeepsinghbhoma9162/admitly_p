@include('admitoffer._head') 
<style>
  #home
  {
  color:#e77817 !important;
  }
</style>

<body class="rbt-header-sticky">

    <!-- Start Header Area -->
   @include('admitoffer.header') 
    <!-- Mobile Menu Section -->
    <div class="popup-mobile-menu">
        <div class="inner-wrapper">
            <div class="inner-top">
                <div class="content">
                    <div class="logo">
                        <a href="index.html">
                            <img src="{{asset('admitoffer/img/logo.png')}}" alt="Admitly">
                        </a>
                    </div>
                    <div class="rbt-btn-close">
                        <button class="close-button rbt-round-btn"><i class="feather-x"></i></button>
                    </div>
                </div>
                <p class="description">Histudy is a education website template. You can customize all.</p>
                <ul class="navbar-top-left rbt-information-list justify-content-start">
                    <li>
                        <a href="mailto:hello@example.com"><i class="feather-mail"></i>example@gmail.com</a>
                    </li>
                    <li>
                        <a href="#"><i class="feather-phone"></i>(302) 555-0107</a>
                    </li>
                </ul>
            </div>

            <nav class="mainmenu-nav">
                <ul class="mainmenu">
                    <li class="with-megamenu has-menu-child-item position-static">
                        <a href="#">Home <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        
                        <!-- End Mega Menu  -->
                    </li>

                    <li class="with-megamenu has-menu-child-item">
                        <a href="#">Courses <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        
                        <!-- End Mega Menu  -->
                    </li>

                    <li class="has-dropdown has-menu-child-item">
                        <a href="#">Dashboard
                            <i class="feather-chevron-down"></i>
                        </a>
                        
                    </li>

                    <li class="with-megamenu has-menu-child-item position-static">
                        <a href="#">Pages <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        
                        <!-- End Mega Menu  -->
                    </li>

                    <li class="with-megamenu has-menu-child-item position-static">
                        <a href="#">Elements <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        
                        <!-- End Mega Menu  -->
                    </li>

                    <li class="with-megamenu has-menu-child-item position-static">
                        <a href="#">Blog <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        
                        <!-- End Mega Menu  -->
                    </li>
                </ul>
            </nav>

            <div class="mobile-menu-bottom">
                <div class="rbt-btn-wrapper mb--20">
                    <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center" href="{{route('agent.login')}}">
                        <span>Login Now</span>
                    </a>
                </div>

                <div class="social-share-wrapper">
                    <span class="rbt-short-title d-block">Find With Us</span>
                    <ul class="social-icon social-default transparent-with-border justify-content-start mt--20">
                        <li><a href="https://www.facebook.com/">
                                <i class="feather-facebook"></i>
                            </a>
                        </li>
                        <li><a href="https://www.twitter.com">
                                <i class="feather-twitter"></i>
                            </a>
                        </li>
                        <li><a href="https://www.instagram.com/">
                                <i class="feather-instagram"></i>
                            </a>
                        </li>
                        <li><a href="https://www.linkdin.com/">
                                <i class="feather-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- Start Side Vav -->
   <!--  <div class="rbt-cart-side-menu">
        <div class="inner-wrapper">
            <div class="inner-top">
                <div class="content">
                    <div class="title">
                        <h4 class="title mb--0">Your shopping cart</h4>
                    </div>
                    <div class="rbt-btn-close" id="btn_sideNavClose">
                        <button class="minicart-close-button rbt-round-btn"><i class="feather-x"></i></button>
                    </div>
                </div>
            </div>
            <nav class="side-nav w-100">
                <ul class="rbt-minicart-wrapper">
                    <li class="minicart-item">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="assets/images/product/1.jpg" alt="Product Images">
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="title"><a href="single-product.html">Miracle Morning</a></h6>

                            <span class="quantity">1 * <span class="price">$22</span></span>
                        </div>
                        <div class="close-btn">
                            <button class="rbt-round-btn"><i class="feather-x"></i></button>
                        </div>
                    </li>

                    <li class="minicart-item">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="assets/images/product/7.jpg" alt="Product Images">
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="title"><a href="single-product.html">Happy Strong</a></h6>

                            <span class="quantity">1 * <span class="price">$30</span></span>
                        </div>
                        <div class="close-btn">
                            <button class="rbt-round-btn"><i class="feather-x"></i></button>
                        </div>
                    </li>

                    <li class="minicart-item">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="assets/images/product/3.jpg" alt="Product Images">
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="title"><a href="single-product.html">Rich Dad Poor Dad</a></h6>

                            <span class="quantity">1 * <span class="price">$50</span></span>
                        </div>
                        <div class="close-btn">
                            <button class="rbt-round-btn"><i class="feather-x"></i></button>
                        </div>
                    </li>

                    <li class="minicart-item">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="assets/images/product/4.jpg" alt="Product Images">
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="title"><a href="single-product.html">Momentum Theorem</a></h6>

                            <span class="quantity">1 * <span class="price">$50</span></span>
                        </div>
                        <div class="close-btn">
                            <button class="rbt-round-btn"><i class="feather-x"></i></button>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="rbt-minicart-footer">
                <hr class="mb--0">
                <div class="rbt-cart-subttotal">
                    <p class="subtotal"><strong>Subtotal:</strong></p>
                    <p class="price">$121</p>
                </div>
                <hr class="mb--0">
                <div class="rbt-minicart-bottom mt--20">
                    <div class="view-cart-btn">
                        <a class="rbt-btn btn-border icon-hover w-100 text-center" href="#">
                            <span class="btn-text">View Cart</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </a>
                    </div>
                    <div class="checkout-btn mt--20">
                        <a class="rbt-btn btn-gradient icon-hover w-100 text-center" href="#">
                            <span class="btn-text">Checkout</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div> -->
    <!-- End Side Vav -->
    <a class="close_side_menu" href="javascript:void(0);"></a>


    <main class="rbt-main-wrapper">
        <!-- Start Banner Area -->
        <div class="rbt-banner-area rbt-banner-8 variation-02 with-shape" style="padding-bottom: 0px!important;">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-10 offset-lg-1">
                    <div class="content">
                        <div class="inner text-center">
                            <div class="rbt-new-badge rbt-new-badge-one">
                                <span class="rbt-new-badge-icon">🏆</span> The Leader in Study Abroad
                            </div>
                            <h1 class="title">Programs In
                                <span class="header-caption">
                                    <span class="cd-headline clip is-full-width">
                                        <span class="cd-words-wrapper">
                                            <b class="is-visible theme-gradient">IT</b>
                                            <b class="is-visible theme-gradient">Computer</b>
                                            <b class="is-hidden theme-gradient">Arts and Culture</b>
                                            <b class="is-hidden theme-gradient">Justice</b>
                                            <b class="is-hidden theme-gradient">Law</b>
                                            <b class="is-hidden theme-gradient">Energy</b>
                                            <b class="is-hidden theme-gradient">Environment</b>
                                            <b class="is-hidden theme-gradient">Engineering</b>
                                            <b class="is-hidden theme-gradient">Science</b>
                                            <b class="is-hidden theme-gradient">Business</b>
                                            <b class="is-hidden theme-gradient">Finance</b>
                                            <b class="is-hidden theme-gradient">Media</b>
                                            <b class="is-hidden theme-gradient">Journalism</b>
                                            <b class="is-hidden theme-gradient">Health</b>
                                            <b class="is-hidden theme-gradient">Medical</b>
                                            <b class="is-hidden theme-gradient">Transportation</b>
                                            <b class="is-hidden theme-gradient">Career, Education</b>
                                            <b class="is-hidden theme-gradient">Culinary</b>
                                            <b class="is-hidden theme-gradient">Hospitality</b>
                                            <b class="is-hidden theme-gradient">Sports, Fitness</b>
                                            <b class="is-hidden theme-gradient">Biology</b>
                                            <b class="is-hidden theme-gradient">Animal Related</b>
                                            <b class="is-hidden theme-gradient">Food, Agriculture</b>
                                        </span>
                                </span>
                                </span>
                            </h1>
                            <p class=" has-medium-font-size mt--20">Admilty is an online platform for international student recruitment, providing Gen-AI counseling, anti-counterfeit AI, and innovative services like university application immunity, document verification, video assessments, and more, ensuring diverse and high-quality student enrollments.
                            </p>
                            <div class="slider-btn rbt-button-group justify-content-center">
                                <a class="rbt-btn btn-gradient hover-icon-reverse" href="{{route('agent.login')}}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Log in to Start</span>
                                    <span class="btn-icon"><i class="fa fa-angle-right"></i></span>
                                    <span class="btn-icon"><i class="fa fa-angle-right"></i></span>
                                    </span>
                                </a>
                                <a class="rbt-btn hover-icon-reverse btn-white" href="{{route('local.search.index')}}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Find Program</span>
                                    <span class="btn-icon"><i class="fa fa-angle-right"></i></span>
                                    <span class="btn-icon"><i class="fa fa-angle-right"></i></span>
                                    </span>
                                </a>
                            </div>
                            <div class="row mt--20">
                                <a href="{{route('contactus')}}">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape-image">
                <img src="{{asset('admitly/images/tree-shape.svg')}}" alt="Shape">
            </div>
        </div>
    </div>
        <!-- End Banner Area -->
    <div class="rbt-about-area about-style-1 bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row g-5 align-items-start">
                <div class="col-lg-6">
                    <div class="content">
                        <h2 class="title mb--0" data-sal="slide-up" data-sal-duration="700">About the University we are creative preapre you for your career supportive.</h2>
                    </div>
                </div>
                <div class="col-lg-6" data-sal="slide-up" data-sal-duration="700">
                    <p class="mb--40 mb_sm--20">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam inventore praesentium alias incidunt! Veritatis, necessitatibus fuga dolore tenetur, beatae suscipit fugit est ea perspiciatis quo provident nisi dolor similique architecto nihil! Ipsa aspernatur aperiam recusandae pariatur odit repudiandae assumenda architecto.</p>
                    <div class="readmore-btn">
                        <a class="rbt-moderbt-btn" href="#">
                            <span class="moderbt-btn-text">University Overview</span>
                            <i class="fa fa-arrow-right fa-0.5x"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rbt-categories-area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row g-5 align-items-start mb--30">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="section-title">
                        <h4 class="title">Popular Programs In Canada.</h4>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="read-more-btn text-start text-md-end">
                        <a class="rbt-btn rbt-switch-btn bg-primary-opacity btn-sm" href="{{route('local.search.index')}}">
                            <span data-text="View All">View All</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <!-- Start Category Box Layout  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="rbt-cat-box rbt-cat-box-1 list-style" href="course-filter-one-toggle.html">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('admitly/images/web-design.jpg')}}" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">Web Design</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">15 Courses<i class="fa fa-arrow-right fa-0.5x"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Category Box Layout  -->
                <!-- Start Category Box Layout  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="rbt-cat-box rbt-cat-box-1 list-style" href="course-filter-one-toggle.html">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('admitly/images/graphic-design.jpg')}}" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">Graphic Design</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">25 Courses<i class="fa fa-arrow-right fa-0.5x"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Category Box Layout  -->

                <!-- Start Category Box Layout  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="rbt-cat-box rbt-cat-box-1 list-style">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('admitly/images/personal-development.jpg')}}" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">Personal Development</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">14 Courses<i class="fa fa-arrow-right fa-0.5x"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Category Box Layout  -->

                <!-- Start Category Box Layout  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="rbt-cat-box rbt-cat-box-1 list-style" href="course-filter-one-toggle.html">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('admitly/images/software.jpg')}}" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">IT and Software</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">12 Courses<i class="fa fa-arrow-right fa-0.5x"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Category Box Layout  -->

                <!-- Start Category Box Layout  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="rbt-cat-box rbt-cat-box-1 list-style" href="course-filter-one-toggle.html">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('admitly/images/sales.jpg')}}" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">Sales Marketing</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">30 Courses<i class="fa fa-arrow-right fa-0.5x"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Category Box Layout  -->

                <!-- Start Category Box Layout  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="rbt-cat-box rbt-cat-box-1 list-style" href="course-filter-one-toggle.html">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('admitly/images/arts.jpg')}}" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">Art & Humanities</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">15 Courses<i class="fa fa-arrow-right fa-0.5x"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Category Box Layout  -->

                <!-- Start Category Box Layout  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="rbt-cat-box rbt-cat-box-1 list-style" href="course-filter-one-toggle.html">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('admitly/images/mobile.jpg')}}" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">Mobile Application</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">40 Courses<i class="fa fa-arrow-right fa-0.5x"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Category Box Layout  -->

                <!-- Start Category Box Layout  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="rbt-cat-box rbt-cat-box-1 list-style" href="course-filter-one-toggle.html">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('admitly/images/finance.jpg')}}" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">Finance & Accounting</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">20 Courses<i class="fa fa-arrow-right fa-0.5x"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Category Box Layout  -->
            </div>

        </div>
    </div>
    <!-- End Service Area -->
    <div class="rbt-categories-area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row g-5 align-items-start mb--30">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="section-title">
                        <h4 class="title">Popular Programs In UK.</h4>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="read-more-btn text-start text-md-end">
                        <a class="rbt-btn rbt-switch-btn bg-primary-opacity btn-sm" href="{{route('local.search.index')}}">
                            <span data-text="View All">View All</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <!-- Start Category Box Layout  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="rbt-cat-box rbt-cat-box-1 list-style" href="course-filter-one-toggle.html">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('admitly/images/web-design.jpg')}}" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">Web Design</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">15 Courses<i class="fa fa-arrow-right fa-0.5x"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Category Box Layout  -->
                <!-- Start Category Box Layout  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="rbt-cat-box rbt-cat-box-1 list-style" href="course-filter-one-toggle.html">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('admitly/images/graphic-design.jpg')}}" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">Graphic Design</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">25 Courses<i class="fa fa-arrow-right fa-0.5x"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Category Box Layout  -->

                <!-- Start Category Box Layout  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="rbt-cat-box rbt-cat-box-1 list-style">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('admitly/images/personal-development.jpg')}}" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">Personal Development</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">14 Courses<i class="fa fa-arrow-right fa-0.5x"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Category Box Layout  -->

                <!-- Start Category Box Layout  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="rbt-cat-box rbt-cat-box-1 list-style" href="course-filter-one-toggle.html">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('admitly/images/software.jpg')}}" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">IT and Software</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">12 Courses<i class="fa fa-arrow-right fa-0.5x"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Category Box Layout  -->

                <!-- Start Category Box Layout  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="rbt-cat-box rbt-cat-box-1 list-style" href="course-filter-one-toggle.html">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('admitly/images/sales.jpg')}}" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">Sales Marketing</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">30 Courses<i class="fa fa-arrow-right fa-0.5x"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Category Box Layout  -->

                <!-- Start Category Box Layout  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="rbt-cat-box rbt-cat-box-1 list-style" href="course-filter-one-toggle.html">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('admitly/images/arts.jpg')}}" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">Art & Humanities</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">15 Courses<i class="fa fa-arrow-right fa-0.5x"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Category Box Layout  -->

                <!-- Start Category Box Layout  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="rbt-cat-box rbt-cat-box-1 list-style" href="course-filter-one-toggle.html">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('admitly/images/mobile.jpg')}}" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">Mobile Application</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">40 Courses<i class="fa fa-arrow-right fa-0.5x"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Category Box Layout  -->

                <!-- Start Category Box Layout  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="rbt-cat-box rbt-cat-box-1 list-style" href="course-filter-one-toggle.html">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{asset('admitly/images/finance.jpg')}}" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">Finance & Accounting</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">20 Courses<i class="fa fa-arrow-right fa-0.5x"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Category Box Layout  -->
            </div>

        </div>
    </div>
    <!-- End Service Area -->
    <div class="rbt-testimonial-area bg-color-white rbt-section-gap overflow-hidden">
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle bg-primary-opacity">EDUCATION FOR EVERYONE</span>
                            <h2 class="title">People like histudy education. <br /> No joking - here’s the proof!</h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-animation-wrapper mt--50">
            <div class="scroll-animation scroll-right-left">

                <!-- End Single Testimonial  -->

                <!-- Start Single Testimonial  -->
                <div class="single-column-20">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="thumb">
                                    <img src="{{asset('admitly/images/agent-1.jpeg')}}" alt="Clint Images">
                                </div>
                                <div class="client-info">
                                    <h5 class="title">Mandy F. Wood</h5>
                                    <span>SR Designer <i>@ Google</i></span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">Educational template, vulputate at sapien sit amet,
                                    auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                <a class="rbt-btn-link" href="#">Read Project Case Study<i
                                class="fa fa-arrow-right fa-0.5x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->

                <!-- Start Single Testimonial  -->
                <div class="single-column-20">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="thumb">
                                    <img src="{{asset('admitly/images/agent-2.jpeg')}}" alt="Clint Images">
                                </div>
                                <div class="client-info">
                                    <h5 class="title">Mildred W. Diaz</h5>
                                    <span>Executive Officer <i>@ Yelp</i></span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">Online leaning, vulputate at sapien sit amet,
                                    auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                <a class="rbt-btn-link" href="#">Read Project Case Study<i
                                class="fa fa-arrow-right fa-0.5x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->

                <!-- Start Single Testimonial  -->
                <div class="single-column-20">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="thumb">
                                    <img src="{{asset('admitly/images/agent-3.png')}}" alt="Clint Images">
                                </div>
                                <div class="client-info">
                                    <h5 class="title">Christopher H. Win</h5>
                                    <span>Product Designer <i>@ Google</i></span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">Remote learning, vulputate at sapien sit amet,
                                    auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                <a class="rbt-btn-link" href="#">Read Project Case Study<i
                                class="fa fa-arrow-right fa-0.5x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->

                <!-- Start Single Testimonial  -->
                <div class="single-column-20">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="thumb">
                                    <img src="{{asset('admitly/images/agent-4.jpg')}}" alt="Clint Images">
                                </div>
                                <div class="client-info">
                                    <h5 class="title">Martha Maldonado</h5>
                                    <span>Executive Chairman <i>@ Google</i></span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">University managemnet, vulputate at sapien sit amet,
                                    auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                <a class="rbt-btn-link" href="#">Read Project Case Study<i
                                class="fa fa-arrow-right fa-0.5x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-column-20">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="thumb">
                                    <img src="{{asset('admitly/images/agent-1.jpeg')}}" alt="Clint Images">
                                </div>
                                <div class="client-info">
                                    <h5 class="title">Mandy F. Wood</h5>
                                    <span>SR Designer <i>@ Google</i></span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">Educational template, vulputate at sapien sit amet,
                                    auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                <a class="rbt-btn-link" href="#">Read Project Case Study<i
                                class="fa fa-arrow-right fa-0.5x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->

                <!-- Start Single Testimonial  -->
                <div class="single-column-20">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="thumb">
                                    <img src="{{asset('admitly/images/agent-2.jpeg')}}" alt="Clint Images">
                                </div>
                                <div class="client-info">
                                    <h5 class="title">Mildred W. Diaz</h5>
                                    <span>Executive Officer <i>@ Yelp</i></span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">Online leaning, vulputate at sapien sit amet,
                                    auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                <a class="rbt-btn-link" href="#">Read Project Case Study<i
                                class="fa fa-arrow-right fa-0.5x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->

                <!-- Start Single Testimonial  -->
                <div class="single-column-20">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="thumb">
                                    <img src="{{asset('admitly/images/agent-3.png')}}" alt="Clint Images">
                                </div>
                                <div class="client-info">
                                    <h5 class="title">Christopher H. Win</h5>
                                    <span>Product Designer <i>@ Google</i></span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">Remote learning, vulputate at sapien sit amet,
                                    auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                <a class="rbt-btn-link" href="#">Read Project Case Study<i
                                class="fa fa-arrow-right fa-0.5x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->

                <!-- Start Single Testimonial  -->
                <div class="single-column-20">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="thumb">
                                    <img src="{{asset('admitly/images/agent-4.jpg')}}" alt="Clint Images">
                                </div>
                                <div class="client-info">
                                    <h5 class="title">Martha Maldonado</h5>
                                    <span>Executive Chairman <i>@ Google</i></span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">University managemnet, vulputate at sapien sit amet,
                                    auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                <a class="rbt-btn-link" href="#">Read Project Case Study<i
                                class="fa fa-arrow-right fa-0.5x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->
            </div>
        </div>

        <div class="scroll-animation-wrapper mt--20">
            <div class="scroll-animation scroll-left-right">


                <!-- Start Single Testimonial  -->
                <div class="single-column-20">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="thumb">
                                    <img src="{{asset('admitly/images/agent-5.png')}}" alt="Clint Images">
                                </div>
                                <div class="client-info">
                                    <h5 class="title">Mandy F. Wood</h5>
                                    <span>SR Designer <i>@ Google</i></span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">Educational template, vulputate at sapien sit amet,
                                    auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                <a class="rbt-btn-link" href="#">Read Project Case Study<i
                                class="fa fa-arrow-right fa-0.5x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->

                <!-- Start Single Testimonial  -->
                <div class="single-column-20">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="thumb">
                                    <img src="{{asset('admitly/images/agent-6.jpg')}}" alt="Clint Images">
                                </div>
                                <div class="client-info">
                                    <h5 class="title">Mildred W. Diaz</h5>
                                    <span>Executive Officer <i>@ Yelp</i></span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">Online leaning, vulputate at sapien sit amet,
                                    auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                <a class="rbt-btn-link" href="#">Read Project Case Study<i
                                class="fa fa-arrow-right fa-0.5x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->

                <!-- Start Single Testimonial  -->
                <div class="single-column-20">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="thumb">
                                    <img src="{{asset('admitly/images/agent-7.jfif')}}" alt="Clint Images">
                                </div>
                                <div class="client-info">
                                    <h5 class="title">Christopher H. Win</h5>
                                    <span>Product Designer <i>@ Google</i></span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">Remote learning, vulputate at sapien sit amet,
                                    auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                <a class="rbt-btn-link" href="#">Read Project Case Study<i
                                class="fa fa-arrow-right fa-0.5x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->

                <!-- Start Single Testimonial  -->
                <div class="single-column-20">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="thumb">
                                    <img src="{{asset('admitly/images/agent-8.png')}}" alt="Clint Images">
                                </div>
                                <div class="client-info">
                                    <h5 class="title">Martha Maldonado</h5>
                                    <span>Executive Chairman <i>@ Google</i></span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">University managemnet, vulputate at sapien sit amet,
                                    auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                <a class="rbt-btn-link" href="#">Read Project Case Study<i
                                class="fa fa-arrow-right fa-0.5x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-column-20">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="thumb">
                                    <img src="{{asset('admitly/images/agent-5.png')}}" alt="Clint Images">
                                </div>
                                <div class="client-info">
                                    <h5 class="title">Mandy F. Wood</h5>
                                    <span>SR Designer <i>@ Google</i></span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">Educational template, vulputate at sapien sit amet,
                                    auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                <a class="rbt-btn-link" href="#">Read Project Case Study<i
                                class="fa fa-arrow-right fa-0.5x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->

                <!-- Start Single Testimonial  -->
                <div class="single-column-20">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="thumb">
                                    <img src="{{asset('admitly/images/agent-6.jpg')}}" alt="Clint Images">
                                </div>
                                <div class="client-info">
                                    <h5 class="title">Mildred W. Diaz</h5>
                                    <span>Executive Officer <i>@ Yelp</i></span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">Online leaning, vulputate at sapien sit amet,
                                    auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                <a class="rbt-btn-link" href="#">Read Project Case Study<i
                                class="fa fa-arrow-right fa-0.5x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->

                <!-- Start Single Testimonial  -->
                <div class="single-column-20">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="thumb">
                                    <img src="{{asset('admitly/images/agent-7.jfif')}}" alt="Clint Images">
                                </div>
                                <div class="client-info">
                                    <h5 class="title">Christopher H. Win</h5>
                                    <span>Product Designer <i>@ Google</i></span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">Remote learning, vulputate at sapien sit amet,
                                    auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                <a class="rbt-btn-link" href="#">Read Project Case Study<i
                                class="fa fa-arrow-right fa-0.5x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->

                <!-- Start Single Testimonial  -->
                <div class="single-column-20">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="thumb">
                                    <img src="{{asset('admitly/images/agent-8.png')}}" alt="Clint Images">
                                </div>
                                <div class="client-info">
                                    <h5 class="title">Martha Maldonado</h5>
                                    <span>Executive Chairman <i>@ Google</i></span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">University managemnet, vulputate at sapien sit amet,
                                    auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                <a class="rbt-btn-link" href="#">Read Project Case Study<i
                                class="fa fa-arrow-right fa-0.5x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->
            </div>
        </div>
    </div>
        <!-- End Blog Style -->

       @include('admitoffer.footer') 

       

    </main>

    <!-- End Page Wrapper Area -->
    <div class="rbt-progress-parent">
        <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{asset('admitly/js/modernizr.min.js')}}"></script>
    <!-- jQuery JS -->
    <script src="{{asset('admitly/js/jquery.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('admitly/js/bootstrap.min.js')}}"></script>
    <!-- sal.js -->
    <script src="{{asset('admitly/js/sal.js')}}"></script>
    <script src="{{asset('admitly/js/swiper.js')}}"></script>
    <script src="{{asset('admitly/js/magnify.min.js')}}"></script>
    <script src="{{asset('admitly/js/jquery-appear.js')}}"></script>
    <script src="{{asset('admitly/js/odometer.js')}}"></script>
    <script src="{{asset('admitly/js/backtotop.js')}}"></script>
    <script src="{{asset('admitly/js/isotop.js')}}"></script>
    <script src="{{asset('admitly/js/imageloaded.js')}}"></script>

    <script src="{{asset('admitly/js/wow.js')}}"></script>
    <script src="{{asset('admitly/js/waypoint.min.js')}}"></script>
    <script src="{{asset('admitly/js/easypie.js')}}"></script>
    <script src="{{asset('admitly/js/text-type.js')}}"></script>
    <script src="{{asset('admitly/js/jquery-one-page-nav.js')}}"></script>
    <script src="{{asset('admitly/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('admitly/js/jquery-ui.js')}}"></script>
    <script src="{{asset('admitly/js/magnify-popup.min.js')}}"></script>
    <script src="{{asset('admitly/js/paralax-scroll.js')}}"></script>
    <script src="{{asset('admitly/js/paralax.min.js')}}"></script>
    <script src="{{asset('admitly/js/countdown.js')}}"></script>
    <script src="{{asset('admitly/js/plyr.js')}}"></script>
    <!-- Main JS -->
    <script src="{{asset('admitly/js/main.js')}}"></script>
</body>

</html>