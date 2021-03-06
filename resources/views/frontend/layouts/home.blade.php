  @extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.first-section')
<style>
        nav svg{
            height: 10px;

        }
        nav .hidden{
            display: block !important ;
        }
    </style>
   <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-list clearfix">
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
                                        <p>{!! Str::limit($post->body, 275 )!!}</p>
                                       
                                        <small><a href="garden-single.html" title="">{{$post->created_at->diffForHumans() }}</a></small>
                                        <small><a href="#" title=""> by {{ $post->user->name }}</a></small>
                                         <small><a href="garden-category.html" title=""><i class="fa fa-eye"></i> {{ $post->view_count }}</a></small>
                                          @guest
                                        <small><i class="fa fa-heart"> {{ $post->likedUsers->count() }}</i></small>
                                        @else
                                        <small><i style="color:{{ Auth::user()->likedPosts()->where('post_id',$post->id)->count() > 0  ? 'red'  : '' }}" class="fa fa-heart"> {{ $post->likedUsers->count() }}</i></small>
                                        @endguest
                                      <small><a href="{{route('single_post',$post->slug) }}" title=""><i class="fa fa-comment-o"></i> {{ $post->comments->count('id') }}</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                @endforeach
                                <hr class="invis">
                            <!-- end blog-box -->
                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->
{{ $posts->links() }}
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


                    </div><!-- end col -->




                    @include('frontend.layouts.sidebar')
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

  @endsection    
