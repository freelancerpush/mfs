<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


###### Front:START ######

Route::get('/', function () {
    return view('welcome');
});

Route::get('signup', function () {
	if((Auth::check())&&(Auth::user()->role==2)){
		return Redirect::to('dashboard');
	}else{
		return view('sign_up');	//It works better
    	//return View::make('sign_up');	
	}    
});

Route::post('home/signup', 'HomeController@signupAction');

Route::get('login', function () {
	if((Auth::check())&&(Auth::user()->role==2)){
		return Redirect::to('dashboard');
	}else{
		return view('login');
		//return View::make('login');	
	}	    
});

Route::post('home/login', 'HomeController@loginAction');

Route::get('logout', 'HomeController@logoutAction');

Route::get('dashboard', 'User\UserController@DashboardAction');

Route::get('my-account', 'User\MyAccountController@MyAccountAction');

Route::get('deposite', 'User\MyAccountController@ViewDepositeAction');

Route::post('my-account/deposite', 'User\MyAccountController@DoDepositeAction');

Route::get('withdraw', 'User\MyAccountController@ViewWithdrawAction');

Route::post('my-account/withdraw', 'User\MyAccountController@WithdrawRequestAction');
Route::get('profile', 'User\UserController@ViewMyProfileAction');

Route::get('edit-profile', 'User\UserController@EditProfileAction');

Route::post('update-profile', 'User\UserController@UpdateProfileAction');

Route::get('transaction', 'User\MyAccountController@ViewMyTransactionAction');

Route::post('get-my-state', 'User\UserController@GetMyStateAction');

Route::get('change-password', 'User\UserController@ChangePasswordAction');

Route::post('update-password', 'User\UserController@UpdatePasswordAction');

###### Admin:Start ######

Route::get('/admin', 'Admin\Admin@Index');
Route::post('admin', array('uses' => 'Admin\LogInController@doLogin'));

Route::group(['middleware' => ['auth', 'admin']], function() {
   
   //Dashboard Pages

	Route::get('/admin/users', 'Admin\Users@Index');

	Route::get('/admin/add-user', 'Admin\AddUser@Index');
	Route::post('/admin/add-user', array('uses' => 'Admin\AddUser@Index'));
	Route::get('admin/transactions/user/{id}', 'Admin\ViewUserTransactions@Index');
	
	Route::get('admin/single-transaction/{id}', 'Admin\SingleTransaction@Index');
	
	Route::get('/admin/transactions', 'Admin\Transactions@Index'); //**
	Route::get('/admin/delete-transaction/{id}', 'Admin\DeleteTransaction@Index');
	
	Route::get('/admin/payment-requests', 'Admin\PaymentRequests@Index');
	Route::get('/admin/user-payment-requests/{id}', 'Admin\UserPaymentRequests@Index');
	Route::post('/admin/decline-payment/{id}', 'Admin\DeclinePaymentRequest@Index');
	Route::post('/admin/approve-payment/{id}', 'Admin\ApprovePaymentRequest@Index');
	
	Route::get('/admin/accounts', 'Admin\Accounts@Index');

	Route::get('/admin/setting', 'Admin\Setting@Index');

    Route::get('adminlogout', array('uses' => 'Admin\LogInController@doLogout'));
	
	//Edit User
	Route::get('/admin/user/{id}', 'Admin\EditUser@Index');
	Route::post('/admin/user/{id}', 'Admin\EditUser@Index');
	
	//Delete User
	Route::post('/admin/delete-user/{id}', 'Admin\DeleteUser@Index');
	
	//Change Admin Password
	Route::get('/admin/change-password', 'Admin\ChangePassword@Index');
	Route::post('/admin/change-password', 'Admin\ChangePassword@Index');
	
});