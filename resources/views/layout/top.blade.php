<div class="top_head hidden-xs">
<div class="container">
<div class="row">
<div class="top">
<div class="col-sm-6">
<div class="mail">
<p><img src="{{URL::asset('assets/img/mail.png')}}">&nbsp;Email us: <a href="#">info@myfundsaver.com</a></p>
</div>
</div>

<div class="col-sm-6 text-right">
<div class="row"><?php if((Auth::check())&&(Auth::user()->role==2)){ ?><a class="WelcomeArea" href="<?php echo url('dashboard');?>"><?php echo 'Hello '.ucfirst(Auth::user()->first_name);?></a><a href="<?php echo url('logout');?>" class="LogoutBtn">Logout</a><?php }else{?>
<div class="col-md-9 col-sm-7">
<div class="login">
<p><img src="{{URL::asset('assets/img/login.png')}}">&nbsp;<a href="<?php echo url('login') ?>">Login</a></p>
</div>
</div>
<div class="col-md-3 col-sm-5">
<div class="free-sign">
<p><img src="{{URL::asset('assets/img/sign-up.png')}}">&nbsp;<a href="<?php echo url('signup') ?>">Free Sign up</a></p>
</div>
</div><?php }?>

</div> 
</div>
</div>
</div>
</div>
</div>