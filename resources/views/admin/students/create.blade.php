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
                {{Form::label('name', 'Name')}}
                {!! Form::text('name', old('name'), ['class' =>"form-control", 'placeholder' => "Please Enter Student Name"]) !!}
            </div>
            <div class="form-group">
                {{Form::label('class', 'Class')}}
                <select class="form-control" name="class_code">
                    @foreach($classes as $id => $class)
                        <option value="{{ $id }}">{{ $class }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('gender', 'Gender') !!}
                <label class="radio-inline">
                    {!! Form::radio('gender', '1',['checked'=>"checked"]) !!}Male
                </label>
                <label class="radio-inline">
                    {!! Form::radio('gender', '2') !!}Female
                </label>
            </div>
            <div class="form-group">
                {!! Form::label('birthday', 'Birthday') !!}
                {!! Form::date('birthday',old('birthday'),['class'=>"form-control"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                <input type="file" class="form-control" name="image"/>
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Phone') !!}
                {!! Form::number('phone',old('phone'),['class'=>"form-control",'placeholder'=>"Please Enter Your Phone"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('address', 'Address') !!}
                {!! Form::text('address',old('address'),['class'=>"form-control",'placeholder'=>"Please Enter Your Address"]) !!}
            </div>
            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            {!! Form::button('Reset',['class' => 'btn btn-warning']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <!-- /.row -->

@endsection
