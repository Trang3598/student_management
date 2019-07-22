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
            {!! Form::open(['method' => 'PUT', 'route' => ['students.update',$st->id]]) !!}
            <div class="form-group">
                <label>Student Name</label>
                <input class="form-control" name="name" value="{{$st->name}}"/>m
            </div>
            <div class="form-group">
                <label>Class</label>
                <select class="form-control" name="class_code">
                    @foreach($class as $cs)
                        <option value="{{$cs->id}}"
                                @if($cs->id == $st->class_code) selected @endif>{{$cs->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <label class="radio-inline">
                    <input name="gender" value="1" type="radio" @if($st->gender == 1) checked @endif>Male
                </label>
                <label class="radio-inline">
                    <input name="gender" value="2" type="radio" @if($st->gender == 2) checked @endif>Female
                </label>
            </div>
            <div class="form-group">
                <label>Birthday </label>
                <input class="form-control" name="birthday" type="date" value="{{$st->birthday}}">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input class="form-control" name="image" type="file">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input class="form-control" name="address" value="{{$st->address}}"
                       placeholder="Please Enter Your Address"/>
            </div>
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <!-- /.row -->

@endsection
