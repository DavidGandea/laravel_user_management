@extends('layouts.app')
@section('content')
<center>
<h3>Create user</h3>
<br>
<form class="form-horizontal" role="form" method="POST" action="{{ route('utilizators.store') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
        <label for="firstname" class="col-md-4 control-label">First Name</label>

        <div class="col-md-6">
            <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required>

            @if ($errors->has('firstname'))
                <span class="help-block">
                    <strong>{{ $errors->first('firstname') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
        <label for="lastname" class="col-md-4 control-label">Last Name</label>

        <div class="col-md-6">
            <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required>

            @if ($errors->has('lastname'))
                <span class="help-block">
                    <strong>{{ $errors->first('lastname') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Password</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    
    <div class="form-group">
        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div>
    <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
        <label for="date_of_birth" class="col-md-4 control-label">Date of birth</label>

        <div class="col-md-6">
            {{-- <input id="date_of_birth" type="text" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
             --}}
            <input type="date" name="date_of_birth">
            @if ($errors->has('date_of_birth'))
                <span class="help-block">
                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
        <label for="gender" class="col-md-4 control-label">Gender</label>

        <div class="col-md-6">
            {{-- <input id="gender" type="text" class="form-control" name="gender" value="{{ old('gender') }}" required>
             --}}
             <select name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            @if ($errors->has('gender'))
                <span class="help-block">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
            @endif
        </div>
    </div>
    
    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
        <label for="type" class="col-md-4 control-label">Type</label>

        <div class="col-md-6">
            {{-- <input id="type" type="text" class="form-control" name="type" value="{{ old('type') }}" required>
             --}}
            <select name="type">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            @if ($errors->has('type'))
                <span class="help-block">
                    <strong>{{ $errors->first('type') }}</strong>
                </span>
            @endif
        </div> 
        
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Create
            </button>
        </div>
    </div>
</form>
</center>
@endsection