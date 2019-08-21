@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Account
                        <small>Information</small>
                    </h1>
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
                    {!! Form::open(['route'=>['student.updateAccount','user' => $user->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                    <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
                        <h2>Profile</h2>
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <td>
                                    {!! Form::label('Image') !!}
                                </td>
                                <td>
                                    {!! Form::file('image') !!}
                                <br>
                                    <img src="images/{{$student[0]->image}}" style="width: 200px; height: 150px">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('Name') !!}
                                </td>
                                <td>
                                    {!! Form::text('name',$student[0]->name,['class'=>'form-control','placeholder'=>'student']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('Class') !!}
                                </td>
                                <td>
                                    {!! Form::select('class_code', ['' => 'Please enter a class...'] +$cls,$student[0]->class_code, ['class'=>'form-control']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('Birthday') !!}
                                </td>
                                <td>
                                    {!! Form::text('birthday',$student[0]->birthday,['class'=>'form-control','placeholder'=>'student']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td> {!! Form::label('Address') !!}</td>
                                <td>
                                    {!! Form::text('address',$student[0]->address,['class'=>'form-control','placeholder'=>'student']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('Gender') !!}
                                </td>
                                <td>
                                    <label class="radio-inline">
                                        {!! Form::radio('gender','1',$student[0]->gender ==1) !!}{{'Male'}}
                                    </label>
                                    <label class="radio-inline">
                                        {!! Form::radio('gender','2', $student[0]->gender == 2) !!}{{'Female'}}
                                    </label>
                                    <label class="radio-inline">
                                        {!! Form::radio('gender','3', $student[0]->gender == 3) !!}{{'Other'}}
                                    </label>
                                </td>
                            </tr>

                        </table>
                        <h2>Contact</h2>
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <td>
                                    {!! Form::label('Number Phone') !!}
                                </td>
                                <td>
                                    {!! Form::text('phone',$student[0]->phone,['class'=>'form-control']) !!}
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('Email') !!}
                                </td>
                                <td>
                                    {!! Form::text('email',$user->email,['class'=>'form-control']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('Password') !!}
                                </td>
                                <td>
                                    {!! Form::password('password',['class'=>'form-control','placeholder'=>'Please Enter Password']) !!}
                                </td>
                            </tr>
                        </table>
                    {!! Form::submit('Account Edit',['class'=> 'btn btn-default']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    <!-- /#wrapper -->
@endsection