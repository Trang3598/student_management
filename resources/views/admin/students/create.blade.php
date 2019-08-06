@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Student
                <small>Create</small>
            </h1>
        </div>
        <div class="col-lg-6">
            <h1 class="page-header">Account
                <small>Create</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-6" style="padding-bottom:120px">
            {!! Form::open(['method' => 'POST', 'route' => ['students.store'] ,'enctype' => "multipart/form-data"]) !!}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {!! Form::text('name', old('name'), ['class' =>"form-control", 'placeholder' => "Please Enter Student Name"]) !!}
            </div>
            <div class="form-group">
                {{Form::label('class', 'Class')}}
                <select class="form-control" name="class_code">
                    @foreach($classes as $id => $class)
                        <option value="{{ $id }}">{{ $class }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('gender', 'Gender') !!}
                <label class="radio-inline">
                    {!! Form::radio('gender', '1',['checked'=>"checked"]) !!}Male
                </label>
                <label class="radio-inline">
                    {!! Form::radio('gender', '2') !!}Female
                </label>
            </div>
            <div class="form-group">
                {!! Form::label('birthday', 'Birthday') !!}
                {!! Form::date('birthday',old('birthday'),['class'=>"form-control"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                <input type="file" class="form-control" name="image"/>
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Phone') !!}
                {!! Form::number('phone',old('phone'),['class'=>"form-control",'placeholder'=>"Please Enter Your Phone"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('address', 'Address') !!}
                {!! Form::text('address',old('address'),['class'=>"form-control",'placeholder'=>"Please Enter Your Address"]) !!}
            </div>
            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            {!! Form::button('Reset',['class' => 'btn btn-warning']) !!}

        </div>

        <div class="col-lg-6" style="padding-bottom:120px">
            <div class="form-group">
                {{Form::label('user', 'User')}}
                {!! Form::text('user', old('user'), ['class' =>"form-control", 'placeholder' => "Please Enter User Name"]) !!}
            </div>
            <div class="form-group">
                {{Form::label('email', 'Email')}}
                {!! Form::text('email', old('email'), ['class' =>"form-control", 'placeholder' => "Please Enter Your Email"]) !!}
            </div>
            <div class="form-group">
                {{Form::label('password', 'Password')}}
                {!! Form::password('password', ['class' =>"form-control", 'placeholder' => "Please Enter Password",'id'=>"password"]) !!}
            </div>
            <div class="form-group">
                {{Form::label('password', 'Confirm Password')}}
                {!! Form::password('password_confirmation', ['class' =>"form-control", 'placeholder' => "Please Confirm Password"]) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
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


@endsection
