<section class="section first-section">
            <div class="container-fluid">
                <div class="masonry-blog clearfix">
                    @foreach($first_sections as $first)
                    <div class="left-side">
                        <div class="masonry-box post-media">
                             <img src="{{(!empty($first->image))?url('storage/post/'.$first->image):url('upload/usernoimage.jpg')}}" alt="{{ $first->title }}"  class="img-fluid" style="width: 434px;height: 368px;">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua"><a href="{{ route('all-category',$first->category->slug) }}" title="">{{ $first->category->name }}</a></span>
                                        <h4><a href="{{ route('single_post',$first->slug) }}" title="">{{$first->title}}</a></h4>
                                        <small><a href="garden-single.html" title="">{{$first->created_at->diffForHumans() }}</a></small>
                                        <small><a href="#" title="">by {{ $first->user->name }}</a></small>
                                        <small><i style="color:white" class="fa fa-eye"> {{ $first->view_count }}</i> </small>
                                        @guest
                                        <small><i style="color:white" class="fa fa-heart"> {{ $first->likedUsers->count() }} </i></small>
                                        @else
                                        <small><i style="color:{{ Auth::user()->likedPosts()->where('post_id',$first->id)->count() > 0  ? 'red'  : 'white' }}" class="fa fa-heart"> {{ $first->likedUsers->count() }}</i></small>
                                        @endguest
                                        

                                      <small><a href="{{route('single_post',$first->slug) }}" title=""><i class="fa fa-comment-o"></i> {{ $first->comments->count('id') }}</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end left-side -->
                    @endforeach
                    
                </div><!-- end masonry -->
            </div>
        </section>