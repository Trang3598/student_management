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
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    {!! Form::open(['route'=>'student.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        {!! Form::label('class') !!}
                        <select class="form-control" name="class_code" id="class_code">
                            @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Name') !!}
                        {!! Form::text('name',old('name'),['class'=> 'form-control','placeholder' => 'Please Enter Name Of Student']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Birthday') !!}
                        {!! Form::date('birthday',old('birthday'),['class'=> 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Number Phone')!!}
                        {!! Form::text('phone',old('phone'),['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::file('image') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Address')!!}
                        {!! Form::textarea('address',old('address'),['class'=>'form-control ckeditor']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Gender') !!}
                        <label class="radio-inline">
                            {!! Form::radio('gender','1') !!}{{'Male'}}
                        </label>
                        <label class="radio-inline">
                            {!! Form::radio('gender','2') !!}{{'Female'}}
                        </label>
                        <label class="radio-inline">
                            {!! Form::radio('gender','3') !!}{{'Other'}}
                        </label>
                    </div>
                    {!! Form::submit('Student Add',['class'=> 'btn btn-default']) !!}
                    {!! Form::button('Reset',['class' => 'btn btn-default']) !!}
                    {!! Form::close() !!}

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