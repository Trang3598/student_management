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
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

            <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    {!! Form::open(['method'=>'POST','route'=> 'class.store']) !!}
                    <div class="form-group">
                        {!! Form::label('Faculty Name') !!}
                        {!! Form::select('faculty_id', ['' => 'Please enter a faculty...'] + $fls,\Request::get('faculty_id'), ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Class Name') !!}
                        {!! Form::text('name',old('name'),['class' =>'form-control', 'placeholder' =>'Please Enter Name Of Class']) !!}
                    </div>
                        {!! Form::submit('Class Add',['class'=>'btn btn-default']) !!}
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