@extends('admin.layout.index')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Student
                        <small>Edit</small>
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
                    {!! Form::open(['route'=>['student.update','student' => $student],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        {!! Form::label('Class code') !!}
                        <select class="form-control" name="class_code">
                            @foreach($classes as $class)
                                <option value="{{$class->id}}" {{$class->id == $student->class_code ? 'selected': ''}}> {{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Name') !!}
                        {!! Form::text('name',$student->name,['class'=>'form-control','placeholder'=>'student']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Birthday') !!}
                        {!! Form::date('birthday',$student->birthday,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Number Phone') !!}
                        {!! Form::text('phone',$student->phone,['class'=>'form-control','placeholder'=>'student']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::file('image') !!}
                    <br>
                        <img src="images/{{$student->image}}" style="width: 200px; height: 150px">
                    </div>
                    <div class="form-group">
                        {!! Form::label('Address') !!}
                        {!! Form::textarea('address',$student->address,['class'=>'form-control ckeditor']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Gender') !!}
                        <label class="radio-inline">
                        {!! Form::radio('gender','1',$student->gender ==1) !!}{{'Male'}}
                        </label>
                        <label class="radio-inline">
                        {!! Form::radio('gender','2', $student->gender == 2) !!}{{'Female'}}
                        </label>
                        <label class="radio-inline">
                        {!! Form::radio('gender','3', $student->gender == 3) !!}{{'Other'}}
                        </label>
                    </div>
                    {!! Form::submit('Student Edit',['class'=> 'btn btn-default']) !!}
                    {!! Form::button('Reset',['class' => 'btn btn-default']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    <!-- /#wrapper -->
@endsection