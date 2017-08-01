<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\AdminModel;
use Auth;
use App\Http\AdminHelper;
use DB;

class Admin extends Controller {

	
	public function Index()
	{
		
		if (Auth::check() && AdminHelper::is_user_role(1) ) {
			
			$AdminModel = new AdminModel();
			
			$users = DB::table('users')->where('id', '!=', 1)->count();
			
			//Payment requests
			//$payment_request = DB::table('payment_request')->take(1)->get();
			
			//Transactions
			$transactions = DB::table('transactions')->take(10)->orderBy('created_on', 'desc')->get();
			
			return view('admin/admin', [ 'users' => $users, 'AdminModel' => $AdminModel, 'transactions' => $transactions ]);
			exit;
			
		}else{
			return view('admin/login');
			exit;
		}
		
	}

}