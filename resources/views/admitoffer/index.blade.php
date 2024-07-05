@include('admitoffer._head')

<style>
@media(min-width:1280px)
{
 #home
 {
 color: var(--color-primary);
    background: #ffebe6;
 }
 }
 #home
 {
 color: var(--color-primary);
 }
</style>

<body>

    <!-- ======= Header ======= -->
    
	
    <!-- End Top Bar -->
        @include('admitoffer.header') 
    <!-- End Header -->
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5 justify-content-center" data-aos="fade-in">
                <div class="col-lg-8 col-md-8 order-2 order-lg-1 d-flex flex-column justify-content-center text-center">
                    <h2>Admissions to Colleges, Simplified! </h2>
                    <h5>Accelerate Your Skills for Qualification-Driven Careers.</h5>
                    
                    
                    
					
              </div>
                <?php /*?><div class="col-lg-6 order-1 order-lg-2">
                    <img src="{{asset('assets/assets/img/Compare.png')}}" class="img-fluid" alt="" data-aos="zoom-out"
                        data-aos-delay="100">
                </div><?php */?>
            </div>
        </div>

        <?php /*?><div class="icon-boxes position-relative">
            <div class="container position-relative">
                <div class="row gy-4 mt-5">

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-easel"></i></div>
                            <h4 class="title"><a href="" class="stretched-link">Lorem Ipsum</a></h4>
                        </div>
                    </div>
                    <!--End Icon Box -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-gem"></i></div>
                            <h4 class="title"><a href="" class="stretched-link">Sed ut perspiciatis</a></h4>
                        </div>
                    </div>
                    <!--End Icon Box -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-geo-alt"></i></div>
                            <h4 class="title"><a href="" class="stretched-link">Magni Dolores</a></h4>
                        </div>
                    </div>
                    <!--End Icon Box -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-command"></i></div>
                            <h4 class="title"><a href="" class="stretched-link">Nemo Enim</a></h4>
                        </div>
                    </div>
                    <!--End Icon Box -->

                </div>
            </div>
        </div><?php */?>
        

        </div>
    </section>
    <!-- End Hero Section -->

    <main id="main">

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Course Catalogue</h2>
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-6">
                            <p>Align your prior academic achievements with the most suitable programs, colleges, universities, and available job prospects</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 col-md-3">
                        <div class="box1">
                            <a href="{{route('local.search.index')}}">
                                <div class="img_1"><img src="{{asset('assets/assets/img/web-design.jpg')}}"></div>
                                <div class="img_1_txt">
                                    <h4>IT & telecommunications</h4>
                                    <span>View <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-6 col-md-3">
                        <div class="box1">
                            <a href="{{route('local.search.index')}}">
                                <div class="img_1"><img src="{{asset('assets/assets/img/arts.jpg')}}"></div>
                                <div class="img_1_txt">
                                    <h4>Art & Culture</h4>
                                    <span>View <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-6 col-md-3">
                        <div class="box1">
                            <a href="{{route('local.search.index')}}">
                                <div class="img_1"><img src="{{asset('assets/assets/img/graphic-design.jpg')}}"></div>
                                <div class="img_1_txt">
                                    <h4>Engineering Science & Technology</h4>
                                    <span>View <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-6 col-md-3">
                        <div class="box1">
                            <a href="{{route('local.search.index')}}">
                                <div class="img_1"><img src="{{asset('assets/assets/img/health-medical.jpg')}}"></div>
                                <div class="img_1_txt">
                                    <h4>Health & Medical</h4>
                                    <span>View <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-6 col-md-3">
                        <div class="box1">
                            <a href="{{route('local.search.index')}}">
                                <div class="img_1"><img src="{{asset('assets/assets/img/community.webp')}}"></div>
                                <div class="img_1_txt">
                                    <h4>Community & Social Services</h4>
                                    <span>View <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-6 col-md-3">
                        <div class="box1">
                            <a href="{{route('local.search.index')}}">
                                <div class="img_1"><img src="{{asset('assets/assets/img/sports.png')}}"></div>
                                <div class="img_1_txt">
                                    <h4>Sports, Fitness & related</h4>
                                    <span>View <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>


                    

                    <div class="col-6 col-md-3">
                        <div class="box1">
                            <a href="{{route('local.search.index')}}">
                                <div class="img_1"><img src="{{asset('assets/assets/img/food.jpg')}}"></div>
                                <div class="img_1_txt">
                                    <h4>Food & Agriculture</h4>
                                    <span>View <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-6 col-md-3">
                        <div class="box1">
                            <a href="{{route('local.search.index')}}">
                                <div class="img_1"><img src="{{asset('assets/assets/img/animal.jpg')}}"></div>
                                <div class="img_1_txt">
                                    <h4>Animal Related Practices</h4>
                                    <span>View <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>



                </div>
                
                <div class="bt1 text-center mt-4"><a href="{{route('local.search.index')}}" class="btn2 btn-fill"><span data-text="View All Course">View All Courses</span></a></div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= blue Section ======= -->
        <section class="sec-blue">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-9">
                        <div class="section-header">
                            <h2> <span class="theme-gradient">Students</span></h2>
                            <h2 style="font-size: 35px;">Apply to top programs for better job opportunities</h2>
                        </div>
                    </div>
                </div>
                
                

                <div class="row gx-5 align-items-center">
                    <div class="row justify-content-center">
                    <div class="col-12 col-md-9">
                        <div class="section-header">
                            <h3>Explore ideal career paths based on your prior qualifications.</h3>
                            <p>Choose from 30,000+ Programs across 500+ Premier Universities. Fast-track Admissions with AI Efficiency, Custom Alignment, 24/7 Applications.</p>
                        </div>
                    </div>
                </div>
                    
                    <!-- <div class="co-12 col-md-5">
                        <div class="box2 text-center text-md-start">
                            <h3>Explore ideal career paths based on your prior qualifications.</h3>
                            <p>Choose from 30,000+ Programs across 500+ Premier Universities. Fast-track Admissions with AI Efficiency, Custom Alignment, 24/7 Applications.</p>
                            
                            <div class="mt-5"></div>
                            <?php /*<a href="">Explore Case Study <i class="bi bi-arrow-right"></i></a> */ ?>
                        </div> 
                    </div> -->

                    <!-- <div class="co-12 col-md-7">
                        <div class="box2_img">

                            <img src="{{asset('assets/assets/img/Mind-Flow.png')}}" id="modalimg">
                            
                        </div>
                    </div> -->

                </div>

            </div>
            <div id="myModals" class="modal fade" role="dialog" >
  <div class="modal-dialog" style="min-width: 80%;">

    <!-- Modal content-->
    <div class="modal-content">
      
        
      <div class="modal-body">
        <p><img src="{{asset('assets/assets/img/Mind-Flow.png')}}"></p>
      </div>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
    </div>

  </div>
