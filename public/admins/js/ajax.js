$(document).on('change','#qualification_id',function(){
    var id  = $(this).children("option:selected").val();
    $.ajax({    //create an ajax request 
        type: "GET",
        url: "/agent/student/getQualificationGrades/"+id,
        success: function(response){                    
            $(".gradeClass").html(''); 
            $(".gradeClass").append("<option value='' > Select Qualification Grade </option>");
            $.each(response, function(index, item) {
                 $(".gradeClass").append(new Option(item.qualification_grade.qualification_grade, item.qualification_grade.id)); 
            // alert(response);
            });

            //   list.append(new Option(item.text, item.value));
        }

    });
});
$(document).on('click','#ping',function(){
    $('#ping').hide();
    $('.pingmsg').removeClass('hide');
    $('.pingmsg').show('slow');
    var id  = $('#pingval').val();
    $.ajax({    //create an ajax request 
        type: "GET",
        url: "/agent/student/ping/"+id,
        success: function(response){  
            console.log(response);
            if(response.status == 'true'){
                setTimeout(function(){
                    $('.pingmsg').addClass('hide');
                    $('.pingmsg').hide('slow');
                    $('#ping').show('slow');
                }, 20000);
            }
        }
    });
});
 $('document').ready(function () {
    $('#btnTest').click(function () {
        $('#dummyModal').show();
    });
    $('#paymentcompleteApplication').click(function () {

        $('#isNotDocUpload').html('');
        $('#isNotDocUpload').append('<p class="text-danger">Please upload signed document first</p>');
        $('#paymentpopClose').click();
        $('#completeApplication').click();
    });
  });

// get all universities

// $(document).on('change','#country_id',function(){
//     var id  = $(this).children("option:selected").val();

// });
$(document).on('click','#completeApplication',function(){
    var id  = $('#completeApplicationId').val();
   
    // $('form').submit(false);
    // var id = $(this).data('id');
    swal({
      title: "Are you sure?",
      text: "After Confirm Your Application Will Lock !",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes! confirm",
      cancelButtonText: "No, cancel!",
      closeOnConfirm: false,
      closeOnCancel: false
        },function(isConfirm) {
         
          if (isConfirm == true) {
            $('#completeApplication').hide();
            swal.close();
            // swal("Submitted!", "Your application is Successfully submitted. We Will Contact You Shortly", "success");
                setTimeout(function(){
                    $body = $("body");
                    $body.addClass("loading");
                $('.modal-backdrop').css('position','inherit');
                    $.ajax({   
                        type: "GET",
                        url: "/agent/student/completeApplication/"+id,
                        success: function(response){
                            $body.removeClass("loading"); 
                            
                            signed_doc_upload();

                            if(response.countryId != '230'){
                                if(response.true != 'true'){
                                    $('#completeApplication').show();
                                      $('.modal-backdrop').css('position','inherit');
                                      $('.finalPop').click();
                                      $('.modal-backdrop').css('position','inherit');
                                      setTimeout(function(){
                                      $('.modal-backdrop').css('position','inherit');
                                      // $.each(response.stdSignedDoc, function(index, item) {
                                      //   $('.appendFormSignDoc').append('<div class="row"> <div class="col-md-6"> <div class="form-group"> <label for="recipient-name" class="col-form-label">Download signed document:</label> <a href="'+item.college.college_signed_documents.path+'/'+item.college.college_signed_documents.name+'" download> <div class="downloadHover"><i class="fa fa-download download" style="float: left;" aria-hidden="true"></i></div> </a> </div> </div> <div class="col-md-6"> <div class="form-group"> <label for="message-text" class="col-form-label">Upload signed document:</label> <input type="file" class="form-control" id="recipient-name"> </div> </div> </div>')
                                      // });    
                                    }, 1000);
                                      if(response.stdSignedDoc.length == 0){
                                          if(response.reqCCardDetails.length > 0){
                                            window.location.href = '/agent/payment/'+btoa(response.student_id)+'/'+btoa(response.amount)+'';
                                          }
                                      }
                                }
                            }
                            
                            if(response.true == 'true'){
                                $('#completeApplication').hide();
                                window.location.reload();
                            }                   
                                               
                        }
                
                    });
                }, 1000);
          } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
          }
        });
});
$(document).on('click','.confirmBasicDetail',function(){
    
   
    // $('form').submit(false);
    // var id = $(this).data('id');
    swal({
      title: "Are you sure you have filled the correct details.",
      text: "You wont be able to change Applying Country & Course Level later on.",
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
                $('#studentForm').submit();
          } else {
            swal("Cancelled", "sure recheck basic details :)", "error");
          }
        });
});

