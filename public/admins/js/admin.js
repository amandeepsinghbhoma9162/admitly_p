$(document).ready(function(){
    $('table.tableID').DataTable({
        paging: true,
        "order": [[ 1, "asc" ]],
        dom: 'Bfrtip',
       buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
    $('.scrollBottom').animate({scrollTop: 9349}, 'slow');
    $('.appendAllMessages').animate({scrollTop: 9349}, 'slow');
});

 $(document).on('change','#chatImg',function(event){

    swal({
      title: "Are you sure you want to send email to agent.",
      text: "Do you want to send document on Email.",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes! confirm",
      cancelButtonText: "No, cancel!",
      closeOnConfirm: false,
      closeOnCancel: false
        },function(isConfirm) {
         
          if (isConfirm == true) {
            swal("Submitted!", "Confirmed", "success");
                $('.hasDocument').val('yes');
          } else {
            swal("Cancelled", "sure recheck basic details :)", "error");
                $('.hasDocument').val('no');
          }
        });
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
        $('#output').val('');
    $('.appendShow').hide();
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
                $('.scrollBottom').animate({scrollTop: 9349}, 'slow');
                if(result.data.type == 'admin'){
                    $('.appendAllMessage').append("<div class='row'> <div class='col-md-12'> <div class='max-width-420 float-right mr-10'> <p class='lineBarRight '><strong>AdmitOffer ("+result.data.created_at+") : </strong>"+result.data.message+"</p> </div> </div> </div>");
                } else{
                    $('.appendAllMessage').append("<div class='row'> <div class='col-md-12'> <div class='max-width-420'> <p class='lineBar'><strong>Recruiter ("+result.data.created_at+") : </strong>"+result.data.message+"</p> </div> </div> </div>");
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
                $.each(result.data, function(index, value) {
                    if(value.type === 'admin'){
                        $('.appendAllMessage').append("<div class='row'> <div class='col-md-12'> <div class='max-width-420 float-right mr-10'> <p class='lineBarRight'><strong>AdmitOffer ("+value.created_at+") : </strong>"+value.message+"</p> </div> </div> </div>");
                    } else{
                        $('.appendAllMessage').append("<div class='row'> <div class='col-md-12'> <div class='max-width-420'> <p class='lineBar'><strong>Recruiter ("+value.created_at+") : </strong>"+value.message+"</p> </div> </div> </div>");
                    }
                });
                    $('.scrollBottom').animate({scrollTop: 9349}, 'slow');
                
            },
        });
    }, 1000 * 60 * 0.2);

