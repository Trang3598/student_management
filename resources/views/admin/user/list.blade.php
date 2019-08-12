@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>List</small>
                    </h1>
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="odd gradeX" align="center">
                            <td>{{$user->id}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->level == 1)
                                    {{'Admin'}}
                                    @else
                                    {{'Guest'}}
                                    @endif
                            </td>
                            <td class="center"><button class="btn btn-success"><a style="color: white"
                                            href="{{route('user.edit',$user->id)}}">Edit</a></button> </td>
                            <td>
                                {!! Form::open(['route'=>['user.destroy',$user->id],'method' => 'DELETE']) !!}
                                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        {!! $users->links() !!}
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection