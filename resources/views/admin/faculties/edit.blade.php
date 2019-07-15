@extends('admin.layouts.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Faculty
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Faculty Name</label>
                        <input class="form-control" name="txtFacultyName"/>
                    </div>
                    <div class="form-group">
                        <label>Faculty Status</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1" checked="" type="radio">Active
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="2" type="radio">Offline
                        </label>
                    </div>
                    <button type="submit" class="btn btn-danger">Faculty Edit</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
