@extends('layouts.app')

@section('content')
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="card" style="width: 400px; margin: auto; margin-top: 40px;">
            <div class="card-header text-center">
                <h3>Register</h3>
            </div>

            <div class="card-body">

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

                <div class="mb-3">
                    <label for="password" class="form-label">Verify Password</label>
                    <input 
                        type="password"
                        class="form-control @error('v-password') is-invalid @enderror"
                        id="v-password"
                        name="v-password"
                    >
                    @error('v-password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="reset" class="btn btn-danger">Clear</button>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>

                <div class="text-center">
                    <p class="mt-3">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
                </div>
            </div>
        </div>
    </form>
@endsection
