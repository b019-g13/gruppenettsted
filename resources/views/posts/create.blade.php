@extends('partials.master')

@section('content-main')
    <h1>Lag nytt innlegg</h1>

    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('posts.form-fields')
        <div>
            <button type="submit">Lagre</button>
        </div>
    </form>
@endsection
