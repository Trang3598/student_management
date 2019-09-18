@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Permission
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr align="center">
                <th>ID</th>
                <th>Permission</th>
                <th>Guard_name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
                <tr class="odd gradeX" align="center">
                    <td>{{$permission->id}}</td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->guard_name}}</td>
                    <td class="center"><a class="btn btn-primary" href="{{route('permissions.edit',['Permission'=>$permission])}}">Edit</a>
                    </td>
                    <td class="center">
                        <form action="{{route('permissions.destroy',$permission->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure to delete?')">Delete</button>
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
