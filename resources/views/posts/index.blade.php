@extends('partials.master')

@section('content-main')
    <h1>Innlegg</h1>

    @foreach ($posts as $post)
        <article>
            <img src="{{ $post->image->url_full }}" alt="{{ $post->image->attr_alt }}">
            <h1 class="title"><a href="{{ route('post.show', $post->slug)  }}">{{ $post->title }}</a></h1>
            <div class="content">{!! $post->content !!}</div>
        </article>
    @endforeach
@endsection
