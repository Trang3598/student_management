@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{trans('student.student')}}
                <small>{{trans('student.profile')}}</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-6" style="padding-bottom:120px">
            {!! Form::open(['method' => 'PUT', 'route' => ['student.newUpdate',$student->id], 'enctype' => "multipart/form-data"]) !!}
            <div class="form-group">
                {!! Form::label('student',trans('student.student')) !!}
                <input class="form-control" name="name" value="{{$student->name}}"/>
            </div>
            <div class="form-group">
                {!! Form::label('class',trans('student.class')) !!}
                <select class="form-control" name="class_code">
                    @foreach($classes as $id => $class)
                        <option value="{{$id}}"
                                @if($id == $student->class_code) selected @endif>{{$class}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('gender',trans('student.gender')) !!}
                <label class="radio-inline">
                    <input name="gender" value="1" type="radio" @if($student->gender == 1) checked @endif>Male
                </label>
                <label class="radio-inline">
                    <input name="gender" value="2" type="radio" @if($student->gender == 2) checked @endif>Female
                </label>
            </div>
            <div class="form-group">
                {!! Form::label('birthday',trans('student.birthday')) !!}
                <input class="form-control" name="birthday" type="date" value="{{$student->birthday}}">
            </div>
            <div class="form-group">
                {!! Form::label('image',trans('student.image')) !!}
                <input class="form-control" name="image" type="file"><br>
                <img src="{{ asset("img/{$student ->image}") }}" style="width: 50px;height: 50px">
            </div>
            <div class="form-group">
                {!! Form::label('phone',trans('student.phone')) !!}
                <input class="form-control" name="phone" value="{{$student->phone}}"
                       placeholder="Please Enter Your Phone"/>
            </div>
            <div class="form-group">
                {!! Form::label('address',trans('student.address')) !!}
                {!! Form::text('address',$student->address,['class'=>"form-control", 'placeholder'=>"Please Enter Your Address"]) !!}
            </div>

            {!! Form::submit(trans('student.update'), ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <div class="col-lg-6" style="padding-bottom:120px">
            {!! Form::open(['method' => 'PUT', 'route' => ['student.newUpdate1',$student->id], 'enctype' => "multipart/form-data"]) !!}
            <div class="form-group">
                {!! Form::label('MÔN HỌC CHƯA HOÀN THÀNH',trans('student.subjectNotComplete')) !!}
                <table class="table table-striped table-bordered table-hover">
                    <tr align="center">
                        <th>{{trans('student.subjectName')}}</th>
                        <th>{{trans('student.chooseSubject')}}</th>
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
            {!! Form::submit(trans('student.submit'), ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    <!-- /.row -->

@endsection
