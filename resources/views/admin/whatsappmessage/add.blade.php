@extends('admin.layouts.admin') 
@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">Agents Booster</div>
                <div class="card-body">
                    @include('multiauth::message')
                    <form >
                    @csrf
                   
                    <div class="form-group row">
                        <label for="input-id" class="col-sm-2">Message<span class="text-danger">*</span></label>
                    </div>
                        <div class="form-group">
                             <textarea  class=" form-control" id="message" name="name" cols="50" style="height: 180px!important;" ></textarea>
                        </div>
                         <div class="form-group">
                             <input type="hidden"  class=" form-control" id="start" name="start" value="5" placeholder="start limit">
                        </div>

                    
                        <button type="button" class="btn btn-info btn-sm" id="send">Save</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('addjavascript')
<script>
    $(document).ready(function(){
        $(document).on('click','#send',function(){
            var message = $('#message').val();      
            var start = $('#start').val();
            $('#send').after('<p id="msgloading">Please do not refresh this page. Loading....</p>');
            $('#send').hide();
            var refreshIntervalId  = setInterval(function(){
                                    $.ajax(
                                    {   
                                        type:'get',
                                        url:'/admin/store/whats-app/message/'+message+'/'+start,
                                        success:function(result)
                                        {
                                            $('#start').val(result.lastid);
                                            start = result.lastid;
                                            if(result.totalCount == result.lastid){
                                            alert('clear');
                                            $('#msgloading').html('');
                                            $('#msgsuccess').html('');
                                            $('#msgloading').after('<p id="msgsuccess" class="text-success">Sent Successfully</p>');
                                            $('#message').val('');
                                            $('#start').val('0');
                                            $('#send').show();
                                                clearInterval(refreshIntervalId);
                                            }
                                        }
                                    });
                                },  2000 * 60 * 0.2);
            
                    });
                });
   
</script>
@endsection