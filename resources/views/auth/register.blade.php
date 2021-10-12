@extends('layouts.app')

@section('content')




<div class="">
    <!-- /.login-logo -->
    <div class="card card-outline card-pink">
        <div class="card-header text-center">
            <a href="{{ url('/') }}" class="h1"><img src="{{ asset('assets/images/logoname.jpg') }}" alt="DRI Logo"
                    style="height: 60px;" class=""></a>
        </div>
        <div class="card-body">
            {{-- <p class="login-box-msg">Sign in to start your session</p> --}}

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="reqfield" for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old("name") }}">
                            <span class="error">{{ $errors->first('name') }}</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="reqfield" for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ old("email") }}">
                            <span class="error">{{ $errors->first('email') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    



                </div>
                
                <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                            <label class="reqfield" for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ old("phone") }}" maxlength="15">
                            <span class="error">{{ $errors->first('phone') }}</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="reqfield" for="Password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="{{ old("password") }}">
                            <span class="error">{{ $errors->first('password') }}</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="reqfield" for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="{{ old("password_confirmation") }}">
                            <span class="error">{{ $errors->first('password_confirmation') }}</span>password
                        </div>
                    </div>
                </div>

                <p class="my-4">
                    <button type="submit" class="btn btn-block btn-info">Register as new blogger</button>
                </p>

            </form>
            <p class="mb-0">
                @if (Route::has('login'))
                <a class="" href="{{ route('login') }}">
                    {{ __('Back to login') }}
                </a>
                @endif
            </p>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
@endsection

