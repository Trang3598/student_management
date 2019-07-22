@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Faculty
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr align="center">
                <th>ID</th>
                <th>Faculty</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($faculties as $faculty)
                <tr class="odd gradeX" align="center">
                    <td>{{$faculty->id}}</td>
                    <td>{{$faculty->name}}</td>
                    <td class="center">
                        <form action="{{route('faculties.destroy',$faculty->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" onclick="return confirm('Are you sure to delete?')"><i
                                    class="fa fa-trash-o  fa-fw"></i></button>
                            @csrf
                        </form>
                    </td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a
                            href="{{route('faculties.edit',['Faculty'=>$faculty])}}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->

@endsection
