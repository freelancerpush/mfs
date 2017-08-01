<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;

class AccountsModel extends Model
{
	public function Index()
	{
		
		$accounts = DB::table('accounts')
		->join('users', 'accounts.userid', '=', 'users.id')
		->where('userid', '!=', 0)
		->paginate(15);
		
		return $accounts;
		
	}
}