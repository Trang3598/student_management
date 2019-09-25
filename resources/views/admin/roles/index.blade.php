@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Role Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            </div>
        </div>
    </div>
    <div class="col-lg-12">

        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr align="center">
                <th>No</th>
                <th>Name</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a class="btn btn-info"  href="{{ route('roles.show',$role->id) }}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger' ]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>



    {!! $roles->render() !!}

@endsection
