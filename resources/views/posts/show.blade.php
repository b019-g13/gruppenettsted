@extends('partials.master')

@section('content-main')
    <article>
        <img src="{{ $post->image->url_full }}" alt="{{ $post->image->attr_alt }}">
        <h1 class="title">{{ $post->title }}</h1>
        <div class="content">{!! $post->content !!}</div>
    </article>
@endsection
