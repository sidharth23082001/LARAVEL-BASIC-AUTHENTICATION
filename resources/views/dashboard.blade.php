@extends('master')
@section('content')



<nav class="navbar navbar-light bg-dark">
  <div class="container-fluid" style="height: 100px;">
    <h1 style="color:white">DASHBOARD</h1>
  </div>
</nav>
<div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-2" id="blue">
                <h4>Sidebar</h4>
               
                <a style="color:white"href="{{ route('logout') }}">Logout</a>
                <br/>
            </div>
            
            <div class="col-10" style="text-align: justify;">
                <h1>WELCOME {{ auth()->user()->name }}</h1>
            </div>
        </div>
    </div>


@endsection