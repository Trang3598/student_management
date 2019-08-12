<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Admin Area - Trang xinh đẹp</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                @if(isset($user_login))
                    <li><i class="fa fa-user fa-fw" style="margin-left: 20px"></i>{{$user_login->username}}</a>
                    </li>
                    <li><a href="{{route('user.edit',$user_login->id)}}"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        {!! Form::open(['method'=>'POST', 'route'=>'logout']) !!}
                        <i class="fa fa-sign-out fa-fw" style="margin-left: 20px"></i>
                        {!! Form::submit('Logout', ['style'=> 'margin-left: 20px, display: inline; border: none;background: none;']) !!}
                        {!! Form::close() !!}
                    </li>
                @endif
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

@include('admin.layout.menu')
<!-- /.navbar-static-side -->
</nav>