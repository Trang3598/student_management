@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Student
                <small>List</small>
            </h1>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="row">
            {!! Form::open(['method' => 'get', 'url' => route('students.index'), 'enctype' => "multipart/form-data"]) !!}
            <div class="col-lg-4">
                <Small>
                    AGE
                </Small>
                {!! Form::number('min_age', \Request::get('min_age'),['class'=>'form-control','min'=>10,'max'=>70,'placeholder'=>'Min Age']) !!}
                <Small>
                    MARK
                </Small>
                {!! Form::number('min_mark',\Request::get('min_mark'),['class'=>'form-control','min'=>0,'max'=>10,'placeholder'=>'Min Mark']) !!}
            </div>
            <div class="col-lg-4">
                <small>
                    TO
                </small>
                {!! Form::number('max_age',\Request::get('max_age'),['class'=>'form-control','min'=>10,'max'=>70,'placeholder'=>'Max Age']) !!}
                <small>
                    TO
                </small>
                {!! Form::number('max_mark',\Request::get('max_mark'),['class'=>'form-control','min'=>0,'max'=>10,'placeholder'=>'Max Mark']) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-12"><br>
        <Small>
            TELECOMS
        </Small>
        <label class="radio-inline">
            <input name="phones[]" value="0" type="checkbox" class="checkbox">
            <small>Vinaphone</small>
        </label>
        <label class="radio-inline">
            <input name="phones[]" value="1" type="checkbox" class="checkbox">
            <small>Mobiphone</small>
        </label>
        <label class="radio-inline">
            <input name="phones[]" value="2" type="checkbox" class="checkbox">
            <small>Viettel</small>
        </label>
        <br>
        {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}<br>
        {!! Form::close() !!}<br>
    </div>
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>ID</th>
            <th>Class-Code</th>
            <th>Student</th>
            <th>Gender</th>
            <th>Birthday</th>
            <th>Image</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>Point</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr class="odd gradeX" align="center">
                <td>{{$student->id}}</td>
                <td>{{$student->class_code}}</td>
                <td>{{$student->name}}</td>
                <td>@if($student->gender == 1) Male @else Female @endif</td>
                <td>{{$student->birthday}}</td>
                <td><img src="{{ asset('img/' . $student->image) }}" style="width: 50px;height: 50px"></td>
                <td>{{$student->address}}</td>
                <td>0{{$student->phone}}</td>
                <td class="center">
                    <form action="{{route('students.destroy',$student->id)}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" onclick="return confirm('Are you sure to delete?')"><i
                                class="fa fa-trash-o  fa-fw"></i></button>
                        @csrf
                    </form>
                </td>
                <td class="center"><a href="{{route('students.edit',['Student'=>$student])}}"><i
                            class="fa fa-edit fa-fw"></i></a></td>
                <td class="center"><a href="{{route('students.show',['Student'=>$student])}}"><i
                            class="fa fa-search fa-fw"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <!-- /.row -->

@endsection
