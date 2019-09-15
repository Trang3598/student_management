@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Role Permission
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
                {!! Form::open(['route'=>['roles.addPermission',$role->id],'method' => 'POST']) !!}
                {{--<td> {!! Form::text('name',null, array('placeholder' => 'Name','class' => 'form-control')) !!}</td>--}}
                <br>
                <table class="table table-striped table-bordered table-hover" style="text-align: center">
                    <thead>
                    <tr style="text-align: center">
                        <th>ID</th>
                        <th>Permisson</th>
                        <th>Choose</th>
                    </tr>
                    @foreach($permissions as $key => $permission)
                        <input type="hidden" value="{{$role->id}}" name="role_id[]">
                        <tr>
                            <td>{{$permission->id}}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <input type="checkbox" name="permission_id[]" value="{{ $permission->id}}"
                                           {{--@if (count($case->services->where('id', $permission->id)))--}}
                                       {{--checked--}}
                                        {{--@endif>--}}
                            </td>
                        </tr>
                    @endforeach

                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success" style="float: right">Send</button>
                {!! Form::close() !!}
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        {{--{!! $permissions->links() !!}--}}
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