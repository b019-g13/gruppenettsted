@extends('partials.master')

@section('content-main')
    <h1>Endre innlegg</h1>

    <form action="{{ route('post.update', $post) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        @include('posts.form-fields')
        <div>
            <button type="submit">Oppdater</button>
        </div>
    </form>
@endsection
