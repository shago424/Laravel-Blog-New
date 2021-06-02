  @extends('frontend.layouts.index')
@section('content')

  <div class="page-title wb" style="background-color:lightslategrey;color: #fff;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2 style="color:white"><i class="fa fa-leaf bg-green"></i> Tag by: Gardening</h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" style="font-size:20px"><a style="color:#fff" href="#">Home</a></li>
                            <li class="breadcrumb-item" style="font-size:20px"><a style="color:#fff" href="#">Tag</a></li>
                            <li style="font-size:20px;color:black" class="breadcrumb-item active">{{-- {{ $tagIdByPost['tags']['name'] }} --}}</li>
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
            <h1 style="color: red"> Not Found !</h1>
            <p >Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists</p>
            <span></span> <a class="btn btn-danger" href="{{ route('public') }}" class="wow fadeInLeftBig">Go to home page</a> </div>
            @else
                                 @foreach($tagIdByPosts as $post)
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="{{ route('single_post',$post->slug) }}" title="">
                                                <img src="{{(!empty($post->image))?url('storage/post/'.$post->image):url('upload/usernoimage.jpg')}}" alt="{{ $post->title }}" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <span class="bg-aqua"><a href="{{ route('single_post',$post->category->slug) }}" title="">{{ $post->category->name }}</a></span>
                                        <h4><a href="{{ route('single_post',$post->slug) }}" title="">{{ $post->title }}</a></h4>
                                        <p>{!! $post->body !!}</p>
                                        <small><a href="garden-category.html" title=""><i class="fa fa-eye"></i> 1887</a></small>
                                        <small><a href="garden-single.html" title="">{{ date('d-M-Y',strtotime($post->created_at)) }}</a></small>
                                        <small><a href="#" title=""> by{{ $post->user->name }}</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                @endforeach

                                <!-- end blog-box -->
                                @endif
                                <hr class="invis">
                                
                               
                            </div><!-- end blog-list -->

                        </div><!-- end page-wrapper -->
{{ $tagIdByPosts->links() }}
                        <hr class="invis">

                    <!-- end row -->
                    </div><!-- end col -->

                    @include('frontend.layouts.sidebar')
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

  @endsection    
