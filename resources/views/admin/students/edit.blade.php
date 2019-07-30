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
            {!! Form::open(['method' => 'PUT', 'route' => ['students.update',$students->id], 'enctype' => "multipart/form-data"]) !!}
            <div class="form-group">
                {!! Form::label('student','Student') !!}
                <input class="form-control" name="name" value="{{$students->name}}"/>
            </div>
            <div class="form-group">
                {!! Form::label('class','Class') !!}
                <select class="form-control" name="class_code">
                    @foreach($classes as $id => $class)
                        <option value="{{$id}}"
                        @if($id == $students->class_code) selected @endif>{{$class}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('gender','Gender') !!}
                <label class="radio-inline">
                    <input name="gender" value="1" type="radio" @if($students->gender == 1) checked @endif>Male
                </label>
                <label class="radio-inline">
                    <input name="gender" value="2" type="radio" @if($students->gender == 2) checked @endif>Female
                </label>
            </div>
            <div class="form-group">
                {!! Form::label('birthday','Birthday') !!}
                <input class="form-control" name="birthday" type="date" value="{{$students->birthday}}">
            </div>
            <div class="form-group">
                {!! Form::label('image','Image') !!}
                <input class="form-control" name="image" type="file"><br>
                <img src="{{ asset("img/{$students ->image}") }}" style="width: 50px;height: 50px">
            </div>
            <div class="form-group">
                {!! Form::label('phone','Phone') !!}
                <input class="form-control" name="phone" value="{{$students->phone}}"
                       placeholder="Please Enter Your Phone"/>
            </div>
            <div class="form-group">
                {!! Form::label('address','Address') !!}
                {!! Form::text('address',$students->address,['class'=>"form-control", 'placeholder'=>"Please Enter Your Address"]) !!}
            </div>
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <!-- /.row -->

@endsection
