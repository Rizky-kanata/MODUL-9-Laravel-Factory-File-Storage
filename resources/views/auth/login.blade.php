@extends('layouts.app')

@section('content')
    @php
        $pageTitle = 'Login'; // Set page title untuk halaman login
    @endphp
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 col-xl-4 border text-center">
                <div class="mb-4">
                    <i class="bi-hexagon-fill fs-1 text-primary"></i>
                    <h4 class="mt-3">Employee Data Master</h4>
                </div>
                <hr>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3 text-start">
                        <label for="email" class="form-label">Enter Your Email</label>
                        <input type="email" name="email" id="email"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="example@example.com" required autofocus>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 text-start">
                        <label for="password" class="form-label">Enter Your Password</label>
                        <input type="password" name="password" id="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Your password" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi-box-arrow-in-right me-2"></i>Log In
                        </button>
                    </div>
                </form>
                <hr>
                <div class="mt-3">
                    <small>Forgot your password? <a href="{{ route('password.request') }}">Reset it here</a>.</small>
                </div>
            </div>
        </div>
    </div>
@endsection

