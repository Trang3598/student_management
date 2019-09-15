@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{__('message.faculty')}}
                        <small>{{__('message.list')}}</small>
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
                    <tr align="center">
                        <th>{{__('message.id')}}</th>
                        <th>{{__('message.name')}}</th>
                        <th>{{__('message.show_list_class')}}</th>
                        <th>{{__('message.edit')}}</th>
                        <th>{{__('message.delete')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                            @foreach($items as $faculty)
                        <tr class="odd gradeX" align="center">
                            <td>{{$faculty['id']}}</td>
                            <td>{{$faculty['name']}}</td>
                            <td class="center"><i class="glyphicon glyphicon-eye-open"></i> <a
                                        href="{{route('faculty.show',$faculty['id'])}}">{{__('message.show')}}</a></td>
                            <td class="center">
                                <button class="btn btn-success"><a
                                            href="{{route('faculty.edit',$faculty['id'])}}"
                                            style="color: white">{{__('message.edit')}}</a></button>
                            </td>
                            <td>
                                {!! Form::open(['method'=> 'DELETE','route' => ['faculty.destroy', $faculty['id']]]) !!}
                                {!! Form::submit(__('message.delete'),['class'=>'btn btn-danger','onclick' => "return confirm('Do you want to delete this field?')"]) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        {{--{!!  pagina($item, 2) !!}--}}
    </div>
    <!-- /#page-wrapper -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('div.message_warning').on('click', function () {
                $('div.message_warning').remove();
            });
        });
    </script>
@endsection