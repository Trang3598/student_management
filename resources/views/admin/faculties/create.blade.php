@extends('admin.layouts.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Faculty
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('notification'))
                        <div class="alert alert-danger">
                            {{session('notification')}}
                        </div>
                    @endif
                    {!! Form::open(['method' => 'POST', 'route' => ['faculties.store']]) !!}
                    <div class="form-group">
                        <label>Faculty Name</label>
                        {!! Form::text('name', old('name'), ['class' =>"form-control", 'placeholder' => "Please Enter Faculty Name"]) !!}
                    </div>
                    <div class="form-group">
                        <label>Faculty Status</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1" checked="" type="radio">Active
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="2" type="radio">Offline
                        </label>
                    </div>
                    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    {!! Form::button('Reset',['class' => 'btn btn-warning']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

@endsection
