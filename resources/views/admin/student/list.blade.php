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
                    {!! Form::open(['method' => 'GET','route' => 'student.index']) !!}
                        <table class="table table-hover" style="width:600px">
                            <tr>
                                <td>Age</td>
                                <td>{{Form::number('min_age',\Request::get('min_age'),['class' => 'form-control'])}}</td>
                                <td align="center">TO</td>
                                <td>{{Form::number('max_age',\Request::get('max_age'),['class' => 'form-control'])}}</td>
                            </tr>
                            <tr>
                                <td>Score</td>
                                <td>{{Form::number('min_score',\Request::get('min_score'),['class' => 'form-control'])}}</td>
                                <td align="center">TO</td>
                                <td>{{Form::number('max_score',\Request::get('max_score'),['class' => 'form-control'])}}</td>

                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td colspan="3">
                                    {{Form::checkbox('phone[1]','1',!empty(\Request::get('phone')[1]) && \Request::get('phone')[1] == 1)}}Viettel
                                    {{Form::checkbox('phone[2]','2',!empty(\Request::get('phone')[2]) && \Request::get('phone')[2]== 2)}}
                                    Mobiphone
                                    {{Form::checkbox('phone[3]','3',!empty(\Request::get('phone')[3]) && \Request::get('phone')[3] == 3)}}
                                    Vinaphone
                                </td>
                            </tr>
                            <tr>
                                <td>Show</td>
                                <td colspan="3">
                                    {!! Form::select('showList', ['0' => 'All', '1' => 'Studied All Subject','2' => 'Did Not Study All Subject'], \Request::get('showList'),['class'=>'form-control']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button class="btn btn-warning"><a
                                                href="{{route('student.sendAll')}}"
                                                style="color: white"><label>Send Mail To Bad Students</label></a></button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <!-- /.col-lg-12 -->

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Class</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Birthday</th>
                        <th>Image</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Send Email</th>
                        <th>Show Result</th>
                        <th>Edit</th>
                        <th>Delete</th>
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
                            <td>
                                <img src="images/{{$student->image}}" alt="" style="height:50px;width: 50px"
                                     class="img-responsive"/></td>
                            <td>{!! $student->address !!}</td>
                            <td>{!! $student->phone !!}</td>
                            <td>{!! $student->user->email !!}</td>
                            <td class="center"><i class="glyphicon glyphicon-send"></i>
                                <a href="{{route('student.sendMail',$student->user->id)}}">Send</a>
                            </td>
                            <td class="center"><i class="glyphicon glyphicon-eye-open"></i>
                                <a href="{{route('studentsubject.addmore',$student->id)}}">Show</a>
                            </td>
                            <td class="center">
                                <button class="btn btn-success"><a
                                            href="{{route('student.edit',$student->id)}}" style="color: white">Edit</a>
                                </button>
                            </td>
                            <td>
                                {!! Form::open(['method'=> 'DELETE','route' => ['student.destroy', $student->id]]) !!}
                                {!! Form::submit('Delete',['class'=>'btn btn-danger','onclick' => "return confirm('Do you want to delete this field?')"]) !!}
                                {!! Form::close() !!}
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {!! $students->links() !!}
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

@endsection