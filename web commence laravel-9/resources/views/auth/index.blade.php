@extends('layout.index')

@section('title', 'LOGIN')

@section('content')
<div class="login">

    <h1 class="text-center">Hello Again!</h1>
    
    <form class="needs-validation" method="POST"  action="#">
        @csrf
        <div class="form-group was-validated">
            <label class="form-label" for="email">Email address</label>
            <input class="form-control" type="email" id="email" required>
            <div class="invalid-feedback">
                Please enter your email address
            </div>
        </div>
        <div class="form-group was-validated">
            <label class="form-label" for="password">Password</label>
            <input class="form-control" type="password" id="password" required>
            <div class="invalid-feedback">
                Please enter your password
            </div>
        </div>
        <div class="form-group form-check">
            <input class="form-check-input" type="checkbox" id="check">
            <label class="form-check-label" for="check">Remember me</label>
        </div>
        <input class="btn btn-success w-100" type="submit" value="SIGN IN">
        <A href="#" class="btn btn-success w- mt-3 form-control fw-bold">SIGN UP</A>
    </form>

</div>
@endsection