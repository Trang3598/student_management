@extends('admin.layout.index')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .list-group {
        overflow-y: scroll;
        height: 300px;
    }
</style>
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <h1 class="page-header">Chat
                        <small>Room</small>
                    </h1>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="container" id="app">
                    <div class="row">
                        <div class="offset-4 col-4 offset-sm-1 col-sm-10">
                            <li class="list-group-item active ">
                                Chat Room <span class="badge badge-danger badge-pill">@{{ numberOfUser }}</span>
                            </li>
                            <ul class="list-group" v-chat-scroll>

                                <span class="badge badge-pill badge-primary">@{{ typing }} </span>
                                <message v-for="value , index in chat.message"
                                         :key=value.index
                                         :color=chat.color[index]
                                         :user=chat.user[index]
                                         :time=chat.time[index]> @{{ value }}
                                </message>
                            </ul>
                            <input type="text" class="form-control"
                                   placeholder="type your message here"
                                   v-model="message"
                                   @keyup.enter="send"
                            >
                            <br>
                            <a href="" class="btn btn-warning btn-sm" @click.prevent="deleteSession">Delete Chats</a>
                        </div>

                    </div>
                </div>
                <script src="{{ asset('js/app.js') }}"></script>
@endsection
