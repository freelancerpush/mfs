<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\ViewUserTransactionsModel;
use DB;

class ViewUserTransactions extends Controller {

	
	public function Index($id)
	{
		if( isset($id) && trim($id)!='' ){

			$viewUTransModel = new ViewUserTransactionsModel();
			$transactions = DB::table('transactions')->where('userid', $id)->orderBy('created_on', 'desc')->paginate(15);
		
			return view('admin/user-transactions', [ 'transactions' => $transactions, 'ViewUserTransactionsModel' => $viewUTransModel ]);
			exit;
			
		}
	}

}