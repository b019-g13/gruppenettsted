@extends('partials.master')

@section('content-main')
    <h1>Hei {{ Auth::user()->name }}</h1>
    <p>Du er logget inn.</p>
@endsection
