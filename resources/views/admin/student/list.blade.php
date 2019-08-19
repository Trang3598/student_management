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
                    <div class="alert alert-success" id="showmess" style="display: none">

                    </div>
                    <div class="edit-form">
                    </div>
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
                                {{Form::checkbox('phone[1]','1',!empty(\Request::get('phone')[1]) && \Request::get('phone')[1] == 1)}}
                                Viettel
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
                    {{--</form>--}}
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
                    <tbody id='students-crud'>

                    @foreach($students as $student)
                        <tr>
                            <td id="student_id_{{$student->id}}">{{$student->id}}</td>
                            <td id="class_code_{{$student->id}}">{{(isset($student->classM->name)) ?$student->classM->name:''}}</td>
                            <td id="name_{{$student->id}}">{{$student->name}}</td>
                            <td id="gender_{{$student->id}}">
                                @if($student->gender == 1)
                                    {{'Male'}}
                                @elseif($student->gender == 2)
                                    {{'Female'}}
                                @else
                                    {{'Other'}}
                                @endif
                            </td>
                            <td id="birthday_{{$student->id}}">{{$student->birthday}}</td>
                            <td>
                                <img id="image_student_{{$student->id}}" src="images/{{$student->image}}" alt=""
                                     style="height:50px;width: 50px"
                                     class="img-responsive"/></td>
                            <td id="address_{{$student->id}}">{!! $student->address !!}</td>
                            <td id="phone_{{$student->id}}">{!! $student->phone !!}</td>
                            <td id="email_{{$student->id}}">{!! $student->user->email !!}</td>
                            <td class="center"><i class="glyphicon glyphicon-send"></i>
                                <a href="{{route('student.sendMail',$student->user->id)}}">Send</a>
                            </td>
                            <td class="center"><i class="glyphicon glyphicon-eye-open"></i>
                                <a href="{{route('studentsubject.addmore',$student->id)}}">Show</a>
                            </td>
                            <td class="center">
                                <a href="javascript:void(0)" class="edit-student btn btn-success"
                                   data-id="{{ $student->id }}">Edit</a>
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
@section('form-add')
    <div id="student">
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('div.message_warning').on('click', function () {
                $('div.message_warning').remove();
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click','#btn-back',function () {
                $('#ajax-crud-modal').hide();
            });
            // /* When click edit user */
            $('body').on('click', '.edit-student', function () {
                var student_id = $(this).data('id');
                $.get('admin/student/' + student_id + '/edit', function (data) {
                    $("#student").html(data);
                    $('#studentCrudModal').html("Edit Student");
                    $('#btn-save').val("edit-student");
                    $('#ajax-crud-modal').modal('show');
                    $('#student_id').val(data.id);
                })
            });
        });
        $(document).on('click', '#btn-save', function (event) {
            event.preventDefault();
            var form_data = new FormData($('#studentForm')[0]);
            form_data.append('_method', 'patch');
            $.ajax({
                data: form_data,
                url: $('#studentForm').attr('action'),
                type: "POST",
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#ajax-crud-modal').modal('hide');
                    $("#student_id_" + data.id).html(data.id);
                    $("#class_code_" + data.id).html(data.class_code);
                    $("#name_" + data.id).html(data.name);
                    $("#gender_" + data.id).html(data.gender);
                    $("#birthday_" + data.id).html(data.birthday);
                    $("#image_student_" + data.id).attr('src', 'images/' + data.image);
                    $("#address_" + data.id).html(data.address);
                    $("#phone_" + data.id).html(data.phone);
                    $("#email_" + data.id).html(data.email);

                    $('#studentForm').trigger("reset");
                    $('#btn-save').html('Save Changes');
                    $('#showmess').html('done').css({'display':'block'});
                },
                error: function (data) {
                    console.log(data.responseJSON.errors.address);
                    if (data.responseJSON.errors) {
                        if (data.responseJSON.errors.class_code) {
                            $('#class_code-error').html(data.responseJSON.errors.class_code);
                        }
                        if (data.responseJSON.errors.name) {
                            $('#name-error').html(data.responseJSON.errors.name);
                        }
                        if (data.responseJSON.errors.birthday) {
                            $('#birthday-error').html(data.responseJSON.errors.birthday);
                        }
                        if (data.responseJSON.errors.phone) {
                            $('#phone-error').html(data.responseJSON.errors.phone);
                        }
                        if (data.responseJSON.errors.image) {
                            $('#image-error').html(data.responseJSON.errors.image);
                        }
                        if (data.responseJSON.errors.address) {
                            $('#address-error').html(data.responseJSON.errors.address);
                        }
                        if (data.responseJSON.errors.gender) {
                            $('#gender-error').html(data.responseJSON.errors.gender);
                        }
                        $('#btn-save').html('Save Changes');
                        $('#image').val('');
                    }
                }
            });
        });

    </script>
@endsection