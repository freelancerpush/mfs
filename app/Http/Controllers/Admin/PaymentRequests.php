<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\PaymentRequestsModel;
use DB;

class PaymentRequests extends Controller {

	
	public function Index()
	{
		
		$payment_request = DB::table('payment_request')->where('status', 'pending')->paginate(15);
		$PaymentRequestsModel = new PaymentRequestsModel();
		return view('admin/payment-requests', [ 'payment_request' => $payment_request, 'PaymentRequestsModel' => $PaymentRequestsModel ]);
		
	}

}