// upload college signed document by student 
function signed_doc_upload(){
$('.uploadSignedDoc').on("change",function (e)
    {
    $body = $("body");
    $body.addClass("loading");
        var ThisEvnt = $(this);
        e.preventDefault();
        var formData = $(this).serialize();
        
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
    
        $.ajax(
        {
            type:'post',
            url:'/agent/student/applicationSignedDocument',
            data: new FormData(this), 
            contentType: false,       
            cache: false,             
            processData:false,
            success:function(result)
            {
               
                
                $body.removeClass("loading");
                $(ThisEvnt).find('.error').html('<p class="text-success">Document Uploaded and Saved</p>');
                
             
            }
            
        });
    });
}








$(document).on('change','.country_id',function(){
    var id  = $(this).children("option:selected").val();
    $('#engScoreShow').hide();
    $.ajax({    //create an ajax request 
        type: "GET",
        url: "/agent/student/getEnglishTest/"+id,
        success: function(response){                    
            $(".englishDate").html(''); 
            $(".qualificationLvl").html(''); 
            $(".iletsScore").html(''); 
             if(id == '38'){
                    $('.CadHide').css('display','none');
                }
                if(id == '230'){
                    $('#engScoreShow').show();
                }
            $.each(response.getEnglishTest, function(index, item) {
                 $(".englishDate").append(new Option(item.name, item.id)); 
            // alert(response);
            });
            $.each(response.iletsScores, function(indexI, itemI) {
                 $(".iletsScore").append(new Option(itemI.name, itemI.id)); 
            // alert(response);
            });
            $(".qualificationLvl").append('<option value=""> Select Qualification</option>');
            $.each(response.qualification, function(indexs, items) {
                 $(".qualificationLvl").append(new Option(items.name, items.id)); 
            // alert(response);
            });

            //   list.append(new Option(item.text, item.value));
        }

    });
    $.ajax({    //create an ajax request 
        type: "GET",
        url: "/agent/student/getQuestions/"+id,
        success: function(response){                    
            $(".QuestionsSet").html(''); 
            
            $.each(response, function(index, item) {
                 $(".QuestionsSet").append('<div class="questionParent"><div class="col-md-12"> <h6>'+item.question.question+'?</h6> <input type="hidden" class="Qyes hide"  name="questionsLenght" value="'+response.length+'" ><input type="hidden" class="Qyes hide"  name="questionId['+index+']" value="'+item.id+'" ><div class="row"> <div class="col-sm-4"> <label class="containerRadio">Yes <input type="radio" class="Qyes displayNone"  name="question['+index+']" value="yes" > <span class="checkmark"></span> </label> </div> <div class="col-sm-8"> <label class="containerRadio">No <input type="radio" class="QNo displayNone"  name="question['+index+']" value="no" > <span class="checkmark"></span> </label> </div> </div> </div> <div class="row pad-border displayNone Qyess"> <div class="col-sm-12 nopadding"> <div class="form-group"> <div class="input-group"><textarea class="form-control" id="Degree" name="questionText[]" value="" placeholder="Kindly Provide Details"></textarea> </div> </div> </div> </div></div>'); 
            // alert(response);
            });

            //   list.append(new Option(item.text, item.value));
        }

    });
});
$(document).ready(function(){

    doc_upload();

    baseUrl = window.location.hostname;

    setTimeout(function(){
        var id  = $('.country_id').children("option:selected").val();
        var country_id  = $('.country_id').children("option:selected").val();
        $.ajax({    //create an ajax request 
            type: "GET",
            url: "/agent/student/getEnglishTest/"+id,
            success: function(response){                    
                $(".englishDate").html('');
                if(id == '38'){
                    $('.CadHide').css('display','none');
                }
                $.each(response.getEnglishTest, function(index, item) {
                     $(".englishDate").append(new Option(item.name, item.id)); 
                });
            }
        });
        $.ajax({    //create an ajax request 
            type: "GET",
            url: "/agent/student/getQuestions/"+id,
            success: function(response){                    
                $(".QuestionsSet").html(''); 
                $.each(response, function(index, item) {
                     $(".QuestionsSet").append('<div class="questionParent"><div class="col-md-12"> <h6 class="capitalize" >'+item.question.question+'?</h6> <input type="hidden" class="Qyes hide"  name="questionsLenght" value="'+response.length+'" ><input type="hidden" class="Qyes hide"  name="questionId[]" value="'+item.id+'" > <div class="row"> <div class="col-sm-3"> <label class="containerRadio">Yes <input type="radio" class="Qyes displayNone"  name="question['+index+']" value="yes" > <span class="checkmark"></span> </label> </div> <div class="col-sm-9"> <label class="containerRadio">No <input type="radio" class="QNo displayNone"  name="question['+index+']" value="no" > <span class="checkmark"></span> </label> </div> </div> </div> <div class="row pad-border displayNone Qyess"> <div class="col-sm-12 nopadding"> <div class="form-group"> <div class="input-group"><textarea class="form-control" id="Degree" name="questionText[]" value="" placeholder="Kindly Provide Details"></textarea> </div> </div> </div> </div></div>'); 
                });
            }
    
        });

// grades
        var id  = $('#qualification_id').children("option:selected").val();
        $.ajax({    //create an ajax request 
            type: "GET",
            url: "/agent/student/getQualificationGrades/"+id,
            success: function(response){                    
                $(".gradeClass").html(''); 
                $(".gradeClass").append("<option value='' > Select Qualification Grade </option>");
                $.each(response, function(index, item) {
                    $(".gradeClass").append(new Option(item.qualification_grade.qualification_grade, item.qualification_grade.id)); 
                // alert(response);
                });

                //   list.append(new Option(item.text, item.value));
            }

        });

       

        //     var selectedCountry = $('#country_id').children("option:selected").val();
        //     if(!selectedCountry){
        //         $("#state_id").html('');
        //         $("#state_id").append("<option value='' > Select state </option>");
        //         $("#city_id").html('');
        //         $("#city_id").append("<option value='' > Select state </option>");
        //     }
            
        // $.ajax({
        //     url : "/admin/getState/"+selectedCountry,
        //     type:'GET',
        //     dataType: 'json',
        //     success: function(response) {
        //         $("#state_id").html('');
        //         $("#state_id").append("<option value='' > Select state </option>");
                
        //         if(response.length > 0){
        
        //             $.each(response,function(key, value)
        //             {
        //                 console.log(key);
        //                 $("#state_id").append('<option value=' + value.id + '>' + value.name + '</option>');
        //             });
        //         }else{
        //             $("#state_id").append('<option value="">State Not Available</option>');
        
        //         }
        //      }
        // });
        
        
        // // city id
        
        //     var selectedState = $('#state_id').children("option:selected").val();
        //     console.log(selectedState);
        //     if(!selectedState){
        //         $("#city_id").html('');
        //         $("#city_id").append("<option value='' > Select state </option>");
        //     }
        // $.ajax({
        //     url : "/admin/getCity/"+selectedState,
        //     type:'GET',
        //     dataType: 'json',
        //     success: function(response) {
        //         $("#city_id").html('');
        //         $("#city_id").append('<option value="" >Select city</option>');
        //         if(response.length > 0){
        //             $.each(response,function(key, value)
        //             {
        //                 console.log(key);
        //                 $("#city_id").append('<option value=' + value.id + '>' + value.name + '</option>');
        //             });
        //         }else{
        //             $("#city_id").append('<option value="">City Not Available</option>');
        
        //         }
        //      }
        // });
        



         }, 2000);
$(document).on('change','#qualification_id',function(){
            var id  = $('.country_id').children("option:selected").val();
            var country_id  = $('.country_id').children("option:selected").val();
            
            var qualification_id = $('#qualification_id').children("option:selected").val();
         $.ajax({    //create an ajax request 
                type: "GET",
                url: "/admin/student/getCollegesListInAdmin/"+country_id,
                dataType: 'json',
                success: function(response){
                                    
                    $("#universityId").html(''); 
                    $("#universityId").append("<option value='' > Select Universitys </option>");
                    $.each(response, function(index, item) {
                        $("#universityId").append(new Option(item.name, item.id)); 
                    
                    });

                    //   list.append(new Option(item.text, item.value));
                }

            });
        });
$(document).on('change','#universityId',function(){
           var university_id  = $('#universityId').children("option:selected").val();
           var country_id  = $('.country_id').children("option:selected").val();
            var qualification_id = $('#qualification_id').children("option:selected").val();
         $.ajax({    //create an ajax request 
                type: "GET",
                url: "/admin/student/getCourseListInAdmin/"+country_id+'/'+qualification_id+'/'+university_id,
                dataType: 'json',
                success: function(response){
                                    
                    $("#programId").html(''); 
                    $("#programId").append("<option value='' > Select Program </option>");
                    $.each(response, function(index, item) {
                        $("#programId").append(new Option(item.name, item.id)); 
                    
                    });

                    //   list.append(new Option(item.text, item.value));
                }

            });
        });
})
$(document).on("submit",'#studentForm',function(e)
{
    e.preventDefault();
    $body = $("body");
    $body.addClass("loading");
    var ThisHit = $(this);
    
    var formData = $(this).serialize();
    $.ajax(
    {
        type:'post',
        url:'/agent/student/studentCheck',
        data:new FormData(this),
        contentType: false,       
        cache: false,             
        processData:false,
        success:function(result)
        {

            $body.removeClass("loading");
            if(result.status == 'true'){
                $(".afterCheckHide").attr('disabled',true);
               $('.openSession').show();
               $('#validation-errors').html('');
               $('input').css('border','1px solid #ced4da');
               $('html,body').animate({scrollTop: 1349}, 'slow');
               $('.lorMoiSopDoc').show();
            }else{

                alert('wrong');
            }
        },
        error: function(xhr) {
            $body.removeClass("loading");
            $('html,body').animate({scrollTop: 0}, 'slow');
            $('#validation-errors').html('');
            $.each(xhr.responseJSON.errors, function(key,value) {
                
              $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div');
              $(ThisHit).find('input[name='+key+']').css('border','2px solid red');
          }); 
         },
    });
});

