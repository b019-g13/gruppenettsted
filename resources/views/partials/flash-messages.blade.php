<ul id="flash-message">
    @foreach (['error', 'warning', 'success', 'info'] as $msg)
        @if (Session::has($msg))
            <li class="alert-{{ $msg }}">
                @php
                    $random_id = 'flash-message-' . md5(uniqid(rand(), true));
                @endphp
                <input type="checkbox" id="{{$random_id}}">
                <label for="{{$random_id}}">{!! Session::get($msg) !!}</label>
            </li>
        @endif
    @endforeach

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <li class="alert-error">
                @php
                    $random_id = 'flash-message-' . md5(uniqid(rand(), true));
                @endphp
                <input type="checkbox" id="{{$random_id}}">
                <label for="{{$random_id}}">{{ $error }}</label>
            </li>
        @endforeach
    @endif
</ul>
