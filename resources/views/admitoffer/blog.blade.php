@include('admitoffer._head')
<style>
    h2{
        
        
        margin-left: auto;
        margin-right: auto;
        color: #228B22;
        text-align: center;
        font-size: 30px;
        max-width: 350px;
        position: relative;
      
    }
    h2:before {
  content: "";
  display: block;
  width: 120px;
  height: 2px;
  background: #fff;
  left: 0;
  top: 50%;
  position: absolute;
}
h2:after {
  content: "";
  display: block;
  width: 120px;
  height: 2px;
  background: #fff;
  right: 0;
  top: 50%;
  position: absolute;
}
    
@media(min-width:1280px)
{
 #policy
 {
 color: var(--color-primary);
    background: #ffebe6;
 }
 }
 #policy
 {
 color: var(--color-primary);
 }
</style>
<body>

    <!-- ======= Header ======= -->
    
    <!-- End Top Bar -->

    <!-- End Header -->
     @include('admitoffer.header')
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section class="page-header">
            <div class="page-header-bg" style="background-image: url('{{asset('assets/assets/img/clg.png')}}')">
            </div>
            <div class="container">
              <div class="page-header__inner">
                <h2 style="color:#fff";>Blog</h2>    
                    
                </div>  
             </div>
        </section>
    
    <!-- End Hero Section -->

    <main id="main">
   


    <div class="container">
                <div class="row mt-n5">
                    <div class="col-md-6 col-lg-4 mt-5 wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="blog-grid">
                            <div class="blog-grid-img position-relative"><img alt="img" src="{{asset('assets/assets/img/blog/blog-1.jpg')}}"></div>
                            <div class="blog-grid-text p-4">
                                <h3 class="h5 mb-3"><a href="javascript:;">Revolutionizing International Student Recruitment..</a></h3>
                                <p class="display-30">The global education landscape has undergone remarkable transformations in recent years, with an increasing number of students seeking opportunities to study abroad... </p>
                                <div class="meta meta-style2">
                                    <ul>
                                        <li><a href="javascript:;"><i class="fas fa-calendar-alt"></i> 10 Jul, <script>document.write(new Date().getFullYear())</script></a></li>
                                        
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-5 wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                        <div class="blog-grid">
                            <div class="blog-grid-img position-relative"><img alt="img" src="{{asset('assets/assets/img/blog/blog-2.jpg')}}"></div>
                            <div class="blog-grid-text p-4">
                                <h3 class="h5 mb-3"><a href="shaping-the-future-of-global-education.php">Shaping the Future of Global Education..</a></h3>
                                <p class="display-30">In today's interconnected world, the pursuit of quality education has transcended geographical boundaries. The international student landscape is witnessing a remarkable... </p>
                                <div class="meta meta-style2">
                                    <ul>
                                        <li><a href="shaping-the-future-of-global-education.php"><i class="fas fa-calendar-alt"></i> 25 Jun, <script>document.write(new Date().getFullYear())</script></a></li>
                                       
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-5 wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                        <div class="blog-grid">
                            <div class="blog-grid-img position-relative"><img alt="img" src="{{asset('assets/assets/img/blog/blog-3.jpg')}}"></div>
                            <div class="blog-grid-text p-4">
                                <h3 class="h5 mb-3"><a href="empowering-student-futures.php">Empowering Student Futures: How Admitly..</a></h3>
                                <p class="display-30">In an era of boundless opportunities, education plays a pivotal role in shaping individuals' futures and driving economic growth on both a personal and national level. However...</p>
                                <div class="meta meta-style2">
                                    <ul>
                                        <li><a href="empowering-student-futures.php"><i class="fas fa-calendar-alt"></i> 16 May, <script>document.write(new Date().getFullYear())</script></a></li>
                                       
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    
                <div class="row mt-6 wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                    <?php /*<div class="col-12">
                        <div class="pagination text-small text-uppercase text-extra-dark-gray">
                            <ul>
                                <li><a href="#!"><i class="fas fa-long-arrow-alt-left me-1 d-none d-sm-inline-block"></i> Prev</a></li>
                                <li class="active"><a href="#!">1</a></li>
                                <li><a href="#!">2</a></li>
                                <li><a href="#!">3</a></li>
                                <li><a href="#!">Next <i class="fas fa-long-arrow-alt-right ms-1 d-none d-sm-inline-block"></i></a></li>
                            </ul>
                        </div>
                    </div> */?>
                </div>
            </div>
   
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <!-- End Footer -->
      @include('admitoffer.footer')
    <!-- End Footer -->

    

</body>

</html>