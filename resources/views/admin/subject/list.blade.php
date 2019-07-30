@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Subject
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
                        <th>Name</th>
                        <th>Credit</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subjects as $subject)
                        <tr class="odd gradeX" align="center">
                            <td>{{$subject->id}}</td>
                            <td>{{$subject->name}}</td>
                            <td>{{$subject->number}}</td>
                            <td>
                            {!! Form::open(['method'=> 'DELETE','route' => ['subject.destroy', $subject->id]]) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-instagram']) !!}
                            {!! Form::close() !!}
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('subject.edit',$subject->id)}}">Edit</a></td>
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