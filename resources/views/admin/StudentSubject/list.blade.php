@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Results of Students
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Student code</th>
                        <th>Subject code</th>
                        <th>Score</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($studentsubject as $sb)
                        <tr class="odd gradeX" align="center">
                            <td>{{$sb->id}}</td>
                            <td>{{$sb->student_code}}</td>
                            <td>{{$sb->subject_code}}</td>
                            <td>{{$sb->score}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="studentsubject/"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection