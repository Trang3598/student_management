<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                </div>
                <!-- /input-group -->
            </li>

            <li>
                <div style="margin-left: 15px">
                    <img src="images/vietnam.png" style="height: 30px">
                    <a href="{!! route('user.change-language', ['vi']) !!}">{{__('message.Vietnamese')}}</a>
                </div>
            </li>
            <li>
                <div style="margin-left: 15px">
                    <img src="images/england.png" style="height: 23px">
                    <a href="{!! route('user.change-language', ['en']) !!}">{{__('message.English')}}</a>
                </div>
            </li>
            @if(isset($user_login))
                <li>
                    <a href="{{route('studentsubject.registerSubject',$user_login->id)}}"><i
                                class="fa fa-book"></i> Course registration<span class="fa arrow"></span></a>
                </li>
            @endif
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> {{__('message.Faculties')}}<span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('faculty.index')}}">{{__('message.List_Faculties')}}</a>
                    </li>
                    <li>
                        <a href="{{route('faculty.create')}}">{{__('message.Add_Faculties')}}</a>
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
                        <a href="{{route('student.create')}}">{{__('message.Add_Students')}}</a>
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
                <a href="#"><i class="fa fa-user fa-fw"></i> Users<span class="fa arrow"></span></a>
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
            <li>
                <a href="#"><i class="fa fa-adjust"></i> Roles<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('roles.index')}}">List Of Roles</a>
                    </li>
                    <li>
                        @can('role-create')
                            <a href="{{route('roles.create')}}">Add Roles</a>
                        @endcan
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-bank fa-fw"></i> Permission<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('permissions.index')}}">List Of Permissions</a>
                    </li>
                    @can('permission-create')
                    <li>
                            <a href="{{route('permissions.create')}}">Add Permissions</a>
                        </li>
                    @endcan
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-phone fa-fw"></i> Chat<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('chat')}}">Group Chat</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>