<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Http\AdminHelper;

class TransactionsModel extends Model
{
	public function Index($id)
	{
		
		if($id!=''){
			$user = AdminHelper::get_user($id);
			return $user;
		}
	}
	
	public function Balance($id)
	{
		
		if($id!=''){
			$user = AdminHelper::get_balance($id);
			return $user;
		}
	}
}