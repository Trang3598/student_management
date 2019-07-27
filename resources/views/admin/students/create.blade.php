@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Student
                <small>Add</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            {!! Form::open(['method' => 'POST', 'route' => ['students.store'] ,'enctype' => "multipart/form-data"]) !!}
            <div class="form-group">
                <label>Name</label>
                {!! Form::text('name', old('name'), ['class' =>"form-control", 'placeholder' => "Please Enter Student Name"]) !!}
            </div>
            <div class="form-group">
                <label>Class</label>
                <select class="form-control" name="class_code">
                    @foreach($classes as $id => $class)
                        <option value="{{ $id }}">{{ $class }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <label class="radio-inline">
                    <input name="gender" value="1" checked="" type="radio">Male
                </label>
                <label class="radio-inline">
                    <input name="gender" value="2" type="radio">Female
                </label>
            </div>
            <div class="form-group">
                <label>Birthday</label>
                <input class="form-control" name="birthday" type="date">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" name="image"/>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input class="form-control" name="phone" placeholder="Please Enter Your Phone"/>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input class="form-control" name="address" placeholder="Please Enter Your Address"/>
            </div>
            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            {!! Form::button('Reset',['class' => 'btn btn-warning']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <!-- /.row -->

@endsection
