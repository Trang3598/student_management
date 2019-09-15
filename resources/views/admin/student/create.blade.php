@extends('admin.layout.index')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-hover">
                        <tr>
                            <td class="col-lg-6">
                                <h1 class="page-header">{{__('message.student')}}
                                    <small>{{__('message.add')}}</small>
                                </h1>
                            </td>
                            <td class="col-lg-6">
                                <h1 class="page-header">
                                    <small>{{__('message.create')}}</small>
                                </h1>
                            </td>
                        </tr>
                    </table>

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-6" style="padding-bottom:120px">
                    {!! Form::open(['route'=>'student.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        {!! Form::label(__('message.class')) !!}
                        {!! Form::select('class_code', ['' => __('message.please_enter_class')] + $cls,\Request::get('class_code'), ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label(__('message.name')) !!}
                        {!! Form::text('name',old('name'),['class'=> 'form-control','placeholder' => __('message.please_enter_name')]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label(__('message.birthday')) !!}
                        {!! Form::date('birthday',old('birthday'),['class'=> 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label(__('message.number_phone'))!!}
                        {!! Form::text('phone',old('phone'),['class'=>'form-control','placeholder' => __('message.please_enter_phone')]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::file('image') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label(__('message.address'))!!}
                        {!! Form::text('address',old('address'),['class'=>'form-control','placeholder' => __('message.please_enter_address')]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label(__('message.gender')) !!}
                        <label class="radio-inline">
                            {!! Form::radio('gender','1') !!}{{__('message.male')}}
                        </label>
                        <label class="radio-inline">
                            {!! Form::radio('gender','2') !!}{{__('message.female')}}
                        </label>
                        <label class="radio-inline">
                            {!! Form::radio('gender','3') !!}{{__('message.other')}}
                        </label>
                    </div>
                    {!! Form::hidden('level',0,['class'=> 'form-control']) !!}
                    {!! Form::hidden('student',0,['class'=> 'form-control']) !!}
                </div>

                {{--form of table account--}}
                <div class="col-lg-6" style="padding-bottom:120px">
                    <div class="form-group">
                        {!! Form::label(__('message.username')) !!}
                        {!! Form::text('username',old('username'),['class'=> 'form-control','placeholder' => __('message.please_enter_username')]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label(__('message.password')) !!}
                        {!! Form::password('password',['class'=> 'form-control','placeholder' => __('message.please_enter_password')]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label(__('message.confirm')) !!}
                        {!! Form::password('confirm',['class'=> 'form-control','placeholder' => __('message.please_enter_confirm')]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Email')!!}
                        {!! Form::text('email',old('email'),['class'=>'form-control','placeholder' =>__('message.please_enter_confirm')]) !!}
                    </div>
                    {!! Form::submit(__('message.student_add'),['class'=> 'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
@endsection