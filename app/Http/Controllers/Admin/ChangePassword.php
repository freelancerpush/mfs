<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use DB;
use Hash;
use Auth;
use Session;
use Carbon\Carbon;

class ChangePassword extends Controller {

	
	public function Index()
	{
	
			$current = Carbon::now();
			$current = new Carbon();

			$data = Input::all();
			
			$msg = '';
			
			$id = Auth::user()->id;
			
			if(count($data)>0){
				
				$rules = array(
					'password'  =>'Required|Min:8|Confirmed',
					'password_confirmation'  =>'Required|Min:8'
				);
				
				$validation = Validator::make($data, $rules);
			 
				//$v = User::validate($data);
				
				if ($validation->fails()){
					
					return Redirect::to('admin/change-password', [ 'id' => $id ])->withErrors($validation)->withInput();
					exit();
				
				}	
					
				$password = $data['password'];
				
				
				
				try {
					
					DB::table('users')
					->where('id', $id)
					->update([ 'password' => Hash::make( $password ) ]);
					
					$msg = 'Password Changed Successfully!';
					
					return redirect('admin/change-password', [ 'id' => $id ])->with('msg', $msg );
					exit;
					
				}catch(\Exception $e){
					$msg = 'ERROR: Please Try Again!';
					return redirect('admin/change-password', [ 'id' => $id ])->with('msg', $msg );
					exit;
				}
				
			}
			 
			return view('admin/change-password', [ 'id' => $id ]);
			
			exit();
		
	}

}