$("#studentForm").on("change",function (e)
{
    e.preventDefault();
    // var studentId = $('#studentId').val();

    
    // var form_data = new FormData();
    var formData = $(this).serialize();
    

    $.ajax(
    {
        type:'post',
        url:'/agent/student/studentSave',
        data:new FormData(this),
        contentType: false,       
        cache: false,             
        processData:false,
        success:function(result)
        {
            $('.imgEr').html('');
            if(result.status == 'true'){
                $('#studentId').val(result.studentId);
                $('.studentId').val(result.studentId);
                $('#studentUniqueId').val(result.studentUniqueId);
            }
        },
        error: function(data, textStatus, errorThrown)
        {
            // console.log(textStatus);
            // console.log(data.responseText);
            // console.log(errorThrown);
            var err = eval("(" + data.responseText + ")");
            if(err.errors){
                if(err.errors['image']){
                    if(err.errors['image'][0]){
                        $('.imgEr').html('');
                        $('.imgEr').append('<p class="text-ceter text-danger">'+err.errors['image'][0]+'</p>');

                    }
                }
            }
            // alert('request failed :'+errorThrown);
        }
        
    });
});



function doc_upload(){
    $('.documentUpload').on("change",function (e)
    {
        $body = $("body");
    $body.addClass("loading");
        var ThisEvnt = $(this);
        e.preventDefault();
        var formData = $(this).serialize();
        
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
    
        $.ajax(
        {
            type:'post',
            url:'/agent/student/studentdocuments',
            data: new FormData(this), 
            contentType: false,       
            cache: false,             
            processData:false,
            success:function(result)
            {
               
                
                $body.removeClass("loading");
                $(ThisEvnt).find('.error').html('<p class="text-success">Document Uploaded and Saved</p>');
                $('.imgPassportEr').html('');
                $('.imgqualificationDocumentEr').html('');
                // if(result.status == 'true'){
                //     $('#studentId').val(result.studentId);
                // }else{
    
                //     // alert('wrong');
                // }
            },
            error: function(data, textStatus, errorThrown)
            {
                $body.removeClass("loading");
                $(ThisEvnt).find('.error').html('<p class="text-danger">Document must be a file of type: pdf.</p>')
                // console.log(errorThrown);
                $('.imgqualificationDocumentEr').html('');
                $('.imgPassportEr').html('');
                var err = eval("(" + data.responseText + ")");
                if(err.errors){
                    if(err.errors['passport']){
                        if(err.errors['passport'][0]){
                            $('.imgPassportEr').html('');
                            $('.imgPassportEr').append('<p class="text-ceter text-danger dangerBar">'+err.errors['passport'][0]+'</p>');
                            $('.imgPassportEr').siblings('.fa-check').hide();
    
                        }
                    }
                    if(err.errors['lor']){
                        if(err.errors['lor'][0]){
                            $('.imgPassportErl').html('');
                            $('.imgPassportErl').append('<p class="text-ceter text-danger dangerBar">'+err.errors['lor'][0]+'</p>');
                            $('.imgPassportErl').siblings('.fa-check').hide();
    
                        }
                    }
                    if(err.errors['moi']){
                        if(err.errors['moi'][0]){
                            $('.imgPassportErM').html('');
                            $('.imgPassportErM').append('<p class="text-ceter text-danger dangerBar">'+err.errors['moi'][0]+'</p>');
                            $('.imgPassportErM').siblings('.fa-check').hide();
    
                        }
                    }
                     if(err.errors['test.UKVI']){
                        if(err.errors['test.UKVI'][0]){
                            $(ThisEvnt).find('.error').html('');
                            $(ThisEvnt).find('.error').append('<p class="text-ceter text-danger dangerBar">'+err.errors['test.UKVI'][0]+'</p>');
                            $(ThisEvnt).find('.fa-check').hide();
    
                        }
                    }
                    if(err.errors['qualificationDocument']){
                        if(err.errors['qualificationDocument'][0]){
                            $('.imgqualificationDocumentEr').append('<p class="text-ceter text-danger dangerBar">'+err.errors['qualificationDocument'][0]+'</p>');
                            $('.imgqualificationDocumentEr').siblings('.fa-check').hide();
    
                        }
                    }
                }
                // alert('request failed :'+errorThrown);
            }
            
        });
    });
}


