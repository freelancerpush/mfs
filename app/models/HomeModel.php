<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

use DB;

class HomeModel extends Model
{
    public function DoRegistration($insertData){
    	DB::table('users')->insert(
			    ['first_name' => $insertData['first_name'], 'last_name' => $insertData['last_name'], 'password' => $insertData['password'],'username' => $insertData['username'], 'email' => $insertData['email'], 'role' => '2']);
    }
}
