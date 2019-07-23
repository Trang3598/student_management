@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Student
                <small>Edit</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            {!! Form::open(['method' => 'PUT', 'route' => ['students.update',$students->id]]) !!}
            <div class="form-group">
                <label>Student Name</label>
                <input class="form-control" name="name" value="{{$students->name}}"/>
            </div>
            <div class="form-group">
                <label>Class</label>
                <select class="form-control" name="class_code">
                    @foreach($classes as $id => $class)
                        <option value="{{$id}}"
                        @if($id == $students->class_code) selected @endif>{{$class}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <label class="radio-inline">
                    <input name="gender" value="1" type="radio" @if($students->gender == 1) checked @endif>Male
                </label>
                <label class="radio-inline">
                    <input name="gender" value="2" type="radio" @if($students->gender == 2) checked @endif>Female
                </label>
            </div>
            <div class="form-group">
                <label>Birthday </label>
                <input class="form-control" name="birthday" type="date" value="{{$students->birthday}}">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input class="form-control" name="image" type="file">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input class="form-control" name="address" value="{{$students->address}}"
                       placeholder="Please Enter Your Address"/>
            </div>
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <!-- /.row -->

@endsection
