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
                </div>
                <!-- /.col-lg-12 -->
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
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Student</label>
                            <select class="form-control"  name="student_code">
                                {{--@foreach($students as $student)--}}
                                    {{--<option value="{{$student->id}}">{{$student->name}}</option>--}}
                                {{--@endforeach--}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <select class="form-control" name="subject_code">
                                {{--@foreach($subjects as $subject)--}}
                                    {{--<option value="{{$subject->id}}">{{$subject->name}}</option>--}}
                                {{--@endforeach--}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Score</label>
                            <input class="form-control" name="score" placeholder="Please Enter Score" value="{{$studentSubject->score}}"/>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-default"> Result Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <form>
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