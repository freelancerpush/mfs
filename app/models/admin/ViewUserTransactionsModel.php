<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Http\AdminHelper;

class ViewUserTransactionsModel extends Model
{
	public function Index($id)
	{
		
		if($id!=''){
			$user = AdminHelper::get_user($id);
			return $user;
		}
	}
}