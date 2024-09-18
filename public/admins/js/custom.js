

$(document).ready(function(){
 
        var currentDate = new Date('2021-1-1');
    setTimeout(function(){ 
        $('.popOver').hide('slow');
     }, 11000);
    setTimeout(function(){ 
        var currentDate = $('.currentDate').val();
     }, 3000);
  $(".Issuedatepicker" ).datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
      yearRange: "-70:+20",
      minDate: new Date('1950-1-1')
  
    });
  $(".Expdatepicker" ).datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
      yearRange: "-70:+20",
      minDate: new Date(currentDate)
  
    });
  $(".datepickerOfbirth" ).datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
      yearRange: "-70:+20",
      maxDate: new Date('2015-1-1')
  
    });
});


$(document).on('keyup','#totalCommission',function(){
    var totalCommisiion =  parseFloat($('#totalCommission').val());
    var agentCommission =  parseFloat($('#agentCommission').val());
    var total = totalCommisiion-agentCommission;
            $('#admissionOverseasCut').val('');
            $('#admissionOverseasCut').val(total);
});
$(document).on('keyup','#agentCommission',function(){
    var totalCommisiion =  parseFloat($('#totalCommission').val());
    var agentCommission =  parseFloat($('#agentCommission').val());
    var total = totalCommisiion-agentCommission;
            $('#admissionOverseasCut').val('');
            $('#admissionOverseasCut').val(total);
});
$(document).on('change','#agentCommission',function(){
    var totalCommisiion =  parseFloat($('#totalCommission').val());
    var agentCommission =  parseFloat($('#agentCommission').val());
    var total = totalCommisiion-agentCommission;
    if(totalCommisiion){
            $('#admissionOverseasCut').val('');
            $('#admissionOverseasCut').val(total);
    }
});
$(document).on('click','#isIletsCheck',function(){
    $('#isIletsShow').toggle('slow');
    // $('#isEScoreHide').toggle('slow');
});

  $(document).on('click','#onIsNoIletsClick',function(){
    $('#onIsNoIletsShow').toggle('slow');
    // $('#isEScoreHide').toggle('slow');
  });

  $(document).on('click','.isIletsCheck',function(){
    $('#onIsNoIletsShow').hide('slow');
    $('#isIletsShow').show('slow');
    // $('#isEScoreHide').toggle('slow');
  });
  $(document).on('click','.onIsNoIletsClick',function(){
    $('#isIletsShow').hide('slow');
    $('#onIsNoIletsShow').show('slow');
    // $('#isEScoreHide').toggle('slow');
});
$(document).on('click','#isMathCheck',function(){
    $('#isMathShow').toggle('slow');
});
$(document).on('click','.wilHide',function(){
    $('.wilHide').hide('slow');
    $('.wilShow').show('slow');
});
$(document).on('click','.wilHide2',function(){
    $('.wilHide2').hide('slow');
    $('.wilShow2').show('slow');
});
$(document).on('click','.wilHide3',function(){
    $('.wilHide3').hide('slow');
    $('.wilShow3').show('slow');
});
$(document).on('click','.wilHide4',function(){
    $('.wilHide4').hide('slow');
    $('.wilShow4').show('slow');
});

//image preview
function readURL(input) {
  console.log('input');
  console.log($(input).parents('.form-group').find('.blah'));
    if (input.files && input.files[0]) {
      var reader = new FileReader();
        reader.onload = function(e) {
          $(input).parents('.form-group').find('.blah').attr('src', e.target.result);
        }
       reader.readAsDataURL(input.files[0]);
    }
  }
  
  $(".imgInp").change(function() {
      $('.blahSize').show();
    readURL(this);
  });

  $(document).on('change','#state_id',function() {
        var stateId = $('#state_id').val();
    if(stateId == '32'){
      $('.ShowOnlyPunjab').removeClass('hide');
      $('.ShowOnlyPunjab').css('display','-webkit-box');
    
    }else if(stateId == '6'){
      $('.ShowOnlyChd').removeClass('hide');
      $('.ShowOnlyChd').css('display','-webkit-box');
      $('.ShowOnlyChd').find("input").prop('required',true);
    
    }else{
      $('.ShowOnlyPunjab').css('display','');
      $('.ShowOnlyPunjab').addClass('hide');
       $('.ShowOnlyChd').css('display','');
      $('.ShowOnlyChd').addClass('hide');
      $('.ShowOnlyChd').find("input").removeAttr('required');

    }
    
  });

  $(document).on('click','.OtherCollap',function(){
    // alert('sadsa');
    var sibling  = $(this).parents('.show').siblings().find('.collapse').removeClass('show');
     $(this).parents('.show').find('.collapse').show();
     $(this).parents('.show').find('.collapse').addClass('show');
    console.log(sibling);
      // $(this).parents('.card').find('.collapse').removeClass('collapse');
      // $(this).parents('#formTab').find('.collapse').removeClass('show');
      // $(this).parents('#formTab').find('.collapse').hide();
      
      // $(this).parents('.accordion-wrapper').siblings().find('.show').hide();
  });




