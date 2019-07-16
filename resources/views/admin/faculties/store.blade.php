@extends('admin.layouts.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    @if(session('delete'))
        <div class="alert alert-success">
            {{session('delete')}}
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Faculty
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Faculty</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($faculty as $fy)
                <tr class="odd gradeX" align="center">
                    <td>{{$fy -> id}}</td>
                    <td>{{$fy -> name}}</td>
                    <td class="center" onclick="return confirm('Are you sure want to delete item ?')"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('faculties.destroy',['Faculty'=>$fy])}}">Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{{route('faculties.edit',['Faculty'=>$fy])}}">Edit</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
