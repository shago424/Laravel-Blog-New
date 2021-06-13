<div class="topbar-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-6 hidden-xs-down">
                        <div class="topsocial">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Flickr"><i class="fa fa-flickr"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google+"><i class="fa fa-google-plus"></i></a>
                        </div><!-- end social -->
                    </div><!-- end col -->

                    <div class="col-lg-5 hidden-md-down">
                    </div><!-- end col -->

                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                        <div class="topsearch text-right">
                           
                    @if (Route::has('login'))
                    @auth
                     <div class="user-area dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{(!empty(Auth::user()->image))?url('upload/userimage/'.Auth::user()->image):url('upload/usernoimage.jpg')}}" width="30px" height="30px" alt="{{ Auth::user()->name }}">
                        </a>

                        <div class="user-menu dropdown-menu">
                            

                            {{-- <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a> --}}
                            
                             @if(Auth::user()->role_id ==1)
                             <a style="background-color: crimson;margin-top: -8px" class="dropdown-item" href="{{ route('admin.profile') }}"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a>
                            <a style="background-color: crimson;margin-top: 1px" class="dropdown-item" href="{{ route('admin.profile') }}"><i class="fa fa-user"></i> My Profile</a>
                             <a style="background-color: crimson;margin-top: 1px" class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                            <a style="background-color: crimson;margin-top: 1px" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>Logout</a>
                                                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            @elseif(Auth::user()->role_id ==2)
                            <a style="background-color: crimson;margin-top: -8px" class="dropdown-item" href="{{ route('user.profile') }}"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a>
                            <a style="background-color: crimson;margin-top: 1px" class="dropdown-item" href="{{ route('user.profile') }}"><i class="fa fa-user"></i> My Profile</a>
                            <a style="background-color: crimson;margin-top: 1px" class="dropdown-item" href="{{ route('user.dashboard') }}"> <i class="fa fa-dashboard"></i>  Dashboard</a>
                            <a style="background-color: crimson;margin-top: 1px" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out"></i>  Logout</a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            @endif
                        </div>
                    </div>


                    
                    @else
                        <a  href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a  href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            {{--  <a style="margin-right:5px" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-search"></i> Search</a> --}}
                        </div><!-- end search -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div><!-- end topbar -->