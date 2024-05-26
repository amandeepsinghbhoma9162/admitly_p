@extends('admin.layouts.admin') 
@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Media &nbsp;
                    <span class="float-right">
                        <a href="{{route('media.create')}}" class="btn btn-sm btn-success">Add New</a>
                    </span>
                </div>
                <div class="card-body">
                       @include('multiauth::message')
                    <table data-order='[[ 0, "desc" ]]' class="align-middle text-truncate mb-0 table table-borderless table-hover tableID cell-border" >
                    <thead>
                        <tr>
                            
                            <th class="text-center">Title</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">File</th>
                            <th class="text-center">Country</th>
                            
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
       
                    @foreach ($medias as $media)
                        <tr>
                            <td class="text-center" >
                                <div class=" num_1">{{ $media->title }}</div>
                            </td>
                            <td class="text-center">
                            <div class=""> 
                                @if($media->type == '1')
                            Image
                                @else
                            Prospectus
                                @endif</div>
                            </td>
                            <td class="text-center capitalize">
                                <span class="float-left stdImg">
                                @if($media->path)
                                    <img class="" src="{{asset($media->path)}}" width="40"  >
                                @else
                                    <img class="" src="{{asset('images/site/user-img.png')}}" width="40" alt="your image" />

                                @endif
                                </span>
                                
                            </td>
                            <td class="text-center">
                                <div class=""> 
                                    @if($media->country_id == '230')
                                UK
                                    @elseif($media->country_id == '38')
                                Canada
                                    @endif</div>
                                </td>
                          
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-secondary mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $media->id }}').submit();">Delete</a>
                                <form id="delete-form-{{ $media->id }}" action="{{ route('media.destroy',[$media->id]) }}" method="POST" style="display: none;">
                                    @csrf @method('delete')
                                </form>

                                <a href="{{route('media.edit',base64_encode($media->id))}}" class="btn btn-sm btn-info mr-3">Edit</a>
                            </td>
                           
                            
                        </tr>
                        
                        @endforeach 
                        
                    </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection