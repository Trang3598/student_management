@extends('admin.layouts.index')

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr align="center">
            <th>ID</th>
            <th>Student</th>
            <th>User</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Change Password</th>
        </tr>
        </thead>
        <tbody>
            <tr class="odd gradeX" align="center">
                <td>{{$student->id}}</td>
                <td>{{$student->name}}</td>
                <td>{{$user->user}}</td>
                <td>{{$user->email}}</td>
                <td class="center"><a href="{{route('users.edit',['id'=>$user->id])}}"><i class="fa fa-edit fa-fw"></i></a></td>
                <td class="center"><a href="{{route('users.change',['id'=>$user->id])}}"><i class="fa fa-exchange fa-fw"></i></a></td>
            </tr>
        </tbody>
    </table>
    <!-- /.row -->

@endsection
