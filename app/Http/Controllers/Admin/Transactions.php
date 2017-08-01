<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\TransactionsModel;
use DB;

class Transactions extends Controller {

	
	public function Index()
	{
		
		$TransactionsModel = new TransactionsModel();
		
		$transactions = DB::table('transactions')
		->where('userid', '!=', 0)
		->orderBy('created_on', 'desc')
		->paginate(15);
		
		return view('admin/transactions', [ 'transactions' => $transactions, 'TransactionsModel' => $TransactionsModel ]);
		exit;
	}

}