@extends('partials.master')

@section('content-main')
    <h1>Om gruppen</h1>
    @foreach ($posts as $post)
        <article>
            <img src="{{ $post->image->url_full }}" alt="{{ $post->image->attr_alt }}">
            <h2>{{ ucfirst(str_replace('Om ', '', $post->title)) }}</h2>
            <div class="content">{!! $post->content !!}</div>
        </article>
    @endforeach
@endsection
