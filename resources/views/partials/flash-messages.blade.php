<ul id="flash-message">
    @foreach (['error', 'warning', 'success', 'info'] as $msg)
        @if (Session::has($msg))
            <li class="alert-{{ $msg }}">{!! Session::get($msg) !!}</li>
        @endif
    @endforeach

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <li class="alert-error">{{ $error }}</li>
        @endforeach
    @endif
</ul>
