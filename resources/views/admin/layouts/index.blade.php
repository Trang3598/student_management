<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="student-managerment">
    <meta name="author" content="">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

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
    <link href="{{asset('admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.')}}"
          rel="stylesheet">
</head>

<body>

<div id="wrapper">

    @include('admin.layouts.header')

    <div id="page-wrapper">
        <div class="container-fluid">
            <br>
            @if(count($errors))
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
            @endif
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('delete'))
                <div class="alert alert-success">
                    {{session('delete')}}
                </div>
            @endif
            @if(session('mes'))
                <div class="alert alert-success">
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
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

@yield('script')
</body>

</html>
