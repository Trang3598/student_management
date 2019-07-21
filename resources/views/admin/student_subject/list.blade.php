@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Results of Students
                        <small>List</small>
                    </h1>
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Student code</th>
                        <th>Subject code</th>
                        <th>Score</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($studentsubjects as $studentsubject)
                        <tr class="odd gradeX" align="center">
                            <td>{{$studentsubject->id}}</td>
                            <td>{{(isset($studentsubject->student->name)) ?$studentsubject->student->name:''}}</td>
                            <td> {{(isset($studentsubject->subject->name)) ?$studentsubject->subject->name:''}}</td>
                            <td>{{$studentsubject->score}}</td>
                            <td>  {!! Form::open(['method'=> 'DELETE','route' => ['studentsubject.destroy', $studentsubject->id]]) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-instagram']) !!}
                            {!! Form::close() !!}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="{{route('studentsubject.edit',$studentsubject->id)}}">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection