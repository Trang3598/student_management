@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Class
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('class.update',['class' =>$class])}}" method="POST">
                        <div class="form-group">
                            <label>Category Parent</label>
                            <select class="form-control" name="Faculty">
                                @foreach($faculty as $fl)
                                    <option value="{{$fl->id}}">{{$fl->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Class Name</label>
                            <input class="form-control" name="name" placeholder="Please Enter Class Name" value="{{$class->name}}" />
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-default">Class Edit</button>
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
@endsection