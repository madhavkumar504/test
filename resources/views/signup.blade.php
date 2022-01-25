@extends('master')
@section('content')
    <div class="container mt-4" style="height: 500px;">
        <div class="row">
            <div class="col-md-4 mx-auto border">
                <h3 class="mt-4">Welcome Back</h3>
                <form action="signup" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 mt-3">
                                <label for="firstname" class="form-label">First Name:</label>
                                <input type="firstname" class="form-control" id="firstname" placeholder="First Name" name="firstname">
                                <span class="text-danger"> @error('firstname'){{$message}}@enderror </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mt-3">
                                <label for="lastname" class="form-label">Last Name:</label>
                                <input type="lastname" class="form-control" id="lastname" placeholder="Last Name" name="lastname">
                                <span class="text-danger"> @error('lastname'){{($message)}}@enderror </span>
                            </div>
                        </div>
                    </div>                 
                   
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        <span class="text-danger"> @error('email'){{($message)}}@enderror </span>  
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" onChange="onChange()" name="password">
                        <span class="text-danger"> @error('password'){{($message)}}@enderror </span>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="password_confirmation" placeholder="Enter confirm password" onChange="onChange()" name="password_confirmation">
                        <span class="text-danger"> @error('password_confirmation'){{($message)}}@enderror </span>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 mb-1">Create Account</button>
                    <p class="mb-4">Already have an account ?<a href="login">Log In</a></p>
                </form>
            </div>
        </div>
    </div>
@endsection