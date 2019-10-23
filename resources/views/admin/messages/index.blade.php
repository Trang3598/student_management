
<div class="message-wrapper">

    <ul class="messages">
        @csrf
        @foreach($messages as $message)
            <li class="message clearfix">
                {{--if message from id is equal to auth id then it is sent by logged in user --}}
                <div class="{{ ($message->from == Auth::id()) ? 'sent' : 'received' }}">
                    <p>{{ $message->message }}</p>
                    <p class="date">{{$message->created_at}}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<div class="input-text">
    <input type="text" name="message" placeholder="Type your message..." class="submit">
</div>

