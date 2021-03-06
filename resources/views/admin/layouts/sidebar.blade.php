 <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                @if(Auth::user()->role_id == 1)
                <a class="navbar-brand float-left" href="{{ route('admin.dashboard') }}"><img src="{{(!empty(Auth::user()->image))?url('upload/userimage/'.Auth::user()->image):url('upload/usernoimage.jpg')}}" width="50px" height="50px" alt="Logo" style="border-radius: 50%;margin-right:10px"></a>
                <a class="navbar-brand float-left" href="{{ route('admin.dashboard') }}"><p style="margin-top: 15px;color: #fff;">{{Auth::user()->name}}</p></a>
                @else
                <a class="navbar-brand float-left" href="{{ route('user.dashboard') }}"><img src="{{(!empty(Auth::user()->image))?url('upload/userimage/'.Auth::user()->image):url('upload/usernoimage.jpg')}}" width="50px" height="50px" alt="Logo" style="border-radius: 50%;margin-right:10px"></a>
                <a class="navbar-brand float-left" href="{{ route('user.dashboard') }}"><p style="margin-top: 15px;color: #fff;">{{Auth::user()->name}}</p></a>
                @endif
                
            </div> 
            <br>
            <br>

            <br>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                @if(Auth::user()->role_id ==1)
                <ul class="nav navbar-nav">
                    <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Setups</h3><!-- /.menu-title -->
                     <li class="{{ request()->is('admin/user-list') ? 'active' : '' }}">
                        <a href="{{ route('user.list') }}"> <i class="menu-icon fa fa-users "></i>Users </a>
                    </li>
                    <li class="{{ request()->is('admin/category-list') ? 'active' : '' }}">
                        <a href="{{ route('category.list') }}"> <i class="menu-icon fa fa-certificate "></i>Category </a>
                    </li>
                    <li class="{{ request()->is('admin/post-list') ? 'active' : '' }}">
                        <a href="{{ route('post.list') }}"> <i class="menu-icon fa fa-paper-plane "></i>Post </a>
                    </li>
                    <li class="{{ request()->is('admin/comment-list') ? 'active' : '' }}">
                        <a  href="{{ route('comment.list') }}"> <i class="menu-icon fa fa-comment "></i>Comment </a>
                    </li>
                    <li class="{{ request()->is('admin/comment/reply-list') ? 'active' : '' }}">
                        <a href="{{ route('admin.comment.reply.list') }}"> <i class="menu-icon fa fa-comments "></i>Comment Reply </a>
                    </li>
                    <li class="{{ request()->is('admin/liked-post') ? 'active' : '' }}">
                        <a href="{{ route('admin.post.like') }}"> <i class="menu-icon fa fa-heart "></i>Favourite Posts </a>
                    </li>
                    <li class="{{ request()->is('admin/contact-list') ? 'active' : '' }}">
                        <a href="{{ route('contact.list') }}"> <i class="menu-icon fa fa-address-book "></i>Contacts </a>
                    </li>
                    {{--  <h3 class="menu-title">Setups</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Components</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>
                            <li><i class="fa fa-share-square-o"></i><a href="ui-social-buttons.html">Social Buttons</a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                        </ul>
                    </li> --}}

                   
                  
                </ul>
                @else
                <ul class="nav navbar-nav">
                    <li class="{{ request()->is('user/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('user.dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Setups</h3><!-- /.menu-title -->
                     <li class="{{ request()->is('user/post-list') ? 'active' : '' }}">
                        <a href="{{ route('user.post.list') }}"> <i class="menu-icon fa fa-paper-plane "></i>Post </a>
                    </li>
                     
                    <li class="{{ request()->is('user/comment-list') ? 'active' : '' }}">
                        <a  href="{{ route('user.comment.list') }}"> <i class="menu-icon fa fa-comment "></i>Comment </a>
                    </li>

                    <li class="{{ request()->is('user/comment/reply-list') ? 'active' : '' }}">
                        <a href="{{ route('user.comment.reply.list') }}"> <i class="menu-icon fa fa-comments "></i>Comment Reply </a>
                    </li>
                     <li class="{{ request()->is('user/liked-post--user') ? 'active' : '' }}">
                        <a href="{{ route('user.post.like') }}"> <i class="menu-icon fa fa-heart "></i>Favourite Posts </a>
                    </li>
                    {{--  <h3 class="menu-title">Setups</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Components</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>
                            <li><i class="fa fa-share-square-o"></i><a href="ui-social-buttons.html">Social Buttons</a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                        </ul>
                    </li> --}}

                   
                  
                </ul>

                @endif
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->