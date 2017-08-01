<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\AccountsModel;
use DB;

class Accounts extends Controller {

	
	public function Index()
	{
		
		$AccountsModel = new AccountsModel();
		$accounts = $AccountsModel->Index();
		return view('admin/accounts', [ 'accounts' => $accounts ]);
		
	}

}