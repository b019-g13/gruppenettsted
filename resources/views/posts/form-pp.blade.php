@extends('partials.master')

@section('content-main')
    <h1>Passordbeskyttet</h1>

    <form action="{{ route('post.pp.show', $post) }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="post_password">Passord</label>
        <input id="post_password" type="password" name="password">

        <div>
            <button type="submit">Send</button>
        </div>
    </form>
@endsection
