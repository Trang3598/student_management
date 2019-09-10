@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Student
                <small>Profile</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-6" style="padding-bottom:120px">
            {!! Form::open(['method' => 'PUT', 'route' => ['student.newUpdate',$student->id], 'enctype' => "multipart/form-data"]) !!}
            <div class="form-group">
                {!! Form::label('student','Student') !!}
                <input class="form-control" name="name" value="{{$student->name}}"/>
            </div>
            <div class="form-group">
                {!! Form::label('class','Class') !!}
                <select class="form-control" name="class_code">
                    @foreach($classes as $id => $class)
                        <option value="{{$id}}"
                                @if($id == $student->class_code) selected @endif>{{$class}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('gender','Gender') !!}
                <label class="radio-inline">
                    <input name="gender" value="1" type="radio" @if($student->gender == 1) checked @endif>Male
                </label>
                <label class="radio-inline">
                    <input name="gender" value="2" type="radio" @if($student->gender == 2) checked @endif>Female
                </label>
            </div>
            <div class="form-group">
                {!! Form::label('birthday','Birthday') !!}
                <input class="form-control" name="birthday" type="date" value="{{$student->birthday}}">
            </div>
            <div class="form-group">
                {!! Form::label('image','Image') !!}
                <input class="form-control" name="image" type="file"><br>
                <img src="{{ asset("img/{$student ->image}") }}" style="width: 50px;height: 50px">
            </div>
            <div class="form-group">
                {!! Form::label('phone','Phone') !!}
                <input class="form-control" name="phone" value="{{$student->phone}}"
                       placeholder="Please Enter Your Phone"/>
            </div>
            <div class="form-group">
                {!! Form::label('address','Address') !!}
                {!! Form::text('address',$student->address,['class'=>"form-control", 'placeholder'=>"Please Enter Your Address"]) !!}
            </div>

            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <div class="col-lg-6" style="padding-bottom:120px">
            {!! Form::open(['method' => 'PUT', 'route' => ['student.newUpdate1',$student->id], 'enctype' => "multipart/form-data"]) !!}
            <div class="form-group">
                {!! Form::label('MÔN HỌC CHƯA HOÀN THÀNH','MÔN HỌC CHƯA HOÀN THÀNH') !!}
                <table class="table table-striped table-bordered table-hover">
                    <tr align="center">
                        <th>Tên Môn Học</th>
                        <th>Chọn Môn Học</th>
                    </tr>
                    @foreach($subjects as $subject)
                        <input type="hidden" name="student_code[]" value="{{$student->id}}">
                        <input type="hidden" name="score[]" value="0">
                    <tr align="center">
                        <td> {{$subject->name}}</td>
                        <td> {!! Form::checkbox('checkbox[]',$subject->id,null) !!} </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    <!-- /.row -->

@endsection
