@extends('layouts.app')
@section('content')    <section class="login footer-padding">
    <div class="container">
        <div class="login-section">
            <div class="review-form">
                <h5 class="comment-title">Log In</h5>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="review-inner-form">
                        <div class="review-form-name">
                            <label for="email" class="form-label">Email Address**</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                            <!-- Display error message for email -->
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="review-form-name">
                            <label for="password" class="form-label">Password*</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            <!-- Display error message for password -->
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="review-form-name checkbox">
                            <div class="checkbox-item">
                                <input type="checkbox" name="remember">
                                <span class="address">Remember Me</span>
                            </div>
                            <div class="forget-pass">
                                <a href="{{ route('password.request') }}">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                    <div class="login-btn text-center">
                        <button type="submit" class="shop-btn">Log In</button>
                        <span class="shop-account">Don't have an account? <a href="{{ route('register') }}">Sign Up Free</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection