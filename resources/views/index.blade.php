@extends('partials.master')

@section('content-main')
    <header>
        <h1>B019-G13</h1>
        <p>Bachelorgruppe på Høgskolen i Østfold.</p>
        <p>Oppgave: Utvikle nettsted for Sirkus Media</p>
        <a href="{{ route('about.project') }}" class="button">Om prosjektet</a>
    </header>

    @if ($posts != null && count($posts) > 0)
        <section>
            <h2>Oppdateringer</h2>
            @include('posts.index-content')
        </section>
    @endif
@endsection
