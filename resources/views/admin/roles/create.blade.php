@extends('admin.layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Role
                    <small>Create</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                {!! Form::open(['method' => 'POST', 'route' => ['roles.store']]) !!}
                @csrf
                <div class="form-group">
                    <label>Role Name</label>
                    {!! Form::text('name', old('name'), ['class' =>"form-control", 'placeholder' => "Please Enter Faculty Name"]) !!}
                </div>
                <input type="hidden" value="web" name="guard_name">
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                {!! Form::button('Reset',['class' => 'btn btn-warning']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

@endsection
