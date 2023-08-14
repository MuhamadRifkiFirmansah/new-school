
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{asset('img/profile_small.jpg')}}"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{ Auth::user()->name }}</span>
                        <span class="text-muted text-xs block">Admin <b class="caret"></b></span>                    
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <li>
                                <button class="border-0 dropdown-item p-2 bg-transparent logout">Keluar</button>
                            </li>
                        </form>
                    </ul>
                </div>
                <div class="logo-element">
                    <img alt="image" class="rounded-circle" src="{{asset('img/profile_small.jpg')}}"/>
                </div>
            </li>
            <li class="{{ Request::path() == 'classroom' ? 'active' : '' }}">
                <a href="/classroom"><i class="fa fa-building"></i> <span class="nav-label">Classroom</span> </a>
            </li>
            <li class="{{ Request::path() == 'student' ? 'active' : '' }}">
                <a href="/student"><i class="fa fa-graduation-cap"></i> <span class="nav-label">Student</span> </a>
            </li>
            <li class="{{ Request::path() == 'user' ? 'active' : '' }}">
                <a href="/user"><i class="fa fa-user"></i> <span class="nav-label">User</span> </a>
            </li>
        </ul>

    </div>
</nav>
