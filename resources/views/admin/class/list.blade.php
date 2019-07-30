@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Class
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
                        <th>Name Of Faculty</th>
                        <th>List Students</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($classes as $class)
                        <tr class="odd gradeX" align="center">
                            <td>{{(isset($class->id))? $class->id: ''}}</td>
                            <td>{{(isset($class->name))? $class->name: ''}}</td>
                            <td>
                                   {{(isset($class->faculty->name)) ?$class->faculty->name:''}}
                            </td>
                            <td class="center"><i class="glyphicon glyphicon-eye-open "></i> <a href="{{route('class.show',$class->id)}}">Show</a></td>
                            <td>
                                {!! Form::open(['method'=> 'DELETE','route' => ['class.destroy', $class->id]]) !!}
                                {!! Form::submit('Delete',['class'=>'btn btn-instagram']) !!}
                                {!! Form::close() !!}
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('class.edit',$class->id)}}">Edit</a></td>
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