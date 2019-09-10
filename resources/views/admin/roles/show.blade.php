@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-12">

                <h1 class="page-header">
                    <small>Chức năng của</small>
                    {{$role->name}}
                </h1>
            </div>
        </div>
        <div class="col-lg-6">
            <table class="table table-striped table-bordered table-hover " >
                <thead>
                <tr align="center">
                    <th>Permission</th>
                </tr>
                </thead>
                <tbody>

                @foreach($permissions as $permission)
                    <tr class="odd gradeX" align="center">
                        <td>{{$permission->permissions->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->

@endsection

