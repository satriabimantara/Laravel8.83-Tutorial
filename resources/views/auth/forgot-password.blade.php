@extends('layouts.app')

@section('main')
<div class="card mt-5 mx-auto" style="width: 380px" >
    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-info">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('password.email') }}" method="POST">
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
            <button type="submit" class="btn btn-primary">Send Reset Password</button>
          </form>

    </div>
</div>

@endsection
