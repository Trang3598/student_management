@extends('admin.layout.index')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <h1 class="page-header">Class
                        <small>Add</small>
                    </h1>
                </div>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
            <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    {!! Form::open(['method'=>'POST','route'=> 'class.store']) !!}
                    <div class="form-group">
                        {!! Form::label('Faculty Name') !!}
                        <select class="form-control" name="faculty_id">
                            @foreach($faculties as $faculty)
                                <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Class Name') !!}
                        {!! Form::text('name',old('name'),['class' =>'form-control', 'placeholder' =>'Please Enter Name Of Class']) !!}
                    </div>
                        {!! Form::submit('Class Add',['class'=>'btn btn-default']) !!}
                        {!! Form::button('Reset',['class'=>'btn btn-default']) !!}
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