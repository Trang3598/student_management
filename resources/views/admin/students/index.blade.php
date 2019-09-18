@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
    <div class="col-lg-12">
        <h1 class="page-header">{{ trans('student.student') }}
            <small>{{ trans('student.list') }}</small>
        </h1>
        <div class="alert alert-success" id="showmess" style="display: none">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                {!! Form::open(['method' => 'get', 'url' => route('students.index'), 'enctype' => "multipart/form-data"]) !!}
                <div class="col-lg-6">
                    <Small>
                        {{ trans('student.age') }}
                    </Small>
                    {!! Form::number('min_age', \Request::get('min_age'),['class'=>'form-control','min'=>10,'max'=>70,'placeholder'=> trans('student.placeholderMin').trans('student.age')]) !!}
                    <Small>
                        {{ trans('student.mark') }}
                    </Small>
                    {!! Form::number('min_mark',\Request::get('min_mark'),['class'=>'form-control','min'=>0,'max'=>10,'placeholder'=>trans('student.placeholderMin').trans('student.mark')]) !!}
                    <Small>
                        {{ trans('student.markCount') }}
                    </Small>
                    {!! Form::select('mark_count', ['0' => trans('student.all'), '1' => trans('student.complete'),'2' => trans('student.notComplete')],\Request::get('mark_count'),['class'=>'form-control']) !!}
                    <br>

                </div>
                <div class="col-lg-6">
                    <small>
                        {{ trans('student.to') }}
                    </small>
                    {!! Form::number('max_age',\Request::get('max_age'),['class'=>'form-control','min'=>10,'max'=>70,'placeholder'=> trans('student.placeholderMax').trans('student.age')]) !!}
                    <small>
                        {{ trans('student.to') }}
                    </small>
                    {!! Form::number('max_mark',\Request::get('max_mark'),['class'=>'form-control','min'=>0,'max'=>10,'placeholder'=>trans('student.placeholderMax').trans('student.mark')]) !!}
                </div>
            </div>
            <div>
                <Small>
                    {{ trans('student.telecoms') }}
                </Small>
                <label class="radio-inline">
                    {{ Form::checkbox(sprintf('phones[%s]', \App\Models\Student::VINA),\App\Models\Student::VINA, isset(\Request::get('phones')[0]) && \Request::get('phones')[\App\Models\Student::VINA] == \App\Models\Student::VINA) }}
                    <small>Vinaphone</small>
                </label>
                <label class="radio-inline">
                    {{ Form::checkbox(sprintf('phones[%s]', \App\Models\Student::MOBI),1, !empty(\Request::get('phones')[1]) && \Request::get('phones')[1] == 1) }}
                    <small>Mobiphone</small>
                </label>
                <label class="radio-inline">
                    {{ Form::checkbox(sprintf('phones[%s]', \App\Models\Student::VIETTEL),2,!empty(\Request::get('phones')[2]) && \Request::get('phones')[2] == 2) }}
                    <small>Viettel</small>
                </label>
            </div>

            <button type="submit" class="btn btn-primary">{{ trans('student.search') }}</button><br>
            <div class="row" style="padding-top: 10px">
                <div class="col-lg-2">
                    {!! Form::select('pagination', ['10' => '10', '20' => '20','50' => '50'], \Request::get('pagination'),['class'=>'form-control','id'=>'pagination']) !!}
                </div>
            </div>
            {!! Form::close() !!}<br>
        </div>
        <div class="col-lg-6">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">{{ trans('student.status') }}</th>
                    <th scope="col">{{ trans('student.display') }}</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{ trans('student.warning') }}</th>
                    <td>
                        {!! Form::open(['method' => 'GET','route' =>'students.email']) !!}
                        <button type="submit" class="btn btn-warning">{{ trans('student.show') }}</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr align="center">
            <th>{{ trans('student.id') }}</th>
            <th>{{ trans('student.className') }}</th>
            <th>{{ trans('student.student') }}</th>
            <th>{{ trans('student.gender') }}</th>
            <th>{{ trans('student.birthday') }}</th>
            <th>{{ trans('student.image') }}</th>
            <th>{{ trans('student.address') }}</th>
            <th>{{ trans('student.phone') }}</th>
            @can('role-edit')
            <th>{{ trans('student.edit') }}</th>
            @endcan
            @can('role-delete')
            <th>{{ trans('student.delete') }}</th>
            @endcan
            @can('role-list')
            <th>{{ trans('student.point') }}</th>
            @endcan
            @can('role-create')
            <th>{{ trans('student.addMoreResult') }}</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr class="odd gradeX" align="center" id="{{$student->id}}">
                <td>{{$student->id}}</td>
                <td class="class-name">{{$student->students->name}}</td>
                <td class="student-name">{{$student->name}}</td>
                <td class="student-gender">@if($student->gender == 1) {{ trans('student.male') }} @else {{ trans('student.female') }} @endif</td>
                <td class="student-birthday">{{$student->birthday}}</td>
                <td class="student-image"><img src="{{ asset('img/' . $student->image) }}" style="width: 50px;height: 50px"></td>
                <td class="student-address">{{$student->address}}</td>
                <td class="student-phone">{{$student->phone}}</td>
                @can('role-edit')
                <td class="center">
                    <a href="javascript:void(0)" id="edit-user" data-id="{{$student->id}}" class="btn btn-info">{{ trans('student.edit') }}</a>
                </td>
                @endcan
                @can('role-delete')
                <td class="center">
                    {!! Form::open(['method'=>"Post",'route'=>['students.destroy',$student->id]]) !!}
                    <input type="hidden" name="_method" value="{{ trans('student.delete') }}">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('{{ trans('student.checkDelete') }}')">{{ trans('student.delete') }}</button>
                    {!! Form::close() !!}
                </td>
                @endcan
                @can('role-list')
                <td class="center"><a class="btn btn-primary" href="{{route('students.show',['Student'=>$student])}}">{{ trans('student.show') }}</a></td>
                @endcan
                @can('role-create')
                <td>
                    {!! Form::open(['method' => 'GET','route' => ['students.more',$student->slug]]) !!}
                    <button type="submit" class="btn btn-success">{{ trans('student.add') }}</button>
                    {!! Form::close() !!}
                </td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

    <div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="userCrudModal"></h4>
                </div>
                <div class="modal-body">
                    <form id="studentForm" name="studentForm"
                          class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="student_id" id="student_id">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-12">Class</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="class_code" id="class_code">
                                    <option value="">Please enter a class ...</option>
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}" id="class_{{$class->id}}">{{$class->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="class_code-error"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name"  name="name" placeholder="Enter Name"
                                       maxlength="50" required="">
                                <span class="text-danger" id="name-error"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Birthday</label>
                            <div class="col-sm-12">
                                <input type="date" name="birthday" class="form-control" id="birthday">
                                <span class="text-danger" id="birthday-error"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Phone</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="phone" name="phone"
                                       placeholder="Enter Phone" required="">
                                <span class="text-danger" id="phone-error"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Image</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="image" name="image">
                                {{--<img src="images/{{$student->image}}" style="width: 50px; height: 50px">--}}
                                <span class="text-danger" id="image-error"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Address</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="address" name="address"
                                       placeholder="Enter Address" required="">
                                <span class="text-danger" id="address-error"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Gender</label>
                            <div class="col-sm-12">
                                <input id="gender" name="gender" value="1" type="radio">Male
                                <input id="gender" name="gender" value="2" type="radio">Female
                            </div>
                            <span class="text-danger" id="gender-error"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" value="create">Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{ $students->appends(\Request::all())->links() }}
    <?php
        $cloneClass = json_encode($classes);
    ?>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
            });
            /*  When user click add user button */
            $('#create-new-user').click(function () {
                $('#btn-save').val("create");
                $('#userForm').trigger("reset");
                $('#ajax-crud-modal').modal('show');
            });

            /* When click edit user */
            $('body').on('click', '#edit-user', function () {
                var id = $(this).data('id');
                $.get('students/' + id + '/edit', function (data) {
                    $('#userCrudModal').html("Edit User");
                    $('#btn-save').val("edit-user");
                    $('#ajax-crud-modal').modal('show');
                    $('#student_id').val(data.id);
                    $('#name').val(data.name);
                    $('#class_code option[value="' + data.class_code + '"]').prop('selected', true);

                    if (data.gender == 1) {
                        $("input:radio[value=1]").prop('checked', true);
                    } else {
                        $("input:radio[value=2]").prop('checked', true);
                    }

                    $('#birthday').val(data.birthday);
                    $('#phone').val(data.phone);
                    $('#address').val(data.address);
                })
            });
        });
        $(document).on('click', '#btn-save', function (event) {
            var class_list = JSON.parse('<?= $cloneClass; ?>');
            event.preventDefault();
            var form_data = new FormData($('#studentForm')[0]);
            var student_id =  $('#student_id').val();
            form_data.append('_method', 'put');
            if ($("#studentForm").length > 0) {
                var actionType = $('#btn-save').val();
                $('#btn-save').html('Sending..');
                $('.text-danger').html('');
                $.ajax({
                    data: form_data,
                    url: 'students/' + student_id,
                    type: "POST",
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajax-crud-modal').modal('hide');
                        $("#student_id_" + data.id).html(data.id);


                        $("tr#" + data.id).children("td.class-name").html(class_list[data.class_code-1].name);
                        $("tr#" + data.id).children("td.student-name").html(data.name);
                        if (data.gender == 1) {
                            $("tr#" + data.id).children("td.student-gender").html('Male');
                        }else {
                            $("tr#" + data.id).children("td.student-gender").html('Female');
                        }
                        $("tr#" + data.id).children("td.student-birthday").html(data.birthday);
                        if (data.image) {
                            $("tr#" + data.id).find("td.student-image img").attr('src', data.image);
                        }
                        $("tr#" + data.id).children("td.student-address").html(data.address);
                        $("tr#" + data.id).children("td.student-phone").html(data.phone);
                        $("#class_code_" + data.id).html(data.class_code);
                        $("#name_" + data.id).html(data.name);
                        $("#gender" + data.id).html(data.gender);
                        $("#birthday_" + data.id).html(data.birthday);
                        $("#image_student_" + data.id).html('src', 'img/' + data.image);
                        $("#address_" + data.id).html(data.address);
                        $("#phone_" + data.id).html(data.phone);
                        $("#email_" + data.id).html(data.email);
                        $('.show-error').html('');
                        $('#studentForm').trigger("reset");
                        $('#btn-save').html('Save Changes');
                        $('.loading').hide();
                    },
                    error: function (data) {
                        var errors = data.responseJSON.errors;
                        if (errors) {
                            $('#name-error').html(errors.name);
                            $('#class-error').html(errors.class_code);
                            $('#birthday-error').html(errors.birthday);
                            $('#gender-error').html(errors.gender);
                            $('#phone-error').html(errors.phone);
                            $('#image-error').html(errors.image);
                            $('#btn-save').html('Save Changes');
                        }
                    }
                })
            }
        })
    </script>
@endsection
