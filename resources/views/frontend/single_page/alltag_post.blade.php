  @extends('frontend.layouts.index')
@section('content')

  <div class="page-title wb" style="background-color:lightslategrey;color: #fff;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12 col-xs-12">
                        <h2 style="color:white"><i class="fa fa-leaf bg-green"></i> Tag by: {{ $query }}</h2>
                    </div><!-- end col -->
                    <div class="col-lg-7 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" style="font-size:20px"><a style="color:#fff" href="{{ route('public') }}">Home</a></li>
                            <li class="breadcrumb-item" style="font-size:20px"><a style="color:#fff" href="#">Tag Post</a></li>
                            <li style="font-size:20px;color:black" class="breadcrumb-item active">{{$query}}</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

 <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-list clearfix">
              @if($tagIdByPosts->isEmpty())
            <div class="error_page" >
            <h3 style="color: red">We Are Sorry</h3>
            <h1 style="color: red">Tag Post Not Found !</h1>
            <p >Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists</p>
            <span></span> <a class="btn btn-danger" href="{{ route('public') }}" class="wow fadeInLeftBig">Go to home page</a> </div>
            @else
                                 @foreach($tagIdByPosts as $post)
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="{{ route('single_post',$post->slug) }}" title="">
                                                <img src="{{(!empty($post->image))?url('storage/post/'.$post->image):url('upload/usernoimage.jpg')}}" alt="{{ $post->title }}" class="img-fluid" style="width:260px;height: 200px">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <span class="bg-aqua"><a href="{{ route('all-category',$post->category->slug) }}" title="">{{ $post->category->name }}</a></span>
                                        <h4><a href="{{ route('single_post',$post->slug) }}" title="">{{ $post->title }}</a></h4>
                                        <p>{!! Str::limit($post->body,140 )!!}</p>
                                        <small><a href="garden-single.html" title="">{{$post->created_at->diffForHumans() }}</a></small>
                                        <small><a href="#" title=""> by {{ $post->user->name }}</a></small>
                                        <small><i class="fa fa-eye"></i> {{ $post->view_count }} View</a></small>
                                          @guest
                                        <small><i class="fa fa-heart"> {{ $post->likedUsers->count() }} Like this</i></small>
                                        @else
                                        <small><i style="color:{{ Auth::user()->likedPosts()->where('post_id',$post->id)->count() > 0  ? 'red'  : '' }}" class="fa fa-heart"> {{ $post->likedUsers->count() }} like this</i></small>
                                        @endguest
                                      <small><a href="{{route('single_post',$post->slug) }}" title=""><i class="fa fa-comment-o"></i> {{ $post->comments->count('id') }} Comments</a></small>
                                        
                                        
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                @endforeach

                                <!-- end blog-box -->
                                @endif
                                <hr class="invis">
                                
                               
                            </div><!-- end blog-list -->

                        </div><!-- end page-wrapper -->
{{ $tagIdByPosts->links() }}


                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-spot clearfix">
                                        <div class="banner-img">
                                            <img src="{{ asset('frontend') }}/upload/banner_01.jpg" alt="" class="img-fluid">
                                        </div><!-- end banner-img -->
                                    </div><!-- end banner -->
                                </div><!-- end col -->
                            </div><!-- end row -->
                    <hr style="border:solid 2px red;">
                        {{-- Hot --}}
                          <div class="row">
                           
                             <div class="col-md-6">
                              <div class="widget">
                                <h2 class="widget-title">Hot Posts</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        @foreach($hots as $hot)
                                        <a href="{{ route('single_post',$hot->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="{{(!empty($hot->image))?url('storage/post/'.$hot->image):url('upload/usernoimage.jpg')}}" alt="{{ $hot->title }}" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">{{$hot->title}}</h5>
                                                <small>{{$hot->created_at->diffForHumans() }}</small>
                                            </div>
                                        </a>
                                        @endforeach
                                     
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end page-wrapper -->
                      {{ $hots->links() }}
                            </div>

                            <div class="col-md-6">
                                <div class="widget">
                                <h2 class="widget-title">Important Posts</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        @foreach($importants as $important)
                                        <a href="{{ route('single_post',$important->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="{{(!empty($important->image))?url('storage/post/'.$important->image):url('upload/usernoimage.jpg')}}" alt="{{ $important->title }}" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">{{$important->title}}</h5>
                                                <small>{{$important->created_at->diffForHumans() }}</small>
                                            </div>
                                        </a>
                                        @endforeach
                                     
                                    </div>
                                </div><!-- end blog-list -->
                            </div>

                            {{ $importants->links() }}
                            </div>

                          </div>

                    <!-- end row -->
                    </div><!-- end col -->

                    @include('frontend.layouts.sidebar')
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

  @endsection    
