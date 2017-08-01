<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\PaymentRequestsModel;
use DB;

class UserPaymentRequests extends Controller {

	
	public function Index($id)
	{
		
		$payment_request = DB::table('payment_request')->where(['status' => 'pending', 'userid' => $id ])->paginate(15);
		$PaymentRequestsModel = new PaymentRequestsModel();
		return view('admin/user-payment-requests', [ 'payment_request' => $payment_request, 'PaymentRequestsModel' => $PaymentRequestsModel ]);
		
	}

}