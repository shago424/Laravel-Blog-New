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
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('user.list') }}">User</a></li>
                            <li class="active">User List</li>
                        </ol>
                    </div>
                </div>
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
            @endif --}}

         <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="background:#605ca8;color: #fff">
                                <strong class="card-title">User List</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-sm" >
                                    <thead>
                                        <tr style="background-color: #001f3f;color: white">
                                            <th>#</th>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->role->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                            @if($user->status == 1)
                                            <span class="badge badge-success p-2">Active</span>
                                            @else
                                             <span class="badge badge-danger p-2">Inactive</span>
                                             @endif
                                          </td>
                                            <td class="text-center">
                                            @if($user->status == 1)
                                            <a href="{{ route('user.inactive',$user->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                             <a href="{{ route('user.active',$user->id) }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
                                            @endif
                                             <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#viewuser-{{ $user->id }}">
                                                    <i class="fa fa-eye"></i>
                                            </button>

                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edituser-{{ $user->id }}">
                                                    <i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteuser-{{ $user->id }}">
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

{{-- All Modal --}}
<div class="animated">
@foreach($users as $user)
<div class="modal fade" id="viewuser-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:#605ca8;color: #fff">
                                <h5 class="modal-title" id="mediumModalLabel">User Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    {{ $user->id }}
                                </p>
                            </div>
                            <div class="modal-footer" style="background:#605ca8;color: #fff">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                
                            </div>
                        </div>
                    </div>
                </div>

{{-- Edit User Modal --}}
                <div class="modal fade" id="edituser-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:#605ca8;color: #fff">
                                <h5 class="modal-title" id="mediumModalLabel">Update User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              
                                   
                                    <div class="card-body card-block" >
                                        <form action="{{ route('user.update',$user->id) }}" method="post" class="form-horizontal" id="editUser-{{ $user->id }}">
                                            @csrf
                                            {{-- @method('put') --}}
                                             <div class="row form-group">
                                                <div class="col col-md-3"><label for="name" class=" form-control-label">Name</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Enter Name" class="form-control" value="{{ $user->name }}" disabled=""><span class="help-block"><font style="color:red">{{($errors)->has('name')?($errors->first('name')):''}}</font></span></div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="user Name" class=" form-control-label">User ID</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="user_id" name="user_id" placeholder="Enter User Name" class="form-control" value="{{ $user->user_id }}"><span class="help-block"><font style="color:red">{{($errors)->has('user_id')?($errors->first('user_id')):''}}</font></span></div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                                                <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" value="{{ $user->email }}"><span class="help-block"><font style="color:red">{{($errors)->has('email')?($errors->first('email')):''}}</font></span></div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3"><label for="email" class=" form-control-label">Role</label></div>
                                                <div class="col-12 col-md-9">
                                                    <select id="role_id" name="role_id"  class="form-control">

                                                        <option value="">Select Role</option>
                                                        @foreach($roles as $role)
                                                        <option value="{{$role->id}}" {{(@$user->role_id==$role->id)?"selected":""}}>{{$role->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="help-block"><font style="color:red">{{($errors)->has('role_id')?($errors->first('role_id')):''}}</font></span></div>
                                            </div>
                                           
                                        
                                    </div>
                                   
                                
                            </div>
                            <div class="modal-footer" style="background:#605ca8;color: #fff">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-warning" onclick="event.preventDefault();
                                                     document.getElementById('editUser-{{ $user->id }}').submit();">Upadate User</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Delete User Modal --}}

                 <div class="modal fade" id="deleteuser-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:#605ca8;color: #fff">
                                <h5 class="modal-title" id="staticModalLabel">Delete User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Are you sure delete this user?
                                </p>
                            </div>
                            <div class="modal-footer" style="background:#605ca8;color: #fff">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-warning" onclick="event.preventDefault();
                                                     document.getElementById('deleteUser-{{ $user->id }}').submit();">Confirm</button>
                                                     <form action="{{ route('user.delete',$user->id) }}" style="display:none" id="deleteUser-{{ $user->id }}"></form>
                            </div>
                        </div>
                    </div>
                </div>

@endforeach
 
</div>

@endsection
    <!-- Right Panel -->

   