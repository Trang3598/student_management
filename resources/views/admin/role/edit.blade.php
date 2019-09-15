@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Role
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::open(['method' => 'PUT', 'route' => ['roles.update', $role->id]]) !!}
                    <div class="form-group">
                        {!!  Form::label('name', 'Name') !!}
                        {!!  Form::text('name', $role->name, ['class' => 'form-control']) !!}
                    </div>
                        <div class="form-group">
                            {!!  Form::label('guard_name', 'Guard Name') !!}
                            {!!  Form::text('guard_name', $role->guard_name, ['class' => 'form-control']) !!}
                        </div>
                    {!! Form::submit('Role Edit', ['class' => 'btn btn-default']) !!}
                    {!! Form::close() !!}


                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    </div>

@endsection