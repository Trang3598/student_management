@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Class
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    {!! Form::open(['method'=>'PUT','route'=> ['class.update','class'=>$class]]) !!}
                    <div class="form-group">
                        {!! Form::label('Faculty') !!}
                        <select class="form-control" name="Faculty">
                            @foreach($faculties as $faculty)
                                <option value="{{$faculty->id}}" {{ isset($class->$faculty->id) && $faculty->id == $class->faculty->id ? 'selected' : ''}}>{{$faculty->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Class Name') !!}
                        {!! Form::text('name',$class->name,['class' =>'form-control']) !!}
                    </div>
                        {!! Form::submit('Class Edit',['class'=> 'btn btn-default']) !!}
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
@endsection