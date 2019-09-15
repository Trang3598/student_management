@extends('admin.layout.index')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                {{--{{dd(old('score'))}}--}}
                <div class="col-lg-12">
                    <h1 class="page-header">Result of Student
                        <small>Add More</small>
                    </h1>
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <div class="container">
                        <div class="form-group">
                            <div class="table-responsive">
                                <button type="button" name="add" id="add" class="btn btn-success">
                                    Add More
                                </button>
                                {{Form::open(['method'=>'POST','route' =>['studentsubject.addMoreAction','student_code' => $student->id]])}}
                                <table class="table" id="dynamic_field">
                                    {{--show list--}}
                                    {{--{{dd(old('subject_code'))}}--}}
                                    @if(!empty(old('subject_code')))
                                        {{--ko lm gi in ra cai da co--}}
                                    @else(sizeof($studentsubjectss) > 0 )
                                        @foreach($studentsubjectss as $studentsubject)
                                            <tr class="count">
                                                <td>
                                                    <select class="form-control" name="subject_code[]">
                                                        <option>Please enter a subject</option>
                                                        @foreach($subjects as $subject)
                                                            <option value="{{$subject->id}}" {{$subject->id == $studentsubject->subject_code ?'selected' : ''}}>{{$subject->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    {!! Form::text('score[]',$studentsubject->score,['class'=>'form-control','placeholder'=> 'Please Enter Score']) !!}
                                                </td>
                                                <td>
                                                    <button type="button" name="remove"
                                                            class="btn btn-danger btn_remove">X
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if(!empty(old('subject_code')))
                                        @foreach(old('subject_code') as $key =>  $subject_code)
                                            <tr class="count">
                                                <td>
                                                    <select class="form-control" name="subject_code[]">
                                                        <option value="">Please enter a subject ...</option>
                                                        @foreach($subjects as $subject)
                                                            <option value="{{$subject->id}}" {{$subject->id == $subject_code ? 'selected':''}}>{{$subject->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">
                                                        <strong id="subject_code-error"></strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                           value="{{old('score')[$key]}}" name="score[]">
                                                    <span class="text-danger">
                                                        <strong id="score-error"></strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" name="remove"
                                                            class="btn btn-danger btn_remove">X
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    {{--end show list--}}
                                </table>
                                {!! Form::submit('Result Add',['class' => 'btn btn-info','id'=> 'btnAdd']) !!}
                                {!! Form::close() !!}

                                <p id="number-subject" style="display: none">{{count($subjects)}}</p>
                                <table style="display: none">
                                    <tr class="addform count">
                                        <div class="form-group col-xs-6">
                                            <td>
                                                <select class="form-control" name="subject_code[]">
                                                    <option value="">Please enter a subject ...</option>
                                                    @foreach($subjects as $subject)
                                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                {!! Form::text('score[]',null,['class'=>'form-control','placeholder'=> 'Please Enter Score']) !!}
                                            </td>
                                            <td>
                                                <button type="button" name="remove"
                                                        class="btn btn-danger btn_remove">X
                                                </button>
                                            </td>
                                        </div>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    {{--</div>--}}
    <!-- /#wrapper -->
    <script type="text/javascript">
        $(document).ready(function () {
            var form = $('.addform').html();
            $('#add').click(function () {
                var len = $('tr.count').length;
                var subject = $('p#number-subject').html();
                if (len < subject) {
                    $('#dynamic_field').append('<tr class="count">' + form + '</tr>');
                } else {
                    alert('Students just only have ' + subject + ' subjects !')
                }
                var $select = $("select");

                var selected = [];
                $.each($select, function (index, select) {
                    if (select.value !== "") {
                        selected.push(select.value);
                    }
                });
                $("option").prop("disabled", false);
                for (var index in selected) {
                    $('option[value="' + selected[index] + '"]').css("display", "none");
                }
            });
            $(document).on('click', '.btn_remove', function () {

                if ($(this).parent().parent().hasClass('.addform')) {
                    stop();
                } else {
                    $(this).parent().parent().remove();
                }
                var $select = $("select");
                var selected = [];
                $.each($select, function (index, select) {
                    if (select.value !== "") {
                        selected.push(select.value);
                    }
                });
                var del = $(this).parent().parent().find('select').val();
                selected.splice(selected.indexOf(del.toString()), 1);
                $("option").prop("disabled", false);
                for (var index in selected) {
                    $('option[value="' + selected[index] + '"]').css("display", "none");
                }
            });
            $(document).on('click', 'select', function () {
                var $select = $("select");
                var selected = [];
                $.each($select, function (index, select) {
                    if (select.value !== "") {
                        selected.push(select.value);
                    }
                });
                $('select > option').not(this).css('display', 'block');
                $("option").prop("disabled", false);
                for (var index in selected) {
                    $('option[value="' + selected[index] + '"]').css("display", "none");
                }
                $(this).parent().parent().find('td > i.remove-item').on('click', function () {
                    var del = $(this).val();
                    selected.splice(selected.indexOf(del.toString()), 1);
                    for (var index in selected) {
                        $('option[value="' + selected[index] + '"]').css("display", "block");
                    }
                });
            });
        });
    </script>
    <script>
    </script>

@endsection