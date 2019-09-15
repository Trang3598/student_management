@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Permissions
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
                        @can('permission-edit')
                        <th>Edit</th>
                        @endcan
                        @can('permission-delete')
                        <th>Delete</th>
                            @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                        <tr class="odd gradeX" align="center">
                            <td>{{$permission->id}}</td>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->guard_name}}</td>
                            @can('permission-edit')
                                <td class="center">
                                    <a href="{{route('permissions.edit',$permission->id)}}"
                                       class="edit-student btn btn-success">Edit</a>
                                </td>
                            @endcan
                            @can('permission-delete')
                                <td>
                                    {!! Form::open(['method'=> 'DELETE','route' => ['permissions.destroy', $permission->id]]) !!}
                                    {!! Form::submit('Delete',['class'=>'btn btn-danger','onclick' => "return confirm('Do you want to delete this field?')"]) !!}
                                    {!! Form::close() !!}
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        {!! $permissions->links() !!}
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