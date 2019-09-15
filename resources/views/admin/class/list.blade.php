@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Class
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
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Name Of Faculty</th>
                        <th>List Students</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($classes))
                    @foreach($classes as $class)
                        <tr class="odd gradeX" align="center">
                            <td>{{(isset($class->id))? $class->id: ''}}</td>
                            <td>{{(isset($class->name))? $class->name: ''}}</td>
                            <td>
                                   {{(isset($class->faculty->name)) ?$class->faculty->name:''}}
                            </td>
                            <td class="center"><i class="glyphicon glyphicon-eye-open "></i> <a href="{{route('class.show',$class->id)}}">Show</a></td>
                            <td class="center"><button class=" btn btn-success"><a href="{{route('class.edit',$class->id)}}"  style="color: white">Edit</a></button> </td>
                            <td>
                                {!! Form::open(['method'=> 'DELETE','route' => ['class.destroy', $class->id]]) !!}
                                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
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
        {!! $classes->links() !!}
        @endif
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