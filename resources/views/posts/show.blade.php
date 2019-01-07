@extends('partials.master')

@section('content-main')
    <article>
        <img src="{{ $post->image->url_full }}" alt="{{ $post->image->attr_alt }}">
        <h1>{{ $post->title }}</h1>
        {!! $post->content !!}
    </article>
@endsection
