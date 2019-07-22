@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
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
                    <h1 class="page-header">Subject
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Subject</th>
                        <th>Number (Tín chỉ)</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($subject)>0)
                    @foreach($subject as $sub)
                        <tr class="odd gradeX" align="center">
                            <td>{{$sub -> id}}</td>
                            <td>{{$sub -> name}}</td>
                            <td>{{$sub -> number}}</td>
                            <td class="center">
                                <form action="{{route('subjects.destroy',$sub->id)}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o  fa-fw"></i></button>
                                    @csrf
                                </form>
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{{route('subjects.edit',['Subject'=>$sub])}}">Edit</a></td>
                        </tr>
                    @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.row -->

@endsection
