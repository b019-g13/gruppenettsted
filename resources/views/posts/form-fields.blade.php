<div>
    <label for="post_title">Tittel</label>
    <input id="post_title" type="text" name="title" value="{{ old('title', (isset($post->title) ? $post->title : null)) }}">
</div>

<div>
    <label for="post_title">Bilde</label>
    <input type="file" name="image" id="post_image">
</div>

<div>
    <label for="post_post_type_id">Post type</label>
    <select id="post_post_type_id" name="post_type_id">
        @php
            $old_post_type_id = old('post_type_id', (isset($post->post_type_id) ? $post->post_type_id : null));
        @endphp
        @if ($old_post_type_id == null)
            <option value="null" selected disabled>Velg en</option>
        @endif
        @foreach ($post_types as $post_type)
            @if ($post_type->id == $old_post_type_id)
                <option value="{{ $post_type->id }}" selected>{{ $post_type->name }}</option>
            @else
                <option value="{{ $post_type->id }}">{{ $post_type->name }}</option>
            @endif
        @endforeach
    </select>
</div>

<div>
    <label for="post_content">Innhold</label>
    <textarea id="post_content" type="text" name="content">{{ old('content', (isset($post->content) ? $post->content : null)) }}</textarea>
</div>

<p>Forhåndsvisning</p>
<hr>

<article>
    <h1 class="title">{{ old('title', (isset($post->title) ? $post->title : null)) }}</h1>
    <div id="post_content-preview" class="content"></div>
</article>
