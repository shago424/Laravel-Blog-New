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
                            <li><a href="{{ route('user.comment.reply.list') }}">Comment Reply</a></li>
                            <li class="active">Comment Reply List</li>
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
                                <strong class="card-title">Comment Reply List
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-hover  table-sm" >
                                      <thead>
                                        <tr style="background-color: #001f3f;color: white">
                                            <th>#</th>
                                            <th>Comment User</th>
                                            <th>Date</th>
                                            <th>Post</th>
                                            <th>Reply Comment</th>
                                            <th>To Comment</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($replies as $key => $comment)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $comment->user->name }}</td>
                                            <td>{{$comment->created_at->diffForHumans() }}</td>
                                             <td><a href="{{ route('single_post',$comment->comment->post->slug )}}">{{ $comment->comment->post->title }}</a></td>
                                            <td>{{ $comment->comment->comment }}</td>
                                            <td>{{ $comment->message }}</td>
                                            <td>
                                           @if($comment->status == 1)
                                            <span class="badge badge-success p-2">Published</span>
                                            @else
                                             <span class="badge badge-danger p-2">Draft</span>
                                             @endif
                                          </td>
                                            <td class="text-center">
                                                 @if($comment->status == 1)
                                            <a href="{{ route('admin.comment.reply.inactive',$comment->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                             <a href="{{ route('admin.comment.reply.active',$comment->id) }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
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

    

{{-- All Modal --}}
<div class="animated">
@foreach($replies as $comment)
<div class="modal fade" id="viewcomment-{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:#605ca8;color: #fff">
                                <h5 class="modal-title" id="mediumModalLabel">Post Title : {{-- {{ $comment->post->title }} --}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 <table id="bootstrap-data-table-export" class="table table-hover  table-sm" >
                                    <thead>
                                        <tr style="background-color: #001f3f;color: white">
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Comment User</th>
                                            <th>Date</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($replies as $key => $comment)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $comment->id }}</td>
                                            <td>{{ $comment->user->name }}</td>
                                            <td>{{$comment->created_at->diffForHumans() }}</td>
                                            <td>{{ $comment->message }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
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
 
</div>

@endsection
    <!-- Right Panel -->

   