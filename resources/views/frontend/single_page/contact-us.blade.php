  @extends('frontend.layouts.index')
@section('content')

<div class="page-title wb" style="background-color:crimson;color: #fff;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12 col-xs-12">
                        <h2 style="color:white"><i class="fa fa-leaf bg-green"></i> Contact Us</h2>
                    </div><!-- end col -->
                    <div class="col-lg-7 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" style="font-size:20px"><a style="color:#fff" href="{{ route('public') }}">Home</a></li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

 
  <section class="section wb">
            <div class="container">
                <div class="row">
  
                    <div class="col-lg-10 offset-lg-1">
                        <div class="page-wrapper">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h4>Who we are</h4>
                                    <p>Forest Time is a personal blog for handcrafted, cameramade photography content, fashion styles from independent creatives around the world.</p>
                                </div>

                                <div class="col-lg-4">
                                    <h4>How we help?</h4>
                                    <p>Etiam vulputate urna id libero auctor maximus. Nulla dignissim ligula diam, in sollicitudin ligula congue quis turpis dui urna nibhs. </p>
                                </div>

                                <div class="col-lg-4">
                                    <h4>Pre-Sale Question</h4>
                                    <p>Fusce dapibus nunc quis quam tempor vestibulum sit amet consequat enim. Pellentesque blandit hendrerit placerat. Integertis non.</p>
                                </div>
                            </div><!-- end row -->

                            <hr class="invis">

                            <div class="row">
                                <div class="col-md-12 "style="padding-left: 5px;">
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
            <div class="col-md-12">
             @if(Session::get('success'))
               <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>{{session::get('success')}}</strong> </div> 
            @endif
              @if(Session::get('message'))
               <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>{{session::get('message')}}</strong> </div> 
            @endif
            </div>

                                <div class="col-lg-8 offset-lg-2">
                                    <form method="POST" action="{{ route('contact.store') }}" class="form-wrapper">
                                        @csrf
                                        <input type="text" class="form-control" name="name" placeholder="Your name">
                                        <input type="text" name="email" class="form-control" placeholder="Email address">
                                        <input type="text" name="mobile" class="form-control" placeholder="Mobile">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                                        <textarea class="form-control" name="message" placeholder="Your message"></textarea>
                                        <button type="submit" class="btn btn-primary">Send <i class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
 

  @endsection    
