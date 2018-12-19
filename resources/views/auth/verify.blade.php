@extends('partials.master')
@section('content-main')
    <h1>{{ __('Verify Your Email Address') }}</h1>
    <p>{{ __('A fresh verification link has been sent to your email address.') }}</p>
    <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
    <p>{{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.</p>
@endsection
