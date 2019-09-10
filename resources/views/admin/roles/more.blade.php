@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
    <div class="col-lg-12" style="padding-bottom:120px">
        {!! Form::open(['method' => 'PUT','route' => ['roles.add',$role->id], 'enctype' => "multipart/form-data"]) !!}
        Vai trò của {{$role->name}}
        <div class="row">
            <div class="form-group col-lg-6">
                {!! Form::label('CÁC VAI TRÒ ','Các vài trò đã có') !!}
                <table class="table table-striped table-bordered table-hover">
                    <tr align="center">
                        <th style="text-align: center">Tên Vai Trò</th>
                        <th style="text-align: center">Bỏ Vai Trò (-)</th>
                    </tr>
                    @foreach($rolehaspermissions as $rolehaspermission)
                        <tr align="center">
                            <td> {{$rolehaspermission->name}}</td>
                            <td class="center"> {!! Form::checkbox('checkbox1[]',$rolehaspermission->id,null) !!}</td>
                        </tr>
                        {!! Form::hidden('role_id',$role->id) !!}
                    @endforeach
                </table>
            </div>
            <div class="form-group col-lg-6">
                {!! Form::label('CÁC VAI TRÒ ','Các vài trò chưa có') !!}
                <table class="table table-striped table-bordered table-hover">
                    <tr align="center">
                        <th style="text-align: center">Tên Vai Trò</th>
                        <th style="text-align: center">Thêm Vai Trò (+)</th>
                    </tr>
                    @foreach($rolehasnotpermissions as $rolehasnotpermission)
                        <tr align="center">
                            <td> {{$rolehasnotpermission->name}}</td>
                            <td class="center"> {!! Form::checkbox('checkbox2[]',$rolehasnotpermission->id,null) !!} </td>
                        </tr>
                        {!! Form::hidden('role_id',$role->id) !!}
                    @endforeach
                </table>
            </div>
        </div>
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <!-- /.row -->

@endsection
