@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Account
                        <small>Information</small>
                    </h1>
                    <div class="alert alert-success" id="showmess" style="display: none">
                    </div>
                    <!-- /.col-lg-12 -->

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
                    <div class="col-lg-12" style="padding-bottom:120px">
                        {!! Form::open(['route'=>['student.updateAccount','user' => $user->id],'id'=> 'userForm','method'=>'POST','enctype'=>'multipart/form-data']) !!}

                        <table class="table table-striped table-bordered table-hover">
                                <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
                            <tr>
                                <td colspan="2">
                                    <h2>Profile</h2>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('Image') !!}
                                </td>
                                <td>
                                    @if(isset($student[0]->image))

                                        {!! Form::file('image') !!}
                                        <br>
                                        <img id="image_student" src="images/{{$student[0]->image}}" alt=""
                                             style="height:100px;width: 100px" class="img-responsive"/>
                                        <span class="text-danger">
                                        <strong id="image-error" class="show-error"></strong>
                                    </span>
                                    @else
                                        {!! Form::file('image') !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('Name') !!}
                                </td>
                                <td>
                                    @if(isset($student[0]->name))
                                        {!! Form::text('name',$student[0]->name,['class'=>'form-control','placeholder'=>'Please enter name','id' => 'name-student']) !!}
                                        <span class="text-danger show-error text-xl-center" id="name-error">
                                    </span>
                                    @else
                                        {!! Form::text('name',\Request::get('name'),['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('Class') !!}
                                </td>
                                <td id="class_code_student">
                                    @if(isset($student[0]->class_code))
                                        {!! Form::select('class_code', ['' => 'Please enter a class...'] +$cls,$student[0]->class_code, ['class'=>'form-control','id'=>'name-class_code']) !!}
                                        <span class="text-danger">
                                        <strong id="class_code-error" class="show-error"></strong>
                                    </span>
                                    @else
                                        {!! Form::select('class_code', ['' => 'Please enter a class...'] +$cls,\Request::get('class_code'),['class'=>'form-control','id'=>'name-class_code']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('Birthday') !!}
                                </td>
                                <td id="birthday_student">
                                    @if(isset($student[0]->birthday))
                                        {!! Form::date('birthday',$student[0]->birthday,['class'=>'form-control','placeholder'=>'Please enter birthday','id'=>'name-birthday']) !!}
                                        <span class="text-danger">
                                        <strong id="birthday-error" class="show-error"></strong>
                                    </span>
                                    @else
                                        {!! Form::date('birthday',\Request::get('birthday'),['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td> {!! Form::label('Address') !!}</td>
                                <td id="address_student">
                                    @if(isset($student[0]->address))
                                        {!! Form::text('address',$student[0]->address,['class'=>'form-control','placeholder'=>'Please enter address','id'=>'name-address']) !!}
                                        <span class="text-danger">
                                            <strong id="address-error" class="show-error"></strong>
                                    </span>
                                    @else
                                        {!! Form::text('address',\Request::get('address'),['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('Gender') !!}
                                </td>
                                <td id="gender_student">
                                    @if(isset($student[0]->gender))
                                        <label class="radio-inline">
                                            {!! Form::radio('gender','1',$student[0]->gender ==1) !!}{{'Male'}}
                                        </label>
                                        <label class="radio-inline">
                                            {!! Form::radio('gender','2', $student[0]->gender == 2) !!}{{'Female'}}
                                        </label>
                                        <label class="radio-inline">
                                            {!! Form::radio('gender','3', $student[0]->gender == 3) !!}{{'Other'}}
                                        </label>
                                    @else
                                        <label class="radio-inline">
                                            {!! Form::radio('gender','1',\Request::get('gender') == 1 )!!}{{'Male'}}
                                        </label>
                                        <label class="radio-inline">
                                            {!! Form::radio('gender','2',\Request::get('gender') == 2 )!!}{{'Female'}}
                                        </label>
                                        <label class="radio-inline">
                                            {!! Form::radio('gender','3',\Request::get('gender') == 3 )!!}{{'Other'}}
                                        </label>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h2>Contact</h2>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('Number Phone') !!}
                                </td>
                                <td id="phone_student">
                                    @if(isset($student[0]->phone))
                                        {!! Form::text('phone',$student[0]->phone,['class'=>'form-control']) !!}
                                        <span class="text-danger">
                                        <strong id="phone-error" class="show-error"></strong>
                                    </span>
                                    @else
                                        {!! Form::text('phone',\Request::get('phone'),['class'=>'form-control']) !!}
                                    @endif
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('Email') !!}
                                </td>
                                <td id="email_student">
                                    @if(isset($user->email))
                                        {!! Form::text('email',$user->email,['class'=>'form-control']) !!}
                                        <span class="text-danger">
                                        <strong id="email-error" class="show-error"></strong>
                                    </span>
                                    @else
                                        {!! Form::text('email',\Request::get('email'),['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <input type="submit" id="edit-user" data-id="{{ $user->id }}"
                               class="btn btn-info" value="Save">
                        {!! Form::close() !!}

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <!-- /#wrapper -->
        <script>
            $(document).ready(function () {
                $(document).on('submit', '#userForm', function (event) {
                    event.preventDefault();
                    var user_id = $('#edit-user').data('id');
                    var form_data = new FormData($(this)[0]);
                    $('.show-error').html('');
                    $.ajax({
                        data: form_data,
                        url: 'admin/student/account/update/' + user_id,
                        type: "POST",
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $("#class_code_student").val(data.class_code);
                            $("#name_student").val(data.student.name);
                            $("#birthday_student").val(data.student.birthday);
                            $("#image_student").attr('src', 'images/' + data.student.image);
                            $("#address_student").val(data.student.address);
                            $("#phone_student").val(data.student.phone);
                            $("#email_student").val(data.user.email);
                            $('.show-error').html('');
                            $('#showmess').html('Edit successfully');
                            $('#showmess').show();
                            $('#showmess').fadeOut(3000);

                        },
                        error: function (data) {
                            if (data.responseJSON.errors) {
                                if (data.responseJSON.errors.class_code) {
                                    $('#class_code-error').html(data.responseJSON.errors.class_code);
                                }
                                if (data.responseJSON.errors.name) {
                                    $('#name-error').html(data.responseJSON.errors.name);
                                }
                                if (data.responseJSON.errors.birthday) {
                                    $('#birthday-error').html(data.responseJSON.errors.birthday);
                                }
                                if (data.responseJSON.errors.phone) {
                                    $('#phone-error').html(data.responseJSON.errors.phone);
                                }
                                if (data.responseJSON.errors.image) {
                                    $('#image-error').html(data.responseJSON.errors.image);
                                }
                                if (data.responseJSON.errors.address) {
                                    $('#address-error').html(data.responseJSON.errors.address);
                                }
                                if (data.responseJSON.errors.gender) {
                                    $('#gender-error').html(data.responseJSON.errors.gender);
                                }
                                if (data.responseJSON.errors.phone) {
                                    $('#phone-error').html(data.responseJSON.errors.phone);
                                }
                                if (data.responseJSON.errors.email) {
                                    $('#email-error').html(data.responseJSON.errors.email);
                                }
                            }
                        }
                    })
                })
            });
        </script>
@endsection