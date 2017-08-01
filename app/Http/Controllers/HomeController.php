<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use DB;
use Hash;

//use Illuminate\Support\Facades\Auth;
use Auth;
use Session;
use App\models\HomeModel;

class HomeController extends Controller
{
    public function signupAction(){
    	$data = Input::all();
    	$rules = array(
		'first_name' => 'required|min:3|max:255', 
		'last_name' => 'required|min:3|max:255',
		'username' => 'required|unique:users|min:3|max:150',
		'email' => 'required|email|unique:users|min:3|max:255',
		'password' => 'required|min:8|max:64',
		'cpassword' => 'required|min:8|max:64'
		);
		$validator = Validator::make($data, $rules);
		if($validator->fails()) {
			return Redirect::to('signup')->withErrors($validator)->withInput();
		}else{			 
			$password = Input::get("password");

			$insertData = array(
				"first_name"	=>	Input::get("first_name"),
				"last_name"	=>	Input::get("last_name"),
				"password"	=>	Hash::make($password),
				"username"	=>	Input::get("username"),
				"email"	=>	Input::get("email")
			);

			$model=new HomeModel();

			$rs= $model->DoRegistration($insertData);			
			// DB::table('users')->insert(
			//     ['first_name' => Input::get("first_name"), 'last_name' => Input::get("last_name"), 'password' => Hash::make($password), 'email' => Input::get("email")]
			// );
			Session::put('success', 'Registration succeed');
			return Redirect::to('/');
		}
		
    }

    public function loginAction(){
    	$data = Input::all();
    	$rules = array(		
		'email' => 'required|min:3|max:255',
		'password' => 'required|min:8|max:64'
		);
		$validator = Validator::make($data, $rules);
		if ($validator->fails()) {
		    return Redirect::to('login')
		        ->withErrors($validator) 
		        ->withInput(Input::except('password'));
		}else{
			$userdata = array(
		        'email'     => Input::get('email'),
		        'password'  => Input::get('password')
		    );

		    $userdata2 = array(
		        'username'     => Input::get('email'),
		        'password'  => Input::get('password')
		    );

			if (Auth::attempt($userdata)) {
			 	Session::put('success', 'Login successfully');
			 	return Redirect::to('dashboard');
		    }else if(Auth::attempt($userdata2)){
		    	Session::put('success', 'Login successfully');
			 	return Redirect::to('dashboard');
		    }else{
		    	Session::put('warning', 'Incorrect username or password, try again!');
		        return Redirect::to('login');
		    }
		} 
		
    }

    public function logoutAction(){
    	Auth::logout();
		Session::flush();
		Session::put('success', 'Logout successfully');
	    return Redirect::to('/');
    }
}
