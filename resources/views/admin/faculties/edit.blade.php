@extends('admin.layouts.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Faculty
                    <small>{{$fy->name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                {!! Form::open(['method' => 'PUT', 'route' => ['faculties.update',$fy->id]]) !!}
                    <div class="form-group">
                        <label>Faculty Name</label>
                        <input class="form-control" name="name" placeholder="New Name" value="{{$fy->name}}"/>
                    </div>
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                {!! Form::button('Reset',['class' => 'btn btn-warning']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
