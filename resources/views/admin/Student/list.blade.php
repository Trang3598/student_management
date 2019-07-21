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
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
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
                    @foreach($students as $student)
                        <tr class="odd gradeX" align="center" enctype="multipart/form-data">
                            <td>{{$student->id}}</td>
                            <td>{{(isset($student->classM->name)) ?$student->classM->name:''}}</td>
                            <td>{{$student->name}}</td>
                            <td>
                                @if($student->gender == 1)
                                    {{'Male'}}
                                @elseif($student->gender == 2)
                                    {{'Female'}}
                                @else
                                    {{'Other'}}
                                @endif
                            </td>
                            <td>{{$student->birthday}}</td>
                            <td><img src="images/{{$student->image}}" alt="" style="height: 100px;width: 150px"/></td>
                            <td>{!! $student->address !!}</td>

                            <td>
                                {!! Form::open(['method'=> 'DELETE','route' => ['student.destroy', $student->id]]) !!}
                                {!! Form::submit('Delete',['class'=>'btn btn-instagram']) !!}
                                {!! Form::close() !!}
                                {{--<button class="btn btn-instagram" type="submit" onclick="return confirm('Do you want to delete this field?')"><a> Delete</a></button>--}}
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="{{route('student.edit',$student->id)}}">Edit</a></td>
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