@extends('layouts.app')
@section('content')
<div class="container">
        <div class="page-header-content">
            <h1 class="title">Account Login</h1>
            <h4 class="sub-title">
                <span class="home">
                    <a href="{{ url('/') }}">
                    </a>
                </span>
            </h4>
        </div>
    </div>
    <div class="login-wrap text-center">
        <h3 class="title">Login Into Your Account</h3>
        <form action="{{ route('login') }}" method="POST" class="login-form text-start">
            @csrf
            <div class="form-item">
                <h4 class="form-header">Email Address*</h4>
                <input type="text" id="email" name="email" class="form-control" placeholder="">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-item">
                <h4 class="form-header">Password*</h4>
                <input type="password" id="text-2" name="password" class="form-control" placeholder="">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-item">
                <div class="checkbox-wrap">
                    <input type="checkbox" id="term" name="term">
                    <label for="term"> Remember me</label><br>
                </div>
            </div>
            <div class="submit-btn">
                <button class="rr-primary-btn" type="submit">Sign in</button>
            </div>
            <div class="login-btn-wrap">
                <a href="#" class="forgot">Already have an account?</a>
                <a class="log-in" href="{{ route('login') }}">Log in</a>
            </div>
        </form>
    </div>
@endsection