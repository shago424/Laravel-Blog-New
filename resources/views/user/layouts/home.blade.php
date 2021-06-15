@extends('admin.layouts.index')
      
@section('content')
        <!-- /header -->

            <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            {{-- <li class="active">Data table</li> --}}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header-->

      

        <div class="content mt-3">

          <!--   <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div> -->


          

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-primary">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="{{ route('post.list') }}">Post List</a>
                                    {{-- <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a> --}}
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{ $posts->count() }}</span>
                        </h4>
                        <p class="text-light">Total Posts</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

           

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-danger">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                   {{--  <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a> --}}
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{ $comments->count() }}</span>
                        </h4>
                        <p class="text-light">Total Comments</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-dark">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                   {{--  <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a> --}}
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{ $posts->sum('view_count') }}</span>
                        </h4>
                        <p class="text-light">Total Views</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
            </div>


             <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-success">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                   {{--  <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a> --}}
                                </div>
                            </div>
                        </div>
                        @php
                        $likes = DB::table('post_user');
                        @endphp
                        <h4 class="mb-0">
                            <span class="count">{{ $likes->count() }}</span>
                        </h4>
                        <p class="text-light">Total Liked</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
            </div>

            <!--/.col-->


        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="background:#605ca8;color: #fff">
                                <strong class="card-title">Recent Comments</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-sm" >
                                    <thead>
                                        <tr style="background-color: #001f3f;color: white">
                                            <th>#</th>
                                            <th>Message</th>
                                            <th>User Name</th>
                                            <th>Post Title</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($comments as $key => $comment)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ Str::limit($comment->comment, 20 )}}</td>
                                            
                                            <td>{{ $comment->user->name }}</td>
                                            <td><a target="_blank" href="{{ route('single_post',$comment->post->slug) }}">{{ Str::limit($comment->post->title, 20 )}}</a></td>
                                            <td>{{$comment->created_at->diffForHumans() }}</td>
                                            <td>
                                           @if($comment->status == 1)
                                            <span class="badge badge-success p-2">Published</span>
                                            @else
                                             <span class="badge badge-danger p-2">Draft</span>
                                             @endif
                                          </td>
                                            <td class="text-center">
                                                 @if($comment->status == 1)
                                            <a href="{{ route('comment.inactive',$comment->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                             <a href="{{ route('comment.active',$comment->id) }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
                                            @endif
                                             <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#viewcomment-{{ $comment->id }}">
                                                    <i class="fa fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletecomment-{{ $comment->id }}">
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



    <div class="animated">
@foreach($comments as $comment)
<div class="modal fade" id="viewcomment-{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:#605ca8;color: #fff">
                                <h5 class="modal-title" id="mediumModalLabel">Post Title : {{ $comment->post->title }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 <table id="bootstrap-data-table-export" class="table table-hover table-bordered  table-sm" >
                                        <tr >
                                            <th width="25%">Comment ID</th>
                                            <td>{{ $comment->id }}</td>
                                        </tr>
                                          <tr>
                                            <th>Comment User</th>
                                            <td>{{ $comment->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <td>{{$comment->created_at->diffForHumans() }}
                                         </td>
                                         </tr>
                                         <tr>       
                                            <th>Comment</th>
                                             <td>{{ $comment->comment }}</td>
                                        </tr>
                                        <tr>       
                                            <th>Status</th>
                                             <td>{{ $comment->status }}</td>
                                        </tr>
                                    
                                    
                                </table>
                            </div>
                            <div class="modal-footer" style="background:#605ca8;color: #fff">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                
                            </div>
                        </div>
                    </div>
                </div>



                {{-- Delete comment Modal --}}

                 <div class="modal fade" id="deletecomment-{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:#605ca8;color: #fff">
                                <h5 class="modal-title" id="staticModalLabel">Delete comment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Are you sure delete this comment?
                                </p>
                            </div>
                            <div class="modal-footer" style="background:#605ca8;color: #fff">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-warning" onclick="event.preventDefault();
                                 document.getElementById('deleteComment-{{ $comment->id }}').submit();">Confirm</button>
                                 <form action="{{ route('comment.delete',$comment->id) }}" style="display:none" id="deleteComment-{{ $comment->id }}"></form>
                            </div>
                        </div>
                    </div>
                </div>

@endforeach
@endsection
    <!-- Right Panel -->

   