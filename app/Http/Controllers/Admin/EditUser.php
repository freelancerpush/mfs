<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use DB;
use Carbon\Carbon;

class EditUser extends Controller {

	
	public function Index( $id )
	{
	
		if( trim($id)>0 && !empty($id) ){
			
			$current = Carbon::now();
			$current = new Carbon();

			$data = Input::all();
			
			$msg = '';
			
			if(count($data)>0){
				
				$rules = array(
					'first_name' => 'Required|Min:3|Max:80|Alpha',
					'last_name' => 'Required|Min:3|Max:80|Alpha',
					'username' => 'Required|Min:3|Max:80|AlphaNum|Unique:users,username,'.$id,
					'email'     => 'Required|Between:3,64|Email|Unique:users,email,'.$id,
					'phone'       => 'Required',
					'role'=>'Required|Integer'
				);
				
				$validation = Validator::make($data, $rules);
			 
				//$v = User::validate($data);
				
				if ($validation->fails()){
					
					return Redirect::to('admin/user/'.$id)->withErrors($validation)->withInput();
					exit();
				
				}	
					
				$first_name = $data['first_name'];
				$last_name = $data['last_name'];
				$username = $data['username'];
				$email = $data['email'];
				$phone = $data['phone'];
				$role = $data['role'];
				
				try {
					
					DB::table('users')
					->where('id', $id)
					->update([
					
					'first_name' => $first_name,
					'last_name' => $last_name,
					'username' => $username,
					'updated_at' => $current,
					'email' => $email,
					'phone' => $phone,
					'role' => $role
					
					]);
					
					$msg = 'Updated Successfully';
					
				}catch(\Exception $e){
					$msg = 'ERROR: Please Try Again!';
				}
				
			}
			
			$editData = DB::table('users')->where( 'id', $id )->first();
			
			$roles = DB::table('roles')->get();
			 
			return view('admin/edit-user', [ 'roles' => $roles, 'userdata' => $editData, 'msg' => $msg ]);
			
			exit();
			
		}
		
	}

}