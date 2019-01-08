@include('partials.head')
@php
	if (!isset($body_class)) {
		$body_class = '';
    }

    $body_class .= ' ' . $view_name
@endphp
<body class="{{ $body_class }}">
    @include('partials.navigation')
    <main>
        @yield('content-main')
    </main>
    <footer>
        @include('partials.footer')
    </footer>
    @include('partials.flash-messages')
</body>
</html>
