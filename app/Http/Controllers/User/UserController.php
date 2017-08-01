<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Auth, Validator, Session;
use Redirect, Hash;
use App\models\User\UserModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserController extends Controller
{
    
	public function __construct(){        
            if(!Auth::check()) {
                //return Redirect::to('login');
                Redirect::to('login')->send();   //It works fine            
            }else if(Auth::user()->role!=2){
                Redirect::to('/admin')->send();
            }      
    }


    public function DashboardAction(){
        $model=new UserModel();
        $user_id=Auth::user()->id;
        $data['my_balance'] = $model->GetMyBalance($user_id);
    	//return View::make('User/Dashboard');	
    	//return view('User/Dashboard');	//It works better without send data
        return view('User/Dashboard')->with('data', $data);
    }

    public function ViewMyProfileAction(){
        $model=new UserModel();
        $user_id=Auth::user()->id;
        $data['my_country_state'] = $model->GetMyCountryState($user_id);
        return view('User/MyProfile')->with('data',$data);
    }

    public function EditProfileAction(){ 
        $model=new UserModel();
        $user_id=Auth::user()->id;
        $user_country=Auth::user()->country;
        $data['AllCountry'] = $model->GetAllCountry();
        if(($user_country!='')&&($user_country!=0)){
            $data['AllState'] = $model->GetUserAllState($user_country);
        } 
        //echo '<pre>';print_r($data['AllState']);die();
        //return view('User/EditProfile');
        return view('User/EditProfileForm')->with('data', $data);
    }

    public function UpdateProfileAction(){        
        $update_data = Input::all();
        $rules = array(
            'first_name' => 'required|min:3|max:255', 
            'last_name' => 'required|min:3|max:255',
            'phone' => 'required|numeric|min:5',
            'address' => 'required|min:3|max:255',
            'city' => 'required|min:3|max:64'
        );
        $validator = Validator::make($update_data, $rules);
        if($validator->fails()) {
            return Redirect::to('edit-profile')->withErrors($validator)->withInput();
        }else{
            //echo '<pre>';print_r($update_data);die();
            $model=new UserModel();
            $user_id=Auth::user()->id;
            $model->DoUpdateProfile($update_data, $user_id);
            Session::put('success', 'Profile has been updated successfully');
            return Redirect::to('dashboard');    
        }
    }

    public function GetMyStateAction(){ 
        $country_id=$_POST['id'];
        if($country_id!=''){
            $model=new UserModel();
            $rs=$model->GetUserAllState($country_id);    
            echo json_encode($rs);
        }
    } 

    public function ChangePasswordAction(){         
        return view('User/ChangePasswordForm');
    } 

    public function UpdatePasswordAction(){        
        $update_data = Input::all();
        $user_pass=Auth::user()->password;
        if (Hash::check(Input::get('old'), $user_pass)){
            $rules = array(
                'old' => 'required|min:8|max:64',
                'password' => 'required|min:8|max:64',
                'confirm-password' => 'required|same:password|min:8|max:64'
            );
            $validator = Validator::make($update_data, $rules);
            if($validator->fails()) {
                return Redirect::to('change-password')->withErrors($validator)->withInput();
            }else{
                $model= new UserModel();
                $user_id= Auth::user()->id;
                $new_password=Hash::make(Input::get('password'));

                $model->UpdatePassword($new_password, $user_id);
                Session::put('success', 'Password has been changed successfully');
                return Redirect::to('dashboard');    
            }
        }else{
            return Redirect::to('change-password')->withErrors('Your current password is wrong');
        }
    }    
}
