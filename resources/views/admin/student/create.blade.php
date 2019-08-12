@extends('admin.layout.index')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-hover">
                        <tr>
                            <td> <h1 class="page-header">Student
                                    <small>Add</small>
                                </h1></td>
                            <td>
                                <h1 class="page-header">
                                    <small>Create Account</small>
                                </h1></td>
                        </tr>
                    </table>

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-6" style="padding-bottom:120px">
                    {!! Form::open(['route'=>'student.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        {!! Form::label('class') !!}
                        {!! Form::select('class_code', ['' => 'Please enter a class...'] + $cls,\Request::get('class_code'), ['class'=>'form-control']) !!}
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
                        {!! Form::text('address',old('address'),['class'=>'form-control']) !!}
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
                    {!! Form::hidden('level',0,['class'=> 'form-control']) !!}
                    {!! Form::hidden('student',0,['class'=> 'form-control']) !!}
                </div>

                {{--form of table account--}}
                <div class="col-lg-6" style="padding-bottom:120px">
                    <div class="form-group">
                        {!! Form::label('Username') !!}
                        {!! Form::text('username',old('username'),['class'=> 'form-control','placeholder' => 'Please Enter Username']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Password') !!}
                        {!! Form::password('password',['class'=> 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Confirm Password') !!}
                        {!! Form::password('confirm',['class'=> 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Email')!!}
                        {!! Form::text('email',old('email'),['class'=>'form-control','placeholder' => 'Please Enter Email']) !!}
                    </div>
                    {!! Form::submit('Student Add',['class'=> 'btn btn-success']) !!}
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