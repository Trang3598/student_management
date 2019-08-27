@extends('admin.layout.index')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Result of Student
                        <small>Add</small>
                    </h1>
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
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    {!! Form::open(['route'=>'studentsubject.store', 'method'=>'POST']) !!}
                        <div class="form-group">
                            {!! Form::label('student') !!}
                            {!! Form::select('student_code[]', ['' => 'Please enter a student...'] + $sts,\Request::get('student_code'), ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('subject') !!}
                            {!! Form::select('subject_code[]', ['' => 'Please enter a subject...'] + $sjs,\Request::get('subject_code'), ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Score') !!}
                            {!! Form::text('score[]',old('score'),['class'=>'form-control','placeholder'=> 'Please Enter Score']) !!}
                        </div>
                    {!! Form::submit('Result Add',['class' => 'btn btn-default']) !!}
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