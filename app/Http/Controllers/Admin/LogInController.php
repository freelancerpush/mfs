<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\models\Role;
use App\models\Users;
use App\Http\AdminHelper;
use DB;
use Hash;
use Auth;
use Session;

class LogInController extends Controller {

	
	public function doLogin()
	{
		if (Auth::check() && AdminHelper::is_user_role(1) ) {
            return Redirect::to('admin');
			exit;
		}
		
		// Getting all post data
		$data = Input::all();
		
		// Applying validation rules.
		$rules = array(
			'email' => 'required|email',
			'password' => 'required|min:6',
			 );
			 
		$validator = Validator::make($data, $rules);
		
		if ($validator->fails()){
		  // If validation falis redirect back to login.
		  return Redirect::to('admin')->withInput(Input::except('password'))->withErrors($validator);
		}
		else {
		  $userdata = array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			  );
		  // doing login.
		  if (Auth::validate($userdata)) {
			  
			  $remember = (Input::has('remember')) ? true : false;
			
			if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')], $remember)) {
			
				if( AdminHelper::is_user_role(1) ){ //1==admin user role
					return Redirect::intended('/admin');
				}else{
					return Redirect::intended('/');
				}

			}
		  } 
		  else {
			// if any error send back with message.
			Session::flash('error', 'User/Password Wrong!'); 
			return Redirect::to('admin');
		  }
		}
	}
	
	// app/controllers/HomeController.php
	public function doLogout()
	{
		Auth::logout(); // log the user out of our application
		return Redirect::to('admin'); // redirect the user to the login screen
	}


}