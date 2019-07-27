@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mark
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    {!! Form::open(['method' => 'PUT', 'route' => ['marks.update',$marks->id]]) !!}
                        <div class="form-group">
                            <label>Score</label>
                            <input class="form-control" name="score" value="{{$marks->score}}"/>
                        </div>
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.row -->

@endsection
