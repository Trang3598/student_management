@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Role
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr align="center">
                <th>ID</th>
                <th>Role</th>
                <th>Permissions</th>
                <th>Add</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr class="odd gradeX" align="center">
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a
                            href="{{route('roles.show',['Role'=>$role])}}">Permission</a>
                    </td>
                    <td class="center"><i class="fa fa-plus fa-fw"></i><a
                            href="{{route('roles.more',['Role'=>$role])}}">Add</a>
                    </td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a
                            href="{{route('roles.edit',['Role'=>$role])}}">Edit</a>
                    </td>
                    <td class="center">
                        <form action="{{route('roles.destroy',$role->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" onclick="return confirm('Are you sure to delete?')"><i
                                    class="fa fa-trash-o  fa-fw"></i></button>
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
