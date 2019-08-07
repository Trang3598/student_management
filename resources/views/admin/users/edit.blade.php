@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{$user->user}}
                <small>Edit</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            {!! Form::open(['method' => 'PUT', 'route' => ['users.update',$user->id], 'enctype' => "multipart/form-data"]) !!}
            <div class="form-group">
                {!! Form::label('user','User') !!}
                {!! Form::text('user',$user->user,['class'=>"form-control",'placeholder'=>"User Name"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','Email') !!}
                {!! Form::text('email',$user->email,['class'=>"form-control",'value'=>"$user->email",'placeholder'=>"User Email"]) !!}
            </div>


            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection
