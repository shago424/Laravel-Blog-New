  @extends('frontend.layouts.index')
@section('content')

 <div class="page-title wb" style="background-color:#605ca8;color: #fff;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2 style="color:white"><i class="fa fa-leaf bg-green"></i> Post Details</h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" style="font-size:20px"><a style="color:#fff" href="{{ route('public') }}">Home</a></li>
                            <li style="font-size:20px;color:#fff" class="breadcrumb-item active">Category : {{ $post->category->name }}</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div>

 <section class="section wb">
            <div class="container">
                   @if(Session::get('success'))
               <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>{{session::get('success')}}</strong> </div> 
            @endif
              @if(Session::get('message'))
               <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>{{session::get('message')}}</strong> </div> 
            @endif
                <div class="row pb-3">
                 
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area">
                                <span class="color-green"><a href="{{ route('all-category',$post->category->slug) }}" title="">{{ $post->category->name }}</a></span>

                                <h3>{{ $post->title }}</h3>

                                <div class="blog-meta big-meta">
                                    <small><a style="color:green;font-size: 14px;font-weight:bolder;" href="garden-single.html" title="">{{date('d-M-y h:A',strtotime($post->created_at))}}</a></small>
                                    <small><a style="color:green;font-size: 14px;font-weight:bolder;" href="blog-author.html" title=""><i class="fa fa-user" style="color:green;font-size: 14px;font-weight:bolder;"></i> by {{ $post->user->name }}</a></small>
                                    <small><i class="fa fa-eye" style="color:green;font-size: 16px;font-weight:bolder;"> {{ $post->view_count }} View </i></small>

                                     <small>

                                       @guest
                                       <i class="fa fa-heart" style="color:green;font-size: 16px;font-weight:bolder;"> {{ $post->likedUsers->count() }}  </i>
                                       @else
                                        <a style="color:green;font-size: 14px;font-weight:bolder;" href="javascript:void(0);" onclick="document.getElementById('like-form-{{ $post->id}}').submit();" title=" Post Like"><i class="fa fa-heart" style="color:{{ Auth::user()->likedPosts()->where('post_id',$post->id)->count() > 0  ? 'red'  : '' }};font-size: 16px;font-weight:bolder;"></i> {{ $post->likedUsers->count() }} </a>

                                        <form action="{{ route('like.post',$post->id) }}" method="POST" style="display: none;" id="like-form-{{ $post->id }}">
                                            @csrf
                                        </form>
                                       @endguest

                                       </small>

                                      <small><a style="color:green;font-size: 14px;font-weight:bolder;" href="{{route('single_post',$post->slug) }}" title=""><i class="fa fa-comment-o" style="color:green;font-size: 16px;font-weight:bolder;"></i> {{ $post->comments->count('id') }}</a></small>
                                </div><!-- end meta -->

                                <div class="post-sharing" >
                                     <ul><li><div class="addthis_inline_share_toolbox_zvrc "></div></li></ul>
                 
                                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                        {{-- <div class="addthis_inline_share_toolbox p-2"></div> --}}
                                    
                                    </div>
                                     <div class="fb-share-button pb-2 p-2" 
                                        data-href="https://www.your-domain.com/your-page.html" 
                                        data-layout="button_count">
                                        </div>
                                    {{-- <ul class="list-inline">
                                        <li><a href="#"  id="gmail-btn"><i class="fa fa-envelope-o" aria-hidden="true" class="btn btn-primary" style="color:#cf3e39;font-size:2rem;padding: 5px"></i></a></li>

                                        <li><a href="#" id="facebook-btn"><i class="fa fa-facebook-square" aria-hidden="true" class="btn btn-primary" style="color:#3b5998;font-size:2rem;padding: 5px"></i></a></li>

                                        <li><a href="#" id="gplus-btn"><i class="fa fa-google-plus-square" aria-hidden="true" class="btn btn-primary" style="color:#dd4b39;font-size:2rem;padding: 5px"></i></a></li>

                                        <li><a href="#" id="twitter-btn"><i class="fa fa-twitter-square" aria-hidden="true" class="btn btn-primary" style="color:#1da1f2;font-size:2rem;padding: 5px"></i></a></li>

                                        <li><a href="#" id="linked-btn"><i class="fa fa-linkedin-square" aria-hidden="true" class="btn btn-primary" style="color:#0077b5;font-size:2rem;padding: 5px"></i></a></li>

                                        <li><a href="#" id="whatsapp-btn"><i class="fa fa-whatsapp" aria-hidden="true" class="btn btn-primary" style="color:lightgreen;font-size:2rem;padding: 5px"></i></a></li>

                                        <li><a href="#" id="whatsapp-btn"><i class="fa fa-share-square" aria-hidden="true" class="btn btn-primary" style="color:lightblue;font-size:2rem;padding: 5px"></i></a></li>

                                        </ul> --}}
                                   {{--  <button class="btn btn-primary p-2" id="share-btn2" ><i class="fa fa-share"></i> Share</button>  --}}
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="{{(!empty($post->image))?url('storage/post/'.$post->image):url('upload/usernoimage.jpg')}}"  alt="" class="img-fluid" style="width:600px;height:460px">
                            </div><!-- end media -->

                            <div class="blog-content">  
                                <div class="pp">
                                    <p>{!! $post->body !!}</p>

                                </div><!-- end pp -->

                              @php
                              $tags = App\Models\Tag::where('postID',$post->id)->get();
                              @endphp

                               <!-- end pp -->
                            </div><!-- end content -->

                            <div class="blog-title-area">
                                <div class="tag-cloud-single">
                                    <span>Tags</span>
                                    @foreach($tags as $tag)
                                    <big><a href="{{ route('all-tag',$tag->name) }}" title=""> <span  style="background-color:red;">{{$tag->name}}</span> </a></big>
                                    @endforeach
                                    
                                </div><!-- end meta -->

                                <div class="blog-meta big-meta mt-3 mb-3">
                                    <small><a style="color:green;font-size: 14px;font-weight:bolder;" href="garden-single.html" title="">{{date('d-M-y h:A',strtotime($post->created_at))}}</a></small>
                                    <small><a style="color:green;font-size: 14px;font-weight:bolder;" href="blog-author.html" title=""><i class="fa fa-user" style="color:green;font-size: 14px;font-weight:bolder;"></i> by {{ $post->user->name }}</a></small>
                                    <small><i class="fa fa-eye" style="color:green;font-size: 16px;font-weight:bolder;"> {{ $post->view_count }} View</i> </small>

                                     <small>

                                       @guest
                                       <i class="fa fa-heart" style="color:green;font-size: 16px;font-weight:bolder;"> {{ $post->likedUsers->count() }} </i>
                                       @else
                                        <a style="color:green;font-size: 14px;font-weight:bolder;" href="javascript:void(0);" onclick="document.getElementById('like-form-{{ $post->id}}').submit();" title=" Post Like"><i class="fa fa-heart" style="color:{{ Auth::user()->likedPosts()->where('post_id',$post->id)->count() > 0  ? 'red'  : '' }};font-size: 16px;font-weight:bolder;"></i> {{ $post->likedUsers->count() }} </a>

                                        <form action="{{ route('like.post',$post->id) }}" method="POST" style="display: none;" id="like-form-{{ $post->id }}">
                                            @csrf
                                        </form>
                                       @endguest

                                       </small>

                                      <small><a style="color:green;font-size: 14px;font-weight:bolder;" href="{{route('single_post',$post->slug) }}" title=""><i class="fa fa-comment-o" style="color:green;font-size: 16px;font-weight:bolder;"></i> {{ $post->comments->count('id') }}</a></small>
                                </div><!-- end meta -->

                                <div class="post-sharing mt-3" id="social-links">
                                    <ul class="list-inline">
                                       {{--  <div class="addthis_inline_share_toolbox_zvrc "></div> --}}
                                      {{--   <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li> --}}

                                          <li><a href="#" id="gmail-btn"><i class="fa fa-envelope-o" aria-hidden="true" class="btn btn-primary" style="color:#cf3e39;font-size:2rem;padding: 5px"></i></a></li>

                                        <li><a href="#" id="facebook-btn"><i class="fa fa-facebook-square" aria-hidden="true" class="btn btn-primary" style="color:#3b5998;font-size:2rem;padding: 5px"></i></a></li>

                                        <li><a href="#" id="gplus-btn"><i class="fa fa-google-plus-square" aria-hidden="true" class="btn btn-primary" style="color:#dd4b39;font-size:2rem;padding: 5px"></i></a></li>

                                        <li><a href="#" id="twitter-btn"><i class="fa fa-twitter-square" aria-hidden="true" class="btn btn-primary" style="color:#1da1f2;font-size:2rem;padding: 5px"></i></a></li>

                                        <li><a href="#" id="linkedin-btn"><i class="fa fa-linkedin-square" aria-hidden="true" class="btn btn-primary" style="color:#0077b5;font-size:2rem;padding: 5px"></i></a></li>

                                        <li><a href="#" id="whatsapp-btn"><i class="fa fa-whatsapp" aria-hidden="true" class="btn btn-primary" style="color:lightgreen;font-size:2rem;padding: 5px"></i></a></li>
                                    </ul>

                                    <button class="btn btn-primary p-2"   id="share-btn"><i class="fa fa-share"></i> Share</button>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-spot clearfix">
                                        <div class="banner-img">
                                            <img src="{{ asset('frontend') }}/upload/banner_01.jpg" alt="" class="img-fluid">
                                        </div><!-- end banner-img -->
                                    </div><!-- end banner -->
                                </div><!-- end col -->
                            </div><!-- end row -->

                            <hr class="invis1">

                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">About Create Author</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="{{(!empty($post->user->image))?url('upload/userimage/'.$post->user->image):url('upload/usernoimage.jpg')}}" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="#">{{ $post->user->name }}</a></h4>
                                        <p> Email : {{ $post->user->email }}</p>
                                        <p> Ocouption : {{ $post->user->ocap }}</p>
                                        {{-- <p>{!! $post->user->about !!}</p> --}}

                                        <div class="topsocial">
                                            <a target="_blank" href="{{ $post->user->facebook }}" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a target="_blank" href="{{ $post->user->youtube }}" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a target="_blank" href="{{ $post->user->twitter }}" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a target="_blank" href="{{ $post->user->instagram }}" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                           {{--  <a target="_blank" href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a> --}}
                                            <a target="_blank" href="{{ $post->user->website }}" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-internet-explorer"></i></a>
                                            
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">You may also like</h4>
                                <div class="row">
                                    @foreach($populars as $popular)
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="{{ route('single_post',$popular->slug) }}" title="">
                                                    <img src="{{(!empty($popular->image))?url('storage/post/'.$popular->image):url('upload/usernoimage.jpg')}}" alt="" class="img-fluid" style="width:400px;height: 200px">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                <h4><a href="{{ route('single_post',$popular->slug) }}" title="">{{ Str::limit($popular->title, 30) }}</a></h4>
                                                <small><a href="{{ route('all-category',$popular->category->slug) }}" title="">{{ $popular->category->name }}</a></small>
                                                <small><a href="blog-category-01.html" title="">{{ $popular->created_at->diffForHumans() }}</a></small>

                                        
                                         <small><a href="garden-category.html" title=""><i class="fa fa-eye"></i> {{ $popular->view_count }}</a></small>
                                          @guest
                                        <small><i class="fa fa-heart"> {{ $popular->likedUsers->count() }}</i></small>
                                        @else
                                        <small><i style="color:{{ Auth::user()->likedPosts()->where('post_id',$popular->id)->count() > 0  ? 'red'  : '' }}" class="fa fa-heart"> {{ $popular->likedUsers->count() }}</i></small>
                                        @endguest
                                      <small><a href="{{route('single_post',$popular->slug) }}" title=""><i class="fa fa-comment-o"></i> {{ $popular->comments->count('id') }}</a></small>
                                      <small><a href="#" title=""> by {{ $popular->user->name }}</a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                    @endforeach
                                   
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">
                            @php
                            // $com = App\Models\Comment::all();
                            $comment = $post->comments->count('id');
                            
                            // $reply  = App\Models\CommentReply::where('id',$com->id)->get();
                            // $total = $comment+$reply;
                            @endphp
                            <div class="custombox clearfix">
                                <h4 class="small-title">{{ $comment }}  Comments</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
                                            @foreach($post->comments->where('status',1) as $comment)
                                           
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="{{(!empty($comment->user->image))?url('upload/userimage/'.$comment->user->image):url('upload/usernoimage.jpg')}}" alt="{{ $comment->user->name }}" class="rounded-circle" width="50px" height="50px">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name">{{ $comment->user->name }} <small>{{ $comment->created_at->diffForHumans() }}</small></h4>
                                                    <p>{!! $comment->comment !!}</p>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#comment-{{ $comment->id }}">
                                                      Comment Reply
                                                    </button>

                                                    {{-- Reply Comment --}}

                                                     <div class="row pt-3 message">
                                                <div class="col-lg-12">
                                                    <div class="comments-list">

                                            @foreach($comment->replies as $reply)
                                               
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="{{(!empty($reply->user->image))?url('upload/userimage/'.$reply->user->image):url('upload/usernoimage.jpg')}}" alt="{{ $reply->user->name }}" class="rounded-circle" width="50px" height="50px">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name">{{ $reply->user->name }} <small>{{ $reply->created_at->diffForHumans() }}</small></h4>
                                                    <p>{!! $reply->message !!}</p>
                                                    @guest
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                      Comment Reply  
                                                    </button>

                                                    @else
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reply-{{ $reply->comment_id }}">
                                                      Comment Reply
                                                    </button>
                                                    @endguest
                                               
                                                </div>
                                                
                                            </div>
                                            @endforeach
                                        </div>  
                                    </div>
                                </div>

                                            {{-- End Reply Comment --}}
                                               
                                                </div>
                                                
                                            </div>
                                            @endforeach
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">
                            @guest
                               <div class="custombox clearfix">
                                <h4 class="small-title">Please Login To Comment</h4>
                            </div>
                            @else
                               <div class="custombox clearfix">
                                <h4 class="small-title">Write Comment</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form method="POST" action="{{ route('comment.store',$post->id) }}" class="form-wrapper">
                                            @csrf
                                            <textarea name="comment" class="form-control" placeholder="Your comment"></textarea>
                                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endguest
                         
                        
                    </div> <!-- end col -->

                     @include('frontend.layouts.sidebar')
                </div><!-- end row -->
            </div><!-- end container -->



        <!-- Button trigger modal -->


