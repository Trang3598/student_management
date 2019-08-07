@extends('admin.layout.index')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Result of Student
                        <small>Edit
                        </small>
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
                    {!! Form::open(['route'=>['studentsubject.update',$studentsubject->id],'method' => 'PUT']) !!}
                    <div class="form-group">
                        {!! Form::label('Student') !!}
                        <select class="form-control" name="student_code">
                            @foreach($students as $student)
                                <option value="{{$student->id}}" {{$student->id == $studentsubject->student_code ? 'selected': ''}}> {{$student->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('subject') !!}
                        <select class="form-control" name="subject_code">
                            @foreach($subjects as $subject)
                                <option value="{{$subject->id}}" {{$subject->id == $studentsubject->subject_code ?'selected' : ''}}>{{$subject->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        {!!  Form::label('Score') !!}
                        {!! Form::text('score',$studentsubject->score,['class'=> 'form-control','placeholder'=>'Please Enter Score']) !!}
                    </div>
                    {!! Form::submit('Result Edit',['class' => 'btn btn-default']) !!}
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