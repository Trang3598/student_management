<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                </div>
                <!-- /input-group -->
            </li>
            @if(isset($user_login))
            <li>
                <a href="{{route('studentsubject.registerSubject',$user_login->id)}}"><i class="fas fa-book-open"></i>Course registration<span class="fa arrow"></span></a>
            </li>
            @endif
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Faculties<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('faculty.index')}}">List Faculties</a>
                    </li>
                    <li>
                        <a href="{{route('faculty.create')}}">Add Faculties</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Classes<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('class.index')}}">List Classes</a>
                    </li>
                    <li>
                        <a href="{{route('class.create')}}">Add Classes</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> Students<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('student.index')}}">List Students</a>
                    </li>
                    <li>
                        <a href="{{route('student.create')}}">Add Students</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> Subjects<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('subject.index')}}">List Subjects</a>
                    </li>
                    <li>
                        <a href="{{route('subject.create')}}">Add Subjects</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Results Of Students<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('studentsubject.index')}}">List Result Of Students</a>
                    </li>
                    <li>
                        <a href="{{route('studentsubject.create')}}">Add Result of Student</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i>Users<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('user.index')}}">List Of Users</a>
                    </li>
                    <li>
                        <a href="{{route('user.create')}}">Add Users</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>