//second image preview
function readURLDoc(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
        reader.onload = function(e) {
          $('.blah2').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }
  
  $(".imgInp2").change(function() {
      $('.blahSize2').show();
    readURLDoc(this);
  });
  $(document).on('click','.sidebar__headingChild',function(e){
    if($(e.target).attr('class') == 'toogleMain' || $(e.target).attr('class') == 'metismenu-state-icon pe-7s-angle-down caret-left toogleMain'){
      $(this).find('.displayNone').toggle('slow');
    }
  });

  function readURLDoc3(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
        reader.onload = function(e) {
          $('.blah3').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }
  
  $(".imgInp3").change(function() {
      $('.blahSize3').show();
    readURLDoc3(this);
  });

  function readURLDoc4(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
        reader.onload = function(e) {
          $('.blah4').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }
  
  $(".imgInp4").change(function() {
      $('.blahSize4').show();
    readURLDoc4(this);
  });

  

var room = 1;
$(document).on('submit','.educationFields',function(e) {
// function education_fields() {
  e.preventDefault();
 
  var hitThis = $(this);
    
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var formData = $('.educationFields').serialize();
    
    console.log(formData);
    
    $.ajax(
      {
        type:'post',
        url:'/agent/student/studentWorkExperiance',
        data:formData,
        
        success:function(result)
        {
          console.log('result');
          console.log(result);
          if(result.status == 'true'){
            $(hitThis).find('.btn-success').addClass('hide');
            $('.educationFields').removeClass('educationFields');
            // $('#studentId').val(result.studentId);
            $(hitThis).find('.RstudentQualificationWork'+room).val(result.studentWork);
            room++;
            var objTo = document.getElementById('education_fields')
            var diveducation = document.createElement("div");
            diveducation.setAttribute("class", "form-group removeclass"+room);
            var rdiv = 'removeclass'+room;
            diveducation.innerHTML = '<form method="POST" class="educationFields"><div class="row pad-border"> <div class="col-sm-6 nopadding"> <div class="form-group"> <input type="text" class="form-control" id="Schoolname" name="organization" value="" placeholder="Organization"> </div> </div> <div class="col-sm-6 nopadding"> <div class="form-group"> <input type="text" class="form-control" id="Schoolname" name="designation" value="" placeholder="Designation"> </div> </div> <div class="col-sm-6 nopadding"> <div class="form-group"><label>From Date</label> <input type="text" class="datepicker form-control" name="work_from_date" value="" placeholder="From Date" readonly> </div> </div> <div class="col-sm-6 nopadding"> <div class="form-group"><label>To Date</label> <div class="input-group"> <input type="text" class="datepickers form-control" name="work_to_date" value="" placeholder="To Date" readonly> <div class="input-group-btn"><input type="hidden" class="RstudentQualificationWork'+room+'"> <button class="btn btn-danger hide minus" type="button" onclick="remove_education_fields('+ room +');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="col-sm-12 nopadding"> <div class="form-group"> <div class="input-group"> <div class="input-group-btn text-center width-100"> <button class="btn btn-info" type="submit"  >  Save </button> </div> </div> </div> </div></div></form></div><div class="clear"></div>';
            objTo.appendChild(diveducation)
            $('input').css('border','1px solid #ced4da');
            $(hitThis).find('.minus').removeClass('hide');
            $(hitThis).find('.minus').addClass('show');
            
            // $(hitThis).find('select').attr("disabled", true);
            // $(hitThis).find('input').attr('readonly','readonly');
            $(hitThis).hide();
            $('#WorkExperiancesAppend').html('');
            $('#WorkExperiancesAppend').append('<table class="mb-0 table"> <thead> <tr> <th>#</th> <th>Organization</th> <th>Designation</th> <th>From Date</th> <th>To Date</th> <th>Action</th> </tr> </thead> <tbody class="WorkExperiancesAppend"> </tbody> </table>');
            $('.WorkExperiancesAppend').html('');
            $('#WorkExpDocAppend').html('');
            var length = result.allStudentExp.length;
            console.log(length);
            $.each(result.allStudentExp, function(key,value) {
              var idS = key+1;
              $('.WorkExperiancesAppend').append('<tr class="removeEditclass'+value.id+'"> <th scope="row">'+idS+'</th> <td >'+value.organization+'</td> <td>'+value.designation+'</td> <td>'+value.fromDate+'</td> <td>'+value.toDate+'</td> <td><button class="btn btn-danger minus" data-id type="button"  onclick="remove_Edit_education_fields('+value.id+');"> <i class="fa fa-minus" aria-hidden="true"></i> </button></td> </tr>');
              var rooms = room-1;
              $('#WorkExpDocAppend').append('<form method="POST" enctype="multipart/form-data" class="documentUpload"><div class="form-group row removeclass'+value.id+'"> <label for="input-id" class="col-sm-2">Documents Of '+value.organization+' Experience<span class="text-danger">*</span> </label> <div class="col-sm-4"> <label class="btn btn-info"> <i class="fa fa-upload"></i> <input type="file" name="work['+value.organization+']" class="mb-2 hide form-control imgInpDoc" accept="application/pdf"> </label><div class="error"></div> </div> <div class="col-sm-6"> <input type="hidden" name="workId['+value.organization+']" value="'+value.id+'"><i class="fa fa-check btn btn-success displayNone " aria-hidden="true" ></i></div> </div></form>');
          }); 

            $('#validation-errors').html('');
            doc_upload();
              $(document).on('change','.imgInpDoc',function(){

                $(this).parents('.form-group').find('.btn-success').show();
              });
              $(document).on('change','.imgInp',function(){

                $(this).parents('.form-group').find('.btn-success').show();
              });
              
                $(".datepicker" ).datepicker({
                  dateFormat: "dd-mm-yy",
                  changeMonth: true,
                  changeYear: true,
                  yearRange: "-70:+20"
              
                });
                $(".datepickers" ).datepicker({
                  dateFormat: "dd-mm-yy",
                  changeMonth: true,
                  changeYear: true,
                  yearRange: "-70:+20"
              
                });
              
             
          }else{

              alert('All Fields are required');
          }
          $(document).ready(function() {
            $(".datepicker" ).datepicker({
              dateFormat: "dd-mm-yy",
              changeMonth: true,
              changeYear: true,
              yearRange: "-70:+20"
          
            });
          } );
          $(document).ready(function() {
          $(".datepickers" ).datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            yearRange: "-70:+20"
        
          });
          });
      },
        error: function(xhr) {
        $('#validation-errors').html('');
        $.each(xhr.responseJSON.errors, function(key,value) {
          $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div');
          $(hitThis).find('input[name='+key+']').css('border','2px solid red');
      }); 
      }
  });
            
});


function remove_education_fields(rid) {

  var id = $('.RstudentQualificationWork'+rid).val();
  $.ajax({    //create an ajax request 
    type: "GET",
    url: "/agent/student/deleteQualificationWork/"+id,
    success: function(response){  
      $('.removeclass'+rid).hide();
      
      // $('.removeTestclass'+tid).hide();
    }
    
  });
}
function remove_Edit_education_fields(rid) {
  
  var id = rid;
  $.ajax({    //create an ajax request 
    type: "GET",
    url: "/agent/student/deleteQualificationWork/"+id,
    success: function(response){  
      $('.removeEditclass'+rid).hide();
      $('.removeclass'+rid).hide();
                        
      // $('.removeTestclass'+tid).hide();
    }

});
}
var test = 1;
$(document).on('submit','.test_fields',function(e) {
// function test_fields() {
  e.preventDefault();
  var hitThis = $(this);
  $('.englishAfterAddMore').hide('slow');
  $('.englishAddMore').show('slow');
  $body = $("body");
    $body.addClass("loading");
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var formData = $('.test_fields').serialize();
    
    console.log(formData);
    
    $.ajax(
      {
        type:'post',
        url:'/agent/student/studentQualificationTests',
        data:formData,
        
        success:function(result)
        {
          $body.removeClass("loading");
          if(result.status == 'true'){
            $('#validation-errors').html('');
            $(hitThis).find('.btn-success').addClass('hide');
            $('.test_fields').removeClass('test_fields');
            $(hitThis).find('.RstudentQualificationTest'+test).val(result.studentTest);
            test++;
            // $('#studentId').val(result.studentId);
            var objTo = document.getElementById('test_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group removeTestclass"+test);
            var rdiv = 'removeTestclass'+test;
            var englishDate = $('.testFields').find('.englishDate').html(); 
            var iletsScore = $('.testFields').find('.iletsScore').html(); 
            divtest.innerHTML = '<form method="POST"  class="test_fields"><div class="row pad-border"> <div class="col-sm-6 nopadding showtest"> <div class="form-group"><label>Test</label><span class="text-danger">*</span> <select class="form-control onChangeTest" id="educationDate" name="testName"> '+englishDate+'</select> </div> </div> <div class="col-sm-6 nopadding showtest"> <div class="form-group"><label>Overall</label><span class="text-danger">*</span> <select class="form-control"  name="overall" required> <option value="">Select Overall Score</option> <option value="4">4</option> <option value="4.5">4.5</option> <option value="5">5</option> <option value="5.5">5.5</option> <option value="6">6</option> <option value="6.5">6.5</option> <option value="7">7</option> <option value="7.5">7.5</option> <option value="8">8</option> <option value="8.5">8.5</option> <option value="9">9</option> </select> </div> </div> <div class="col-sm-6 nopadding showtest"> <div class="form-group"><label>Total Score</label><span class="text-danger">*</span> <div class="input-group"> <select class="form-control"  name="totalIletsScore"> '+iletsScore+' </select> <div class="input-group-btn"><input type="hidden" class="RstudentQualificationTest'+test+'"> <button class="btn btn-danger hide minus" type="button" onclick="remove_test_fields('+ test +');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="col-sm-12 nopadding showtest"> <div class="form-group"> <div class="input-group"> <div class="input-group-btn text-center width-100 "> <button class="btn btn-success btn btn-info" type="submit"  > Save English Test </button> </div> </div> </div> </div></div></form><div class="clear"></div>';
            
            objTo.appendChild(divtest)
            $('input').css('border','1px solid #ced4da');
            $(hitThis).find('.minus').removeClass('hide');
            $(hitThis).find('.minus').addClass('show');
            
            // $(hitThis).find('select').attr("disabled", true);
            // $(hitThis).find('input').attr('readonly','readonly');
            $(hitThis).hide();
            $('#appendQualTest').html('');
            $('#appendQualTest').append('<table class="mb-0 table"> <thead> <tr> <th>#</th> <th>Test</th> <th>Over All</th>  <th>Action</th> </tr> </thead> <tbody class="appendQualTest"> </tbody> </table>');
            $('.appendQualTest').html('');
            $('#TestDocAppend').html('');
            var length = result.studentEnglishTests.length;
            $.each(result.studentEnglishTests, function(key,value) {
              var idS = key+1;
              $('.appendQualTest').append('<tr class="removeEditTestclass'+value.id+'"> <th scope="row">'+idS+'</th> <td >'+value.english_tests.name+'</td><td>'+value.overAll+'</td>  <td><button class="btn btn-danger minus" data-id type="button"  onclick="remove_edit_test_fields('+value.id+');"> <i class="fa fa-minus" aria-hidden="true"></i> </button></td> </tr>');
              var tests = test-1;
              $('#TestDocAppend').append('<form method="POST" enctype="multipart/form-data" class="documentUpload"><div class="form-group row removeTestclass'+value.id+'"> <label for="input-id" class="col-sm-2"><b>'+value.english_tests.name+'</b><span class="text-danger">*</span> </label> <div class="col-sm-4">  <label class="btn btn-info"> <i class="fa fa-upload"></i> <input type="file" name="test['+value.english_tests.name+']" class="mb-2 hide form-control imgInpDoc" accept="application/pdf" > </label>  <div class="error"></div></div> <div class="col-sm-6"> <input type="hidden" name="testId['+value.english_tests.name+']" value="'+value.id+'"> <i class="fa fa-check btn btn-success displayNone " aria-hidden="true"></i> </div> </div></form>');
          }); 
          $('#test_fields').hide();
            doc_upload();
            $(document).on('change','.imgInpDoc',function(){

              $(this).parents('.form-group').find('.btn-success').show();
            });
            $(document).ready(function() {
              $(".datepicker" ).datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
              changeYear: true,
              yearRange: "-70:+20"
            
              });
            } );
          }else{

              alert('All Fields are required');
          }
      },
        error: function(xhr) {
          
          $body.removeClass("loading");
          $('html,body').animate({scrollTop: 0}, 'slow'); 
          $('.englishAddMore').hide();
        $('#validation-errors').html('');
        $.each(xhr.responseJSON.errors, function(key,value) {
            $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div');
            $(hitThis).find('input[name='+key+']').css('border','2px solid red');
        });
      }
  });
    
});
$(document).on('click','#qualification',function(){
  $('.qualification').show();
  $('.other').hide();
});
$(document).on('click','#other',function(){
  $('.other').show();
  $('.qualification').hide();
});



function remove_test_fields(tid) {
  var id = $('.RstudentQualificationTest'+tid).val();
  $.ajax({    //create an ajax request 
    type: "GET",
    url: "/agent/student/deleteQualificationTest/"+id,
    success: function(response){  
                        
      $('.removeTestclass'+tid).hide();
    }
    
  });
}
function remove_edit_test_fields(tid) {
  var id = tid;
  $.ajax({    //create an ajax request 
    type: "GET",
    url: "/agent/student/deleteQualificationTest/"+id,
    success: function(response){  
      
      $('.removeEditTestclass'+tid).hide();
      $('.removeTestclass'+tid).hide();
    }

});
}
  
var qualification = 1;
$(document).on('submit','.qualification_fieldsData',function(e) {
  e.preventDefault();
  var hitThis = $(this);
   $body = $("body");
    $body.addClass("loading");
    $('.qualificatioinWithoutJSAddMore').hide('slow');
    $('.qualificatioinAddMore').show('slow');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    
    var formData = $('.qualification_fieldsData').serialize();
  
    $.ajax(
      {
        type:'post',
        url:'/agent/student/studentQualification',
        data:formData,
        
        success:function(result)
        {
          $('#qualification_fields').hide();
          $body.removeClass("loading");
          console.log('result');
          console.log(result);
          if(result.status == 'true'){
            $('#validation-errors').html('');
            $(hitThis).find('.btn-success').addClass('hide');
            $('.qualification_fieldsData').removeClass('qualification_fieldsData');
            $(hitThis).find('.RstudentQualification'+qualification).val(result.studentQualification);
            qualification = qualification++;
            var objTo = document.getElementById('qualification_fields')
            var divqualification = document.createElement("div");
            divqualification.setAttribute("class", "form-group removeQualificationclass"+qualification);
            var rdiv = 'removeQualificationclass'+qualification;
            var qualificationGet = $('.qualificationGet').find('#educationDate').html();
            var getCountryAll = $('.qualificationGet').find('.getCountryId').html();
            var getBoardAll = $('.qualificationGet').find('.getBoardId').html();
            var resultOpt = $('.qualificationGet').find('.resultOpt').html();
            divqualification.innerHTML = '<form method="POST" class="studentQualificationForm qualification_fieldsData"  enctype="multipart/form-data"> <div class="row pad-border qualificationParent"> <div class="col-sm-6 nopadding"> <div class="form-group"><label>Qualification</label><span class="text-danger">*</span> <select class="form-control " id="educationDate" name="qualificationGrade">'+qualificationGet+'</select> </div> </div><div class="col-sm-6 nopadding"> <div class="form-group"> <label>From</label><span class="text-danger">*</span><input type="text" class="datepicker form-control" name="qualification_from_date" value="" placeholder="From" readonly> </div> </div> <div class="col-sm-6 nopadding"> <div class="form-group"> <label>To</label><span class="text-danger">*</span><input type="text" class="datepicker form-control" name="qualification_to_date" value="" placeholder="To" readonly> </div> </div><div class="col-sm-6 nopadding"> <div class="form-group"><label>Total Percentage</label><span class="text-danger">*</span> <div class="input-group"> <select class="form-control" name="qualification_total">'+resultOpt+'</select> <div class="input-group-btn"> <button class="btn btn-danger hide minus" type="button" onclick="remove_qualification_fields('+ qualification +');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div></div><div class="col-sm-12 nopadding"> <div class="form-group"><div class="input-group"> <div class="input-group-btn margin-top-20 text-center width-100"> <button class="btn btn-info " type="submit"  > Save Qualification </button> </div> </div> </div> </div></div></form><div class="clear"></div>';
            objTo.appendChild(divqualification)
            $('input').css('border','1px solid #ced4da');
            $(hitThis).find('.minus').removeClass('hide');
            $(hitThis).find('.minus').addClass('show');
            
            $(hitThis).find('select').hide();
            $(hitThis).find('input').hide();
            $(hitThis).hide();
            // $(hitThis).find('select').attr("disabled", true);
            // $(hitThis).find('input').attr('readonly','readonly');
            
            $('#appendQual').html('');
            $('#appendQual').append('<table class="mb-0 table"> <thead> <tr> <th>#</th> <th>Qualification Grade</th> <th>From</th> <th>To</th><th>Total</th> <th>Action</th> </tr> </thead> <tbody class="appendQual"> </tbody> </table>');
            $('.appendQual').html('');
            $('#QualificationDocAppend').html('');
            var length = result.allqualification.length;
            $.each(result.allqualification, function(key,value) {
              console.log('value');
              console.log(value);
              var idS = key+1;
              $('.appendQual').append('<tr class="removeQualificationEditclass'+value.id+'"> <th scope="row">'+idS+'</th> <td >"'+value.qualification.qualification_grade+'""</td><td>'+value.from+'</td> <td>'+value.to+'</td> <td>'+value.totals.name+'( '+value.totals.type+')</td> <td><button class="btn btn-danger minus" data-id type="button"  onclick="remove_qualification_Edit_fields('+value.id+');"> <i class="fa fa-minus" aria-hidden="true"></i> </button></td> </tr>');
          
              var key = qualification-1;
            $('#QualificationDocAppend').append('<form method="POST" enctype="multipart/form-data" class="documentUpload"><div class="form-group row removeQualificationclass'+value.id+'"> <label for="input-id" class="col-sm-2">Upload Student "'+value.qualification.qualification_grade+'" Documents<span class="text-danger">*</span> </label> <div class="col-sm-4">  <label class="btn btn-info"> <i class="fa fa-upload"></i> <input type="file" name="qualificationDocument['+value.qualification.qualification_grade+']" class="mb-2 hide form-control imgInpDoc" accept="application/pdf" > </label> <div class="error"></div></div> <div class="col-sm-6"> <input type="hidden" name="qualificationDocumentId['+value.qualification.qualification_grade+']" value="'+value.id+'"><i class="fa fa-check btn btn-success displayNone " aria-hidden="true"></i> </div> </div></form>');  
            }); 
          $(document).ready(function() {
            $(".datepicker" ).datepicker({
              dateFormat: "dd-mm-yy",
              changeMonth: true,
              changeYear: true,
              yearRange: "-70:+20"
          
            });
          } );
            // var Qtype = $('#qualification_id').children("option:selected").text();
            // alert(Qtype);
            // if(Qtype = 'Masters'){
            //   $('.bechShow').show();
            //   $('.masterShow').show();
            // }
            // if(Qtype = 'Masters'){
            //   $('.bechShow').show();
            // }
            
            
            doc_upload();
            $(document).on('change','.imgInpDoc',function(){

              $(this).parents('.form-group').find('.btn-success').show();
            });
                  }else{

                      alert('All Fields are required');
                  }
                },
                error: function(xhr) {
                  $body.removeClass("loading");
                  $('.qualificatioinAddMore').hide();
                  $('#validation-errors').html('');
                  $.each(xhr.responseJSON.errors, function(key,value) {
                    $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div');
                    $(hitThis).find('input[name='+key+']').css('border','2px solid red');
                    $(hitThis).parents('.form-group').find('.btn-success').css('background','red');
                    $(hitThis).parents('.form-group').find('.btn-success').addClass('red');
                   
                }); 
               },
            });
            
});
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
function remove_qualification_fields(qid) {
console.log(qid);

  var id = $('.RstudentQualification'+qid).val();
  $.ajax({    //create an ajax request 
    type: "GET",
    url: "/agent/student/deleteQualification/"+id,
    success: function(response){  
                        
        $('.removeQualificationclass'+qid).hide();
        $('.removeQualificationclass'+qid).remove();
      }
      
    });
  }
  function remove_qualification_Edit_fields(Eqid) {
  
    
    var id = Eqid;
    $.ajax({    //create an ajax request 
      type: "GET",
      url: "/agent/student/deleteQualification/"+id,
      success: function(response){  
        
        $('.removeQualificationEditclass'+Eqid).hide();
        $('.removeQualificationclass'+Eqid).hide();
    }

});
}
 


