<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;

use Auth, DB, Session;
use Redirect;
use Validator;

use App\models\User\MyAccountModel;
use App\models\User\UserModel;

class MyAccountController extends Controller
{
    
	public function __construct(){        
            if(!Auth::check()) {
                //return Redirect::to('login');
                Redirect::to('login')->send();   //It works fine            
            }else if(Auth::user()->role!=2){
                Redirect::to('/admin')->send();
            }       
    }

	public function MyAccountAction(){	
    	return view('User/MyAccount/MyAccount');	
    }

    public function ViewDepositeAction(){	
    	return view('User/MyAccount/DepositeForm');	
    }

    public function DoDepositeAction(){	
    	$deposite_amount = Input::all();
        $rules = array(     
            'amount' => 'required|regex:/^\d*\.?\d*$/'
        );
        $validator = Validator::make($deposite_amount, $rules);
        if ($validator->fails()) {
            return Redirect::to('deposite')->withErrors($validator)->withInput();
        }else{
            $model=new MyAccountModel();
            $user_id=Auth::user()->id;

            $model->DoDeposite($deposite_amount, $user_id);
           // DB::table('transactions')->insert(['userid'=> $user_id, 'amount' => Input::get("amount"), 'status'=>'success', 'type'=>'deposite']);
            //$balance = DB::table('accounts')->where('userid', $user_id)->get();
            // if(count($balance)){
            //     $last_balance=$balance[0]->balance;
            //     $new_balance=$last_balance+Input::get("amount");
            //     $model->UpdateMyBalance($new_balance, $user_id);
            //     DB::table('accounts')
            //         ->where('userid', $user_id)
            //         ->update(['balance' => $new_balance]);
            // }else{
            //     DB::table('accounts')->insert(['userid'=> $user_id, 'balance' => Input::get("amount")]);
            // }
            Session::put('success', 'Amount has been deposited in your account successfully');
            return Redirect::to('dashboard');           
        }
    }

    public function ViewWithdrawAction(){   
        return view('User/MyAccount/WithdrawForm'); 
    }

    public function WithdrawRequestAction(){   
        $withdraw_amount = Input::all();
        $rules = array(     
            'amount' => 'required|regex:/^\d*\.?\d*$/'
        );
        $validator = Validator::make($withdraw_amount, $rules);
        if ($validator->fails()) {
            return Redirect::to('withdraw')->withErrors($validator)->withInput();
        }else{
            $model=new MyAccountModel();
            $user_id=Auth::user()->id;

            $model->DoWithdrawRequest($withdraw_amount, $user_id);
            Session::put('success', 'Withdraw request has been sent, you will soon receive confirmation message');
            return Redirect::to('dashboard');
        } 
    }

    public function ViewMyTransactionAction(){
        $model=new MyAccountModel();
        $user_model=new UserModel();
        $user_id=Auth::user()->id;

        $data['my_balance'] = $user_model->GetMyBalance($user_id);

        $data['MyTransactionDetail']=$model->GetMyTransactionDetail($user_id);
        return view('User/MyAccount/ShowMyTransaction')->with('data', $data);
    }
}
