@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Permission
                <small>{{$permission->name}}</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            {!! Form::open(['method' => 'PUT', 'route' => ['permissions.update',$permission->id]]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Permission:') !!}
                {!! Form::text('name', $permission->name,['class'=>'form-control', 'placeholder'=>'New Name']) !!}
            </div>
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            {!! Form::button('Reset',['class' => 'btn btn-warning']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <!-- /.row -->

@endsection