$(document).ready(function() {
  $('#example').DataTable();
});

$(document).on('click','#gapYes',function(){
    $(this).addClass('hasClass');
    $(this).parents('.questionParent').find('.gapYes').removeClass('displayNone');
});
$(document).on('click','#gapNo',function(){
    $(this).removeClass('hasClass');
    $(this).parents('.questionParent').find('.gapYes').addClass('displayNone');
});
$(document).on('click','.Qyes',function(){
    $(this).addClass('hasClass');
    $(this).parents('.questionParent').find('.Qyess').removeClass('displayNone');
});
$(document).on('click','.QNo',function(){
    $(this).removeClass('hasClass');
    $(this).parents('.questionParent').find('.Qyess').addClass('displayNone');
});


// gap temp
var gap = 1;
$(document).on('submit','.gap_fields',function(e) {
// function gap_fields() {
 
  
  e.preventDefault();
 var hitThis = $(this);
 var formData = $('.gap_fields').serialize();
 $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

  $.ajax(
    {
        type:'post',
        url:'/agent/student/studentQualificationGap',
        data:formData,
        
        success:function(result)
        {
          console.log(result);
          if(result.status == 'true'){
            $(hitThis).find('.RstudentQualificationGap'+gap).val(result.studentQualificationGap);
            gap++;
            $(hitThis).find('.btn-success').addClass('hide');
            $('.gap_fields').removeClass('gap_fields');
            var objTo = document.getElementById('gap_fields')
            var divgap = document.createElement("div");
            divgap.setAttribute("class", "form-group removeGapclass"+gap);
            var rdiv = 'removeGapclass'+gap;
            divgap.innerHTML = '<form class="gap gap_fields" method="POST"><div class="row pad-border gapYes"> <div class="col-sm-3 nopadding"> <div class="form-group"> <label>From Date</label> <input type="text" class="datepicker form-control"  name="gapFromDate" value="" placeholder="From Date" readonly> </div> </div> <div class="col-sm-3 nopadding"> <div class="form-group"><label>To Date</label>  <input type="text" class="datepicker form-control"  name="gapToDate" value="" placeholder="To Date" readonly></div> </div> <div class="col-sm-3 nopadding"> <div class="form-group"><label>Detail</label> <div class="input-group">  <input type="text" class="form-control" id="gapOrganization" name="gapOrganization" value="" placeholder="detail"><div class="input-group-btn"><input type="hidden" class="RstudentQualificationGap'+gap+'"> <button class="btn btn-danger hide minus" type="button" onclick="remove_gap_fields('+ gap +');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="col-sm-3 nopadding"> <div class="form-group"><label>&nbsp;</label> <div class="input-group"> <div class="input-group-btn text-center width-100"> <button class="btn btn-success btn btn-info" type="submit"  >  Save Academic Gap </button> </div> </div> </div> </div></form></div><div class="clear"></div>';
            objTo.appendChild(divgap)
            $('input').css('border','1px solid #ced4da');
            $(hitThis).find('.minus').removeClass('hide');
            $(hitThis).find('.minus').addClass('show');
            
            $(hitThis).find('select').attr("disabled", true);
            $(hitThis).find('input').attr('readonly','readonly');
            $('#validation-errors').html('');
            var gaps = gap-1;
            $('#AcademicGapDocAppend').append('<form method="POST" enctype="multipart/form-data" class="documentUpload"><div class="form-group row removeGapclass'+gaps+'"> <label for="input-id" class="col-sm-2">Documents Of '+result.gapOrganization+' Gap<span class="text-danger">*</span> </label> <div class="col-sm-4">  <label class="btn btn-info"> <i class="fa fa-upload"></i> <input type="file" name="Gap['+result.studentQualificationGap+']" class="mb-2 hide form-control imgInpDoc" accept="application/pdf" > </label><div class="error"></div> </div> <div class="col-sm-6"> <input type="hidden" name="GapId['+result.studentQualificationGap+']" value="'+result.studentQualificationGap+'"><i class="fa fa-check btn btn-success displayNone " aria-hidden="true" ></i> </div> </div></form>');
            doc_upload();
            $(document).on('change','.imgInpDoc',function(){

              $(this).parents('.form-group').find('.btn-success').show();
            });
            
          }else{

              alert('All Fields are required');
          }
          $(document).ready(function() {
            $(".datepicker" ).datepicker({
              dateFormat: "dd-mm-yy",
              changeMonth: true,
              changeYear: true,
              yearRange: "-70:+20"
          
            });
          } );
      },
      error: function(xhr) {
          
        $('#validation-errors').html('');
        $.each(xhr.responseJSON.errors, function(key,value) {
          $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div');
          $(hitThis).find('input[name='+key+']').css('border','2px solid red');
      }); 
      }
  });




    
});
function remove_gap_fields(gid) {
  var id = $('.RstudentQualificationGap'+gid).val();
  
  $.ajax({    //create an ajax request 
    type: "GET",
    url: "/agent/student/deleteQualificationGap/"+id,
    success: function(response){  
                        
      $('.removeGapclass'+gid).hide();
    }

});
} 
function remove_Edit_gap_fields(gid) {
  var id = gid;
  
  $.ajax({    //create an ajax request 
    type: "GET",
    url: "/agent/student/deleteQualificationGap/"+id,
    success: function(response){  
                        
      $('.removeEditGapclass'+gid).hide();
    }

});
} 

