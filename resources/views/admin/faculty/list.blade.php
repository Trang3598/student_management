@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Faculty
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
                        <th>Show List Class</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($faculties as $faculty)
                        <tr class="odd gradeX" align="center">
                            <td>{{$faculty->id}}</td>
                            <td>{{$faculty->name}}</td>
                            <td class="center"><i class="glyphicon glyphicon-eye-open"></i> <a href="{{route('faculty.show',$faculty->id)}}">Show</a></td>
                            <td>
                                {!! Form::open(['method'=> 'DELETE','route' => ['faculty.destroy', $faculty->id]]) !!}
                                    {!! Form::submit('Delete',['class'=>'btn btn-instagram']) !!}
                                {!! Form::close() !!}
                                {{--<button class="btn btn-instagram" type="submit" onclick="return confirm('Do you want to delete this field?')"><a> Delete</a></button>--}}
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('faculty.edit',$faculty->id)}}">Edit</a></td>
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