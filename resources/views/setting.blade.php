@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-light rounded">
                <div class="card-header bg-warning text-white text-center">
                    <h3><i class="fas fa-cogs"></i> {{ __('Settings') }}</h3>
                </div>

                <div class="card-body">
                    <h4>{{ __('Manage your account settings here.') }}</h4>
                    <!-- Contoh pengaturan yang bisa diubah -->
                    <ul>
                        <li><a href="#">Change Email</a></li>
                        <li><a href="#">Change Password</a></li>
                        <li><a href="#">Notification Preferences</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
