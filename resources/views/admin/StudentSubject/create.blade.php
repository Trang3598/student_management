@extends('admin.layout.index')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Result of Student
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Student Code</label>
                            <select class="form-control">
                                <option value="0">Please Choose Student Code</option>
                                <option value="">Student Code</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Subject Code</label>
                            <select class="form-control">
                                <option value="0">Please Choose Subject Code</option>
                                <option value="">Subject Code</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Score</label>
                            <input class="form-control" name="txtOrder" placeholder="Please Enter Score" />
                        </div>

                        <button type="submit" class="btn btn-default"> Result Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
@endsection