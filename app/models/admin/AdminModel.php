<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Http\AdminHelper;

class AdminModel extends Model
{
	public function Index($id)
	{
		
		if($id!=''){
			$user = AdminHelper::get_user($id);
			return $user;
		}
	}
	
	public function TotalBalance()
	{
		
		$TotalBalance = DB::table('accounts')->sum('balance');
		return $TotalBalance;
		
	}
	
	public function Balance($id)
	{
		
		if($id!=''){
			$Balance = AdminHelper::get_balance($id);
			return $Balance;
		}
	}
	
	public function NewPaymentRequest()
	{
		
		$NewPaymentRequest = DB::table('payment_request')->where('status', 'pending')->count();
		return $NewPaymentRequest;
		
	}
	
}