$(document).on('change','.onChangeTest',function(){
    var text = $(this).children("option:selected").text();
    console.log(text);
    if(text == 'PTE'){
      $(this).parents('form').find('.nopadding').hide();
      $(this).parents('form').find('.showtest').show();
      $('.PTEScore').show();
      $('.PTEScore').find('.PTEScoreSelect').attr('name','overall');
    }else{
      $('.PTEScore').find('.PTEScoreSelect').removeAttr('name','overall');
      $('.PTEScore').hide();
      $(this).parents('form').find('.nopadding').show();

    }
});

$(document).on('submit','.QuestionsSave',function(e){

e.preventDefault();
var hitThis = $(this);
// function qualification_fields() {
  // console.log('.qualification_fieldsData'+qualification+'');
  
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  // var studentId = $('#studentId').val();
  
  var formData = $('.QuestionsSave').serialize();
  console.log(formData);
  qualification = qualification+1;
  // var data = $("input[type=hidden][name=_token]").val();
  // console.log(data);
  // console.log(data._token);
  $.ajax(
    {
      type:'post',
      url:'/agent/student/studentQuestionsSave',
      data:formData,
      
      success:function(result)
      {
        // $('.QuestionsSaveBtn').text('Change');
        $('.QuestionsSaveBtnmsg').append('<p  class="text-success QuestionHide">Answers Saved</p>');
        setTimeout(function(){
           $('.QuestionHide').hide();
           }, 3000);
        
          if(result.status == 'true'){
            }else{

                alert('All Fields are required');
            }
      },error: function (reject) {
          alert('All Fields are required');
        //   if(reject.status == false){

        //  }
      }
  });
  


  
});
$(document).on('change','.dateStartChange',function(){
  var startDate = $(this).val();

  var dt = new Date($(this).val());
console.log(dt);
  var day = dt.getDay();
  var year = dt.getFullYear() +2;
  var month = dt.getMonth();
  $(this).parents('form').find('.dateExpireChange').val(day+'/'+month+'/'+year);
});
  



