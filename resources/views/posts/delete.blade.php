@extends('partials.master')

@section('content-main')
    <h1>Slett innlegg</h1>
    <p>Er du sikker på at du vil slette?</p>

    <form action="{{ route('post.destroy', $post) }}" method="post">
        @csrf
        @method('delete')

        <div>
            <button type="submit">Ja, slett innlegget</button>
        </div>
    </form>

    <a href="{{ route('post.index.admin') }}" class="button">Nei, gå tilbake</a>
@endsection
