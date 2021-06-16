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
                            <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('user.profile') }}">Profile</a></li>
                            <li class="active">My Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


<div class="row justify-content-center">
<div class="col-md-12 ">
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
                                    <img class="rounded-circle mx-auto d-block" src="{{(!empty(Auth::user()->image))?url('upload/userimage/'.Auth::user()->image):url('upload/usernoimage.jpg')}}" width="200px" height="200px" alt="Card image cap">
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
  <div class="card" style="border-bottom:solid 3px red;">
        <div class="card-header bg-danger text-white">
            <h4>User Details</h4>
        </div>
        <div class="card-body">
            <div class="default-tab">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Profile Details</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Update Profile</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Change Pssword</a>
        </div>
    </nav>
    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
        <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
           
           </p><strong><i class="fa fa-book mr-1"></i> Name</strong>

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
                                         
        <div class="card-body card-block">
            <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                  <div class="row form-group">
                    <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                    <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" disabled="" value="{{ $user->email }}">
                    </div>
                </div>
               
               <div class="row form-group">
                    <div class="col col-md-3"><label for="user_id" class=" form-control-label"> User ID</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="user_id" name="user_id" placeholder="Enter User ID" disabled="" class="form-control" value="{{ $user->user_id }}">
                    </div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-3"><label for="name" class=" form-control-label"> Name</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Enter Name" class="form-control" value="{{ $user->name }}">
                    </div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-3"><label for="ocaption" class=" form-control-label"> Ocaption</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="ocap" name="ocap" placeholder="Enter Ocaption" class="form-control" value="{{ $user->ocap }}">
                    </div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-3"><label for="mobile" class=" form-control-label"> Mobile</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="mobile" name="mobile" placeholder="Enter Mobile" class="form-control" value="{{ $user->mobile }}">
                    </div>
                </div>
               <div class="row form-group">
                    <div class="col col-md-3"><label for="address" class=" form-control-label"> Address</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="address" name="address" placeholder="Enter Address" class="form-control" value="{{ $user->address }}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="facebook" class=" form-control-label"> Facebook Link</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="facebook" name="facebook" placeholder="Enter Facebook Link" class="form-control" value="{{ $user->facebook }}">
                    </div>
                </div>

                 <div class="row form-group">
                    <div class="col col-md-3"><label for="youtube" class=" form-control-label"> Youtube Link</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="youtube" name="youtube" placeholder="Enter Youtube Link" class="form-control" value="{{ $user->youtube }}">
                    </div>
                </div>

                 <div class="row form-group">
                    <div class="col col-md-3"><label for="twitter" class=" form-control-label"> Twitter Link</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="twitter" name="twitter" placeholder="Enter Twitter Link" class="form-control" value="{{ $user->twitter }}">
                    </div>
                </div>

                 <div class="row form-group">
                    <div class="col col-md-3"><label for="instagram" class=" form-control-label"> Instagram Link</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="instagram" name="instagram" placeholder="Enter Instagram Link" class="form-control" value="{{ $user->instagram }}">
                    </div>
                </div>

                 <div class="row form-group">
                    <div class="col col-md-3"><label for="website" class=" form-control-label"> Website Link</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="website" name="website" placeholder="Enter Website Link" class="form-control" value="{{ $user->website }}">
                    </div>
                </div>

                 <div class="row form-group">
                    <div class="col col-md-3"><label for="address" class=" form-control-label"> Image</label></div>
                    <div class="col-12 col-md-9">
                    <img src="{{(!empty($user->image))?url('upload/userimage/'.$user->image):url('upload/usernoimage.jpg')}}" alt="{{ $user->image }}" width="50px" height="50px" />

                        <input type="file" id="image" name="image"  class="form-control">
                    </div>
                </div>
               
                <div class="row form-group">
                    <div class="col col-md-3"><label for="about" class=" form-control-label">About</label></div>
                    <div class="col-12 col-md-9"><textarea name="about" id="summernote" id="about" rows="9" placeholder="Enter About" class="form-control">{{$user->about }}</textarea></div>
                </div>
                 

            <button type="submit" class="btn btn-primary btn float-right">
        <i class="fa fa-dot-circle-o"></i> Submit
            </button>

            <button type="reset" class="btn btn-danger btn float-right" style="margin-right: 5px">
                <i class="fa fa-ban"></i> Reset
            </button>
            </form>
        </div>
     
                                                

            </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="card-body card-block">
            <form action="{{ route('user.password.update') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                  <div class="row form-group">
                    <div class="col col-md-3"><label for="old_password" class=" form-control-label">Old Password</label></div>
                    <div class="col-12 col-md-9"><input type="password" id="old_password" name="old_password" placeholder="Enter Old Password" class="form-control" >
                    </div>
                </div>
               
             <div class="row form-group">
                    <div class="col col-md-3"><label for="password" class=" form-control-label">New Password</label></div>
                    <div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="Enter New Password" class="form-control" >
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="password_confirm" class=" form-control-label">Confirm Password</label></div>
                    <div class="col-12 col-md-9"><input type="password" id="password_confirm" name="password_confirmation" placeholder="Enter Confirm Password" class="form-control" >
                    </div>
                </div>
                 
                <button type="reset" class="btn btn-danger btn " >
                <i class="fa fa-ban"></i> Reset
            </button>
            <button type="submit" class="btn btn-primary btn ">
        <i class="fa fa-dot-circle-o"></i> Submit
            </button>

            
            </form>
        </div>

                   </div>
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

   