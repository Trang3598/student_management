@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mark
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Students</th>
                        <th>Show</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                    <tr class="odd gradeX" align="center">
                        <td>{{$student->id}}</td>
                        <td>{{$student->name}}</td>
                        <td class="center"><a class="btn btn-primary" href="{{route('marks.show',['Student'=>$student])}}">Show</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
@endsection
