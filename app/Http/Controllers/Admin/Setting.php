<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class Setting extends Controller {

	
	public function Index()
	{
		return view('admin/setting');
	}

}