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



            <div class="alert alert-warning alert-dismissible">
                <h5><i class="icon fas fa-exclamation-triangle"></i> Warning!</h5>
                {{ $msg }}
            </div>

            <a class="btn float-right" href="{{ route('logout') }}" role="button" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <span class="mr-2">Logout</span>
                <i class="fas fa-sign-out-alt"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
