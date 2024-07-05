@include('admitoffer._head')
<style>
@media(min-width:1280px)
{
 #resources
 {
 color: var(--color-primary);
    background: #ffebe6;
 }
 }
 #resources
 {
 color: var(--color-primary);
 }
</style>
<body>

    <!-- ======= Header ======= -->
    
    <!-- End Top Bar -->

    <!-- End Header -->@include('admitoffer.header')
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero pricing_hero">
        <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-10">
                <div class="text-center">
                   <h2>Careers</h2>
                   
                </div>
              </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <main id="main">



        <!-- ======= blue Section ======= -->
        <div class="career_1">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-md-12 col-lg-12">
                 <div class="car_txt">
                 <div class="text-center">
                   <h3>Open Positions</h3>
                   <p>We are hiring across locations including our HQ in Toronto and India. </p>
                  </div>
                   <div class="table-responsive">
                     <table class="table  my_tbl">
                      <thead>
                        <tr>
                          <th scope="col">Job Title</th>
                          <th scope="col">Positions</th>
                          <th scope="col">Location</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td scope="row">Business Development Manager</td>
                          <td>2</td>
                          <td>Toronto</td>
                          <td><a href="{{route('contactus')}}" class="btn_3">Apply Now <i class="bi bi-arrow-right"></i></a></td>
                        </tr>
                        <tr>
                          <td scope="row">Machine Learning Engineer</td>
                          <td>1</td>
                          <td>Toronto</td>
                          <td><a href="{{route('contactus')}}" class="btn_3">Apply Now <i class="bi bi-arrow-right"></i></a></td>
                        </tr>
                        <tr>
                          <td scope="row">UX/UI Designer</td>
                          <td>1</td>
                          <td>Toronto</td>
                          <td><a href="{{route('contactus')}}" class="btn_3">Apply Now <i class="bi bi-arrow-right"></i></a></td>
                        </tr>
                        
                        <tr>
                          <td scope="row">Data Scientist</td>
                          <td>1</td>
                          <td>Toronto</td>
                          <td><a href="{{route('contactus')}}" class="btn_3">Apply Now <i class="bi bi-arrow-right"></i></a></td>
                        </tr>
                      </tbody>
                    </table>
                   </div>
                 </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End blue Section -->
        
        
        
     



        <!-- End Reason Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <!-- End Footer -->
      @include('admitoffer.footer')
    <!-- End Footer -->

    

</body>

</html>