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
                      <center><h2>Edit Profile</h2></center>
                      <div class="col-sm-offset-3 col-sm-6">  
                          <form action="<?php echo url('update-profile') ?>" method="post">
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
                              <label>First Name</label>
                              <input type="text" class="form-control" value="<?php echo Auth::user()->first_name;?>" name="first_name">
                            </div>

                            <div class="form-group">
                              <label>Last Name</label>
                              <input type="text" class="form-control" value="<?php echo Auth::user()->last_name;?>" name="last_name">
                            </div>

                            <div class="form-group">
                              <label>Phone</label>
                              <input type="text" class="form-control" value="<?php echo Auth::user()->phone;?>" name="phone">
                            </div>

                            <div class="form-group">
                              <label>Address</label>
                              <input type="text" class="form-control" value="<?php echo Auth::user()->address;?>" name="address">
                            </div>

                            <div class="form-group">
                              <label>City</label>
                              <input type="text" class="form-control" value="<?php echo Auth::user()->city;?>" name="city">
                            </div>

             <?php if(isset($data['AllCountry'])){ if(count($data['AllCountry'])){?>
                          <div class="form-group">
                              <label>Country</label>
                              <select class="form-control select_bg" id="country" name="country" onchange="GetMyState(this)">
                                  <option value="">Select country</option>
            <?php foreach($data['AllCountry'] as $country){if($country->name!=''){?>
                                  <option value="<?php echo $country->location_id;?>" <?php if(Auth::user()->country==$country->location_id){echo 'selected';}?>><?php echo ucfirst($country->name);?></option><?php }}?>
                              </select>
                          </div><?php }}?>

                
                          <div class="form-group">
                              <label>State</label>
                              <select class="form-control select_bg" id="state" name="state">
                                <option value="">Select state</option>
<?php if(isset($data['AllState'])){ if(count($data['AllState'])){foreach($data['AllState'] as $state){if($state->name!=''){?>
                                            <option value="<?php echo $state->location_id;?>" <?php if(Auth::user()->state==$state->location_id){echo 'selected';}?>><?php echo ucfirst($state->name);?></option><?php }}}}?>
                              </select>
                          </div>  
                              
                            <button type="submit" class="btn btn-info">Update</button>

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
   $('#EditProfile').addClass('ActiveNav');
});



function GetMyState(country){
      var country_id=country.value;
      if(country_id!=''){
         $.post("get-my-state",{id:country_id, '_token': $('input[name=_token]').val()},function(rs){
              if(rs){
                  var all_state=JSON.parse(rs);
                  var state='<option value="">Select State</option>'; 
                  for (i=0;i<all_state.length;i++){
                    state+='<option value='+all_state[i].location_id+'>'+all_state[i].name+'</option>' ; 
                  } 
                  $('#state').empty();
                  $('#state').html(state);     
              }
          });                   
      }
}
</script>

  </body>
</html>