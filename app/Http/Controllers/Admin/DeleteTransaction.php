<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DB;

class DeleteTransaction extends Controller {

	
	public function Index( $id )
	{
	
		if( trim($id)>0 && !empty($id) ){
			
			DB::table('transactions')->where( 'id', $id )->delete();
			
			return Redirect::to('/admin/transactions')->with('success', 'Transaction Successfully deleted!');
			exit;
			
		}
		
	}

}