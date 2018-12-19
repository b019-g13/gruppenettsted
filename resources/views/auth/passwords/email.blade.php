@extends('partials.master')
@section('content-main')
    <h1>{{ __('Reset Password') }}</h1>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <button type="submit">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </form>
@endsection
