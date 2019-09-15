<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <title>Admin - Trang xinh đẹp</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <script src="{{asset('admin_asset/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <link href="{{asset('admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- MetisMenu CSS -->
    <link href="{{asset('admin_asset/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('admin_asset/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('admin_asset/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
          type="text/css">

    <!-- DataTables CSS -->
    <link href="{{asset('admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}"
          rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css')}}"
          rel="stylesheet">
    {{--<script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js"></script>--}}
    <style>
        .container {
            padding: 0.5%;
        }
        p {
            margin: 9px 0 10px;
        }

        /*.modal-backdrop.in {*/
        /*display: none;*/
        /*}*/
    </style>
</head>

<body>

<div id="wrapper">
    @include('admin.layout.header')
    @yield('content')
</div>
<!-- /#wrapper -->

<!-- jQuery -->


<!-- Bootstrap Core JavaScript -->
<script src="{{asset('admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('admin_asset/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('admin_asset/dist/js/sb-admin-2.js')}}"></script>

<!-- DataTables JavaScript -->
<script src="{{asset('admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
@yield('script')
</body>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

</html>
@yield('form-add')
@yield('show-image')