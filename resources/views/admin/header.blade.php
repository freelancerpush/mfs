<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel - My Fund Saver</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ Config::get('constants.admin_URLS.css').'/bootstrap.min.css' }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ Config::get('constants.admin_URLS.css').'/sb-admin.css' }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ Config::get('constants.admin_URLS.css').'/plugins/morris.css' }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ Config::get('constants.admin_URLS.fa').'/css/font-awesome.min.css' }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header" >
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a style="margin: 0;padding: 5px;" class="navbar-brand" href="{{url('admin')}}"><img src="{{ url('assets/admin/img/logo_1.png') }}" style="height: 40px;" title="Dashboard - My Fund Saver" alt="My Fund Saver" ></a>
		</div>
		<!-- Top Menu Items -->
		<ul class="nav navbar-right top-nav">
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
				<ul class="dropdown-menu">
					
					<li>
						<a href="{{ url('/admin/change-password') }}"><i class="fa fa-fw fa-lock"></i> Change Password</a>
					</li>
					<li>
						<a target="_blank" href="{{ url('/') }}"><i class="fa fa-fw fa-globe"></i> Visit Website</a>
					</li>
					<li>
						<a href="{{ URL::to('adminlogout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
					</li>
				</ul>
			</li>
		</ul>
		<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav side-nav">
				<li class="active">
					<a href="{{ Config::get('constants.admin_URLS.url') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
				</li>
				<li>
					<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-users"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
					<ul id="demo" class="collapse">
						
						<li>
							<a href="{{ Config::get('constants.admin_URLS.url').'/add-user' }}"><i class="fa fa-plus"></i> Add User</a>
						</li>
						<li>
							<a href="{{ Config::get('constants.admin_URLS.url').'/users' }}"><i class="fa fa-users"></i> All Users</a>
						</li>
						
					</ul>
				</li>
				
				<li>
					<a href="{{ Config::get('constants.admin_URLS.url').'/payment-requests' }}"><i class="fa fa-fw fa-usd"></i> Payment Requests</a>
				</li>
				<li>
					<a href="{{ Config::get('constants.admin_URLS.url').'/transactions' }}"><i class="fa fa-fw fa-money"></i> Transactions</a>
				</li>
				<li>
					<a href="{{ Config::get('constants.admin_URLS.url').'/accounts' }}"><i class="fa fa-fw fa-bank"></i> Accounts Balances</a>					
				</li>
				
				<li>
					<a href="{{ Config::get('constants.admin_URLS.url').'/setting' }}"><i class="fa fa-fw fa-cog"></i> Setting</a>
				</li>
				
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</nav>
	
	
	<div id="page-wrapper">

		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
					<?php
					if (Request::is('admin'))
					{
						echo 'Dashboard ';
					}
					if (Request::is('admin/users'))
					{
						echo 'Users ';
					}
					if (Request::is('admin/user/*'))
					{
						echo 'Edit User';
					}
					if (Request::is('admin/add-user'))
					{
						echo 'Add new user ';
					}
					if (Request::is('admin/transactions'))
					{
						echo 'Transactions';
					}
					if (Request::is('admin/payment-requests'))
					{
						echo 'Payment Requests ';
					}
					if (Request::is('admin/accounts'))
					{
						echo 'Account balance of users';
					}
					if (Request::is('admin/setting'))
					{
						echo 'Setting ';
					}
					if (Request::is('admin/transactions/user/*'))
					{
						echo 'User Transactions';
					}
					if (Request::is('admin/single-transaction/*'))
					{
						echo 'Transaction Detail';
					}
					if (Request::is('admin/user-payment-requests/*'))
					{
						echo 'User Payment Requests';
					}
					if (Request::is('admin/change-password'))
					{
						echo 'Change Password';
					}
					
					?>
					</h1>
					
				</div>
			</div>
			