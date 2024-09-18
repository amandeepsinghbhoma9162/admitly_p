@extends('admin.layouts.admin') 
 @section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit details of {{$admin->name}}</div>

                <div class="card-body">
                    @include('multiauth::message')
                    <form action="{{route('admin.update',[$admin->id])}}" method="post">
                        @csrf @method('patch')
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Name</label>
                            <input type="text" value="{{ $admin->name }}" name="name" class="form-control col-md-6" id="role">
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Email</label>
                            <input type="text" value="{{ $admin->email }}" name="email" class="form-control col-md-6" id="role">
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Phone</label>
                            <input type="number" value="{{ $admin->mobile }}" name="mobile" class="form-control col-md-6" id="role">
                        </div>
                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">Assign Role</label>

                            <select name="role_id[]" id="role_id" class="form-control col-md-6 {{ $errors->has('role_id') ? ' is-invalid' : '' }}" multiple>
                                <option selected disabled>Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" 
                                        @if (in_array($role->id,$admin->roles->pluck('id')->toArray())) 
                                            selected 
                                        @endif >{{ $role->name }}
                                    </option>
                                @endforeach
                            </select> 

                            @if ($errors->has('role_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('role_id') }}</strong>
                                </span> 
                            @endif
                        </div>
                            <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">Assign Country</label>

                            <div class="col-md-6">
                                <select name="country" id="country" class="form-control">
                                    <option selected disabled>Select Country</option>
                                        <option value="38" {{ $admin->country == '38' ? 'selected':'' }}>Canada</option>
                                        <option value="13" {{ $admin->country == '13' ? 'selected':'' }}>AUS</option>
                                        <option value="157" {{ $admin->country == '157' ? 'selected':'' }}>NZ</option>
                                        <option value="230" {{ $admin->country == '230' ? 'selected':'' }}>UK</option>
                                        <option value="231" {{ $admin->country == '231' ? 'selected':'' }}>USA</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="active" class="col-md-4 col-form-label text-md-right">Active</label>
                            <input type="checkbox" value="1" {{ $admin->active ? 'checked':'' }} name="activation" class="form-control col-md-6" id="active">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-sm btn-info">
                                    Change
                                </button>
                                <a href="{{ route('admin.show') }}" class="btn btn-danger btn-sm float-right">Back</a>
                            </div>
                        </div>
                    </form>
                </div>                <div class="card-body">
                    <form method="post" action="{{route('admin.password.password',[$admin->id])}}" aria-label="{{ __('Admin Change Password') }}">
                        @csrf @method('patch')

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    required> @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-sm btn-info">
                                    Change password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
