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
<div class="container">
<div class="row">
<div class="col-sm-12 text-center">

<?php if(Session::has('success')){ echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success! </strong>'.Session::get('success').'</div>'; Session::forget('success');}?>
  
<div class="banner">
<h1>Are you a student?</h1>
<h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h5>
<div class="btns">
<div class="row">

<?php if ((!Auth::check())||(Auth::user()->role!=2)){?>
<div class="col-sm-6 col-xs-6 text-right">
<div class="log">
  <a href="<?php echo url('login') ?>"><img class="img-responsive"  src="{{URL::asset('assets/img/login.png')}}" />LOGIN</a>
</div>
</div>
<div class="col-sm-6 col-xs-6 text-left">
<div class="free">
<a href="<?php echo url('signup') ?>">FREE SIGN UP</a>
</div>
</div><?php }?>

</div>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12 text-center">
<div class="arow">
<a href="#" class="mouse"><img src="{{URL::asset('assets/img/down-arrow.png')}}" class="img-responsive"></a>
</div>
</div>
</div>


</div>
 <div class="clearfix"></div>
</header>

<section class="flexible" id="paralex">
<div class="overly-blue"></div>
<div class="container text-center">
<div class="row">
<div class="col-sm-12">
<h2>Easy flexible and reliable</h2>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
<div class="clearfix"></div>

<div class="col-sm-4">
<div class="core_contant">
<img class="img-responsive" src="{{URL::asset('assets/img/para-1.png')}}">
<h4>Attach</h4>
<h6>your credit/debit card</h6>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
<div class="know-more">
<a href="#">know more</a>
</div>
</div>
</div>

<div class="col-sm-4">
<div class="core_contant">
<img class="img-responsive" src="{{URL::asset('assets/img/para-2.png')}}">
<h4>Maintain</h4>
<h6>your wallet with us</h6>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
<div class="know-more">
<a href="#">know more</a>
</div>
</div>
</div>

<div class="col-sm-4">
<div class="core_contant">
<img class="img-responsive" src="{{URL::asset('assets/img/para-3.png')}}">
<h4>Withdraw</h4>
<h6>your money super fast</h6>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
<div class="know-more">
<a href="#">know more</a>
</div>
</div>
</div>

</div>
</div>
</section>

<section class="system">
<div class="lappy hidden-xs">
<img src="{{URL::asset('assets/img/contnt-1.png')}}" class="img-responsive">
</div>
<div class="lappy-contnt text-center">
<h2>flexible System</h2>
<h5>Lorem Ipsum is simply dummy text of the printing 
and typesetting industry.</h5>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
<div class="lyk">
              <a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Try know</a>
        
        </div>
</div>
<div class="clearfix"></div>
</section>
 
<section class="system-2">
<div class="attach-contnt text-center">
<h2>Attach now and enjoy</h2>
<h5>Lorem Ipsum is simply dummy text of the printing 
and typesetting industry.</h5>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
<div class="lyk">
              <a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Try know</a>
        
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