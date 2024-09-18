@include('admitoffer/_head')
<!-- <style>
  #webinars
  {
  color:#e77817 !important;
  }
</style> -->
<body>
  <!--==========================
    Header
  ============================-->
  @include('admitoffer/header')

  <!--==========================
    Slider Section
  ============================-->
  <div class="banner" style="background-image:url(admitoffer/img/gallery_banner.png);">
    <div class="container">
       <div class="text-center"><h1></h1></div>
       
    </div>
  </div>
  
  

  <main id="main">

   <!--==========================
      Span1 Section
    ============================-->
   
     <div class="span1">
       <div class="container">
         <div class="heading text-center">
           <h2>Investors</h2>
           
           <div class="row mt-4">
             <div class="col-md-6"><img src="{{asset('admitoffer/img/112.jpg')}}" width="100%">
              <div>
                
              <a class="btn btn-warning" href="{{asset('admitoffer/img/aoppt2')}}" style="width: 100%;"><form method="POST" action="{{route('pdf.view')}}"  target="_blank">
                                                @csrf
                                             <input type="hidden" name="name"   value="aoppt2.pdf">
                                             <input type="hidden" name="path"   value="{{asset('admitoffer/img')}}">
                                             <button class="btn btn-warning" style="width: 100%;" target="_blank">Investment Desk</button>
                                            </form></a>
              </div>
             </div>
             <div class="col-md-6"><img src="{{asset('admitoffer/img/113.jpg')}}" width="100%">
              <div>
                
              <a class="btn btn-warning" href="{{asset('admitoffer/img/aoppt1')}}" style="width: 100%;"><form method="POST" action="{{route('pdf.view')}}"  target="_blank">
                                                @csrf
                                             <input type="hidden" name="name"   value="aoppt1.pdf">
                                             <input type="hidden" name="path"   value="{{asset('admitoffer/img')}}">
                                             <button class="btn btn-warning" style="width: 100%;" target="_blank">Investment 
Teaser</button>
                                            </form></a>
              </div>
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
      

  </main>

  <!--==========================
    Footer
  ============================-->
 @include('admitoffer/footer')

 
</body>
</html>
