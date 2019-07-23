@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    {!! Form::open(['method' => 'PUT', 'route' => ['classes.update',$classes->id]]) !!}
                        <div class="form-group">
                            <label>Class Name</label>
                            <input class="form-control" name="name" value="{{$classes->name}}"/>
                        </div>
                        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                        {!! Form::button('Reset',['class' => 'btn btn-warning']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.row -->

@endsection