<!-- Modal -->
@guest
@foreach($post->comments as $comment)
<div class="modal fade" id="comment-{{ $comment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel">Please Login To Comment Reply</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           
                                
                  
      </div>
      <div class="modal-footer">
        <button type="button" class="" data-dismiss="modal"></button>
       <button type="submit" class="" onclick="event.preventDefault();
                                     document.getElementById('Comment-{{ $comment->id }}').submit();"></button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach

@else

@foreach($post->comments as $comment)
<div class="modal fade" id="comment-{{ $comment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           
                                
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="{{ route('comment.reply.store',$comment->id) }}" class="form-wrapper" id="Comment-{{ $comment->id }}">
                @csrf
                <textarea name="message" class="form-control"  >@ {{$comment->user->name }} --- </textarea>
            
        </div>
    </div>
                            
      </div>
      <div class="modal-footer bg-info">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button type="submit" class="btn btn-warning" onclick="event.preventDefault();
                                     document.getElementById('Comment-{{ $comment->id }}').submit();">Comment Reply Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@endguest

{{-- Reply Reply Comment --}}

@guest
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel">Please Login To Comment Reply</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="" data-dismiss="modal"></button>
        <button type="button" class=""></button>
      </div>
    </div>
  </div>
</div>
@else

@if($post->comments->count() > 0 )
@foreach($comment->replies as $reply)
<div class="modal fade" id="reply-{{ $reply->comment_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel">Comment Reply</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           
                                
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="{{ route('comment.reply.store',$reply->comment_id) }}" class="form-wrapper" id="ReplyComment-{{ $reply->comment_id }}">
                @csrf
                <textarea name="message" class="form-control"  >@ {{$reply->user->name }} </textarea>
            
        </div>
    </div>
                            
      </div>
      <div class="modal-footer bg-info">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button type="submit" class="btn btn-warning" onclick="event.preventDefault();
                                     document.getElementById('ReplyComment-{{ $reply->comment_id }}').submit();">Reply Comment Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@else
@endif

@endguest

<script>
    const gmailBtn = document.getElementById('gmail-btn');
    const facebookBtn = document.getElementById('facebook-btn');
    const gplusBtn = document.getElementById('gplus-btn');
    const twitterBtn = document.getElementById('twitter-btn');
    const linkedinBtn = document.getElementById('linkedin-btn');
    const whatsappBtn = document.getElementById('whatsapp-btn');
    const socialBtn = document.getElementById('social-links');

    let postUrl = encodeURI(document.location.href);
    let postTitle = encodeURI('{{ $post->title }}');

    facebookBtn.setAttribute("href",`https://www.facebook.com/sharer.php?u=${postUrl}`);
    twitterBtn.setAttribute("href", `https://twitter.com/share?url=${postUrl}&text=${postTitle}`);
    linkedinBtn.setAttribute("href", `https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}`);
    whatsappBtn.setAttribute("href",`https://wa.me/?text=${postTitle} ${postUrl}`);
    gmailBtn.setAttribute("href",`https://mail.google.com/mail/?view=cm&su=${postTitle}&body=${postUrl}`);
    gplusBtn.setAttribute("href",`https://plus.google.com/share?url=${postUrl}`);

// Share Button
const shareBtn = document.getElementById('share-btn');
const shareBtn2 = document.getElementById('share-btn2');

if(navigator.share){
shareBtn.style.display ='block';
socialBtn.style.display = 'block';
shareBtn.addEventListener('click',() =>{
navigator.share({
title:postTitle,
url:postUrl
}).then((result)=>{
    alert('Thank You For Sharing')
}).catch((error)=>{
console.log(error);
});
});
}else{


}

if(navigator.share){
shareBtn2.style.display ='block';
socialBtn.style.display = 'block';
shareBtn.addEventListener('click',() =>{
navigator.share({
title:postTitle,
url:postUrl
}).then((result)=>{
    alert('Thank You For Sharing')
}).catch((error)=>{
console.log(error);
});
});
}else{


}




</script>
                            
                

  @endsection    
