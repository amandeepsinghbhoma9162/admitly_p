<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Admitly</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/assets/img/favicon.png')}}" rel="icon">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="csrf-token" content="nqgleSaVvuOOOUvoHQCpYRaCMCtFDHNEspE07gBE" />
        <link href="https://admitoffer.com/css/main.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
        <link href="https://admitoffer.com/css/custom.css" rel="stylesheet">
        <link href="https://admitoffer.com/css/own.css" rel="stylesheet">
        <link href="https://admitoffer.com/css/app.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
    </head>
    <body oncontextmenu="if (!window.__cfRLUnblockHandlers) return false; return false;" data-cf-modified-89ee0473d76567a78cb13c17-="">
        <div class="app-container app-theme-white body-tabs-shadow">
            @if(Session::has('success'))
                <div class="btn btn-success popOver">
                    <strong>{!!Session::get('success')!!}</strong> 
                </div>
            @endif
            @if(Session::has('error'))
                <div class="btn btn-danger popOver">
                    <strong>{!!Session::get('error')!!}</strong> 
                </div>
            @endif
           
            <div class="app-main">
                
                <div class="app-main__outer" id="app">
                	@if($order)
                	@if($order['status'] == 'complete')
                	<nav class="navbar navbar-expand-sm  bg-light border">
						  <div class="container">
						  <!-- Brand -->
						  <a class="navbar-brand" href="#">
						    <img src="{{asset('assets/assets/img/favicon.png')}}" alt="Logo" style="width:25%;">
						  </a>
						   <!-- Toggler/collapsibe Button -->
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						    <span class="navbar-toggler-icon"></span>
						  </button>
						<!-- Navbar links -->
						  <div class="jumbotron text-center" style="padding: 0.3rem 1rem;margin-bottom: 0rem;">
							  <h5 class="display-3" style="font-size: 3.6rem; font-weight: 300; line-height: 1;">Thank You!</h5> 
							  <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
							  <hr>
							  <p>
							    Having trouble? <a href="https://admitoffer.com/contactus">Contact us</a>
							  </p>
							  <p class="lead">
							    <a class="btn btn-primary btn-sm" href="{{route('student.show',base64_encode($order['student_id']))}}" role="button" style="background:linear-gradient(#e77817, #D80D05);margin:20px;">Continue to Student</a>
							  </p>
							</div>
						 </div>
						</nav>
					@endif	
					@endif	
                    <br>
                    <style type="text/css">
                        body {
                        background-color: #eeeeee
                        }
                        .green {
                        color: rgb(15, 207, 143);
                        font-weight: 680;
                        background-color: transparent !important;
                        }
                        @media(max-width:567px) {
                        .mobile {
                        padding-top: 40px
                        }
                        }
                    </style>
                    <div class="container rounded bg-white">
                        <div class="row d-flex justify-content-center pb-5">
                            <div class="col-sm-5 col-md-5 ml-1">
                                <div class="py-4 d-flex flex-row">
                                    <h5><span class="fa fa-check-square-o"></span><b>Admitly</b> | </h5>
                                    <span class="pl-2">Pay</span>
                                </div>
                                <h4 class="green">{{$country['currency_icon_name']}} {{$amount}}</h4>
                                <?php
                                $i = 1;
                                ?>
                                @foreach($allApplications as $application)
                                <h4>{{$i++}}.&nbsp; {{$application->course['name']}}</h4>
                                <div class="d-flex pt-2">
                                    <div>
                                        <p><b>{{$application->college['name']}} </b> <span class="green">{{$country['currency_icon_name']}} {{$application->college['application_fee']}}</span></p>
                                    </div>
                                    
                                </div><hr>
                                @endforeach
                               
                                

                                <div class="pt-2">
                                    <div class="d-flex">
                                        <div>
                                            <p><b>Payable Amount.</b> <span class="green">{{$country['currency_icon_name']}} {{$amount}} = (INR)({{$country['currency'] * $amount}}) </span></p>
                                        </div>
                                       
                                    </div>
                                    <form method="POST" enctype="multipart/form-data" action="{{route('mypayment.screenshot.upload')}}">
                                    	@csrf
                                    	<p>Upload screenshot of paid amount</p>
                                    	@if($screenshot)
                                    	<img class="mb-4" src="{{$screenshot['path']}}{{$screenshot['name']}}" width="100%" >
                                    	@endif
                                    	<p class="uploadImgShow hide text-success" id="uploadImgShow">Image selected please click upload button for upload Image</p>
                                    	<label class="btn btn-warning text-white uploadScreenshot mt-10"  id="uploadScreenshot">Upload screenshot
                                    		<input type="hidden" name="cid" value="{{base64_encode($amount)}}">
                                    		<input type="hidden" name="student_id" value="{{base64_encode($student_id)}}">
                                    		<input type="file" name="screenshot" class="hide" placeholder="Upload screenshot" required="" onchange="myFunction()" accept="image/jpeg,image/png">
                                    	</label>
                                    	<button class="btn btn-success btn-default-color">Upload</button>
                                    	
                                    </form>
                                  <!--   @if(!$order)
                                   <form method="POST" action="{{route('mypayment.store')}}">
                                   	@csrf
                                   	<input type="hidden" name="std" value="{{base64_encode($student_id)}}">
                                   	<input type="hidden" name="cid" value="{{base64_encode($amount)}}">
                                    <div> <button class="btn btn-primary btn-block" style="background:linear-gradient(#e77817, #D80D05);padding:20px;border-color: #f50808;">Proceed to payment</button> </div>
                                   </form>
                                   @else
                                    @if($order['status'] == 'pending')
                                    <form method="POST" action="{{route('mypayment.store')}}">
                                   	@csrf
                                   	<input type="hidden" name="std" value="{{base64_encode($student_id)}}">
                                   	<input type="hidden" name="cid" value="{{base64_encode($amount)}}">
                                    <div> <button class="btn btn-primary btn-block" style="background:linear-gradient(#e77817, #D80D05);padding:20px;border-color: #f50808;">Proceed to payment</button> </div>
                                   </form>
                                   @endif
                                   @endif -->
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-4 offset-md-1 mobile">
                                <div class="py-4 d-flex justify-content-end">
                                    <h6><a href="{{route('student.show',base64_encode($student_id))}}">Cancel and return to Student</a></h6>
                                </div>
                                <div class="bg-light rounded d-flex flex-column">
                                    <div class="p-2 ml-3">
                                        <h4>Order Recap</h4>
                                    </div>
                                    @foreach($allApplications as $application)
                                    <div class="p-2 d-flex">
                                        <div class="col-8">{{$application->college['name']}}</div>
                                        <div class="ml-auto">{{$country['currency_icon_name']}} {{$application->college['application_fee']}}</div>
                                    </div>
                                   @endforeach
                                    <div class="border-top px-4 mx-3"> </div>
                                    
                                    <div class="border-top px-4 mx-3"></div>
                                   <!--  <div class="p-2 d-flex pt-3">
                                        <div class="col-8">Insurance Responsibility</div>
                                        <div class="ml-auto"><b>{{$country['currency_icon_name']}} {{$amount}}</b></div>
                                    </div> -->
                                    <div class="p-2 d-flex">
                                        <div class="col-8">Payable Amount <span class="fa fa-question-circle text-secondary"></span></div>
                                        <div class="ml-auto"><b>{{$country['currency_icon_name']}} {{$amount}}</b></div>
                                    </div>
                                    <div class="border-top px-4 mx-3"></div>
                                    <div class="p-2 d-flex pt-3">
                                        <div class="col-8"><b>Total</b></div>
                                        <div class="ml-auto"><b class="green">{{$country['currency_icon_name']}} {{$amount}}</b></div>
                                    </div>
                                </div>
                                @if($order)
                                    @if($order['status'] == 'complete')
                                        Paid
                                    @else
                                        <a href="{{route('payment.online',[base64_encode($student_id),base64_encode($amount)])}}" class="pt-4 pb-4 mb-4 btn btn-warning btn-default-color" style="background:linear-gradient(#e77817, #D80D05);margin-top:20px;color: white;width: 100%;"><h5><strong>Quick Pay</strong></h5></a>
                                    @endif
                                @else
                                    <a href="{{route('payment.online',[base64_encode($student_id),base64_encode($amount)])}}" class="pt-4 pb-4 mb-4 btn btn-warning btn-default-color" style="background:linear-gradient(#e77817, #D80D05);margin-top:20px;color: white;width: 100%;"><h5><strong>Quick Pay</strong></h5></a>
                                @endif
                                @if(!$screenshot)
                                <br>
                                <h5 class="text-center">Pay ammount using bank details</h5>
                                <div class="bg-light rounded d-flex flex-column">
                                    <div class="p-2 d-flex">
                                        <div class="col-8">A/c Name- 
                                        </div>
                                        <div class="ml-auto">
                                        ADMITLY</div>
                                    </div>
                                    <div class="border-top px-4 mx-3"></div>
                                    <div class="p-2 d-flex pt-3">
                                        <div class="col-8">A/c No.</div>
                                        <div class="ml-auto"><b>
                                        181305000844</b></div>
                                    </div>
                                    <div class="p-2 d-flex pt-3">
                                        <div class="col-8">IFSC Code-</div>
                                        <div class="ml-auto"><b>
                                        ICIC0001813</b></div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal"></div>
            <div class="modal1"></div>
            <div class="app-wrapper-footer">
                <div class="app-footer">
                    <div class="app-footer__inner text-center" style="display: flow-root; padding-top: 15px">
                        <p class="text-center">© Copyright <?php echo date("Y"); ?> . All Rights Reserved by Supernova Edu Technologies Inc.<span class="float-right">Version V1.2.1</span> </p>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="89ee0473d76567a78cb13c17-text/javascript"></script>

        <script>
            window.addEventListener( "pageshow", function ( event ) {
  var historyTraversal = event.persisted || 
                         ( typeof window.performance != "undefined" && 
                              window.performance.navigation.type === 2 );
  if ( historyTraversal ) {
    // Handle page restore.
    window.location.reload();
  }
});
    history.pushState(null, document.title, location.href);
    // history.forward();
    history.back();
    window.onpopstate = function () {
        history.go(1);
    };

history.pushState({ page: 1 }, "title 1", "#nbb");
window.onhashchange = function (event) {
    window.location.hash = "nbb";
};

</script>
<script type="text/javascript">
     window.location.hash = "no-back-button";

    // Again because Google Chrome doesn't insert
    // the first hash into the history
    window.location.hash = "Again-No-back-button"; 

    window.onhashchange = function(){
        window.location.hash = "no-back-button";
    }

    history.pushState(null, document.title, location.href);
window.addEventListener('popstate', function (event)
{
  history.pushState(null, document.title, location.href);
});

    function suppressBackspace(evt) {
    evt = evt || window.event;
    var target = evt.target || evt.srcElement;

    if (evt.keyCode == 8 && !/input|textarea/i.test(target.nodeName)) {
        return false;
    }
}

document.onkeydown = suppressBackspace;
document.onkeypress = suppressBackspace;
window.addEventListener('keydown',function(e){if(e.keyIdentifier=='U+0008'||e.keyIdentifier=='Backspace'||e.keyCode==8){if(e.target==document.body){e.preventDefault();return false;}}},true);
</script>
        <script type = "text/javascript" >  
    (function (global) {

    if(typeof (global) === "undefined") {
        throw new Error("window is undefined");
    }

    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";

        // Making sure we have the fruit available for juice (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 0);
    };

    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };

    global.onload = function () {
        noBackPlease();

        // Disables backspace on page except on input fields and textarea..
        document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            // Stopping the event bubbling up the DOM tree...
            e.stopPropagation();
        };
    }
})(window)
</script> 
        <script type="89ee0473d76567a78cb13c17-text/javascript">
            $body = $("body");
            
            // $(document).on({
            //     ajaxStart: function() { $body.addClass("loading");    },
            //      ajaxStop: function() { $body.removeClass("loading"); }    
            // });
        </script>
        <script type="89ee0473d76567a78cb13c17-text/javascript" src="https://admitoffer.com/admins/js/main.js"></script>
        <script type="89ee0473d76567a78cb13c17-text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script type="89ee0473d76567a78cb13c17-text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script type="89ee0473d76567a78cb13c17-text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
        <script async src="https://pay.google.com/gp/p/js/pay.js" onload="console.log('TODO: add onload function')" type="89ee0473d76567a78cb13c17-text/javascript"></script>
        <script type="89ee0473d76567a78cb13c17-text/javascript" src="https://admitoffer.com/js/agent.js"></script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js" type="89ee0473d76567a78cb13c17-text/javascript"> </script>
        <script type="89ee0473d76567a78cb13c17-text/javascript" src="https://admitoffer.com/admins/js/custom.js"></script>
        
        <script type="89ee0473d76567a78cb13c17-text/javascript" src="https://admitoffer.com/admins/js/ajax.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" type="89ee0473d76567a78cb13c17-text/javascript"></script>
        <script type="89ee0473d76567a78cb13c17-text/javascript" src="https://admitoffer.com/admins/js/location.js"></script>
        <script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js" type="89ee0473d76567a78cb13c17-text/javascript"></script>

        <script type="89ee0473d76567a78cb13c17-text/javascript">
            document.onkeydown = function(e) {
              if(event.keyCode == 123) {
                 return false;
              }
              if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                 return false;
              }
              if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                 return false;
              }
              if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                 return false;
              }
              if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                 return false;
              }
            }
            
            document.addEventListener('contextmenu', function(e) {
              e.preventDefault();
            });
        </script>
        </div>
        <script >
        	
        	function myFunction() {
				document.getElementById('uploadImgShow').style.display='block';
			}
			 
        </script>
        <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="89ee0473d76567a78cb13c17-|49" defer=""></script>
    </body>
</html>