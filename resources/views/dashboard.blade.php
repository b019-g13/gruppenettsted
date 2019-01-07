@extends('partials.master')

@section('content-main')
    <h1>Kontrollpanel</h1>
    <p>Hei {{ Auth::user()->name }}. Du er logget inn.</p>
@endsection
