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
                            <li><a href="{{ route('contact.list') }}">Contact</a></li>
                            <li class="active">Contact List</li>
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
                                <strong class="card-title">Contact List
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-hover  table-sm" >
                                    <thead>
                                        <tr style="background-color: #001f3f;color: white">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Subject</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contacts as $key => $contact)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->mobile }}</td>
                                            <td>{{ $contact->subject }}</td>
                                            <td>{{date('d-M-Y h:i A',strtotime($contact->created_at)) }}</td>
                                            <td class="text-center">
                                             <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#viewcontact-{{ $contact->id }}">
                                                    <i class="fa fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletecontact-{{ $contact->id }}">
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
@foreach($contacts as $contact)
<div class="modal fade" id="viewcontact-{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:#605ca8;color: #fff">
                                <h5 class="modal-title" id="mediumModalLabel"> Name: {{ $contact->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 <table id="" class="table table-hover table-bordered  table-sm " >
                                        <tr >
                                            <th width="25%">Comment ID</th>
                                            <td>{{ $contact->id }}</td>
                                        </tr>
                                          <tr>
                                            <th>Name</th>
                                            <td>{{ $contact->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $contact->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Mobile</th>
                                            <td>{{ $contact->mobile }}</td>
                                        </tr>
                                        <tr>       
                                            <th>Subject</th>
                                             <td>{{ $contact->subject }}</td>
                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <td>{{date('d-M-Y h:a',strtotime($contact->created_at)) }}
                                         </td>
                                         </tr>
                                         
                                        <tr >       
                                            <th>Message</th>
                                             <td ><textarea rows="8" class="form-control">{{ $contact->message }}</textarea></td>
                                        </tr>
                                    
                                    
                                </table>
                            </div>
                            <div class="modal-footer" style="background:#605ca8;color: #fff">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                
                            </div>
                        </div>
                    </div>
                </div>



                {{-- Delete contact Modal --}}

                 <div class="modal fade" id="deletecontact-{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:#605ca8;color: #fff">
                                <h5 class="modal-title" id="staticModalLabel">Delete Contact</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Are you sure delete this contact?
                                </p>
                            </div>
                            <div class="modal-footer" style="background:#605ca8;color: #fff">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-warning" onclick="event.preventDefault();
                                 document.getElementById('deleteContact-{{ $contact->id }}').submit();">Confirm</button>
                                 <form action="{{ route('contact.delete',$contact->id) }}" style="display:none" id="deleteContact-{{ $contact->id }}"></form>
                            </div>
                        </div>
                    </div>
                </div>

@endforeach
 
</div>

@endsection
    <!-- Right Panel -->

   