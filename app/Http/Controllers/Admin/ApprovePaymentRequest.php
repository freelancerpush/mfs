<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin\PaymentRequestsModel;
use DB;
use Carbon\Carbon;

class ApprovePaymentRequest extends Controller {

	
	public function Index( $id )
	{
	
		if( trim($id)>0 && !empty($id) ){
			
			$payment_request = DB::table('payment_request')->where( 'id', $id )->first();
			
			$accountBalance = DB::table('accounts')->where( 'userid', $payment_request->userid )->first();
			
			if( $payment_request->withdraw_amount <= $accountBalance->balance  ){
				
				
				$newbalance = $accountBalance->balance - $payment_request->withdraw_amount;
				DB::table('accounts')->where( 'userid', $payment_request->userid )->update([ 'balance' => $newbalance ]);
				DB::table('payment_request')->where( 'id', $id )->update([ 'status' => 'approved', 'comment' => '' ]);
				
				$current = Carbon::now();
				$current = new Carbon();
		
				$tranID = DB::table('transactions')->insertGetId([
					'transaction_id' => 'Payment_gateway_id_here', //ID from payment gateway
					'created_on' => $current,
					'userid' => $payment_request->userid,
					'amount' => $payment_request->withdraw_amount,
					'status' => 'success',
					'comment' => '',
					'type' => 'withdraw'
				]);
				
				return Redirect::to('/admin/payment-requests')->with('success', 'Payment Approved & Transaction Success <a href="'.url('admin/single-transaction/'.$tranID).'">View Detail</a>');
				exit;
				
			}else{
				return Redirect::to('/admin/payment-requests')->with('warning', 'Insufficient funds to withdraw');
				exit;
			}
			
		}
		
	}

}