@extends('admin.layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="user-wrapper">
                    <ul class="users">
                        @foreach($users as $user)
                            <li class="user" id="{{ $user->id }}">
                                {{--will show unread count notification--}}
                                @if($user->unread)
                                    <span class="pending">{{ $user->unread }}</span>
                                @endif

                                <div class="media">
                                    <div class="media-left">
                                        <img src="https://www.techadvisor.co.uk/cmsdata/features/3655280/how-to-read-facebook-messages-without-them-knowing-main_thumb800.jpg" alt="Image" class="media-object">
                                    </div>

                                    <div class="media-body">
                                        <p class="name">{{ $user->username }}</p>
                                        <p class="name">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9" id="messages">
            </div>
        </div>
    </div>

@endsection
