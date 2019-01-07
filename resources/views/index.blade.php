@extends('partials.master')

@section('content-main')
    <header>
        <h1>B019-G13</h1>
        <p>Bachelorgruppe på Høgskolen i Østfold.</p>
        <p>Oppgave: Utvikle nettsted for Sirkus Media</p>
        <a href="{{ route('post.show', $about_post->slug) }}" class="button">{{ $about_post->title }}</a>
    </header>

    <section>
        <h2>Oppdateringer</h2>

        @include('posts.index-content')
    </section>
@endsection
