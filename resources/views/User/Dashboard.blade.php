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
<?php if(Session::has('success')){ echo '<div class="alert alert-success text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success! </strong>'.Session::get('success').'</div>'; Session::forget('success');}?>
<div class="container">
<div class="row">
  <div class="col-sm-12">  
      <div class="row">
        <div class="inner-content">
          <div class="col-sm-12">
              @include('layout.LeftNavigation')

              <div class="col-sm-10">
                  <div class="row"><a href="<?php echo url('transaction');?>" class="btn btn-info pull-right ViewLast10Btn">View last 10 transaction</a>
                      <div class="col-sm-12">
                          <div class="col-sm-5 text-right">
                              <label>Account No:</label>
                          </div>
                          <div class="col-sm-7">
                              <label><?php echo strtoupper(Auth::user()->id);?></label>
                          </div>  
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-sm-12">
                          <div class="col-sm-5 text-right">
                              <label>Account Holder:</label>
                          </div>
                          <div class="col-sm-7">
                              <label><?php echo strtoupper(Auth::user()->first_name.' '.Auth::user()->last_name);?></label>
                          </div>  
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-sm-12">
                          <div class="col-sm-5 text-right">
                              <label>Available Balance:</label>
                          </div>
                          <div class="col-sm-7">
                              <label><?php if(isset($data['my_balance'][0]->balance)){echo 'INR '.sprintf('%.2f',$data['my_balance'][0]->balance);}?></label>
                          </div>  
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
   $('#Dashboard').addClass('ActiveNav');
});
</script>

  </body>
</html>