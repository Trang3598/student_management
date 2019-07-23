@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Class
                <small>Create</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            {!! Form::open(['method' => 'POST', 'route' => ['classes.store']]) !!}
            <div class="form-group">
                {!! Form::label('faculty_id', 'Faculty:') !!}
                <select class="form-control" name="faculty_id">
                    @foreach($faculties as $id => $faculty)
                        <option value="{{ $id }}">{{ $faculty }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Class Name</label>
                {!! Form::text('name', old('name'), ['class' =>"form-control", 'placeholder' => "Please Enter Class Name"]) !!}
            </div>
            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Reset',['class' => 'btn btn-warning']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <!-- /.row -->
@endsection
