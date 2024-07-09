@extends('master')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="container-fluid h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <form action="{{ route('reg.user') }}" method="POST" name="myForm" onsubmit="return validateForm()">
                @csrf
                @if(session()->has('message'))
                  <p class="danger" style="color:green">{{ session()->get('message') }}</p>
                @endif
                <h1 class="row justify-content-center align-items-center h-100">REGISTER</h1>
                <div class="form-group">
                  <div class="mb-col-sm-4 col-sm-offset-6">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
  
                 <button type="submit" class="btn btn-primary">Register</button>

                 <a href="{{ route('login') }}" class="btn btn-danger">Back</a>
                </form>
            </div>
          </div>
        </div>

<script>
function validateForm() {
  let x = document.forms["myForm"]["email"].value;
  let y = document.forms["myForm"]["password"].value;
  let z = document.forms["myForm"]["name"].value;
  if (z == "") {
    alert("Username must be filled out");
    return false;
  }
  else if(x === "" || !x.includes("@") || !x.includes(".")){
    alert("Please enter a valid Email");
    return false;
  }
  else if (y == "") {
    alert("Password must be filled out");
    return false;
  }
  else if (y.length < 6) {
    alert("Password must be more than 6 characters");
    return false;
  }
}
</script>
@endsection