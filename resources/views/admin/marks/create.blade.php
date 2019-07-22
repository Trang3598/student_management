@extends('admin.layouts.index')

@section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mark
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    {!! Form::open(['method' => 'POST','route' => ['marks.store'] , 'enctype' => "multipart/form-data"]) !!}
                    <div class="form-group">
                        <label>Name</label>
                        <select class="form-control" name="student_code">
                            <option>Name</option>
                            @foreach($students as $student)
                                <option value="{{$student->id}}">{{$student->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Subjects</label>
                        <select class="form-control" name="subject_code">
                            <option>Subjects</option>
                            @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Mark</label>
                        {!! Form::number('score', old('score'), ['class' =>"form-control",'step'=>"0.1",'min'=>0,'max'=>10, 'placeholder' => "Please Enter Score"]) !!}
                    </div>
                    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.row -->

@endsection
