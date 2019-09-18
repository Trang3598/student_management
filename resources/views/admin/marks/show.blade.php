@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-12">
                <h1 class="page-header">Mark
                    <small>List</small>
                </h1>
            </div>

        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Mark</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($marks as $mark)
                <tr class="odd gradeX" align="center">
                    <td>{{$mark->id}}</td>
                    <td>{{$mark->students->name}}</td>
                    <td>{{$mark->subjects->name}}</td>
                    <td>{{$mark->score}}</td>
                    <td class="center"><a class="btn btn-primary" href="{{route('marks.edit',['Mark'=>$mark])}}">Edit</a></td>
                    <td class="center">
                        <form action="{{route('marks.destroy',$mark->id)}}" method="POST" >
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure to delete?')">Xóa</button>
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
