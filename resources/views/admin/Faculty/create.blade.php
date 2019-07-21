@extends('admin.layout.index')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Faculty
                        <small>Add</small>
                    </h1>
                </div>
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {!! Form::open(['method'=>'POST','route'=>'faculty.store']) !!}
                    <div class="form-group">
                        {!! Form::label('name','Name') !!}
                        {!! Form::text('name',old('name'),['class' =>'form-control', 'placeholder' =>'Please Enter Name Of Faculty']) !!}
                    </div>
                        {!! Form::submit('Faculty Add',['class'=>'btn btn-default']) !!}
                        {!! Form::button('Reset',['class' => 'btn btn-default']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
@endsection