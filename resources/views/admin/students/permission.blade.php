@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Permission of {{$student['name']}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
            </div>
        </div>
    </div>
    {!! Form::open(['method' => 'PUT','route' => ['students.updatePermission', $student->id]]) !!}
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>{{trans('student.role')}}</strong>
                {!! Form::text('name', $role->name, array('placeholder' => 'Name','class' => 'form-control','readonly' =>"False")) !!}
            </div>
            <div class="form-group">
                <strong>Permission:</strong>
                <br/>
                @foreach($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id,in_array($value->id, $rolePermissions) ? true : false,in_array($value->id, $rolePermission1) ? ['disabled' =>'disabled']:[] , array('class' => 'name'))}}
                        {{ $value->name }}</label>
                    <br/>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}

@endsection

