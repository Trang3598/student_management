@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Subject
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
                    <!-- /.col-lg-12 -->

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Credit</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($subjects as $subject)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$subject->id}}</td>
                                    <td>{{$subject->name}}</td>
                                    <td>{{$subject->number}}</td>
                                    <td class="center">
                                        @if(isset($subject->slug))
                                        <button class="btn btn-success"><a style="color: white"
                                                                           href="{{route('subject.edit',$subject->slug)}}">Edit</a>
                                        </button>
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($subject->slug))
                                        {!! Form::open(['method'=> 'DELETE','route' => ['subject.destroy', $subject->slug]]) !!}
                                        @endif
                                        {!! Form::submit('Delete',['class'=>'btn btn-danger','onclick' => "return confirm('Do you want to delete this field?')"]) !!}
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
            {!! $subjects->links() !!}
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