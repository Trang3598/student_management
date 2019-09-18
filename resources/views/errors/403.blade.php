@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <h1>Bạn không được phân quyền</h1>
        <button type="button" class="btn btn-primary" onclick="quay_lai_trang_truoc()">Quay lại trang trước</button>

        <script>
            function quay_lai_trang_truoc(){
                history.back();
            }
        </script>
    </div>
    <!-- /.row -->
@endsection
