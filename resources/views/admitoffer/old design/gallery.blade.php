@include('admitoffer/_head')
<style>
  #gallery
  {
  color:#e77817 !important;
  }
</style>
<body>
  <!--==========================
    Header
  ============================-->
  @include('admitoffer/header')

  <!--==========================
    Slider Section
  ============================-->
  
   <div class="rbt-instagram-area bg-color-white rbt-section-gap">
        <div class="container-fluid">
            <div class="row g-3">
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="instagram-grid">
                        <a href="#">
                            <img src="{{asset('admitoffer/img/gallery/thumb/29.jpg')}}" alt="instagram">
                            <span class="user-info">
                        <span class="icon"><i class="icon-instagram"></i></span>
                            <span class="user-name">@Histudy</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="instagram-grid">
                        <a href="#">
                            <img src="{{asset('admitoffer/img/gallery/thumb/1.JPG')}}" alt="instagram">
                            <span class="user-info">
                        <span class="icon"><i class="icon-instagram"></i></span>
                            <span class="user-name">@Histudy</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="instagram-grid">
                        <a href="#">
                            <img src="{{asset('admitoffer/img/gallery/thumb/2.JPG')}}" alt="instagram">
                            <span class="user-info">
                        <span class="icon"><i class="icon-instagram"></i></span>
                            <span class="user-name">@Histudy</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="instagram-grid">
                        <a href="#">
                            <img src="{{asset('admitoffer/img/gallery/thumb/4.jpg')}}" alt="instagram">
                            <span class="user-info">
                        <span class="icon"><i class="icon-instagram"></i></span>
                            <span class="user-name">@Histudy</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="instagram-grid">
                        <a href="#">
                            <img src="{{asset('admitoffer/img/gallery/thumb/5.jpg')}}" alt="instagram">
                            <span class="user-info">
                        <span class="icon"><i class="icon-instagram"></i></span>
                            <span class="user-name">@Histudy</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="instagram-grid">
                        <a href="#">
                            <img src="{{asset('admitoffer/img/gallery/thumb/6.jpg')}}" alt="instagram">
                            <span class="user-info">
                        <span class="icon"><i class="icon-instagram"></i></span>
                            <span class="user-name">@Histudy</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    

    <!--==========================
      About span2
    ============================-->
    
    
    
    
    
    
       
     
       
    <!--==========================
      span3 Section
    ============================-->
      

<!-- <form method="POST" action="{{route('fileUpload')}}" enctype="multipart/form-data">
  @csrf
  <input type="file" name="file" >
  <button>Submit</button>
</form> -->
  <!--==========================
    Footer
  ============================-->
  @include('admitoffer/footer')

 
</body>
</html>
