@extends('layouts.app')

@section('content')
    <form action="{{ route('users.authenticate') }}" method="POST">
        @csrf

        <div class="card" style="width: 400px; margin: auto; margin-top: 40px;">
            <div class="card-header text-center">
                <h3>Login</h3>
            </div>

            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="text"
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>

                <div class="text-center">
                    <p class="mt-3">Don't have an Account? <a href="{{ route('register') }}">Register here</a></p>
                </div>
            </div>
        </div>
    </form>
@endsection
