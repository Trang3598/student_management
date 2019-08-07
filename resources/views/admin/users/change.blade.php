@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{$user->user}}
                <small>Change Password</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            {!! Form::open(['method' => 'PUT', 'route' => ['users.changed',$user->id], 'enctype' => "multipart/form-data"]) !!}
            <div class="form-group">
                {!! Form::label('password','Password') !!}
                {!! Form::password('password_old',['class'=>"form-control",'placeholder'=>"Password"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password','Confirm Password') !!}
                {!! Form::password('password_new',['class'=>"form-control",'placeholder'=>"New Password"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password','Confirm Password') !!}
                {!! Form::password('password_confirmation',['class'=>"form-control",'placeholder'=>"Confirm Password"]) !!}
            </div>
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection
