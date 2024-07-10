@extends('master')
@section('content')


<div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <form action="{{ route('do.login') }}" method="POST" name="myForm" onsubmit="return validateForm()">
            @csrf
              @if ($message = Session::get('success'))
              <div class="alert alert-secondary">
                <p>{{ $message }}</p>
              </div>
              @endif
              <h1 class="row justify-content-center align-items-center h-100">LOGIN</h1>
                <div class="form-group">
                    <input  class="form-control form-control-lg" name="email" placeholder="User email" type="text">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="password" placeholder="Password" type="password">
                </div>
                
                    <button type="submit" class="btn btn-primary">Sign In</button>
                    <a href="{{ route('register') }}" class="btn btn-info">Register New</a>
                
            </form>
        </div>
    </div>
</div>




<script>
function validateForm() {
  let x = document.forms["myForm"]["email"].value;
  let y = document.forms["myForm"]["password"].value;
  if(x === "" || !x.includes("@") || !x.includes(".")){
    alert("Please enter a valid Email");
    return false;
  }
  else if (y == "") {
    alert("Password must be filled out");
    return false;
  }
}
</script>
@endsection