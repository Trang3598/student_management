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
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Student</th>
                        <th>Subject</th>
                        <th>Score</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(sizeof($studentsubjects) > 0 )
                        @foreach($studentsubjects as $studentsubject)
                            <tr class="odd gradeX" align="center">
                                <td>{{isset($studentsubject->id)? $studentsubject->id:''}}</td>
                                <td>{{(isset($studentsubject->student)) ?$studentsubject->student->name:''}}</td>
                                <td> {{(isset($studentsubject->subject)) ?$studentsubject->subject->name:''}}</td>
                                <td>{{$studentsubject->score}}</td>
                                <td class="center">
                                    <button class="btn btn-success"><a style="color: white"
                                                                       href="{{route('studentsubject.edit',$studentsubject->id)}}">Edit</a>
                                    </button>
                                </td>
                                <td> {!! Form::open(['method'=> 'DELETE','route' => ['studentsubject.destroy', $studentsubject->id]]) !!}
                                    {!! Form::submit('Delete',['class'=>'btn btn-danger','onclick' => "return confirm('Do you want to delete this field?')"]) !!}
                                    {!! Form::close() !!}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        @endif
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        {!! $studentsubjects->links() !!}
    </div>

    <!-- /#page-wrapper -->
@endsection