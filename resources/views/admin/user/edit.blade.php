@extends('admin.layout.index')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::open(['method'=> 'PUT','route'=>['user.update','user'=> $user]]) !!}
                    <div class="form-group">
                        {!! Form::label('Username') !!}
                        {!! Form::text('username',$user->username,['class'=>'form-control','placeholder'=>'Please Enter UserName']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Email') !!}
                        {!! Form::text('email',$user->email,['class'=>'form-control','placeholder'=>'Please Enter Email']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Password') !!}
                        {!! Form::password('password',['class'=>'form-control','placeholder'=>'Please Enter Password'],$user->password) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Level') !!}
                        <label class="radio-inline">
                            {!! Form::radio('level','1',$user->level == 1) !!}{{'Admin'}}
                        </label>
                        <label class="radio-inline">
                            {!! Form::radio('level','0',$user->level == 0) !!}{{'Guest'}}
                        </label>
                    </div>
                    {!! Form::submit('User Edit',['class' => 'btn btn-default']) !!}
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