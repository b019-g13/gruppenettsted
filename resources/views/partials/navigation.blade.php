<nav>
    <div>
        <a href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>
    <div>
        @guest
            <a href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @endguest
        @auth
            <a href="{{ route('dashboard') }}">Kontrollpanel</a>
            <a href="{{ route('post.index.admin') }}">Innlegg</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
    </div>
</nav>
