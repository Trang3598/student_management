@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Register
                        <small>Subject</small>
                    </h1>
                    <div class="message_warning">
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                                <button style="float: right;border: none;background-color: #dff0d8">X</button>
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                                <button style="float: right;border: none;background-color: #f2dede">X</button>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    @if(isset($student[0]->id))
                    <tr>
                        <td colspan="3"><h4>List of unregistered subjects</h4></td>
                    </tr>
                    <tr style="text-align: center">
                        {{--<th>ID</th>--}}
                        <th>Subject</th>
                        <th>Credit</th>
                        <th>Check</th>
                    </tr>
                    </thead>
                    <tbody>

                    {!! Form::open(['route'=>['studentsubject.insertRegisteredSubjects',$id],'method' => 'POST']) !!}
                    <input type="hidden" name="student_code" value="{{$student[0]->id}}">
                    @isset($subjects)
                        @foreach($subjects as $subject)
                            <tr class="odd gradeX" align="center">
                                <td>
                                    {{$subject->name}}
                                </td>
                                <td>
                                    {{$subject->number}}
                                </td>
                                <td><input type="checkbox" name="subject_code[]" value="{{$subject->id}}"
                                           id="chooseSubject_{{$subject->id}}">
                                    <input type="hidden" name="score[]" value="0">
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success">Confirm</button>
                {!! Form::close() !!}
                @else
                    <h2>No data available for this user</h2>
                @endif
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('div.message_warning').on('click', function () {
                $('div.message_warning').remove();
            });
        });
    </script>
    <!-- /#page-wrapper -->
@endsection