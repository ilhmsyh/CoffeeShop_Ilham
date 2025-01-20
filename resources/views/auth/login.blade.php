@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Card dengan efek animasi -->
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header text-center bg-gradient text-white">
                    <h3><i class="fas fa-sign-in-alt"></i> {{ __('Login to Your Account') }}</h3>
                </div>

                <div class="card-body p-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Input -->
                        <div class="mb-4">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="mb-4 d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>

                            <!-- Forgot Password Link -->
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg shadow-lg">
                                <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>
        /* Background dengan gradient atau gambar */
        body {
            background: linear-gradient(135deg, #6e7dff, #2a75bc);
            height: 100vh;
        }

        .card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        /* Card Hover Effect */
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.1);
        }

        /* Card Header Gradient */
        .bg-gradient {
            background: linear-gradient(90deg, #1c92d2, #f2fcfe);
        }

        /* Input dan Button Styling */
        .form-control, .btn {
            border-radius: 50px;
            font-size: 1.1rem;
        }

        .btn-primary {
            background-color: #00bcd4;
            border: none;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #0097a7;
        }

        .btn-link {
            color: #00bcd4;
        }

        .btn-link:hover {
            color: #0097a7;
        }

        /* Styling untuk animasi smooth */
        .card-header h3 {
            font-size: 1.8rem;
            letter-spacing: 1px;
            font-weight: 700;
        }

        .card-body {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
        }
    </style>
@endsection
