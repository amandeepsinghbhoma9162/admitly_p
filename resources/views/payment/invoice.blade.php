<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Admitly</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="csrf-token" content="nqgleSaVvuOOOUvoHQCpYRaCMCtFDHNEspE07gBE" />
        <link href="https://admitly.ai/css/main.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
        <link href="https://admitly.ai/css/custom.css" rel="stylesheet">
        <link href="https://admitly.ai/css/own.css" rel="stylesheet">
        <link href="https://admitly.ai/css/app.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
    </head>
    <body oncontextmenu="if (!window.__cfRLUnblockHandlers) return false; return false;" data-cf-modified-89ee0473d76567a78cb13c17-="">
        <div class="app-container app-theme-white body-tabs-shadow">
            
           
            <div class="app-main">
                
                <div class="app-main__outer" id="app">
                
                    <style type="text/css">
                        body {
                        background-color: #eeeeee
                        }
                        .green {
                        color: rgb(15, 207, 143);
                        font-weight: 680
                        }
                        @media(max-width:567px) {
                        .mobile {
                        padding-top: 40px
                        }
                        }
                    </style>
                    <div class="container rounded bg-white mt-5">
                        <div class="row d-flex justify-content-center pb-5 mt-4">
                            <div class="col-sm-5 col-md-5 ml-1">
                                <div class="py-4 d-flex flex-row">
                                    <h5><span class="fa fa-check-square-o"></span><img src="https://admitly.ai/images/logo.png" width="175px" ;=""> | </h5>
                                    <span class="pl-2 text-warning"><b>Invoice </b></span>
                                </div>
                                <h5><strong>Invoice: </strong> #AO{{$order['id']}}CAD</h5>
                                <h5><strong>Date: </strong> {{$order['updated_at']->format('d-M-Y h:s')}}</h5>
                                <h5><strong>Payment Status: </strong>
                                @if($order['status'])
                                 {{$order['status']}}
                                @else 
                                Pending
                                @endif 
                                </h5>
                                <hr>
                                <h5 class="green text-warning">Selected Programs:</h5>
                                
                                <?php
                                $i = 1;
                                ?>
                                @foreach($allApplications as $application)
                                <h6>{{$i++}}.&nbsp; {{$application->course['name']}}</h6>
                                <div class="d-flex pt-1">
                                    <div>
                                        <p><b>{{$application->college['name']}} </b> <span class="green">{{$country['currency_icon_name']}} {{$application->college['application_fee']}}</span></p>
                                    </div>
                                    
                                </div><hr>
                                @endforeach
                               
                                

                                <div class="pt-2">
                                    <div class="d-flex">
                                        <div>
                                            <p><b>Paid Amount.</b> <span class="green">{{$country['currency_icon_name']}} {{$amount}} = (INR)({{$country['currency'] * $amount}}) </span></p>
                                        </div>
                                       
                                    </div>
                                    	<img class="mb-4" src="{{$screenshot['path']}}{{$screenshot['name']}}" width="100" >
                                 
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-4 offset-md-1 mobile">
                                <div class="row">
                                <div class="col-md-8">
                                    <div class="py-4 d-flex justify-content-end">
                                        <h6><a href="{{route('student.show',base64_encode($student_id))}}" class="text-warning">Cancel and return to Student</a></h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button onclick="window.print()" class="btn btn-warning mt-3" style="background:linear-gradient(#e77817, #D80D05);color: white;width: 100%;">Print Invoice</button>
                                </div>
                                </div>
                                <div class="bg-light rounded d-flex flex-column">
                                    <div class="p-2 ml-3">
                                        <h4>Students Details</h4>
                                    </div>
                                    <div class="p-2 d-flex">
                                        <div class="col-8">Student Name</div>
                                        <div class="ml-auto">{{$student['firstName']}} {{$student['lastName']}}</div>
                                    </div>
                                    <div class="p-2 d-flex">
                                        <div class="col-8">DOB</div>
                                        <div class="ml-auto">{{$student['dateOfBirth']}} </div>
                                    </div>
                                    <div class="p-2 d-flex">
                                        <div class="col-8">Country</div>
                                        <div class="ml-auto">{{$student->country['name']}} </div>
                                    </div>
                                    <div class="p-2 d-flex">
                                        <div class="col-8">Gender</div>
                                        <div class="ml-auto">{{$student['gender']}} </div>
                                    </div>
                                    
                                </div>
                              
                                <div class="bg-light rounded d-flex flex-column mt-3">
                                    <div class="p-2 ml-3">
                                        <h4>Payment Details</h4>
                                    </div>
                                    @foreach($allApplications as $application)
                                    <div class="p-2 d-flex">
                                        <div class="col-8">{{$application->college['name']}}</div>
                                        <div class="ml-auto">{{$country['currency_icon_name']}} {{$application->college['application_fee']}}</div>
                                    </div>
                                   @endforeach
                                    <div class="border-top px-4 mx-3"> </div>
                                    
                                    <div class="border-top px-4 mx-3"></div>
                                    
                                    <div class="p-2 d-flex">
                                        <div class="col-8">Paid Amount </div>
                                        <div class="ml-auto"><b>{{$country['currency_icon_name']}} {{$amount}}</b></div>
                                    </div>
                                    <div class="border-top px-4 mx-3"></div>
                                    <div class="p-2 d-flex pt-3">
                                        <div class="col-8"><b>Total Paid</b></div>
                                        <div class="ml-auto"><b class="green">{{$country['currency_icon_name']}} {{$amount}}</b></div>
                                    </div>
                              
                            </div>
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
                        <p class="text-center">© Copyright 2020 . All Rights Reserved by Supernova Edu Technologies Inc.<span class="float-right">Version V1.2.1</span> </p>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="89ee0473d76567a78cb13c17-text/javascript"></script>
        <script type="89ee0473d76567a78cb13c17-text/javascript">
            $body = $("body");
            
            // $(document).on({
            //     ajaxStart: function() { $body.addClass("loading");    },
            //      ajaxStop: function() { $body.removeClass("loading"); }    
            // });
        </script>
        <script type="89ee0473d76567a78cb13c17-text/javascript" src="https://admitly.ai/admins/js/main.js"></script>
        <script type="89ee0473d76567a78cb13c17-text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script type="89ee0473d76567a78cb13c17-text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script type="89ee0473d76567a78cb13c17-text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
        <script async src="https://pay.google.com/gp/p/js/pay.js" onload="console.log('TODO: add onload function')" type="89ee0473d76567a78cb13c17-text/javascript"></script>
        <script type="89ee0473d76567a78cb13c17-text/javascript" src="https://admitly.ai/js/agent.js"></script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js" type="89ee0473d76567a78cb13c17-text/javascript"> </script>
        <script type="89ee0473d76567a78cb13c17-text/javascript" src="https://admitly.ai/admins/js/custom.js"></script>
        
        <script type="89ee0473d76567a78cb13c17-text/javascript" src="https://admitly.ai/admins/js/ajax.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" type="89ee0473d76567a78cb13c17-text/javascript"></script>
        <script type="89ee0473d76567a78cb13c17-text/javascript" src="https://admitly.ai/admins/js/location.js"></script>
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