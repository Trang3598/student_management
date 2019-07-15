@extends('admin.layout.index')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Student
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-success">
                        {{session('error')}}
                    </div>
                @endif
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Class Code</label>
                            <select class="form-control" name="Student">
                                @foreach($class as $cl)
                                    <option value="{{$cl->id}}">{{$cl->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" placeholder="Please Enter Student Name" value="{{$student->name}}" />
                        </div>
                        <div class="form-group">
                            <label>Birthday</label>
                            <input class="form-control" name="birthday" placeholder="Please Enter Birthday" value="{{$student->birthday}}"/>
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" id="image" value="{{$student->image}}">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea id="demo" class="form-control ckeditor" name="address" value="{{$student->address}}">Please Enter Address</textarea>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <label class="radio-inline" value="{{$student->gender}}">
                                <input name="gender" value="1" checked="" type="radio">Male
                            </label>
                            <label class="radio-inline">
                                <input name="gender" value="2" type="radio">Female
                            </label>
                            <label class="radio-inline">
                                <input name="gender" value="3" type="radio">Other
                            </label>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-default">Student Add</button>
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