@extends('admin.layouts.index')

@section('content')
    {!! Form::open(['method' => 'get','route'=>['student.sendAll']]) !!}
    {!! Form::submit(trans('student.sendAll'),['class'=>"btn btn-danger",]) !!}
    {!! Form::close() !!}
    <br>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr align="center">
            <th>{{trans('student.id')}}</th>
            <th>{{trans('student.class')}}</th>
            <th>{{trans('student.student')}}</th>
            <th>{{trans('student.gender')}}</th>
            <th>{{trans('student.birthday')}}</th>
            <th>{{trans('student.image')}}</th>
            <th>{{trans('student.address')}}</th>
            <th>{{trans('student.phone')}}</th>
            <th>{{trans('student.show')}}</th>
            <th>{{trans('student.send')}}</th>
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
                    {!! Form::submit(trans('student.send'),['class'=>"btn btn-success",]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <!-- /.row -->

@endsection
