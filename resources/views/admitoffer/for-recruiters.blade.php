@include('admitoffer._head')
<style>
  h5 
    {
    color: #ED3D0B;
    font-weight: 600;
}
  
@media(min-width:1280px)
{
 #about
 {
 color: var(--color-primary);
    background: #ffebe6;
 }
 }
 #about
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
    <section id="hero" class="hero about_hero">
        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2>Empowering Vetted Recruiters Globally</h2>
                    <p>At Admily, we recognize the critical role that education agents and recruiters play in guiding students towards their academic dreams. Our platform is designed to empower vetted recruiters globally, providing them with the necessary tools and resources to support students on their study abroad journey.</p>
                    <a href="{{route('agent.login')}}" class="btn2"><span data-text="Agent Login">Agent Login</span></a>
                    
              </div>
                <div class="col-lg-6 order-1 order-lg-2">
                  <div class="about_hero_img">
                    <img src="{{asset('assets/assets/img/recruiters.png')}}" class="img-fluid" alt="" data-aos="zoom-out"
                        data-aos-delay="100">
                      </div>
                      
                </div>
            </div>
        </div>

        
		


        </div>
    </section>
    <!-- End Hero Section -->

    <main id="main">



        <!-- ======= blue Section ======= -->
        <section class="about">
            <div class="container">


                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="abt_txt text-center">
                            <h3>Benefits for Vetted Recruiters:</h3>   
                            <p>At Admily, we take pride in partnering with a prestigious and diverse portfolio of institutions worldwide. Our network encompasses a broad range of colleges and universities renowned for their academic excellence, cutting-edge programs, and commitment to providing students with a transformative educational experience. As a result, students can explore a plethora of options and find the perfect fit for their aspirations.</p>                    
                          
                        </div>
                       </div>
                      </div> 
                      <div class="row gy-3 abt_icons mt--30">
                    
                      <div class="col-12 col-md-4">
                        <div class="abt_box1">
                          <div class="icon_1"><img src="{{asset('assets/assets/img/education.png')}}"></div>
                          <h4>Academic Excellence:</h4>
                          <p>Our school portfolio is globally recognized for academic excellence. Offering programs in various disciplines and diverse interests.</p>
                        </div>
                      </div>
                      
                      <div class="col-12 col-md-4">
                        <div class="abt_box1">
                          <div class="icon_1"><img src="{{asset('assets/assets/img/global-search.png')}}"></div>
                          <h4>Global Reach :</h4>
                          <p>Admily's portfolio includes institutions from top study destinations across US, Canada, UK, ANZ and NZ.  We help you access the globe.  30,000 programs give you the freedom to help students choose from an array of options.  So you can align the journey with the goals.</p>
                        </div>
                      </div>
                      
                      
                      <div class="col-12 col-md-4">
                        <div class="abt_box1">
                          <div class="icon_1"><img src="{{asset('assets/assets/img/puzzle.png')}}"></div>
                          <h4>Matching: </h4>
                          <p>Our matching algorithms help you find the right students for specific programs. This approach not only saves time, but also ensures you can focus on building relationships with students.</p>
                        </div>
                      </div>
                      
                      
<!--                       <div class="col-12 col-md-4">
                        <div class="abt_box1">
                          <div class="icon_1"><img src="{{asset('assets/assets/img/visa-icon.png')}}"></div>
                          <h4>Insights:</h4>
                          <p>Admily equips you with the right insights about programs and schools.  We empower you to provide accurate, impactful, and up-to-date guidance to students.</p>
                        </div>
                      </div> -->
                      
                    </div>
                    
                    <div class="row gy-3 abt_icons mt--30">
                      <div class="col-12 col-md-4">
                        <div class="abt_box1">
                          <div class="icon_1"><img src="{{asset('assets/assets/img/data-analytics.png')}}"></div>
                          <h4>Insights:</h4>
                          <p>Admily equips you with the right insights about programs and schools.  We empower you to provide accurate, impactful, and up-to-date guidance to students.</p>
                        </div>
                      </div>

                    <div class="col-12 col-md-4">
                      <div class="abt_box1">
                        <div class="icon_1"><img src="{{asset('assets/assets/img/application.png')}}"></div>
                        <h4>Application Processing:</h4>
                        <p>Admitly simplifies the entire process.  From assisting with documentation to ensuring timely submissions.  You can rely on our support to enhance the application experience you provide.</p>
                      </div>
                    </div>
                    
                    <div class="col-12 col-md-4">
                      <div class="abt_box1">
                        <div class="icon_1"><img src="{{asset('assets/assets/img/multitasking.png')}}"></div>
                        <h4>Productivity: </h4>
                        <p>Boost productivity and efficiency by easily managing multiple applications and student profiles. This efficiency allows you to build stronger connections and provide personalized counseling.</p>
                      </div>
                    </div>
                    
                    
