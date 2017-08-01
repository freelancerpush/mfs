<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My Fund Saver</title>

    <!-- Bootstrap -->
   
    <link href="{{URL::asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/font-awesome.css')}}" rel="stylesheet">    
    <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">

    <link href="{{URL::asset('assets/css/custom_style.css')}}" rel="stylesheet">

  </head>
  <body>

<header>
 
<div class="overly"></div>

 @include('layout.top')

<div class="clearfix"></div>

@include('layout.header')

<div class="clearfix"></div>

</header>

<section class="system">
  <center><h1>Sign Up</h1></center>
<div class="row">
  <div class="col-sm-12">  
      <div class="row">        
        <div class="col-sm-offset-4 col-sm-4">  
          <form action="<?php echo url('home/signup') ?>" method="post">
            {{ csrf_field() }}

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

              <div class="form-group">
                <label>First Name</label><span class="RequiredData">*</span>
                <input type="text" class="form-control" placeholder="First Name" name="first_name">
              </div>

              <div class="form-group">
                <label>Last Name</label><span class="RequiredData">*</span>
                <input type="text" class="form-control" placeholder="Last Name" name="last_name">
              </div>

              <div class="form-group">
                <label>Username</label><span class="RequiredData">*</span>
                <input type="text" class="form-control" placeholder="Username"  name="username">
              </div>

              <div class="form-group">
                <label>Email</label><span class="RequiredData">*</span>
                <input type="email" class="form-control" placeholder="Email"  name="email">
              </div>

              <div class="form-group">
                <label>Password</label><span class="RequiredData">*</span>
                <input type="password" class="form-control" placeholder="Password"  name="password">
              </div>

              <div class="form-group">
                <label>Confirm Password</label><span class="RequiredData">*</span>
                <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword">
              </div>

              <button type="submit" class="btn btn-default">Register</button>
          </form>
        </div>
      </div>
  </div>
</div>




<div class="clearfix"></div>
</section>

@include('layout.footer')

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{URL::asset('assets/js/jquery.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
    <script>
(function ($) {
    'use strict';
  
     $('.mouse').on('click', function () { 
      $('html,body').animate({scrollTop:$('#paralex').offset().top},1000);
      });
  
})(jQuery)
</script>
 <script>

$(window).scroll(function(){
    if ($(window).scrollTop() >= 42) {
       $('#wrap').addClass('navbar-fixed-top');
    }
    else {
       $('#wrap').removeClass('navbar-fixed-top');
    }
});
    
    </script>   
  </body>
</html>