<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

use DB;
use Hash;
use Carbon\Carbon;

class AddUser extends Controller {

	
	public function Index()
	{
		$current = Carbon::now();
		$current = new Carbon();

		$data = Input::all();
		
		$msg = '';
		
		if(count($data)>0){
			
			$rules = array(
				'first_name' => 'Required|Min:3|Max:80|Alpha',
				'last_name' => 'Required|Min:3|Max:80|Alpha',
				'username' => 'Required|Min:3|Max:80|AlphaNum|Unique:users',
				'email'     => 'Required|Between:3,64|Email|Unique:users',
				'phone'       => 'Required',
				'password'  =>'Required|Min:8',
				'role'=>'Required|Integer'
			);
			
			$validation = Validator::make($data, $rules);
		 
			//$v = User::validate($data);
			
			if ($validation->fails()){
				
				return Redirect::to('admin/add-user')->withErrors($validation)->withInput();
				exit();
			
			}	
				
			$first_name = $data['first_name'];
			$last_name = $data['last_name'];
			$username = $data['username'];
			$email = $data['email'];
			$phone = $data['phone'];
			$password = $data['password'];
			$role = $data['role'];
			
			$id = DB::table('users')->insertGetId(
				array(
				'first_name' => $first_name, 
				'last_name' => $last_name, 
				'created_at' => $current, 
				'username' => $username, 
				'email' => $email, 
				'phone' => $phone, 
				'password' => Hash::make($password),
				'role' => $role
				)
			);
			
			if( isset($id) && $id!='' ){
				$msg = 'New User Created & Email sended to user. <a href="'.url('admin/user/'.$id).'">View Detail</a>';
				
				DB::table('accounts')->insert([
					
					'userid' => $id, 
					'balance' => 0,
					'creation_date' => $current
					
					]);

			}
			
			//Send mail with password
			
			$maildata = array(
				'firstname' => $first_name, 
				'last_name' => $last_name, 
				'created_at' => $current, 
				'username' => $username, 
				'email' => $email, 
				'phone' => $phone, 
				'password' => $password
				);
				
			Mail::send('admin/mail-user-creation', $maildata, function($message){
				$message->to(Input::get('email'), Input::get('first_name').' '.Input::get('last_name'))->subject('Your Account Detail');
			});

			
		}
		
		$roles = DB::table('roles')->get();
		 
		return view('admin/add-user', [ 'roles' => $roles, 'msg' => $msg ]);
	}

}