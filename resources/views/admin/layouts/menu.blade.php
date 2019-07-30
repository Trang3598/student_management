<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{url('dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Faculties<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('faculties.index')}}">Show Faculties</a>
                    </li>
                    <li>
                        <a href="{{route('faculties.create')}}">Create Faculties</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> Classes <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('classes.index')}}">Show Classes</a>
                    </li>
                    <li>
                        <a href="{{route('classes.create')}}">Create Classes</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> Student <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('students.index')}}">Show Students</a>
                    </li>
                    <li>
                        <a href="{{route('students.create')}}">Create Students</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> Subject <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('subjects.index')}}">Show Subjects</a>
                    </li>
                    <li>
                        <a href="{{route('subjects.create')}}">Create Subjects</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> Mark <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('marks.index')}}">Show Marks</a>
                    </li>
                    <li>
                        <a href="{{route('marks.create')}}">Create Marks</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
