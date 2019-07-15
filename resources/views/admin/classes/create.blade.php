@extends('admin.layouts.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Class
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Class</label>
                            <select class="form-control">
                                <option value="0">Please Choose Class </option>
                                <option value="">IT 1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Class Name</label>
                            <input class="form-control" name="txtCateName" placeholder="Please Enter Class Name" />
                        </div>
                        <div class="form-group">
                            <label>Class Status</label>
                            <label class="radio-inline">
                                <input name="rdoStatus" value="1" checked="" type="radio">Active
                            </label>
                            <label class="radio-inline">
                                <input name="rdoStatus" value="2" type="radio">Offline
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Category Add</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

@endsection
