@if (session()->has('messages'))
    @foreach (session()->pull('messages') as $type => $messages)
        <div class="alert alert-dismissible alert-{{ $type }}" role="alert">
            <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="alert"></button>
            <ul>
                @foreach($messages as $message)
                    <li>{!! $message !!}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endif