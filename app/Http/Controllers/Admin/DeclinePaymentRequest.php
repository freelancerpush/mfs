<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DB;

class DeclinePaymentRequest extends Controller {

	
	public function Index( $id )
	{
	
		if( trim($id)>0 && !empty($id) ){
			
			$reason = (Input::has('reason')) ? Input::get('reason') : '';
			DB::table('payment_request')->where( 'id', $id )->update([ 'status' => 'declined', 'comment' => $reason ]);
			
			return Redirect::to('/admin/payment-requests');
			exit;
			
		}
		
	}

}