// student base chat ajax

     $(document).on('submit','.studentChatRequestForm',function(e)
    {
        $('#output').val('');
        $('.appendShow').hide();
        e.preventDefault();
        e.stopPropagation();
        var ThisEvnt = $(this);
        var formData = $(this).serialize();
        var message = $('.messageInput').val();
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
                $('.messageInput').val('');
                $('.scrollBottom').animate({scrollTop: 9349}, 'slow');
                var d = new Date(result.data.created_at);
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
                                $('.appendAllMessages').append('<br><br><div class="me" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Admit Offer  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href='+path+' target="_blank"><img src="/images/site/pdfIcon.png" width="80"></a>  </div> </div><br><br>');
                            }else if(extension == 'docx'){
                                $('.appendAllMessages').append('<br><br><div class="me" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Admit Offer  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href='+path+' target="_blank"><img src="/images/site/doc.png" width="80"></a>  </div> </div><br><br>');
                            
                            }else{
                                $('.appendAllMessages').append('<br><br><div class="me"> <div class="entete" style="margin-left: 10px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -12px;">Admit Offer  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href="/admin/chatpdf/open/'+result.data.id+' target="_blank"><img src='+path+' width="80"></a> </div> </div><br><br>');
                            }
                        }else{
                            $('.appendAllMessages').append('<br><br><div class="me" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Admit Offer ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""><div class="triangle"></div> <div class="message">'+result.data.message+'</div> </div> </div>');
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
                                $('.appendAllMessages').append('<br><br><div class="you" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Recruiter  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href='+path+' target="_blank"><img src="/images/site/pdfIcon.png" width="80"></a>  </div> </div><br><br>');
                            }else if(extension == 'docx'){
                                $('.appendAllMessages').append('<br><br><div class="you" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Recruiter  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href='+path+' target="_blank"><img src="/images/site/doc.png" width="80"></a>  </div> </div><br><br>');
                            
                            }else{
                                $('.appendAllMessages').append('<br><br><div class="you"> <div class="entete" style="margin-left: 10px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -12px;">Recruiter  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href="/admin/chatpdf/open/'+result.data.id+' target="_blank"><img src='+path+' width="80"></a> </div> </div><br><br>');

                            }
                        }else{
                            $('.appendAllMessages').append('<br><br><div class="you" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Recruiter  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""><div class="triangle"></div> <div class="message">'+result.data.message+'</div> </div> </div><br><br>');

                        }
                    }
                }
                
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
                            if(value.path.indexOf("admitoffer.s3.ap-south-1.amazonaws.com") > -1){
                                var path = value.path;                                
                            }else{
                                var path = '/'+value.path;
                            }
                            var extension = value.path.substr( (value.path.lastIndexOf('.') +1) );                            
                            if(extension == 'pdf'){
                                $('.appendAllMessages').append('<br><br><div class="me" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Admit Offer  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href='+path+' target="_blank"><img src="/images/site/pdfIcon.png" width="80"></a>  </div> </div><br><br>');
                            }else if(extension == 'docx'){
                                $('.appendAllMessages').append('<br><br><div class="me" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Admit Offer  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href='+path+' target="_blank"><img src="/images/site/doc.png" width="80"></a>  </div> </div><br><br>');
                            
                            }else{
                                $('.appendAllMessages').append('<br><br><div class="me"> <div class="entete" style="margin-left: 10px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -12px;">Admit Offer  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href="/admin/chatpdf/open/'+value.id+' target="_blank"><img src='+path+' width="80"></a> </div> </div><br><br>');
                            }
                        }else{
                        $('.appendAllMessages').append('<br><br><div class="me" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Admit Offer ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""><div class="triangle"></div> <div class="message">'+value.message+'</div> </div> </div>');
                        }
                    } else{
                        if(value.path){
                            var extension = value.path.substr( (value.path.lastIndexOf('.') +1) );
                            if(value.path.indexOf("admitoffer.s3.ap-south-1.amazonaws.com") > -1){
                                var path = value.path;                               
                            }else{
                                var path = '/'+value.path;
                            }
                            if(extension == 'pdf'){
                                $('.appendAllMessages').append('<br><br><div class="you" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Recruiter  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href='+path+' target="_blank"><img src="/images/site/pdfIcon.png" width="80"></a>  </div> </div><br><br>');
                            }else if(extension == 'docx'){
                                $('.appendAllMessages').append('<br><br><div class="you" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Recruiter  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href='+path+' target="_blank"><img src="/images/site/doc.png" width="80"></a>  </div> </div><br><br>');

                            }else{
                                $('.appendAllMessages').append('<br><br><div class="you"> <div class="entete" style="margin-left: 10px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -12px;">Recruiter  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""> <a href="/admin/chatpdf/open/'+value.id+' target="_blank"><img src='+path+' width="80"></a> </div> </div><br><br>');
                            }
                        }else{
                        $('.appendAllMessages').append('<br><br><div class="you" > <div class="entete" style="margin-left: 10px;margin-top: 20px;"> <span class="status green"></span> <h6 style="margin-left: 11px; margin-top: -13px;margin-bottom: 20px;">Recruiter  ('+("0" + d.getDate()).slice(-2) + "-" +(d.toLocaleString('default', { month: 'short' }))+ "-" + d.getFullYear()+' '+ (d.toLocaleTimeString('default', { hour: '2-digit', minute: 'numeric',hour12: true }))+')</h6> </div> <div class=""><div class="triangle"></div> <div class="message">'+value.message+'</div> </div> </div><br><br>');

                        }
                    }
                });
                    $('.scrollBottom').animate({scrollTop: 9349}, 'slow');
                
            },
        });
    }, 1000 * 60 * 0.2);



    setInterval(function() { 
        var base_url = window.location.origin;
        $.ajax(
        {
            type:'get',
            url:'/admin/notification/',
            success:function(result)
            {
                $('.bellCountAdminAppend').html('');
                $('.bellCountAdminAppend').append('<span class="bellCountAdmin">'+result.adminNotificationCount+'</span>');
                $('.AdminappendMessage').html('');
                $('.AdminappendMessage').append('<h5 class="text-center">Notifications</h5>');
                
                $.each(result.adminNotification, function(index, value) {
                    if(index==5){ 
                        return false;
                    }
                    if(value.type == 'admin'){
                        $('.AdminappendMessage').append('<div tabindex="-1" class="dropdown-divider"></div><a href="'+base_url+'/agent/read/notify/'+value.id+'" class="onClickNotif"><p class="padding-10px font-size-12">'+value.message+'</p></a> ');
                    }
                });
                if(result.adminNotificationCount > 0){

                    $('.AdminappendMessage').append('<div tabindex="-1" class="dropdown-divider"></div> <a href="'+base_url+'/agent/notify/list"> <h6 class="text-center">View All</h6></a>');
                }



                $('.msgCountAdminAppend').html('');
                $('.msgCountAdminAppend').append('<span class="msgCountAdmin">'+result.adminMessagesCount+'</span>');
                $('.AdminappendMessageMsg').html('');
                $('.AdminappendMessageMsg').append('<h5 class="text-center">Messages</h5>');
                 $.each(result.adminMessages, function(indexs, values) {
                    if(indexs==5){ 
                        return false;
                    }
                    if(values.type == 'admin'){
                        $('.AdminappendMessageMsg').append('<div tabindex="-1" class="dropdown-divider"></div><a href="'+base_url+'/agent/read/notify/'+values.id+'" class="onClickNotif"><p class="padding-10px font-size-12">'+values.message+'</p></a> ');
                    }
                });
                if(result.adminMessagesCount > 0){

                    $('.AdminappendMessageMsg').append('<div tabindex="-1" class="dropdown-divider"></div> <a href="'+base_url+'/agent/messages/list"> <h6 class="text-center">View All</h6></a>');
                }



            },
        });
    }, 1000 * 60 * 0.2);