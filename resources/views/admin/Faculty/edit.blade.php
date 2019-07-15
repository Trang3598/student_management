@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Faculty
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>

                    @endif

                    <form  action="{{route('faculty.update', ['faculty' => $faculty])}}" method="POST">

                        <div class="form-group">
                            <label>Faculty Name</label>
                            <input class="form-control" name="name" placeholder="" value="{{$faculty->name}}" />
                        </div>
                        <button type="submit" class="btn btn-default">Faculty Edit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        {{ csrf_field() }}
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    </div>
@endsection