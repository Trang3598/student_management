<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{url('dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> {{ trans('layout.dashboard') }} </a>
            </li>

            <li>

                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> {{ trans('layout.faculty') }}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @can('faculty-list')
                    <li>
                        <a href="{{route('faculties.index')}}">{{ trans('layout.show') }} {{ trans('layout.faculty') }}</a>
                    </li>
                    @endcan
                    @can('faculty-create')
                    <li>
                        <a href="{{route('faculties.create')}}">{{ trans('layout.create') }} {{ trans('layout.faculty') }}</a>
                    </li>
                    @endcan
                </ul>

            </li>
            <li>

                <a href="#"><i class="fa fa-cube fa-fw"></i> {{ trans('layout.class') }} <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @can('class-list')
                    <li>
                        <a href="{{route('classes.index')}}">{{ trans('layout.show') }} {{ trans('layout.class') }}</a>
                    </li>
                    @endcan
                    @can('class-create')
                    <li>
                        <a href="{{route('classes.create')}}">{{ trans('layout.create') }} {{ trans('layout.class') }}</a>
                    </li>
                    @endcan
                </ul>

            </li>

            <li>

                <a href="#"><i class="fa fa-cube fa-fw"></i> {{ trans('layout.student') }} <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @can('student-list')
                    <li>
                        <a href="{{route('students.index')}}">{{ trans('layout.show') }} {{ trans('layout.student') }}</a>
                    </li>
                    @endcan
                    @can('student-create')
                    <li>
                        <a href="{{route('students.create')}}">{{ trans('layout.create') }} {{ trans('layout.student') }}</a>
                    </li>
                    @endcan
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> {{ trans('layout.subject') }} <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @can('subject-list')
                    <li>
                        <a href="{{route('subjects.index')}}">{{ trans('layout.show') }} {{ trans('layout.subject') }}</a>
                    </li>
                    @endcan
                    @can('subject-create')
                    <li>
                        <a href="{{route('subjects.create')}}">{{ trans('layout.create') }} {{ trans('layout.subject') }}</a>
                    </li>
                    @endcan
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> {{ trans('layout.mark') }} <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @can('mark-list')
                    <li>
                        <a href="{{route('marks.index')}}">{{ trans('layout.show') }} {{ trans('layout.mark') }}</a>
                    </li>
                    @endcan
                    @can('mark-create')
                    <li>
                        <a href="{{route('marks.create')}}">{{ trans('layout.create') }} {{ trans('layout.mark') }}</a>
                    </li>
                    @endcan
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                @can('role-list')
                <a href="#"><i class="fa fa-cube fa-fw"></i> {{ trans('layout.permission') }} <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('permissions.index')}}">{{ trans('layout.show') }} {{ trans('layout.permission') }}</a>
                    </li>
                    @endcan
                    @can('role-create')
                    <li>
                        <a href="{{route('permissions.create')}}">{{ trans('layout.create') }} {{ trans('layout.permission') }}</a>
                    </li>
                </ul>
                @endcan
            </li>
            <li>
                @can('role-list')
                <a href="#"><i class="fa fa-cube fa-fw"></i> {{ trans('layout.role') }} <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('roles.index')}}">{{ trans('layout.show') }} {{ trans('layout.role') }}</a>
                    </li>
                @endcan
                @can('role-create')
                    <li>
                        <a href="{{route('roles.create')}}">{{ trans('layout.create') }} {{ trans('layout.role') }}</a>
                    </li>
                </ul>
                @endcan
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
