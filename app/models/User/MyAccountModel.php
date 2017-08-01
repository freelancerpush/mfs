<?php

namespace App\models\User;

use Illuminate\Database\Eloquent\Model;

use DB;

class MyAccountModel extends Model
{
    public function DoDeposite($deposite_amount, $user_id){
    	//echo '<pre>';print_r($deposite_amount);die();
    	DB::table('transactions')->insert(['userid'=> $user_id, 'amount' => $deposite_amount['amount'], 'status'=>'success', 'type'=>'deposite']);

    	$balance= DB::table('accounts')
                        ->select('balance')
                        ->where('userid', $user_id)->get();
         if(count($balance)){
         	$last_balance=$balance[0]->balance;
            $new_balance= $last_balance+$deposite_amount['amount'];

            DB::table('accounts')
                ->where('userid', $user_id)
                ->update(['balance' => $new_balance]);
         }else{
         	DB::table('accounts')->insert(['userid'=> $user_id, 'balance' => $deposite_amount['amount']]);
         }
    }

    public function DoWithdrawRequest($withdraw_amount, $user_id){
    	DB::table('payment_request')->insert(['userid'=> $user_id, 'withdraw_amount' => $withdraw_amount['amount'], 'status'=>'pending']);    	
    }

     public function GetMyTransactionDetail($user_id){
        $rs= DB::table('transactions')
                        ->select('*')
                        ->take(10)
                        ->orderBy('id', 'desc')
                        ->where('userid', $user_id)->get(); 
        return $rs;    
    }
}
