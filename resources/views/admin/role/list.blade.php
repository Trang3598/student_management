@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Role
                        <small>List</small>
                    </h1>
                    <div class="message_warning">
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                                <button style="float: right;border: none;background-color: #dff0d8">X</button>
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                                <button style="float: right;border: none;background-color: #f2dede">X</button>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr style="text-align: center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Guard Name</th>
                        @can('role-addPermission')
                            <th>Add Permission</th>
                        @endcan
                        @can('role-edit')
                            <th>Edit</th>
                        @endcan
                        @can('role-edit')
                            <th>Delete</th>
                        @endcan

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr class="odd gradeX" align="center">
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->guard_name}}</td>
                            @can('role-addPermission')
                                <td>
                                    <a class="btn btn-primary" href="{{route('roles.setPermission',$role->id)}}">Add</a>
                                </td>
                            @endcan
                            @can('role-edit')
                                <td class="center">
                                    <a href="{{route('roles.edit',$role->id)}}"
                                       class="edit-student btn btn-success">Edit</a>
                                </td>
                            @endcan
                            @can('role-delete')
                                <td>
                                    {!! Form::open(['method'=> 'DELETE','route' => ['roles.destroy', $role->id]]) !!}
                                    {!! Form::submit('Delete',['class'=>'btn btn-danger','onclick' => "return confirm('Do you want to delete this field?')"]) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        {{--{!! $classes->links() !!}--}}
    </div>
    <!-- /#page-wrapper -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('div.message_warning').on('click', function () {
                $('div.message_warning').remove();
            });
        });
    </script>
@endsection