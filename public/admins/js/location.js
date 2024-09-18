

$(document).on('change','#country_id',function(){
    var selectedCountry = $(this).children("option:selected").val();
    console.log(selectedCountry);
    if(!selectedCountry){
        $("#state_id").html('');
        $("#state_id").append("<option value='' > Select state </option>");
        $("#city_id").html('');
        $("#city_id").append("<option value='' > Select state </option>");
    }
    
$.ajax({
    url : "/admin/getState/"+selectedCountry,
    type:'GET',
    dataType: 'json',
    success: function(response) {
        $("#state_id").html('');
        $("#state_id").append("<option value='' > Select state </option>");
        
        if(response.length > 0){

            $.each(response,function(key, value)
            {
                console.log(key);
                $("#state_id").append('<option value=' + value.id + '>' + value.name + '</option>');
            });
        }else{
            $("#state_id").append('<option value="">State Not Available</option>');

        }
     }
});

// admin
    $.ajax({    //create an ajax request 
        type: "GET",
        url: "/admin/colleges/getAllUniversity/"+selectedCountry,
        success: function(response){                    
            $("#universityId").html(''); 
            $("#universityId").append("<option value='' > Select University </option>");
            $.each(response, function(index, item) {
                $("#universityId").append(new Option(item.name, item.id)); 
            // alert(response);
            });

            //   list.append(new Option(item.text, item.value));
        }

    });

});

// city id

$(document).on('change','#state_id',function(){
    var selectedState = $(this).children("option:selected").val();
    console.log(selectedState);
    if(!selectedState){
        $("#city_id").html('');
        $("#city_id").append("<option value='' > Select state </option>");
    }
$.ajax({
    url : "/admin/getCity/"+selectedState,
    type:'GET',
    dataType: 'json',
    success: function(response) {
        $("#city_id").html('');
        $("#city_id").append('<option value="" >Select city</option>');
       
        if(response.length > 0){

            $.each(response,function(key, value)
            {
                console.log(key);
                $("#city_id").append('<option value=' + value.id + '>' + value.name + '</option>');
            });
        }else{
            $("#city_id").append('<option value="">City Not Available</option>');

        }
     }
});

});
$(document).on('change','#getQualification_id',function(){
    var selectedQualification = $(this).children("option:selected").val();
    console.log(selectedQualification);
    if(!selectedQualification){
        $("#getSubject_id").html('');
        $("#getSubject_id").append("<option value='' > Select state </option>");
    }
$.ajax({
    url : "/admin/getSubject/"+selectedQualification,
    type:'GET',
    dataType: 'json',
    success: function(response) {
        $("#getSubject_id").html('');
        console.log('response');
        console.log(response);
        console.log(response.length);
        if(response.length > 0){

            $.each(response,function(key, value)
            {
                console.log(key);
                $("#getSubject_id").append('<option value=' + value.id + '>' + value.name + '</option>');
            });
        }else{
            $("#getSubject_id").append('<option value="">Subject Not Available</option>');

        }
     }
});

});


// get by class 

$(document).on('change','.getCountryId',function(){
    var selectedCountry = $(this).children("option:selected").val();
    var thisHit = $(this);
    if(!selectedCountry){
console.log(id);
        $("#city_id").html('');
        $("#city_id").append("<option value='' > Select state </option>");
    }
    
$.ajax({
    url : "/admin/getState/"+selectedCountry,
    type:'GET',
    dataType: 'json',
    success: function(response) {
        $(thisHit).parents('.qualificationParent').find('.getStateId').html('');
        $(thisHit).parents('.qualificationParent').find('.getStateId').append("<option value='' > Select state </option>");
        
        if(response.length > 0){

            $.each(response,function(key, value)
            {
                console.log(key);
                $(thisHit).parents('.qualificationParent').find('.getStateId').append('<option value=' + value.id + '>' + value.name + '</option>');
            });
        }else{
            $(thisHit).parents('.qualificationParent').find('.getStateId').append('<option value="">State Not Available</option>');

        }
     }
});

});

$(document).on('change','.getStateId',function(){
    var selectedState = $(this).children("option:selected").val();
    console.log(selectedState);
    var thisCityHit = $(this);
    if(!selectedState){
        $(".getCityId").html('');
        $(".getCityId").append("<option value='' > Select state </option>");
    }
    $.ajax({
        url : "/admin/getCity/"+selectedState,
        type:'GET',
        dataType: 'json',
        success: function(response) {
            $(thisCityHit).parents('.qualificationParent').find(".getCityId").html('');
            $(thisCityHit).parents('.qualificationParent').find(".getCityId").append('<option value="" >Select city</option>');
        
            if(response.length > 0){
                $.each(response,function(key, value)
                {
                    console.log(key);
                    $(thisCityHit).parents('.qualificationParent').find(".getCityId").append('<option value=' + value.id + '>' + value.name + '</option>');
                });
            }else{
                $(thisCityHit).parents('.qualificationParent').find(".getCityId").append('<option value="">City Not Available</option>');

            }
        }
    });

});



$(document).on('click','#change_loc',function(){
    $('#change_loc_old').find('#cntryId').removeAttr('name');
    $('#change_loc_old').find('#sId').removeAttr('name');
    $('#change_loc_old').find('#cId').removeAttr('name');
    $('#select_change_loc').find('#country_id').attr('name','country_id');
    $('#select_change_loc').find('#state_id').attr('name','state_id');
    $('#select_change_loc').find('#city_id').attr('name','city_id');
    $('#change_loc_old').hide('slow');
    $('#select_change_loc').show('slow');
});
$(document).on('click','#prev_change_loc',function(){
    $('#select_change_loc').find('#country_id').removeAttr('name');
    $('#select_change_loc').find('#state_id').removeAttr('name');
    $('#select_change_loc').find('#city_id').removeAttr('name');
    $('#change_loc_old').find('#cntryId').attr('name','city_id');
    $('#change_loc_old').find('#sId').attr('name','state_id');
    $('#change_loc_old').find('#cId').attr('name','country_id');
    $('#change_loc_old').show('slow');
    $('#select_change_loc').hide('slow');
});