@extends('admin.layouts.index')
      
@section('content')
        <!-- /header -->

        <!-- Header-->

       <div class="breadcrumbs" >
            <div class="col-sm-4">
                <div class="page-header float-left" >
                    <div class="page-title">
                        <h1>My Profile</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8" >
                <div class="page-header float-right" >
                    <div class="page-title" >
                        <ol class="breadcrumb text-right" >
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('admin.profile') }}">Profile</a></li>
                            <li class="active">My Profile</li>
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
     

    
         <div class="content mt-3">
           {{--  <div class="animated fadeIn"> --}}
                <div class="row">

                    <div class="col-md-4">
                       <div class="card" style="border-bottom:solid 3px red ;">
                        <div class="card-header bg-danger text-white">
                                <h4>Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="{{asset('backend')}}/images/admin.jpg" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $user->name }}</h5>
                                    <div class="location text-sm-center"><i class="fa fa-map-marker"></i> {{$user->address}}</div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                                    <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                                    <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                                    <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                                </div>
                            </div>
                           {{--  <div class="card-footer">
                                <strong class="card-title mb-3">Profile Card</strong>
                            </div> --}}
                        </div>
                    </div>

                    <div class="col-md-8">
                      <div class="card" style="border-bottom:solid 3px ;">
                            <div class="card-header bg-danger text-white">
                                <h4>Details Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="default-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">User Details</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Update Profile</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="true">Change Password</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <strong><i class="fa fa-book mr-1"></i> Name</strong>

                                            <p class="text-muted">
                                              {{ $user->name }}
                                            </p>

                                             <hr style="border:solid 1px red;">
                                            <strong><i class="fa fa-envelope mr-1"></i> Email</strong>

                                            <p class="text-muted">
                                              {{ $user->email }}
                                            </p>
                                             <hr style="border:solid 1px red;">
                                              <strong><i class="fa fa-mobile mr-1"></i> Mobile</strong>

                                            <p class="text-muted">
                                              {{ $user->mobile }}
                                            </p>


                                           

                                            
                                             <hr style="border:solid 1px red;">
                                            <strong><i class="fa fa-pencil mr-1"></i> Ocaption</strong>

                                            <p class="text-muted">
                                              <span class="tag tag-danger">{{ $user->ocap }}</span>
                                             
                                            </p>
                                             <hr style="border:solid 1px red;">
                                            <strong><i class="fa fa-map-marker mr-1"></i> Location</strong>

                                            <p class="text-muted">{{$user->address}}</p>

                                            
                                             <hr style="border:solid 1px red;">

                                            <strong><i class="fa fa-file mr-1"></i> About</strong>

                                            <p class="text-muted">{!! $user->about !!}</p>
                                            {{-- <hr style="border:solid 1px red;"> --}}
                                            <a href="{{ $user->follow }}" class="btn btn-primary btn-block"><b>Follow</b></a>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <form action="{{ route('category.store') }}" method="post" class="form-horizontal" id="addCategory" enctype="multipart/form-data">
                                            @csrf
                                            {{-- @method('put') --}}
                                              <div class="row form-group">
                                                <div class="col col-md-3"><label for="email" class=" form-control-label">Name</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="name" name="email" placeholder="Enter email" disabled="" class="form-control" value="{{ $user->email }}" class="@error('email') is-invalid @enderror"><span class="help-block"><font style="color:red">{{($errors)->has('email')?($errors->first('email')):''}}</font></span></div>
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3"><label for="name" class=" form-control-label">Name</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Enter Name" class="form-control" class="@error('name') is-invalid @enderror"><span class="help-block"><font style="color:red">{{($errors)->has('name')?($errors->first('name')):''}}</font></span></div>
                                                @error('title')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                          
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="description" class=" form-control-label">Description</label></div>
                                                <div class="col-12 col-md-9"><textarea type="text" id="description" name="description" placeholder="Enter Description" class="form-control" rows="3"></textarea><span class="help-block"><font style="color:red">{{($errors)->has('description')?($errors->first('description')):''}}</font></span></div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3"><label for="image" class=" form-control-label">Image</label></div>
                                                <div class="col-12 col-md-9">
                                                    <img src="{{-- {{(empty($category->image))?:url('upload/usernoimage.jpg')}} --}}" alt="{{-- {{ $category->image }} --}}" width="50px" height="50px" />
                                                  <input type="file" id="image" name="image"  class="form-control" ><span class="help-block">
                                                    <span class="help-block"><font style="color:red">{{($errors)->has('image')?($errors->first('image')):''}}</font></span></div>
                                            </div>
                                           
                                        
                                    </div>
                                   
                                
                            </div>
                            <div class="modal-footer" style="background:#605ca8;color: #fff">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-warning" onclick="event.preventDefault();
                                     document.getElementById('addCategory').submit();">Add Category</button>
                            </div>
                            </form>
                                        </div>
                                        {{-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                                            helo
                                           
                                        </div> --}}
                                    </div>

                                </div>
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

   