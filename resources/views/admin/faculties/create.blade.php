@extends('admin.layouts.index')

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{trans('faculty.faculty')}}
                        <small>{{trans('layout.create')}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">

                    {!! Form::open(['method' => 'POST', 'route' => ['faculties.store']]) !!}
                        @csrf
                    <div class="form-group">
                        <label>{{trans('faculty.faculty')}}</label>
                        {!! Form::text('name', old('name'), ['class' =>"form-control", 'placeholder' => trans('student.placeholder').trans('faculty.faculty')]) !!}
                    </div>
                    {!! Form::submit(trans('student.create'), ['class' => 'btn btn-primary']) !!}
                    {!! Form::button(trans('student.reset'),['class' => 'btn btn-warning']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

@endsection
