@extends('partials.master')

@section('content-main')
    <h1>Innlegg (admin)</h1>
    <a href="{{ route('post.create') }}">Nytt innlegg</a>

    <table>
        @foreach ($posts as $post)
            <tr>
                <td>
                    <img src="{{ $post->image->url_full }}" alt="{{ $post->image->attr_alt }}">
                </td>
                <td>
                    <h2>{{ $post->title }}</h2>
                </td>
                <td>
                    <a href="{{ route('post.show', $post) }}">Vis</a>
                </td>
                <td>
                    <a href="{{ route('post.edit', $post) }}">Rediger</a>
                </td>
                <td>
                    <a href="{{ route('post.delete', $post) }}">Slett</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
