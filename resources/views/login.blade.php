@extends('master')
@section('content')
<div class="container"  style="height: 500px;">
    <div class="row mt-4">
        <div class="col-md-4 border mx-auto">
            @if(session()->has('success'))
            <div class="alert alert-danger alert-dismissible" style="height: 50px;">
                {{ Session::get('success') }}
            </div>
            @endif
            <h3 class="mt-4">Login</h3>
            <form action="login" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                  <label for="email" class="form-label">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="mb-3">
                  <label for="pwd" class="form-label">Password:</label>
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password:</label>
                    <input type="password" class="form-control" id="password_confirmation" placeholder="Enter confirm password" onChange="onChange()" name="password_confirmation">
                    <span class="text-danger"> @error('password_confirmation'){{($message)}}@enderror </span>
                </div>
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="" class="">Reset Password ?</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark mb-4 w-100">Login</button>
                <p class="mb-4">Dont have an account yet? <a href="login">Sign up</a></p>
            </form>
        </div>
    </div>    
</div>
@endsection