</div>
        </section>
        <!-- End blue Section -->

        <!-- ======= Stats Reason Section ======= -->

        <section class="reason" >
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-9">
                        <div class="section-header text-center">
                            <h2><span class="theme-gradient">Colleges</span></h2>
                            <h2 style="font-size: 35px;">Attract top Student Talent</h2>
                            <p>Admitly brings diverse global perspective to college campuses, streamlining admissions through AI and automation for higher efficiency and student satisfaction.</p>
                            <!-- <a href="#" class="btn2"><span data-text="Contact Sales to book a demo">Contact Sales to
                                    book a demo</span></a> -->
                        </div>

                    </div>
                </div>

            </div>
        </section>
        
        
        
        
        
        <section class="reason" style="background:#d3d3d338">
            <div class="container">
               

                <div class="row">
                    <div class="col-6 col-md-4">
                        <div class="box3 text-center">
                            <h3>2min</h3>
                            <p>First response time with 24/7 in-app support</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-4">
                        <div class="box3 text-center">
                            <h3>500+</h3>
                            <p>Elite universities and colleges</p>
                        </div>
                    </div>


                    <div class="col-6 col-md-4">
                        <div class="box3 text-center">
                            <h3>30,000+</h3>
                            <p>Programs and career paths</p>
                        </div>
                    </div>


                    <div class="col-6 col-md-4">
                        <div class="box3 text-center">
                            <h3>100,000+</h3>
                            <p>Career comparison analysis</p>
                        </div>
                    </div>


                    <div class="col-6 col-md-4">
                        <div class="box3 text-center">
                            <h3>5+</h3>
                            <p>Study destinations</p>
                        </div>
                    </div>

                   
                    
                    <div class="col-6 col-md-4">
                        <div class="box3 text-center">
                            <h3>$50 M+</h3>
                            <p>Contributions to the economies of study destinations</p>
                        </div>
                    </div>
       

                </div>

            </div>
        </section>
        <section class="reason">
            <div class="container">
               
                <!-- <div class="mrg-80"></div> -->

                <div class="reason-2" style="padding: 30px!important;">
                    <div class="row align-items-center justify-content-center text-center">
                        
                        <div class="col-12 ">
                            <!--<h3 style="padding: 15px 0px;">Trusted By</h3>-->
                            <div class="row">
                                <div class="col-4"><img src="{{asset('assets/assets/img/techstar.png')}}"></div>
                               <div class="col-4"> <img src="{{asset('assets/assets/img/forbe.png')}}"></div>
                               <div class="col-4"> <img src="{{asset('assets/assets/img/newcanadian.png')}}"></div>
                           </div>
                        </div>
                        
                    </div>
                </div>

            </div>
        </section>
        
        <section class="college_list">
           <div class="container-fluid p-0">
            <div class="uni_line text-center">
                <p>Explore Limitless Horizons: <strong>300+ Universities</strong>, 30,000+ Programs – Your <strong>Future Awaits</strong>!</p>
            </div>

            <div class="our_logos">
                <ul class="marquee" id="mycrawler2">
                   <li><img src="{{asset('assets/assets/img/logo/conestoga-college.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/brimingham-city-unviersity.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/cambrian-college.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/atmc.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/bath-spa-university.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/george-brown-college.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/heriot-watt-university.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/iau.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/lambton-college.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/lethbridge-college.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/lincoln-university-daldo-usa.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/norquest-college.png')}}"></li>                   
                    <li><img src="{{asset('assets/assets/img/logo/okangan-college.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/TePukenga.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/atmc.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/uclan.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/univeristy-of-bolton.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/university-of-canada-west.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/university-of-fasar-valley.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/university-of-greenwich.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/university-of-southwales.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/university-west-of-england.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/unviersity-of-west-london.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/webster-university.png')}}"></li>
                    <li><img src="{{asset('assets/assets/img/logo/witt-college.png')}}"></li>
                </ul>
            </div>
        </div>
        </section>

        <!-- End Reason Section -->

        <!-- ======= Stats Counter Section ======= -->
