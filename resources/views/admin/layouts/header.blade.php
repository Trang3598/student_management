<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('dashboard')}}">{{ trans('layout.newWaveSolution')}}</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> @if(isset(Auth::user()->students->name)){{{Auth::user()->students->name}}}@else{{Auth::user()->username}} @endif </a>
                </li>
                <li><a href="{{ route('lang',['lang' => 'vi']) }}"> Tiếng Việt </a></li>
                <li><a href="{{ route('lang',['lang' => 'en']) }}">English </a></li>
                <li class="divider"></li>
                <li>
                    {!! Form::open(['method'=>'POST', 'route'=>'logout']) !!}
                    {!! Form::submit('Logout', ['style'=> 'text:center ;display: inline; border: none;background: none;']) !!}
                    {!! Form::close() !!}
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
    @include('admin.layouts.menu')
</nav>
