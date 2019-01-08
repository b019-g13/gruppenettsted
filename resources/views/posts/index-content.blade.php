@foreach ($posts as $post)
    <article>
        <img src="{{ $post->image->url_full }}" alt="{{ $post->image->attr_alt }}">
        <h3 class="title"><a href="{{ route('post.show', $post->slug)  }}">{{ $post->title }}</a></h3>
        <div class="content">{!! $post->content !!}</div>
    </article>
@endforeach
