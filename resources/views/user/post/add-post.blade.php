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
                            <li><a href="{{ route('user.post.list') }}">Post List</a></li>
                            <li class="active">Add Post</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


<div class="row justify-content-center">
<div class="col-md-8 "style="padding-left: 5px;">
       @if ($errors->any())
    <div class="alert alert-danger" >
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
</div>
     

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
           {{--  <div class="animated fadeIn"> --}}
                <div class="row justify-content-center">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="background:#605ca8;color: #fff">
                                <strong>Add Post
                                  
                                             <a href="{{ route('user.post.list') }}" class="btn btn-warning float-right">
                                                    <i class="fa fa-list"></i>  Post List
                                            </a>
                                </strong>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.post.store') }}" method="post" class="form-horizontal"  enctype="multipart/form-data">
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
                                             <div class="row form-group ">
                                                <div class="col col-md-3"><label for="title" class=" form-control-label ">Title</label></div>
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
                                                <div class="col-12 col-md-9" ><textarea type="text"  name="body" placeholder="Enter Description" id="summernote" class="form-control" rows="3"></textarea><span class="help-block"><font style="color:red">{{($errors)->has('body')?($errors->first('body')):''}}</font></span></div>
                                            </div>
                                             <div class="row form-group ">
                                                <div class="col col-md-3"><label for="image" class=" form-control-label">Image</label></div>
                                                <div class="col-12 col-md-9">
                                                    <img src="{{url('upload/usernoimage.jpg')}}" width="50px" height="50px" />
                                                  <input type="file" id="image" name="image"  class="form-control" ><span class="help-block">
                                                    <span class="help-block">{{-- <font style="color:red">{{($errors)->has('image')?($errors->first('image')):''}}</font> --}}</span></div>
                                            </div>
                                           
                                        
                            
                            <div class="row form-group justify-content-end" style="margin-right:10px">
                               
                                <button type="button" class="btn btn-danger" style="margin-right:10px">Cancel</button>
                                 <button type="submit" class="btn btn-primary float-right" >Add Post</button>
                            </div>
                                   
                               </form> 
                            
                            
                            </div>
                        </div>
                    </div>


                </div>
            {{-- </div>.animated --}}
        </div><!-- .content -->

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

   


@endsection
    <!-- Right Panel -->

   