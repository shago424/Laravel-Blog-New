  @extends('frontend.layouts.index')
@section('content')

  <div class="page-title wb" style="background-color:lightslategrey;color: #fff;">
            <div class="container">
                <div class="row justify-content-center" >
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                       
                                <form action="{{ route('search') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search on the site" value="{{ $search ?? "" }}">
                                        <button type="submit" ><i class="fa fa-search"></i></button>
                                    </div>
                                    <font style="color:red">{{($errors)->has('search')?($errors->first('search')):''}}</font>
                                </form>
                                <p style="color:#fff">search result found {{ $posts->count() ?? "0" }} for {{ $search }} </p>
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
              @if($posts->isEmpty())
            <div class="error_page">
            <h3 style="color:red">We Are Sorry</h3>
            <h1 style="color:red">No Post Found !</h1>
            <p style="color:red">Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists</p>
            <span></span> <a class="btn btn-primary" href="{{ route('public') }}" class="wow fadeInLeftBig">Go to home page</a> </div>
            @else
                                 @foreach($posts as $post)
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
                                        <small><i style="color:{{ Auth::user()->likedPosts()->where('post_id',$post->id)->count() > 0  ? 'red'  : '' }}" class="fa fa-heart"> {{ $post->likedUsers->count() }} Like this</i></small>
                                        @endguest
                                      <small><a href="#" title=""><i class="fa fa-comment-o"></i> {{ $post->comments->count('id') }} Comments</a></small>
                                        
                                        
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                @endforeach

                                <!-- end blog-box -->
                                @endif
                                <hr class="invis">
                                
                               
                            </div><!-- end blog-list -->

                        </div><!-- end page-wrapper -->
{{ $posts->links() }}
                        <hr class="invis">

                    <!-- end row -->
                    </div><!-- end col -->

                    @include('frontend.layouts.sidebar')
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

  @endsection    
