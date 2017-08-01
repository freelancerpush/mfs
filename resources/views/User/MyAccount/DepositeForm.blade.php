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
<div class="container">
<div class="row">
  <div class="col-sm-12">  
      <div class="row">
        <div class="inner-content">
          <div class="col-sm-12"> 
              @include('layout.LeftNavigation')

              <div class="col-sm-10">
                  <div class="row">
                    <center><h2>Deposite Form</h2></center>
                      <div class="col-sm-offset-4 col-sm-4">  
                          <form action="<?php echo url('my-account/deposite') ?>" method="post">
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
                                <label>Enter Deposite Amount</label><span class="RequiredData">*</span>
                                <input type="text" class="form-control" placeholder="Deposite Amount" name="amount">
                              </div>

                              <div class="form-group">        
                                  <input type="submit" class="btn btn-info" value="Deposite">
                              </div>

                            </form>
                        </div>
                  </div>
                  
              </div>
          </div>
          <div class="clearfix"></div>
      </div>
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

<script type="text/javascript">
$(document).ready(function(){
   $('.LeftNav').removeClass('ActiveNav');
   $('#MyAccount').addClass('ActiveNav');
});
</script>

  </body>
</html>