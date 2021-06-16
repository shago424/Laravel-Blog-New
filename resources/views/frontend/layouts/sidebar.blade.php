<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <h2 class="widget-title">Search</h2>
                                <form action="{{ route('search') }}" method="GET" class="form-inline search-form">
                                    <div class="form-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search on the site">

                                    </div>
                                    <font style="color:red">{{($errors)->has('search')?($errors->first('search')):''}}</font>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </form>
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Popular Posts</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        @foreach($populars as $popular)
                                        <a href="{{ route('single_post',$popular->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="{{(!empty($popular->image))?url('storage/post/'.$popular->image):url('upload/usernoimage.jpg')}}" alt="{{ $popular->title }}" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">{{$popular->title}}</h5>
                                                <small>{{$popular->created_at->diffForHumans() }}</small>
                                            </div>
                                        </a>
                                        @endforeach
                                     
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Advertising</h2>
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="{{ asset('frontend') }}/upload/banner_04.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget -->
                            <div class="widget">
                                <h2 class="widget-title">Popular Categories</h2>
                                <div class="link-widget">
                                    <ul>
                                        @foreach($sidebar_categories as $category)
                                        <li><a href="{{ route('all-category',$category->slug) }}">{{ $category->name }} <span>{{ $category->post->count('id') }}</span></a></li>
                                        @endforeach
                                    </ul>
                                </div><!-- end link-widget -->
                            </div><!-- end widget -->
                           {{--  <div class="widget">
                                <h2 class="widget-title">Instagram Feed</h2>
                                <div class="instagram-wrapper clearfix">
                                    <a href="#"><img src="{{ asset('frontend') }}/upload/garden_sq_01.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="{{ asset('frontend') }}/upload/garden_sq_02.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="{{ asset('frontend') }}/upload/garden_sq_03.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="{{ asset('frontend') }}/upload/garden_sq_04.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="{{ asset('frontend') }}/upload/garden_sq_05.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="{{ asset('frontend') }}/upload/garden_sq_06.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="{{ asset('frontend') }}/upload/garden_sq_07.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="{{ asset('frontend') }}/upload/garden_sq_08.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="{{ asset('frontend') }}/upload/garden_sq_09.jpg" alt="" class="img-fluid"></a>
                                </div><!-- end Instagram wrapper -->
                            </div><!-- end widget --> --}}

                            <div class="widget">
                                <h2 class="widget-title">Recent Posts</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        @foreach($recents as $recent)
                                        <a href="{{ route('single_post',$recent->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="{{(!empty($recent->image))?url('storage/post/'.$recent->image):url('upload/usernoimage.jpg')}}" alt="{{ $recent->title }}" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">{{$recent->title}}</h5>
                                                <small>{{$recent->created_at->diffForHumans() }}</small>
                                            </div>
                                        </a>
                                        @endforeach
                                     
                                    </div>
                                </div><!-- end blog-list -->
                            </div>

                             <div class="widget">
                                <h2 class="widget-title">Popular Tags</h2>
                                <div class="link-widget">
                                    @foreach($tags as $tag)
                                    <small><a  href="{{ route('all-tag',$tag->name) }}" title=""> <span  style="padding: 2px;font-size: 15px;margin:2px;font-weight: bolder;">{{$tag->name}}</span> </a></small>
                                    @endforeach
                                </div><!-- end link-widget -->
                            </div>

                            <!-- end widget -->
                        </div><!-- end sidebar -->
                    </div><!-- end col -->