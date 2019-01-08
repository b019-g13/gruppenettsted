@extends('partials.master')

@section('content-main')
    <header>
        <div class="inner">
            <h1>B019-G13</h1>
            <p>Bachelorgruppe på Høgskolen i Østfold.</p>
            <p>Oppgave: Utvikle nettsted for Sirkus Media</p>
            <a href="{{ route('about.project') }}" class="button">Om prosjektet</a>
        </div>
    </header>

    @if ($posts != null && count($posts) > 0)
        <section>
            <div class="inner">
                <h2>Oppdateringer</h2>
                @foreach ($posts as $post)
                    <article>
                        <a href="{{ route('post.show', $post->slug) }}" aria-label="Les mer om {{ $post->title }}"><img src="{{ $post->image->url_full }}" alt="{{ $post->image->attr_alt }}"></a>
                        <h3 class="title"><a href="{{ route('post.show', $post->slug) }}" aria-label="Les mer om {{ $post->title }}">{{ $post->title }}</a></h3>
                        <div class="content">{{ substr(strip_tags($post->content), 0, 350) }}
                            <span>...</span>
                            <a href="{{ route('post.show', $post->slug) }}" aria-label="Les mer om {{ $post->title }}">Les mer</a>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif
@endsection
