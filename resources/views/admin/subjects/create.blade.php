@extends('admin.layouts.index')

@section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Subject
                        <small>Create</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    {!! Form::open(['method' => 'POST', 'route' => ['subjects.store']]) !!}
                        <div class="form-group">
                            <label>Subject Name</label>
                            {!! Form::text('name', old('name'), ['class' =>"form-control", 'placeholder' => "Please Enter Subject Name"]) !!}
                        </div>
                        <div class="form-group">
                            <label>Subject Number</label>
                            {!! Form::number('number', old('number'), ['min'=>"2",'max'=>'3','class' =>"form-control", 'placeholder' => "Please Enter Number TÍN CHỈ"]) !!}
                        </div>
                    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    {!! Form::button('Reset',['class' => 'btn btn-warning']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.row -->

@endsection
