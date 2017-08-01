<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DB;

class DeleteUser extends Controller {

	
	public function Index( $id )
	{
	
		if( trim($id)>0 && !empty($id) ){
			
			DB::table('users')->where( 'id', $id )->delete();
			DB::table('accounts')->where( 'userid', $id )->delete();
			DB::table('payment_request')->where( 'userid', $id )->delete();
			DB::table('transactions')->where( 'userid', $id )->delete();
			
			return Redirect::to('/admin/users');
			exit;
			
		}
		
	}

}