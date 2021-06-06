 <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        @if(Auth::user()->role_id == 1)
                    <a href="{{ route('user.dashboard') }}"><i class="fa fa-home"></i> Home</a>
                    <a target="_blank" href="{{ route('public') }}"><i class="fa fa-web"></i> Blog Site</a>
                       @else
                        <a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Home</a>
                        <a target="_blank" href="{{ route('public') }}"><i class="fa fa-web"></i> Blog Site</a>
                       @endif

                     

                   
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{(!empty(Auth::user()->image))?url('upload/userimage/'.Auth::user()->image):url('upload/usernoimage.jpg')}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            @if(Auth::user()->role_id == 1)
                            <a class="nav-link" href="{{ route('admin.profile') }}"><i class="fa fa-user"></i> My Profile</a>
                            @else
                            <a class="nav-link" href="{{ route('user.profile') }}"><i class="fa fa-user"></i> My Profile</a>
                            @endif

                            {{-- <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a> --}}

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                             <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        ><i class="fa fa-power-off"></i> Logout</a>
                                                     
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </div>
                    </div>

                

                </div>
            </div>
            </header>