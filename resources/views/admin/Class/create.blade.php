@extends('admin.layout.index')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <h1 class="page-header">Class
                        <small>Add</small>
                    </h1>
                </div>
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('class.postFormClass')}}" method="POST">
                        <div class="form-group">
                            <label>Faculty Name</label>
                            <select class="form-control" name="faculty_id">
                                @foreach($faculties as $faculty)
                                    <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Class Name</label>
                            <input class="form-control" name="name" placeholder="Please Enter Class Name"/>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-default"> Class Add</button>
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