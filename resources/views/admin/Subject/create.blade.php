@extends('admin.layout.index')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Subject
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
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
                        {!! Form::open(['route'=>'subject.store', 'method'=>'POST']) !!}
                        <div class="form-group">
                            {!!  Form::label('Name Of This Subject') !!}
                            {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Please Enter Subject Name']) !!}
                        </div>
                        <div class="form-group">
                            {!!  Form::label('Number of Credit') !!}
                            {!! Form::text('number',old('number'),['class'=>'form-control','placeholder'=>'Please Enter Number of Credit']) !!}
                        </div>
                        {!! Form::submit('Result Add',['class' => 'btn btn-default']) !!}
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