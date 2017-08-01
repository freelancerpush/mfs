<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ Config::get('constants.admin_URLS.css').'/admin-style.css' }}">
</head>
<body>

    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
          
			<form class="form-signin" method="POST" action="{{ url('/admin') }}">
			
				<div class="col-md-12">
					@if(Session::has('error'))
					<div class="alert-box success">
					  <h2>{{ Session::get('error') }}</h2>
					</div>
					@endif
				</div>
				
			{!! csrf_field() !!}

                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" name="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required autofocus>
                <p class="errors">{{$errors->first('email')}}</p>
				<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <p class="errors">{{$errors->first('password')}}</p>
				<div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
				
				
				
			</form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>
