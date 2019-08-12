@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Class
                        <small>Edit</small>
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
                    {!! Form::open(['method'=>'PUT','route'=> ['class.update','class'=>$class]]) !!}
                    <div class="form-group">
                        {!! Form::label('faculty') !!}
                        {!! Form::select('faculty_id', ['' => 'Please enter a faculty...'] + $fls,$class->faculty_id, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('class') !!}
                        {!! Form::text('name',$class->name,['class' =>'form-control']) !!}
                    </div>
                        {!! Form::submit('Class Edit',['class'=> 'btn btn-default']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    </div>
@endsection