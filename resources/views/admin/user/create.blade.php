@extends('admin.layout.index')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
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
                    <form action="{{route('user.store')}}" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="name" placeholder="Please Enter UserName" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" placeholder="Please Enter Email" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" type="password" placeholder="Please Enter Password" />
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                                <label class="radio-inline">
                                    <input name="level" value="1"  type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="level" value="2" type="radio">Guest
                                </label>

                        </div>
                        <button type="submit" class="btn btn-default">User Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        {{ csrf_field()}}
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
@endsection