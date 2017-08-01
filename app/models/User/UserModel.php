<?php

namespace App\models\User;

use Illuminate\Database\Eloquent\Model;

use DB;

class UserModel extends Model
{
    public function GetMyBalance($user_id){
    	$rs = DB::table('accounts')
                        ->select('balance')
                        ->where('userid', $user_id)->get();
        return $rs;
    }

    public function GetAllCountry(){
    	$rs = DB::table('country')
                        ->select('location_id', 'name')
                        ->where('location_type', 0)->get();
        return $rs;
    }

    public function GetUserAllState($user_country){
    	$rs = DB::table('country')
                        ->select('location_id', 'name')
                        ->where('parent_id', $user_country)->get();
        return $rs;
    }

    public function DoUpdateProfile($update_data, $user_id){
    	unset($update_data['_token']);
    	DB::table('users')
                ->where('id', $user_id)
                ->update($update_data);        
    }

    public function GetMyCountryState($user_id){
        $rs = DB::table('users as u')
                        ->join('country as c', 'u.country', '=', 'c.location_id')
                        ->join('country as s ', 'u.state', '=', 's.location_id')
                        ->select('c.name as country_name','s.name as state_name')
                        ->where('u.id', $user_id)->get();
        return $rs;
    }

    public function UpdatePassword($new_password, $user_id){
        DB::table('users')
                ->where('id', $user_id)       
                ->update(['password' => $new_password]);
    }
}
