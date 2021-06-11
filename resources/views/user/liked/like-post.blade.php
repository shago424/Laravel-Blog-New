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
                            <li><a href="{{ route('post.list') }}">Post</a></li>
                            <li class="active"> Users Post Liked & View</li>
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

      
         <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="background:#605ca8;color: #fff">
                                <strong class="card-title"> Users Post Liked & View 
                                       <a style="margin-right: 10px;" style="padding-right: 5px" href="{{ route('post.list') }}" class="btn btn-warning btn-sm float-right" >
                                                    <i class="fa fa-list"></i>  Post List
                                     </a>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-hover  table-sm" >
                                    <thead>
                                        <tr style="background-color: #001f3f;color: white">
                                            <th>#</th>
                                            <th>Post Title</th>
                                            <th>Category</th>
                                            <th class="text-center">Views & Liked </th>
                                            <th>Post Date</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(Auth::user()->likedPosts as $key => $likepost)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                           <td><a href="{{ route('single_post',$likepost->slug) }}">{{ $likepost->title }}</a></td>
                                            <td> {{ $likepost->category->name }}</td>
                                            <td class="text-center"> <span  class="badge badge-warning p-2"><i class="fa fa-eye"></i> {{ $likepost->view_count }}</span> <span  class="badge badge-danger p-2"> <i class="fa fa-heart"></i> {{ $likepost->likedUsers->count() }}</span></td>
                                           
                                          
                                            <td>{{$likepost->created_at->diffForHumans() }}</td>
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

   


 


@endsection
    <!-- Right Panel -->

   