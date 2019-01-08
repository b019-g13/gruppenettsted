{{-- Scripts --}}
<script src="{{ asset('js/app.js') }}" defer></script>
{{-- Fonts --}}
<link rel="stylesheet" href="https://use.typekit.net/agc8mck.css">
<link rel="stylesheet" href="https://cdn.datahjelpen.no/fonts/butler/butler-700.css">

<div class="footer-content">
    @guest
        <a href="{{ route('login') }}">{{ __('Login') }}</a>
    @endguest
    @auth
        <a href="{{ route('dashboard') }}">Kontrollpanel</a>
        <a href="{{ route('post.index.admin') }}">Innlegg (admin)</a>

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
</div>
