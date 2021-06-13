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
                            <li><a href="{{ route('category.list') }}">Category</a></li>
                            <li class="active">Category List</li>
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

      {{--    @if(Session::get('success'))
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
                                <strong class="card-title">Category List
                                    <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target="#addcategory">
                                                    <i class="fa fa-plus-circle"></i> Add Catrgory
                                            </button>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-hover  table-sm" >
                                    <thead>
                                        <tr style="background-color: #001f3f;color: white">
                                            <th>#</th>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $key => $category)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td><img src="{{(!empty($category->image))?url('storage/category/'.$category->image):url('upload/usernoimage.jpg')}}" alt="{{ $category->image }}" width="50px" height="50px" /></td>
                                           
                                            <td>
                                           @if($category->status == 1)
                                            <span class="badge badge-success p-2">Active</span>
                                            @else
                                             <span class="badge badge-danger p-2">Inactive</span>
                                             @endif
                                          </td>
                                            <td class="text-center">
                                                 @if($category->status == 1)
                                            <a href="{{ route('category.inactive',$category->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                             <a href="{{ route('category.active',$category->id) }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
                                            @endif
                                             <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#viewcategory-{{ $category->id }}">
                                                    <i class="fa fa-eye"></i>
                                            </button>

                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editcategory-{{ $category->id }}">
                                                    <i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletecategory-{{ $category->id }}">
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

    {{--Add category Modal --}}
                <div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:#605ca8;color: #fff">
                                <h5 class="modal-title" id="mediumModalLabel">Add Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              
                                   
                                    <div class="card-body card-block" >
                                        <form action="{{ route('category.store') }}" method="post" class="form-horizontal" id="addCategory" enctype="multipart/form-data">
                                            @csrf
                                            {{-- @method('put') --}}
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
                                                    <img src="{{url('upload/usernoimage.jpg')}}" alt="" width="50px" height="50px" />
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
                    </div>
                </div>

{{-- All Modal --}}
<div class="animated">
@foreach($categories as $category)
<div class="modal fade" id="viewcategory-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:#605ca8;color: #fff">
                                <h5 class="modal-title" id="mediumModalLabel">category Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    {{ $category->id }}
                                </p>
                            </div>
                            <div class="modal-footer" style="background:#605ca8;color: #fff">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                
                            </div>
                        </div>
                    </div>
                </div>

{{-- Edit category Modal --}}
                <div class="modal fade" id="editcategory-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:#605ca8;color: #fff">
                                <h5 class="modal-title" id="mediumModalLabel">Update category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              
                                   
                                    <div class="card-body card-block" >
                                        <form action="{{ route('category.update',$category->id) }}" method="post" class="form-horizontal" id="editCategory-{{ $category->id }}">
                                            @csrf
                                            {{-- @method('put') --}}
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="name" class=" form-control-label">Name</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Enter Name" value="{{ $category->name }}" class="form-control" ><span class="help-block"><font style="color:red">{{($errors)->has('name')?($errors->first('name')):''}}</font></span></div>
                                            </div>
                                          
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="description" class=" form-control-label">Description</label></div>
                                                <div class="col-12 col-md-9"><textarea type="text" id="description" name="description" placeholder="Enter Description" class="form-control" rows="5">{{ $category->description }}</textarea><span class="help-block"><font style="color:red">{{($errors)->has('description')?($errors->first('description')):''}}</font></span></div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3"><label for="image" class=" form-control-label">Image</label></div>
                                                <div class="col-12 col-md-9">
                                                    <img src="{{(!empty($category->image))?url('storage/category/'.$category->image):url('upload/usernoimage.jpg')}}" alt="{{ $category->image }}" width="50px" height="50px" />
                                                  <input type="file" id="image" name="image"  class="form-control" ><span class="help-block">
                                                    <span class="help-block"><font style="color:red">{{($errors)->has('image')?($errors->first('image')):''}}</font></span></div>
                                            </div>
                                       
                                        
                                    </div>
                                   
                                
                            </div>
                            <div class="modal-footer" style="background:#605ca8;color: #fff">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-warning" onclick="event.preventDefault();
                                     document.getElementById('editCategory-{{ $category->id }}').submit();">Upadate category</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Delete category Modal --}}

                 <div class="modal fade" id="deletecategory-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:#605ca8;color: #fff">
                                <h5 class="modal-title" id="staticModalLabel">Delete category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Are you sure delete this category?
                                </p>
                            </div>
                            <div class="modal-footer" style="background:#605ca8;color: #fff">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-warning" onclick="event.preventDefault();
                                 document.getElementById('deleteCategory-{{ $category->id }}').submit();">Confirm</button>
                                 <form action="{{ route('category.delete',$category->id) }}" style="display:none" id="deleteCategory-{{ $category->id }}"></form>
                            </div>
                        </div>
                    </div>
                </div>

@endforeach
 
</div>

@endsection
    <!-- Right Panel -->

   