@extends('layouts.app')

@section('main')
<div class="card mt-5 mx-auto" style="width: 380px" >
    <div class="card-body">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input
              type="email"
              class="form-control"
              id="email"
              name="email"
              value="{{ old('email') }}"
              >
              @error('email')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input
              type="password"
              class="form-control"
              id="password"
              name="password"
              value="{{ old('password') }}"
              >
              @error('password')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-secondary">Login</button>
            <a href="{{ route('password.request') }}" class='btn btn-info'>
                Forgot password?
            </a>
          </form>

    </div>
</div>

@endsection
