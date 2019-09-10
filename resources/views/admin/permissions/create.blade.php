@extends('admin.layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Permission
                    <small>Create</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                @extends('admin.layouts.index')

                @section('content')
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Permission
                                    <small>Create</small>
                                </h1>
                            </div>
                            <!-- /.col-lg-12 -->
                            <div class="col-lg-7" style="padding-bottom:120px">

                                {!! Form::open(['method' => 'POST', 'route' => ['permissions.store']]) !!}
                                @csrf
                                <div class="form-group">
                                    <label>Permission Name</label>
                                    {!! Form::text('name', old('name'), ['class' =>"form-control", 'placeholder' => "Please Enter permission Name"]) !!}
                                    <input type="hidden" value="web" name="guard_name">
                                </div>
                                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                                {!! Form::button('Reset',['class' => 'btn btn-warning']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->

                @endsection
                {!! Form::open(['method' => 'POST', 'route' => ['permissions.store']]) !!}
                @csrf
                <div class="form-group">
                    <label>Permission Name</label>
                    {!! Form::text('name', old('name'), ['class' =>"form-control", 'placeholder' => "Please Enter permission Name"]) !!}
                </div>
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                {!! Form::button('Reset',['class' => 'btn btn-warning']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

@endsection
