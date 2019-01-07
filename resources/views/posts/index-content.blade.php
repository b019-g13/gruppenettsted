@foreach ($posts as $post)
    <article>
        <img src="{{ $post->image->url_full }}" alt="{{ $post->image->attr_alt }}">
        <h3><a href="{{ route('post.show', $post->slug)  }}">{{ $post->title }}</a></h3>
    </article>
@endforeach
