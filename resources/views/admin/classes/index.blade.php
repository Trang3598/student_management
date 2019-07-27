@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Class
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Class</th>
                        <th>Faculty</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($classes as $class)
                    <tr class="odd gradeX" align="center">

                        <td>{{$class->id}}</td>
                        <td>{{$class->name}}</td>
                        <td>{{$class->classes->name}}</td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{{route('classes.edit',['ClassModel'=>$class])}}">Edit</a></td>
                        <td class="center">
                            <form action="{{route('classes.destroy',$class->id)}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o  fa-fw"></i></button>
                                @csrf
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->

@endsection