<!--======Blog ===-->
    <?php /*?><section>
    <div class="container">
  <h2 style="font-size: 44px;
    font-weight: 700; color:#15357a; text-align: center;">Blog</h2>

                <div class="row mt-n5">
                    <div class="col-md-6 col-lg-4 mt-5 wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="blog-grid">
                            <div class="blog-grid-img position-relative"><img alt="img" src="{{asset('assets/assets/img/blog/blog-1.jpg')}}"></div>
                            <div class="blog-grid-text p-4">
                                <h3 class="h5 mb-3"><a href="{{route('revolutionizinginternationalstudentrecruitment')}}">Revolutionizing International Student Recruitment..</a></h3>
                                <p class="display-30">The global education landscape has undergone remarkable transformations in recent years, with an increasing number of students seeking opportunities to study abroad... </p>
                                <div class="meta meta-style2">
                                    <ul>
                                        <li><a href="{{route('revolutionizinginternationalstudentrecruitment')}}"><i class="fas fa-calendar-alt"></i> 10 Jul, <script>document.write(new Date().getFullYear())</script></a></li>
                                        
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-5 wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                        <div class="blog-grid">
                            <div class="blog-grid-img position-relative"><img alt="img" src="{{asset('assets/assets/img/blog/blog-2.jpg')}}"></div>
                            <div class="blog-grid-text p-4">
                                <h3 class="h5 mb-3"><a href="{{route('shapingthefutureofglobaleducation')}}">Shaping the Future of Global Education..</a></h3>
                                <p class="display-30">In today's interconnected world, the pursuit of quality education has transcended geographical boundaries. The international student landscape is witnessing a remarkable... </p>
                                <div class="meta meta-style2">
                                    <ul>
                                        <li><a href="{{route('shapingthefutureofglobaleducation')}}"><i class="fas fa-calendar-alt"></i> 25 Jun, <script>document.write(new Date().getFullYear())</script></a></li>
                                       
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-5 wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                        <div class="blog-grid">
                            <div class="blog-grid-img position-relative"><img alt="img" src="{{asset('assets/assets/img/blog/blog-3.jpg')}}"></div>
                            <div class="blog-grid-text p-4">
                                <h3 class="h5 mb-3"><a href="{{route('empoweringstudentfutures')}}">Empowering Student Futures: How Admitly..</a></h3>
                                <p class="display-30">In an era of boundless opportunities, education plays a pivotal role in shaping individuals' futures and driving economic growth on both a personal and national level. However...</p>
                                <div class="meta meta-style2">
                                    <ul>
                                        <li><a href="{{route('empoweringstudentfutures')}}"><i class="fas fa-calendar-alt"></i> 16 May, <script>document.write(new Date().getFullYear())</script></a></li>
                                       
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>


</section><?php */?>















       
        
        <!-- ======= Testimonials Section ======= -->
        <!-- <section id="testimonials" class="testimonials">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Testimonials</h2>
                    <p>Voluptatem quibusdam ut ullam perferendis repellat non ut consequuntur est eveniet deleniti
                        fignissimos eos quam</p>
                </div>

            </div>

            <div class="scroll-animation-wrapper mt--50">
                <div class="scroll-animation scroll-right-left">


                    <div class="single-column-20">
                        <div class="rbt-testimonial-box">
                            <div class="inner">
                                <div class="clint-info-wrapper">
                                    <div class="thumb">
                                        <img src="{{asset('assets/assets/img/testimonials/agent-1.jpeg')}}"
                                            alt="Clint Images">
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
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="single-column-20">
                        <div class="rbt-testimonial-box">
                            <div class="inner">
                                <div class="clint-info-wrapper">
                                    <div class="thumb">
                                        <img src="{{asset('assets/assets/img/testimonials/agent-2.jpeg')}}"
                                            alt="Clint Images">
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
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="single-column-20">
                        <div class="rbt-testimonial-box">
                            <div class="inner">
                                <div class="clint-info-wrapper">
                                    <div class="thumb">
                                        <img src="{{asset('assets/assets/img/testimonials/agent-3.png')}}"
                                            alt="Clint Images">
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
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="single-column-20">
                        <div class="rbt-testimonial-box">
                            <div class="inner">
                                <div class="clint-info-wrapper">
                                    <div class="thumb">
                                        <img src="{{asset('assets/assets/img/testimonials/agent-4.jpg')}}"
                                            alt="Clint Images">
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
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-column-20">
                        <div class="rbt-testimonial-box">
                            <div class="inner">
                                <div class="clint-info-wrapper">
                                    <div class="thumb">
                                        <img src="{{asset('assets/assets/img/testimonials/agent-1.jpeg')}}"
                                            alt="Clint Images">
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
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="single-column-20">
                        <div class="rbt-testimonial-box">
                            <div class="inner">
                                <div class="clint-info-wrapper">
                                    <div class="thumb">
                                        <img src="{{asset('assets/assets/img/testimonials/agent-2.jpeg')}}"
                                            alt="Clint Images">
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
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <div class="scroll-animation-wrapper mt--30">
                <div class="scroll-animation scroll-left-right">

                    <div class="single-column-20">
                        <div class="rbt-testimonial-box">
                            <div class="inner">
                                <div class="clint-info-wrapper">
                                    <div class="thumb">
                                        <img src="{{asset('assets/assets/img/testimonials/agent-5.png')}}"
                                            alt="Clint Images">
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
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="single-column-20">
                        <div class="rbt-testimonial-box">
                            <div class="inner">
                                <div class="clint-info-wrapper">
                                    <div class="thumb">
                                        <img src="{{asset('assets/assets/img/testimonials/agent-6.jpg')}}"
                                            alt="Clint Images">
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
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="single-column-20">
                        <div class="rbt-testimonial-box">
                            <div class="inner">
                                <div class="clint-info-wrapper">
                                    <div class="thumb">
                                        <img src="{{asset('assets/assets/img/testimonials/agent-7.jfif')}}"
                                            alt="Clint Images">
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
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-column-20">
                        <div class="rbt-testimonial-box">
                            <div class="inner">
                                <div class="clint-info-wrapper">
                                    <div class="thumb">
                                        <img src="{{asset('assets/assets/img/testimonials/agent-8.png')}}"
                                            alt="Clint Images">
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
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-column-20">
                        <div class="rbt-testimonial-box">
                            <div class="inner">
                                <div class="clint-info-wrapper">
                                    <div class="thumb">
                                        <img src="{{asset('assets/assets/img/testimonials/agent-5.png')}}"
                                            alt="Clint Images">
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
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="single-column-20">
                        <div class="rbt-testimonial-box">
                            <div class="inner">
                                <div class="clint-info-wrapper">
                                    <div class="thumb">
                                        <img src="{{asset('assets/assets/img/testimonials/agent-6.jpg')}}"
                                            alt="Clint Images">
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
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>




        </section> --><!-- End Testimonials Section -->




    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    
     @include('admitoffer.footer')
    <!-- End Footer -->
    
    <script>
        $('#modalimg').on('click', function () {
  $('#myModals').modal('show');
});
            $('.close').on('click', function () {
  $('#myModals').modal('hide');
});
    </script>

  <script>
        var body = document.getElementsByTagName('body')[0];
        var req = document.getElementById('req');
        

        // trigger this function every time the user scrolls
        window.onscroll = function (event) {
            var scroll = window.pageYOffset;
            if (scroll > 100) {
                // green
                req.style.backgroundColor = '#7862a2';
            } 
            if (scroll < 100) {
                // green
                req.style.backgroundColor = '#7bab66';
            } 
        }
    </script> 
   

</body>

</html>