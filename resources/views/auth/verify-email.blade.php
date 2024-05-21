@extends('layouts.app')

@section('main')
<div class="card mt-5 mx-auto" style="width: 380px" >
    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-info">
            A fresh link has been sent to your email. Please check your inbox or spam folder!
        </div>
        @endif
        Before proceeding, please verify your email address. Please click the link below if you did not receive our verification notification.
        <form action="{{ route('verification.send') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-primary">{{ __('Send New Nofitication') }}</button>
        </form>
    </div>
</div>

@endsection
