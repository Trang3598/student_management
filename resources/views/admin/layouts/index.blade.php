<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="student-managerment">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .modal-backdrop.in {
            display: none;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    {{--    <!-- MetisMenu CSS -->--}}
    <link href="{{asset('admin_asset/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    {{--    <!-- Custom CSS -->--}}
    <link href="{{asset('admin_asset/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    {{--    <!-- Custom Fonts -->--}}
    <link href="{{asset('admin_asset/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
          type="text/css">

    {{--    <!-- DataTables CSS -->--}}
    <link
        href="{{asset('admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}"
        rel="stylesheet">

    {{--    <!-- DataTables Responsive CSS -->--}}
{{--    <link href="{{asset('admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.')}}"
          rel="stylesheet">--}}
</head>
<style>
    /* width */
    ::-webkit-scrollbar {
        width: 7px;
    }
    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #a7a7a7;
    }
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #929292;
    }
    ul {
        margin: 0;
        padding: 0;
    }
    li {
        list-style: none;
    }
    .user-wrapper, .message-wrapper {
        border: 1px solid #dddddd;
        overflow-y: auto;
    }
    .user-wrapper {
        height: 600px;
    }
    .user {
        cursor: pointer;
        padding: 5px 0;
        position: relative;
    }
    .user:hover {
        background: #eeeeee;
    }
    .user:last-child {
        margin-bottom: 0;
    }
    .pending {
        position: absolute;
        left: 13px;
        top: 9px;
        background: #b600ff;
        margin: 0;
        border-radius: 50%;
        width: 18px;
        height: 18px;
        line-height: 18px;
        padding-left: 5px;
        color: #ffffff;
        font-size: 12px;
    }
    .media-left {
        margin: 0 10px;
    }
    .media-left img {
        width: 64px;
        border-radius: 64px;
    }
    .media-body p {
        margin: 6px 0;
    }
    .message-wrapper {
        padding: 10px;
        height: 536px;
        background: #eeeeee;
    }
    .messages .message {
        margin-bottom: 15px;
    }
    .messages .message:last-child {
        margin-bottom: 0;
    }
    .received, .sent {
        width: 45%;
        padding: 3px 10px;
        border-radius: 10px;
    }
    .received {
        background: #ffffff;
    }
    .sent {
        background: #3bebff;
        float: right;
        text-align: right;
    }
    .message p {
        margin: 5px 0;
    }
    .date {
        color: #777777;
        font-size: 12px;
    }
    .active {
        background: #eeeeee;
    }
    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 15px 0 0 0;
        display: inline-block;
        border-radius: 4px;
        box-sizing: border-box;
        outline: none;
        border: 1px solid #cccccc;
    }
    input[type=text]:focus {
        border: 1px solid #aaaaaa;
    }
</style>

<body>

<div id="wrapper">

    @include('admin.layouts.header')

    <div id="page-wrapper">
        <div class="container-fluid">
            <br>
            @if(count($errors))
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
            @endif
            @if(session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('delete'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    {{session('delete')}}
                </div>
            @endif
            @if(session('mes'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    {{session('mes')}}
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</div>

{{--<!-- /#wrapper -->--}}

{{--<!-- jQuery -->--}}
<script src="{{asset('admin_asset/bower_components/jquery/dist/jquery.min.js')}}"></script>

{{--<!-- Bootstrap Core JavaScript -->--}}
<script src="{{asset('admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

{{--<!-- Metis Menu Plugin JavaScript -->--}}
<script src="{{asset('admin_asset/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

{{--<!-- Custom Theme JavaScript -->--}}
<script src="{{asset('admin_asset/dist/js/sb-admin-2.js')}}"></script>

{{--<!-- DataTables JavaScript -->--}}
<script src="{{asset('admin_asset/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script
    src="{{asset('admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>

{{--<!-- Page-Level Demo Scripts - Tables - Use for reference -->--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script>
    var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('ea08b54dc074662bda9f', {
            cluster: 'ap1',
            forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function (data) {
            // alert(JSON.stringify(data));
            if (my_id == data.from) {
                $('#' + data.to).click();
            } else if (my_id == data.to) {
                if (receiver_id == data.from) {
                    // if receiver is selected, reload the selected user ...
                    $('#' + data.from).click();
                } else {
                    // if receiver is not seleted, add notification for that user
                    var pending = parseInt($('#' + data.from).find('.pending').html());
                    if (pending) {
                        $('#' + data.from).find('.pending').html(pending + 1);
                    } else {
                        $('#' + data.from).append('<span class="pending">1</span>');
                    }
                }
            }
        });
        $('.user').click(function () {
            $('.user').removeClass('active');
            $(this).addClass('active');
            $(this).find('.pending').remove();
            receiver_id = $(this).attr('id');
            $.ajax({
            type: "get",
            url: "message/" + receiver_id,
            data: "",
            cache:false,
            success: function (data) {
                $('#messages').html(data);
                scrollToBottomFunc();
            }
            });
        });
        $(document).on('keyup', '.input-text input', function (e) {
            var message = $(this).val();

            // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                $(this).val(''); // while pressed enter text box will be empty

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "chat", // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function (data) {
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            }
        });
    });
    // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }
</script>
@yield('script')

</body>

</html>
