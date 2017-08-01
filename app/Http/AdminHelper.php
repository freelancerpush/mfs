<?php

namespace App\Http;
use Auth;
use DB;
use User;

class AdminHelper {
	
    public static function is_user_role($role){
		
		$id = Auth::user()->id;
		
		$user = DB::table('users')->where('id', $id)->first();
		
		$dbRole = $user->role;
		
		if( $dbRole == $role ){
			return true;
		}
		
        return false;
		
    }
	
	public static function get_user($id){
		
		$user = DB::table('users')->where('id', $id)->first();
		return $user;
		
	}
	
	public static function get_balance($id){
		
		$account = DB::table('accounts')->where('userid', $id)->first();
		return $account;
		
	}
	
}