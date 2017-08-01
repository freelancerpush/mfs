<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\SingleTransactionModel;
use DB;


class SingleTransaction extends Controller {

	
	public function Index( $id )
	{
	
		if( trim($id)>0 && !empty($id) ){
			
			$SingleTransactionModel = new SingleTransactionModel();
			$singleTransaction = DB::table('transactions')
			->where( 'id', $id )->first();
		
			
			return view('admin/single-transaction', ['singleTransaction' => $singleTransaction, 'SingleTransactionModel' => $SingleTransactionModel ]);
			
			exit;
			
			
			
		}
		
	}

}