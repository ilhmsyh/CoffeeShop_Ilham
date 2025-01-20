@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-light rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h3><i class="fas fa-user"></i> {{ __('Your Profile') }}</h3>
                </div>

                <div class="card-body">
                    <h4>Welcome, {{ Auth::user()->name }}!</h4>
                    <p>Email: {{ Auth::user()->email }}</p>

                    <hr>

                    <h5>Profile Information</h5>
                    <ul>
                        <li>Name: {{ Auth::user()->name }}</li>
                        <li>Email: {{ Auth::user()->email }}</li>
                        <li>Member since: {{ Auth::user()->created_at->format('d M Y') }}</li>
                    </ul>

                    <!-- Link to edit profile, for example -->
                    <a href="{{ route('profile.edit') }}" class="btn btn-warning">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
