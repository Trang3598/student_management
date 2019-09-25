@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">{{ trans('student.role') }}
                <small>{{$student->name}}</small>
            </h1>
        </div>
    </div>
    <div class="col-lg-6" style="padding-bottom:120px">
        {!! Form::open(['method' => 'PUT', 'route' => ['students.updateRole',$student->id]]) !!}
        <div style="margin-bottom: 5px">
            <select class="form-control" name="role_id">
                <option value="">{{ trans('student.pleaseEnterARole') }}</option>
                @foreach($roles as $role)
                    <option value="{{$role->id}}" @if($role_id == $role->id) selected @endif> {{$role->name}}</option>
                @endforeach
            </select>
        </div>
        {!! Form::submit(trans('student.submit'), ['class' => 'btn btn-primary']) !!}
        {!! Form::button(trans('student.reset'),['class' => 'btn btn-warning']) !!}
        {!! Form::close() !!}
    </div>
@endsection
