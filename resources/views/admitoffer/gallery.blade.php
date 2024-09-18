@include('admitoffer._head')
<style>
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
    
    <div class="banner" style="background-image:url('assets/img/gallery_banner.png');">
<div class="container">
<div class="text-center"><h1></h1></div>
</div>
</div>
        
    <!-- End Hero Section -->

    <main id="main">

    <!-- Gallery -->
    <div class="container mt-5">
<div class="row">
  <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
    <img
      src="assets/img/gallery/01.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt=""
    />

    <img
    src="assets/img/gallery/04.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt=""
    />
  </div>

  <div class="col-lg-4 mb-4 mb-lg-0">
    <img
      src="assets/img/gallery/02.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt=""
    />

    <img
    src="assets/img/gallery/03.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt=""
    />
  </div>

  <div class="col-lg-4 mb-4 mb-lg-0">
    <img
    src="assets/img/gallery/05.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Waves at Sea"
    />

    <img
    src="assets/img/gallery/06.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt=""
    />
  </div>
</div>
</div>
<!-- Gallery -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <!-- End Footer -->
      @include('admitoffer.footer')
    <!-- End Footer -->

    

</body>

</html>