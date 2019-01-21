<nav>
    <div class="nav-content">
        <div class="links-left">
            <a href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
        <div class="links-right">
            <a href="{{ route('post.index') }}">Innlegg</a>
            <a href="{{ route('about.group') }}">Om gruppen</a>
            <a href="{{ route('about.project') }}">Om prosjektet</a>
            <a href="{{ route('about.documents') }}">Dokumenter</a>
        </div>
    </div>
</nav>
