@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Student
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Class code</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Birthday</th>
                        <th>Image</th>
                        <th>Address</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($student as $st)
                    <tr class="odd gradeX" align="center" enctype="multipart/form-data">
                        <td>{{$st->id}}</td>
                        <td>{{$st->class_code}}</td>
                        <td>{{$st->name}}</td>
                        <td>
                            @if($st->gender == 1)
                                {{'Male'}}
                                @elseif($st->gender == 2)
                                {{'Female'}}
                                @else
                                {{'Other'}}
                                @endif
                            </td>
                        <td>{{$st->birthday}}</td>
                        <td><img src="images/{{$st->image}}" alt="" style="height: 100px;width: 150px"/></td>
                        <td>{{$st->address}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/student/delete/{{$st->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/student/edit/{{$st->id}}">Edit</a></td>
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