@extends('admin.layouts.index')
      
@section('content')
        <!-- /header -->

        <!-- Header-->

       <div class="breadcrumbs" >
            <div class="col-sm-4">
                <div class="page-header float-left" >
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8" >
                <div class="page-header float-right" >
                    <div class="page-title" >
                        <ol class="breadcrumb text-right" >
                            <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('user.post.list') }}">Post</a></li>
                            <li class="active">Post List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

         {{-- @if(Session::get('success'))
               <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>{{session::get('success')}}</strong> </div> 
            @endif

            @if(Session::get('error'))
               <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>{{session::get('error')}}</strong> </div> 
            @endif
 --}}
         <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="background:#605ca8;color: #fff">
                                <strong class="card-title">Post List
                                    <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target="#addpost">
                                     <i class="fa fa-plus-circle"></i> Add Post 
                                      </button>
                                       <a style="margin-right: 10px;" style="padding-right: 5px" href="{{ route('user.post.create') }}" class="btn btn-danger btn-sm float-right" >
                                                    <i class="fa fa-plus-circle"></i> Add Post
                                     </a>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-hover  table-sm" >
                                    <thead>
                                        <tr style="background-color: #001f3f;color: white">
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Post User</th>
                                            <th>Category</th>
                                            <th width="20px">Title</th>
                                            <th>Post Date</th>
                                            <th class="text-center">View/Like</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $key => $post)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->category->name }}</td>
                                            <td><a href="{{ route('single_post',$post->slug) }}">{{ $post->title }}</a></td>
                                            <td>{{date('d-m-Y - h:A',strtotime( $post->created_at)) }}</td>
                                            <td class="text-center"> <span  class="btn btn-warning btn-sm "><i class="fa fa-eye"></i> {{ $post->view_count }}</span> <a href="{{ route('user.post.like.user',$post->id) }}" class="btn btn-danger btn-sm"> <i class="fa fa-heart"></i> {{ $post->likedUsers->count() }}</a>{{-- <img src="{{(!empty($post->image))?url('storage/post/'.$post->image):url('upload/usernoimage.jpg')}}" alt="{{ $post->image }}" width="50px" height="50px" /> --}}</td>
                                           
                                            <td>
                                           @if($post->status == 1)
                                            <span class="badge badge-success p-2">Published</span>
                                            @else
                                             <span class="badge badge-danger p-2">Draft</span>
                                             @endif
                                          </td>
                                            <td class="text-center">
                                                 @if($post->status == 1)
                                            <a href="{{ route('user.post.inactive',$post->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                             <a href="{{ route('user.post.active',$post->id) }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
                                            @endif
                                             <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#viewpost-{{ $post->id }}">
                                                    <i class="fa fa-eye"></i>
                                            </button>

                                          {{--   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editpost-{{ $post->id }}">
                                                    <i class="fa fa-pencil"></i>
                                            </button> --}}

                                             <a href="{{ route('user.post.edit',$post->id) }}" class="btn btn-success btn-sm" >
                                                    <i class="fa fa-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletepost-{{ $post->id }}">
                                                    <i class="fa fa-trash"></i>
                                            </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    {{--Add post Modal --}}
                <div class="modal fade" id="addpost" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg " role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:#605ca8;color: #fff">
                                <h5 class="modal-title" id="mediumModalLabel">Add Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                   

                                   
                                    <div class="card-body card-block" >
                                        <form action="{{ route('user.post.store') }}" method="post" class="form-horizontal" id="addPost" enctype="multipart/form-data">
                                            @csrf
                                            {{-- @method('put') --}}
                                              <div class="row form-group ">
                                                <div class="col col-md-3"><label for="category_id" class=" form-control-label ">Category</label></div>
                                                <div class="col-12 col-md-9"><select  id="category_id" name="category_id"  class="form-control" class="@error('category_id') is-invalid @enderror">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                    <span class="help-block">{{-- <font style="color:red">{{($errors)->has('category_id')?($errors->first('category_id')):''}}</font> --}}</span></div>
                                               {{--  @error('category_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror --}}
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3"><label for="title" class=" form-control-label">Title</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="title" name="title" placeholder="Enter title" class="form-control" class="@error('title') is-invalid @enderror"><span class="help-block">{{-- <font style="color:red">{{($errors)->has('title')?($errors->first('title')):''}}</font> --}}</span></div>
                                               {{--  @error('title')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror --}}
                                            </div>

                                                <div class="row form-group ">
                                                <div class="col col-md-3"><label for="tags" class=" form-control-label ">Tags (Separated)</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="tags" name="tags" placeholder="Enter Tag (Separated)" class="form-control" class="@error('tag') is-invalid @enderror"><span class="help-block">{{-- <font style="color:red">{{($errors)->has('tags')?($errors->first('tags')):''}}</font> --}}</span></div>
                                               {{--  @error('tags')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror --}}
                                            </div>
                                          
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="body" class=" form-control-label">Description</label></div>
                                                <div class="col-12 col-md-9" ><textarea type="text"  name="body" placeholder="Enter Description" id="summernote" class="form-control" rows="3"></textarea><span class="help-block">{{-- <font style="color:red">{{($errors)->has('body')?($errors->first('body')):''}}</font> --}}</span></div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3"><label for="image" class=" form-control-label">Image</label></div>
                                                <div class="col-12 col-md-9">
                                                    <img src="{{url('upload/usernoimage.jpg')}}" width="50px" height="50px" />
                                                  <input type="file" id="image" name="image"  class="form-control" ><span class="help-block">
                                                    <span class="help-block">{{-- <font style="color:red">{{($errors)->has('image')?($errors->first('image')):''}}</font> --}}</span></div>
                                            </div>
                                           
                                        
                                    </div>
                                   
                                
                            </div>
                            <div class="modal-footer" style="background:#605ca8;color: #fff">
                                <button type="submit" class="btn btn-warning" onclick="event.preventDefault();
                                     document.getElementById('addPost').submit();">Add Post</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

{{-- All Modal --}}
<div class="animated">
@foreach($posts as $post)
<div class="modal fade" id="viewpost-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:#605ca8;color: #fff">
                                <h5 class="modal-title" id="mediumModalLabel">Post Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    {{ $post->id }}
                                </p>
                            </div>
                            <div class="modal-footer" style="background:#605ca8;color: #fff">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                
                            </div>
                        </div>
                    </div>
                </div>

{{-- Edit post Modal --}}
                <div class="modal fade" id="editpost-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg " role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:#605ca8;color: #fff">
                                <h5 class="modal-title" id="mediumModalLabel">Update Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              
                                   
                                    <div class="card-body card-block" >
                                        <form action="{{ route('user.post.update',$post->id) }}" method="post" class="form-horizontal" id="editPost-{{ $post->id }}">
                                            @csrf

                                              <div class="row form-group ">
                                                <div class="col col-md-3"><label for="category_id" class=" form-control-label ">Category</label></div>
                                                <div class="col-12 col-md-9"><select  id="category_id" name="category_id"  class="form-control" class="@error('category_id') is-invalid @enderror">
                                                    <option value="">Select Category</option>
                                                   @foreach($categories as $category)
                                               <option value="{{$category->id}}" {{($post->category_id==$category->id)?"selected":""}}>{{$category->name}}</option>
                                                @endforeach
                                                </select>
                                                    <span class="help-block">{{-- <font style="color:red">{{($errors)->has('category_id')?($errors->first('category_id')):''}}</font> --}}</span></div>
                                               {{--  @error('category_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror --}}
                                            </div>
                                            {{-- @method('put') --}}
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="title" class=" form-control-label">Title</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="title" name="title" placeholder="Enter title" value="{{ $post->title }}" class="form-control" ><span class="help-block">{{-- <font style="color:red">{{($errors)->has('title')?($errors->first('title')):''}}</font> --}}</span></div>
                                            </div>

                                               <div class="row form-group ">
                                                <div class="col col-md-3"><label for="tags" class=" form-control-label ">Tags (Separated)</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="tags" name="tags" value="{{ $post->tag }}" placeholder="Enter Tag (Separated)" class="form-control" class="@error('tag') is-invalid @enderror"><span class="help-block">{{-- <font style="color:red">{{($errors)->has('tags')?($errors->first('tags')):''}}</font> --}}</span></div>
                                               {{--  @error('tags')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror --}}
                                            </div>
                                          
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="body" class=" form-control-label">Description</label></div>
                                                <div class="col-12 col-md-9" ><textarea type="text"  name="body" placeholder="Enter Description" id="summernote" class="form-control" rows="3">{{ $post->body }}</textarea><span class="help-block">{{-- <font style="color:red">{{($errors)->has('body')?($errors->first('body')):''}}</font> --}}</span></div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3"><label for="image" class=" form-control-label">Image</label></div>
                                                <div class="col-12 col-md-9">
                                                    <img src="{{(!empty($post->image))?url('storage/post/'.$post->image):url('upload/usernoimage.jpg')}}" alt="{{ $post->image }}" width="50px" height="50px" />
                                                  <input type="file" id="image" name="image"  class="form-control" ><span class="help-block">
                                                    <span class="help-block">{{-- <font style="color:red">{{($errors)->has('image')?($errors->first('image')):''}}</font> --}}</span></div>
                                            </div>
                                       
                                        
                                    </div>
                                   
                                
                            </div>
                            <div class="modal-footer" style="background:#605ca8;color: #fff">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-warning" onclick="event.preventDefault();
                                     document.getElementById('editPost-{{ $post->id }}').submit();">Upadate Post</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Delete post Modal --}}

                 <div class="modal fade" id="deletepost-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:#605ca8;color: #fff">
                                <h5 class="modal-title" id="staticModalLabel">Delete Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Are you sure delete this post?
                                </p>
                            </div>
                            <div class="modal-footer" style="background:#605ca8;color: #fff">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-warning" onclick="event.preventDefault();
                                 document.getElementById('deletePost-{{ $post->id }}').submit();">Confirm</button>
                                 <form action="{{ route('user.post.delete',$post->id) }}" style="display:none" id="deletePost-{{ $post->id }}"></form>
                            </div>
                        </div>
                    </div>
                </div>

@endforeach
 
</div>

@endsection
    <!-- Right Panel -->

   