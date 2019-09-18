@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Role</h2>
            </div>
        </div>
    </div>

    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                <input type="hidden" name="guard_name" value="web">
            </div>
            <div class="form-group">
                <strong>Permission:</strong>
                <br/>
                @foreach($permissions as $permission)
                    <label>{{ Form::checkbox('permission[]', $permission->id, false, array('class' => 'name')) }}
                        {{ $permission->name }}</label>
                    <br/>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            {!! Form::close() !!}
        </div>


@endsection
