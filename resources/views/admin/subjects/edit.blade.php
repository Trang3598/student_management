@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Subject
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    {!! Form::open(['method' => 'PUT', 'route' => ['subjects.update',$subjects->id]]) !!}
                        <div class="form-group">
                            <label>Subject Name</label>
                            <input class="form-control" name="name" value="{{$subjects->name}}"/>
                        </div>
                        <div class="form-group">
                            <label>Subject Name</label>
                            <input type="number" max="3" min="2" class="form-control" name="number" value="{{$subjects->number}}"/>
                        </div>

                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    {!! Form::button('Reset',['class' => 'btn btn-warning']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.row -->


@endsection