$(".imgInpDoc").change(function() {

    $(this).parents('.form-group').find('.blahSize').show();
  var input = this;
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    console.log(reader);
      reader.onload = function(e) {
        $(input).parents('.form-group').find('.blah').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
  }
});

$(document).on('change','.imgInpDoc',function(){

  $(this).parents('.form-group').find('.btn-success').show();
});

$(document).on('click','.delete', function (e) {
  e.preventDefault();
  e.stopPropagation();
  // $('form').submit(false);
  // var id = $(this).data('id');
  var id = $(this).siblings('.deleteID').val();
  swal({
    title: "Are you sure?",
    text: "You want to delete !",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    closeOnConfirm: false,
    closeOnCancel: false
      },function(isConfirm) {
       
        if (isConfirm == true) {
          swal("Deleted!", "Your imaginary file has been deleted.", "success");
          $('#delete-form-'+id).submit();
          $('#delete-form-'+id).click();
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
});

$(document).on('click','.pendancyReject',function(){
  $(this).parents('.pendancyP').find('.pendancyC').show();
});

$(document).ready(function() {
  $(".datepicker" ).datepicker({
    dateFormat: "dd-mm-yy",
    changeMonth: true,
    changeYear: true,
    yearRange: "-70:+20"

  });
} );
$(document).ready(function() {
  $(".datepickers" ).datepicker({
    dateFormat: "dd-mm-yy",
    changeMonth: true,
    changeYear: true,
    yearRange: "-70:+20"

  });
} );
$(document).on('click','.checkprivacy',function(){
  $(this).removeClass('checkprivacy');
  $(this).addClass('removeCheckprivacy');
  $('#checkprivacy').removeAttr('disabled');
});
$(document).on('click','.removeCheckprivacy',function(){
  $(this).removeClass('removeCheckprivacy');
  $(this).addClass('checkprivacy');
  $('#checkprivacy').attr('disabled', 'disabled');
});
$(document).on('click','.toggleFilter',function(){
    $('.toggleFilterOpen').toggle('slow');
});
$(document).on('click','.qualificatioinAddMore',function(){
    $('#qualification_fields').toggle('slow');
});
$(document).on('click','.qualificatioinWithoutJSAddMore',function(){
    $('#qualification_fieldsAddMore').toggle('slow');
});
$(document).on('click','.englishAddMore',function(){
    $('#test_fields').toggle('slow');
});
$(document).on('click','.englishAfterAddMore',function(){
    $('#test_AfterSavefields').toggle('slow');
});
$(document).on('click','#timeline-1',function(){
    $('.timeline-1').toggle('slow');
});
$(document).on('click','.outerLondon',function(){
    $('.total').html('');
    $('.errorFee').html('');
    var outstandingFees = $('.outstandingFees').val();
    console.log(outstandingFees);
    if(outstandingFees){
      $('.outstandingFees').prop("disabled", true);
      $('#innerLondon').hide('slow');
      $('#outerLondon').show('slow');
      var ukbas = $('.ukbas').val();
      var conversions = $('.conversions').val();
      var total = parseInt(ukbas) + parseInt(conversions) + parseInt(outstandingFees);
      $('.total').html();
      $('.total').html(total);
    }else{
      $('.errorFee').append('<p class="text-danger">Input field required.</p>');
      $(".outerLondon").prop("checked", false);
    }
  });
  $(document).on('click','.innerLondon',function(){
    $('.total').html('');
    $('.errorFee').html('');
    var outstandingFees = $('.outstandingFees').val();
  if(outstandingFees){
    $('.outstandingFees').prop("disabled", true);
      $('#outerLondon').hide('slow');
        $('#innerLondon').show('slow');
    var ukbas = $('.ukba').val();
    var conversions = $('.conversion').val();
    var total = parseInt(ukbas) + parseInt(conversions) + parseInt(outstandingFees);
    $('.total').html();
    $('.total').html(total);
  }else{
    $('.errorFee').append('<p class="text-danger">Input field required.</p>');
    $(".innerLondon").prop("checked", false);
  }
});
$(document).on('click','.calculaterRefresh',function(){
  $('.total').html('');
  $('.outstandingFees').val('');
  $('.outstandingFees').prop("disabled", false);
  $('#outerLondon').hide('slow');
  $('#innerLondon').hide('slow');
  $(".innerLondon").prop("checked", false);
  $(".outerLondon").prop("checked", false);
});
$(document).ready(function(){
  setTimeout(function(){ 
  $(".quote_div" ).find('#quote').val('GBP');
}, 3000);
});


$(document).on('change','.getImgName',function(){
  var getImgNames = $('.getImgName').val();
  
  $('#appendImgName').html('');
  $('#appendImgName').append('<p class="text-success">'+getImgNames+'</p>');
});






  