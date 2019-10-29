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
                    </table>

                </div>
                <div style="width: 160px">
                    {!! Form::select('pagination', ['0'=>'Open this select menu','50' => '50', '100' => '100','200' => '200'], \Request::get('pagination'),['class'=>'form-control','id'=>'pagination']) !!}
                </div>

                <button class="btn btn-warning" style="float: right"><a
                            href="{{route('student.sendAll')}}"
                            style="color: white"><label>Send Mail To Bad Students</label></a></button>
                {!! Form::close() !!}
                @if(isset($number))
                    <p>Number of records: {{$number}}</p>
                @endif
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
                        @can('student-edit')
                            <th>Edit</th>
                        @endcan
                        @can('student-delete')
                            <th>Delete</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody id='students-crud'>

                    @foreach($students as $student)
                        <tr>
                            <td id="student_id_{{$student->id}}">{{$student->id}}</td>
                            <td id="class_code_{{$student->id}}">{{$student->class_code}}</td>
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
                                <a href="javascript:void(0)" class="show-image"
                                   data-id="{{ $student->id }}">
                                    <img id="image_student_{{$student->id}}" src="images/{{$student->image}}" alt=""
                                         style="height:50px;width: 50px" class="img-responsive"/>
                                </a>
                            </td>
                            <td id="address_{{$student->id}}">{!! $student->address !!}</td>
                            <td id="phone_{{$student->id}}">{!! $student->phone !!}</td>

                            <td id="email_{{$student->id}}">
                                @if(isset($student->user))
                                    {!! $student->user->email !!}
                                @endif
                            </td>
                            <td class="center"><i class="glyphicon glyphicon-send"></i>
                                <a
                                        @if(isset($student->user))
                                        href="{{route('student.sendMail',$student->user->id)}}"
                                        @endif
                                >Send</a>
                            </td>

                            <td class="center"><i class="glyphicon glyphicon-eye-open"></i>
                                <a href="{{route('studentsubject.addmore',$student->id)}}">Show</a>
                            </td>
                            @can('student-edit')
                                <td class="center">
                                    <a href="javascript:void(0)" class="edit-student btn btn-success"
                                       data-id="{{ $student->id }}">Edit</a>
                                </td>
                            @endcan
                            @can('student-delete')
                                <td>
                                    {!! Form::open(['method'=> 'DELETE','route' => ['student.destroy', $student->id]]) !!}
                                    {!! Form::submit('Delete',['class'=>'btn btn-danger','onclick' => "return confirm('Do you want to delete this field?')"]) !!}
                                    {!! Form::close() !!}
                                </td>
                            @endcan
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {!! $students->appends(compact('items'))->links()!!}
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection

@section('form-add')
    <div id="student"></div>
    <script type="text/javascript">
        document.getElementById('pagination').onchange = function () {
            window.location = "{{ $students->url(1) }}&items=" + this.value;
        };
    </script>
    <script type="text/javascript">
        //delete message
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
            //when click button back
            $(document).on('click', '#btn-back', function () {
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
            if ($("#studentForm").length > 0) {
                var actionType = $('#btn-save').val();
                $('#btn-save').html('Sending..');

                $.ajax({
                    data: form_data,
                    url: $('#studentForm').attr('action'),
                    type: "POST",
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $("#student_id_" + data.id).html(data.id);
                        $("#class_code_" + data.id).html(data.class_code);
                        $("#name_" + data.id).html(data.name);
                        $("#gender_" + data.id).html(data.gender);
                        $("#birthday_" + data.id).html(data.birthday);
                        $("#image_student_" + data.id).attr('src', 'images/' + data.image);
                        $("#address_" + data.id).html(data.address);
                        $("#phone_" + data.id).html(data.phone);
                        $("#email_" + data.id).html(data.email);
                        $('#ajax-crud-modal').modal('hide');
                        $('#studentForm').trigger("reset");
                        $('#btn-save').html('Save Changes');
                        $('#showmess').html('Edit successfully').css({'display': 'block'});
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
            }
        });

    </script>
@endsection
@section('show-image')
    <div id="image">
    </div>
    <script>
        $('body').on('click', '.show-image', function () {
            var student_id = $(this).data('id');
            $.get('admin/student/' + student_id + '/showImage', function (data) {
                $("#image").html(data);
                $('#ajax-show-image').modal('show');
            });
        });
    </script>
@endsection