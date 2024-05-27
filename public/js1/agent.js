$(document).ready(function(){
    $('table.tableID').DataTable({
        paging: true,
        "order": [[ 1, "Asc" ]],
        dom: 'Bfrtip',
       buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
    $('.appendAllMessages').animate({scrollTop: 9349}, 'slow');
});

 $(document).on('change','#chatImg',function(event){
    $('#output').val('');
    $('.appendShow').show();
    var output = document.getElementById('output');
    
    output.src = URL.createObjectURL(event.target.files[0]);
    var extension = event.target.files[0].name.substr( (event.target.files[0].name.lastIndexOf('.') +1) );
    if(extension == 'pdf'){
        
          $('#output').attr('src','/images/site/pdfIcon.png');
    }else if(extension == 'docx'){
    
      $('#output').attr('src','/images/site/doc.png');
    
    }else{

    output.onload = function() {
      URL.revokeObjectURL(output.src); // free memory
    };
    }
});

 $(document).on('submit','.chatRequestForm',function(e)
    {
        e.preventDefault();
        e.stopPropagation();
        var ThisEvnt = $(this);
        var formData = $(this).serialize();
        var message = $('.messageInput').val();
        $.ajax(
        {
            type:'post',
            url:'/admin/chat/store',
            data: new FormData(this), 
            contentType: false,       
            cache: false,             
            processData:false,
            success:function(result)
            {
                $('.messageInput').val('');
                console.log(result);
                if(result.data.type == 'admin'){
                    $('.appendAllMessage').append("<div class='row'> <div class='col-md-12'> <div class=' float-right mr-10'> <p class='lineBarRight '><strong>AdmitOffer: </strong>"+result.data.message+"</p> </div> </div> </div>");
                } else{
                    $('.appendAllMessage').append("<div class='row'> <div class='col-md-12'> <div class=''> <p class='lineBar'><strong>Recruiter: </strong>"+result.data.message+"</p> </div> </div> </div>");
                }
                
            },
        });
    });

 

    setInterval(function() { 
        var application_id = $('.application_id').val();
        var agent_id = $('.agent_id').val();  
        $.ajax(
        {
            type:'get',
            url:'/admin/chat/edit/'+application_id+'/'+agent_id,
            success:function(result)
            {
                $('.appendAllMessage').html('');
                console.log(result);
                $.each(result.data, function(index, value) {
                    if(value.type === 'admin'){
                        $('.appendAllMessage').append("<div class='row'> <div class='col-md-12'> <div class=' float-right mr-10'> <p class='lineBarRight'><strong>AdmitOffer: </strong>"+value.message+"</p> </div> </div> </div>");
                    } else{
                        console.log('hello');
                        $('.appendAllMessage').append("<div class='row'> <div class='col-md-12'> <div class=''> <p class='lineBar'><strong>Recruiter: </strong>"+value.message+"</p> </div> </div> </div>");
                    }
                });
                    
            },
        });
    }, 1000 * 60 * 0.2);


    $(document).on('submit','.studentChatRequestForm',function(e)
    {
        $('#output').val('');
    $('.appendShow').hide();
        e.preventDefault();
        e.stopPropagation();
        var ThisEvnt = $(this);
        var formData = $(this).serialize();
        var message = $('.messageInput').val();
         var checkimg = $('#chatImg').val();
         var hasTextAImg = 'no';
         if(message){
         var hasTextAImg = 'yes';

         }
         if(checkimg){
         var hasTextAImg = 'yes';

         }
         if(hasTextAImg == 'no'){
            alert('Kindly add text in input filed');
            return false;
         }
        $.ajax(
        {
            type:'post',
            url:'/admin/student/chat/store',
            data: new FormData(this), 
            contentType: false,       
            cache: false,             
            processData:false,
            success:function(result)
            {
                var d = new Date(result.data.created_at);
                $('.messageInput').val('');
                $('#chatImg').val('');
                if(result.data.admin_role){
                    if(result.data.admin_role == 'agent'){
                        if(result.data.path){
                            if(result.data.path.indexOf("admitoffer.s3.ap-south-1.amazonaws.com") > -1){
                                var path = result.data.path;
                                
                            }else{
                                var path = '/'+result.data.path;
                            }
                             var extension = result.data.path.substr( (result.data.path.lastIndexOf('.') +1) );
                            
                            if(extension == 'pdf'){
                                $('.appendAllMessages').append('<br><br><div class="you" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Admit Offer  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href='+path+' target="_blank"><img src="/images/site/pdfIcon.png" width="80"></a>  </div> </div><br><br>');
                             }else if(extension == 'docx'){
                                $('.appendAllMessages').append('<br><br><div class="you" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Admit Offer  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href='+path+' target="_blank"><img src="/images/site/doc.png" width="80"></a>  </div> </div><br><br>');                                

                            }else{
                                $('.appendAllMessages').append('<br><br><div class="you"> <div class="entete" style="margin-left: 10px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -12px;">Admit Offer  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href="/admin/chatpdf/open/'+result.data.id+' target="_blank"><img src='+path+' width="80"></a> </div> </div><br><br>');
                            }
                        }else{
                            $('.appendAllMessages').append('<br><br><div class="you" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Admit Offer ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""><div class="triangle"></div> <div class="message">'+result.data.message+'</div> </div> </div>');
                        }
                    } else{
                        if(result.data.path){
                            if(result.data.path.indexOf("admitoffer.s3.ap-south-1.amazonaws.com") > -1){
                                var path = result.data.path;
                                
                            }else{
                                var path = '/'+result.data.path;
                            }
                             var extension = result.data.path.substr( (result.data.path.lastIndexOf('.') +1) );
                            
                            if(extension == 'pdf'){
                                $('.appendAllMessages').append('<br><br><div class="me" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Recruiter  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href='+path+' target="_blank"><img src="/images/site/pdfIcon.png" width="80"></a>  </div> </div><br><br>');
                             }else if(extension == 'docx'){
                                $('.appendAllMessages').append('<br><br><div class="me" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Recruiter  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href='+path+' target="_blank"><img src="/images/site/doc.png" width="80"></a>  </div> </div><br><br>');
                                

                            }else{
                                $('.appendAllMessages').append('<br><br><div class="me"> <div class="entete" style="margin-left: 10px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -12px;">Recruiter  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href="/admin/chatpdf/open/'+result.data.id+' target="_blank"><img src='+path+' width="80"></a> </div> </div><br><br>');

                            }
                        }else{

                            $('.appendAllMessages').append('<br><br><div class="me" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Recruiter  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""><div class="triangle"></div> <div class="message">'+result.data.message+'</div> </div> </div><br><br>');

                        }
                        
                    }

                }
                $('.appendAllMessages').animate({scrollTop: 9349}, 'slow');
                
            },
        });
    });

    setInterval(function() { 
        var student_id = $('.student_id').val();
         var student = $('.student').val();  
          
        $.ajax(
        {
            type:'get',
            url:'/admin/student/chat/edit/'+student_id+'/'+student,
            success:function(result)
            {
                $('.appendAllMessages').html('');
                
                $.each(result.data, function(index, value) {
                    var d = new Date(value.created_at);

                    if(value.admin_role == 'agent'){
                        if(value.path){
                            var extension = value.path.substr( (value.path.lastIndexOf('.') +1) );
                            if(value.path.indexOf("admitoffer.s3.ap-south-1.amazonaws.com") > -1){
                                var path = value.path;
                                
                            }else{
                                var path = '/'+value.path;
                            }
                            if(extension == 'pdf'){
                                $('.appendAllMessages').append('<br><br><div class="you" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Admit Offer  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href='+path+' target="_blank"><img src="/images/site/pdfIcon.png" width="80"></a>  </div> </div><br><br>');
                            }else if(extension == 'docx'){
                                $('.appendAllMessages').append('<br><br><div class="you" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Admit Offer  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href='+path+' target="_blank"><img src="/images/site/doc.png" width="80"></a>  </div> </div><br><br>');

                            }else{
                                $('.appendAllMessages').append('<br><br><div class="you"> <div class="entete" style="margin-left: 10px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -12px;">Admit Offer  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href="/admin/chatpdf/open/'+value.id+' target="_blank"><img src='+path+' width="80"></a> </div> </div><br><br>');
                            }

                        }else{
                            $('.appendAllMessages').append('<br><br><div class="you" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Admit Offer ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""><div class="triangle"></div> <div class="message">'+value.message+'</div> </div> </div>');
                        }
                        
                    }else{
                         
                        if(value.path){
                            var extension = value.path.substr( (value.path.lastIndexOf('.') +1) );
                            if(value.path.indexOf("admitoffer.s3.ap-south-1.amazonaws.com") > -1){
                                var path = value.path;
                                
                            }else{
                                var path = '/'+value.path;
                            }
                            if(extension == 'pdf'){
                                $('.appendAllMessages').append('<br><br><div class="me" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Recruiter  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href='+path+' target="_blank"><img src="/images/site/pdfIcon.png" width="80"></a>  </div> </div><br><br>');
                            }else if(extension == 'docx'){
                                $('.appendAllMessages').append('<br><br><div class="me" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Recruiter  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href='+path+' target="_blank"><img src="/images/site/doc.png" width="80"></a>  </div> </div><br><br>');

                            }else{
                                $('.appendAllMessages').append('<br><br><div class="me"> <div class="entete" style="margin-left: 10px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -12px;">Recruiter  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href="/admin/chatpdf/open/'+value.id+' target="_blank"><img src='+path+' width="80"></a> </div> </div><br><br>');
                            }

                        }else{

                            $('.appendAllMessages').append('<br><br><div class="me" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Recruiter  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""><div class="triangle"></div> <div class="message">'+value.message+'</div> </div> </div><br><br>');

                        }
                    }
                });
                
            },
        });
    }, 1000 * 60 * 0.2);

    