$('#studentVarify').on("submit",function (e)
{
    e.preventDefault();
    var formData = $(this).serialize();
    $('.fa-check').show();
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

    $.ajax(
    {
        type:'post',
        url:'/agent/student/applyFor',
        data: new FormData(this), 
        contentType: false,       
        cache: false,             
        processData:false,
        success:function(result)
        {
            if(result.error){
               $('.errorVerify').append(result.error); 
            }
            // if(result.status == 'true'){
            //     $('#studentId').val(result.studentId);
            // }else{

            //     // alert('wrong');
            // }
        }
        
    });
});
$(document).on("change",'#studentImage',function (e)
{
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

    $.ajax(
    {
        type:'post',
        url:'studentdocuments',
        data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,
        success:function(result)
        {
            // if(result.status == 'true'){
            //     $('#studentId').val(result.studentId);
            // }else{

            //     // alert('wrong');
            // }
        }
        
    });
});

setInterval(function() { 
    var base_url = window.location.origin;
    $.ajax(
        {
            type:'get',
            url:'/admin/notification/',
            success:function(result)
            {
                
            
                $('.bellCountAppend').html('');
                $('.bellCountAppend').append('<span class="bellCount">'+result.notifCount+'</span>');
                $('.appendMessage').html('');
                $('.appendMessage').append('<h5 class="text-center">Notifications</h5> </div>');
                $('.msgCountAppend').html('');
                $('.msgCountAppend').append('<span class="msgCount">'+result.msgCount+'</span>');
                $('.appendMessageMsg').html('');
                $('.appendMessageMsg').append('<h5 class="text-center">Messages</h5> </div>');
                
                
                $.each(result.notification, function(index, value) {
                    if(index==5){ 
                        return false;
                    }
                    $('.appendMessage').append('<div tabindex="-1" class="dropdown-divider"></div><a href="'+base_url+'/agent/read/notify/'+value.id+'" class="onClickNotif"><input type="hidden" class="notifyID" value="'+value.id+'"><p class="padding-10px font-size-12">'+value.message+'</p></a> ');
                   
                });
                $.each(result.messages, function(indexs, valueN) {
                    if(indexs==5){ 
                        return false;
                    }
                    $('.appendMessageMsg').append('<div tabindex="-1" class="dropdown-divider"></div><a href="'+base_url+'/agent/read/notify/'+valueN.id+'" class="onClickNotif"><input type="hidden" class="notifyID" value="'+valueN.id+'"><p class="padding-10px font-size-12">'+valueN.message+'</p></a> ');
                   
                });
                if(result.notifCount > 0){

                    $('.appendMessage').append('<div tabindex="-1" class="dropdown-divider"></div> <a href="'+base_url+'/agent/notify/list" > <h6 class="text-center">View All</h6></a>');
                }
                if(result.msgCount > 0){

                    $('.appendMessageMsg').append('<div tabindex="-1" class="dropdown-divider"></div> <a href="'+base_url+'/agent/messages/list" > <h6 class="text-center">View All</h6></a>');
                }
        },
    });
}, 1000 * 60 * 0.2);

$(document).on('click','.onClickNotif',function(){
    var id  = $(this).find('.notifyID').val();
    $.ajax({    //create an ajax request 
        type: "GET",
        url: "/agent/student/read/notify/"+id,
        success: function(response){ 
            if(response.status == true){

                top.location.href = response.data.link;
            }                   

            //   list.append(new Option(item.text, item.value));
        }

    });
});