 <div class="header-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo">
                            <a href="{{ route('public') }}"><img src="{{ asset('frontend') }}/images/version/garden-logo.png" alt=""></a>
                        </div><!-- end logo -->
                    </div>
                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div><!-- end header -->

        <header class="header">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-toggleable-md">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Forest Timemenu" aria-controls="Forest Timemenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-center" id="Forest Timemenu">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a style="font-size:16px" class="nav-link color-red-hover" href="{{ route('public') }}">Home</a>
                            </li>
                           @foreach($header_categories as $category)
                            <li class="nav-item">
                                <a style="font-size:16px" class="nav-link color-red-hover" href="{{ route('all-category',$category->slug) }}">{{ $category->name }}</a>
                            </li>
                            @endforeach
                            <li class="nav-item">
                                <a style="font-size:16px" class="nav-link color-green-hover" href="{{ route('contact.us') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div><!-- end container -->
        </header><!-- end header -->