@extends('admin.layouts.index')

@section('content')

<div class="row">
    <div class="col-lg-6">
        <h1 class="page-header">{{ trans('student.student') }}
            <small>{{ trans('student.create') }}</small>
        </h1>
    </div>
    <div class="col-lg-6">
        <h1 class="page-header">{{ trans('student.account') }}
            <small>{{ trans('student.create') }}</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-6" style="padding-bottom:120px">
        {!! Form::open(['method' => 'POST', 'route' => ['students.store'] ,'enctype' => "multipart/form-data"]) !!}
        <div class="form-group">
            {{ Form::label('name', trans('student.name'))}}
            {!! Form::text('name', old('name'), ['class' =>"form-control", 'placeholder' => trans('student.placeholder').trans('student.name')]) !!}
            <span style="color: red" class="error-message">{{ $errors->first('name') }}</span>
        </div>
        <div class="form-group">
            {{Form::label('class', trans('student.class'))}}
            <select class="form-control" name="class_code">
                @foreach($classes as $id => $class)
                    <option value="{{ $id }}">{{ $class }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('gender', trans('student.gender')) !!}
            <label class="radio-inline">
                {!! Form::radio('gender', '1',['checked'=>"checked"]) !!} {{trans('student.male')}}
            </label>
            <label class="radio-inline">
                {!! Form::radio('gender', '2') !!} {{trans('student.female')}}
            </label>
        </div>
        <div class="form-group">
            {!! Form::label('birthday', trans('student.birthday')) !!}
            {!! Form::date('birthday',old('birthday'),['class'=>"form-control"]) !!}
            <span style="color: red" class="error-message">{{ $errors->first('birthday') }}</span>
        </div>
        <div class="form-group">
            {!! Form::label('image', trans('student.image')) !!}
            <input type="file" class="form-control" name="image"/>
            <span style="color: red" class="error-message">{{ $errors->first('image') }}</span>
        </div>
        <div class="form-group">
            {!! Form::label('phone', trans('student.phone')) !!}
            {!! Form::number('phone',old('phone'),['class'=>"form-control",'placeholder'=>trans('student.placeholder').trans('student.phone')]) !!}
            <span style="color: red" class="error-message">{{ $errors->first('phone') }}</span>
        </div>
        <div class="form-group">
            {!! Form::label('address', trans('student.address')) !!}
            {!! Form::text('address',old('address'),['class'=>"form-control",'placeholder'=>trans('student.placeholder').trans('student.address')]) !!}
            <span style="color: red" class="error-message">{{ $errors->first('address') }}</span>
        </div>

        {!! Form::submit(trans('student.create'), ['class' => 'btn btn-primary']) !!}
        {!! Form::reset(trans('student.reset'),['class' => 'btn btn-warning']) !!}

    </div>

    <div class="col-lg-6" style="padding-bottom:120px">
        <div class="form-group">
            {{Form::label('username', trans('student.userName'))}}
            {!! Form::text('username', old('username'), ['class' =>"form-control", 'placeholder' => trans('student.placeholder').trans('student.userName')]) !!}
            <span style="color: red" class="error-message">{{ $errors->first('username') }}</span>
        </div>
        <div class="form-group">
            {{Form::label('email', trans('student.email'))}}
            {!! Form::text('email', old('email'), ['class' =>"form-control", 'placeholder' => trans('student.placeholder').trans('student.email')]) !!}
            <span style="color: red" class="error-message">{{ $errors->first('email') }}</span>
        </div>

        <div class="form-group">
            {{Form::label('password', trans('student.password'))}}
            {!! Form::password('password', ['class' =>"form-control", 'placeholder' => trans('student.placeholder').trans('student.password'),'id'=>"password"]) !!}
            <span style="color: red" class="error-message">{{ $errors->first('password') }}</span>
        </div>
        <div class="form-group">
            {{Form::label('password', trans('student.cfPassword'))}}
            {!! Form::password('password_confirmation', ['class' =>"form-control", 'placeholder' => trans('student.placeholder').trans('student.cfPassword')]) !!}
            <span style="color: red" class="error-message">{{ $errors->first('password') }}</span>
        </div>
        <div class="form-group">
            {{Form::label('Role', trans('student.role'))}}
            <select class="form-control" name="role_id">
                @foreach($roles as $id => $role)
                    <option value="{{ $id }}">{{ $role }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
<!-- /.row -->
<script>
    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>



