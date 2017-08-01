<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DB;

class Users extends Controller {

	public function Index()
	{
		$users = DB::table('users')->where('id', '!=', 1)->paginate(15);
		return view('admin/users', ['users' => $users ]);
	}
	
}