@extends('layouts.app')

@section('main')
<div class="card mt-5 mx-auto" style="width: 380px" >
    <div class="card-body">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                value="{{ old('name') }}"
                >
                @error('name')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
              </div>
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
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="role" id="role-admin" value="admin" checked>
            <label class="form-check-label" for="role-admin">Admin</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="role" id="role-user" value="user">
            <label class="form-check-label" for="role-user">User</label>
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Register</button>
          </form>

    </div>
</div>

@endsection
