@extends('admin.layouts.index')

@section('content')
    <!-- Page Content -->
    <div class="container-fluid">
        <div class="form-group">
            <div class="table-responsive">
                {{Form::open(['method'=>'POST'])}}
                <table class="table" id="dynamic_field">
                    {{--show list--}}
                    @foreach($marks as $mark)
                        <tr class="count">
                            <td>
                                <select class="form-control" name="subject_code[]">
                                    @foreach($subjects as $subject)
                                        <option
                                            value="{{$subject->id}}" {{$subject->id == $mark->subject_code ?'selected' : ''}}>
                                            {{$subject->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                {!! Form::text('score[]',$mark->score,['class'=>'form-control','placeholder'=> 'Please Enter Score']) !!}
                                {!! Form::hidden('student_code[]',$mark->student_code) !!}
                            </td>
                            <td>
                                <button type="button" name="remove"
                                        class="btn btn-danger btn_remove"><a
                                        href="#"><i class="glyphicon glyphicon-remove"></i></a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    {{--end show list--}}

                    <tr class="addform count">
                        <div>
                            <button type="button" name="add" id="add" class="btn btn-success">
                                <i class="glyphicon glyphicon-plus"></i>
                            </button>
                            <td>

                                <select class="form-control" name="subject_code[]">
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                {!! Form::hidden('student_code[]',$mark->student_code) !!}
                                {!! Form::text('score[]',null,['class'=>'form-control','placeholder'=> 'Please Enter Score']) !!}
                            </td>
                            <td>
                                <button type="button" name="remove"
                                        class="btn btn-danger btn_remove"><i class="glyphicon glyphicon-remove"></i>
                                </button>
                            </td>
                        </div>
                    </tr>
                </table>
                <div>
                    {!! Form::submit('Add Mark',['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
                <p id="number-subject" style="display: none">{{count($subjects)}}</p>
            </div>
        </div>
    </div>
    </div>
    <!-- /#wrapper -->
    <script type="text/javascript">
        $(document).ready(function () {

            var form = $('.addform').html();
            $('#add').click(function () {
                var len = $('tr.count').length;
                var subject = $('p#number-subject').html();
                if (len < subject) {
                    $('#dynamic_field').append('<tr>' + form + '</tr>');
                } else {
                    alert('student has ' + subject + ' subject !')
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

                if ($(this).parent().parent().hasClass('addform')) {
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

@endsection
