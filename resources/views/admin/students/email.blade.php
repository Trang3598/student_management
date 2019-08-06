@extends('admin.layouts.index')

@section('content')
    {!! Form::open(['method' => 'get','route'=>['student.sendAll']]) !!}
    {!! Form::submit('SEND ALL',['class'=>"btn btn-danger",]) !!}
    {!! Form::close() !!}
    <br>
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
            <th>Show</th>
            <th>Send Mail</th>
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
                <td>{{$student->phone}}</td>
                <td class="center"><a href="{{route('students.show',['Student'=>$student->id])}}"><i
                            class="fa fa-search fa-fw"></i></a></td>
                <td>
                    {!! Form::open(['method' => 'put','route' => ['students.send',$student->id]]) !!}
                    {!! Form::submit('Send Mail',['class'=>"btn btn-success",]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <!-- /.row -->

@endsection
