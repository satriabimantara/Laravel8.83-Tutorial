@extends('layouts.app')

@section('main')
<div class="card mt-5 mx-auto" style="width: 380px" >
    <div class="card-body">
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input
              type="email"
              class="form-control"
              id="email"
              name="email"
              value="{{ old('email', $request->email) }}"
              readonly
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
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                <input
                type="password"
                class="form-control"
                id="password_confirmation"
                name="password_confirmation"
                value="{{ old('password_confirmation') }}"
                >
                @error('password_confirmation')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
              </div>
            <button type="submit" class="btn btn-secondary">Reset Password</button>
          </form>
    </div>
</div>

@endsection