<!--                     <div class="col-12 col-md-3">
                      <div class="abt_box1">
                        <div class="icon_1"><img src="{{asset('assets/assets/img/icon-money-stack.svg')}}"></div>
                        <h4>Supportive Faculty and Staff:</h4>
                        <p>With a focus on student success, our partnering institutions boast dedicated faculty and staff who are passionate about guiding and supporting students throughout their academic journey.</p>
                      </div>
                    </div>
                    
                    
                    <div class="col-12 col-md-3">
                      <div class="abt_box1">
                        <div class="icon_1"><img src="{{asset('assets/assets/img/visa-icon.png')}}"></div>
                        <h4>Financial Aid and Scholarships:</h4>
                        <p>Admily's portfolio includes institutions that offer various financial aid and scholarship opportunities, ensuring that deserving students can access quality education regardless of financial constraints.</p>
                      </div>
                    </div>
                    
                  </div> -->
                    
                   <!--  
                  <div class="row gy-3 abt_icons mt--30">
                    
                    <div class="col-12 col-md-3">
                      <div class="abt_box1">
                        <div class="icon_1"><img src="{{asset('assets/assets/img/icon-users.svg')}}"></div>
                        <h4>Streamlined Student Matching:</h4>
                        <p>Our advanced AI-powered matching algorithms assist recruiters in finding the right students for specific programs and institutions. This streamlined approach not only saves time but also ensures that recruiters can focus on building meaningful relationships with students.</p>
                      </div>
                    </div>
                    
                    <div class="col-12 col-md-3">
                      <div class="abt_box1">
                        <div class="icon_1"><img src="{{asset('assets/assets/img/app-development-icon.png')}}"></div>
                        <h4>Comprehensive Data and Insights:</h4>
                        <p>Admily equips recruiters with comprehensive data and insights about programs, institutions, and economic opportunities across various countries. This information empowers recruiters to provide accurate and up-to-date guidance to students, facilitating better decision-making.</p>
                      </div>
                    </div>
                    
                    
                    <div class="col-12 col-md-3">
                      <div class="abt_box1">
                        <div class="icon_1"><img src="{{asset('assets/assets/img/icon-money-stack.svg')}}"></div>
                        <h4>Simplified Application Process: </h4>
                        <p>As recruiters advocate for students throughout the application process, Admily's user-friendly platform simplifies the entire journey. From assisting with documentation to ensuring timely submissions, recruiters can rely on our support to enhance the application experience.</p>
                      </div>
                    </div>
                    
                    
                    <div class="col-12 col-md-3">
                      <div class="abt_box1">
                        <div class="icon_1"><img src="{{asset('assets/assets/img/visa-icon.png')}}"></div>
                        <h4>Enhanced Productivity and Efficiency:</h4>
                        <p>By leveraging Admily's intuitive tools and technology, recruiters can boost their productivity and efficiency in managing multiple applications and student profiles. This efficiency allows recruiters to focus on building stronger connections and providing personalized counseling to students.</p>
                      </div>
                    </div>
                    
                  </div>
                     -->

            </div>

            </div>
        </section>
        <!-- End blue Section -->
        
        <?php /*?><section class="abt_2">
        <div class="container">
            <div class="row justify-content-center">

                    <div class="co-12 col-md-9 box2 text-md-start pt-30 ">
                        
                       <div class="abt_txt text-center">
                            <p>At Admily, we value the vital role that recruiters play in shaping the future of education. By empowering vetted recruiters globally, we aim to create a collaborative environment where students, institutions, and recruiters work together to achieve educational excellence and unlock limitless opportunities for students worldwide. Join us in this transformative mission to build a better and more inclusive global education ecosystem.</p>
                            <p>At Admily, we envision a world where education transcends borders, bringing together exceptional students and forward-thinking institutions. Join us on this transformative journey as we redefine global education, one student and one partner institution at a time. Together, we can achieve a brighter, more connected, and impactful future.</p>
                         </div>
                        


                    </div>
                </div>
        </div>
        </section><?php */?>
        
        
        <!-- ======= Stats Reason Section ======= -->



        <!-- End Reason Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <!-- End Footer -->
      @include('admitoffer.footer')
    <!-- End Footer -->

    

</body>

</html>