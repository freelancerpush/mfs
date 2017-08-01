@include('admin/header')

<?php  

$TotalBalance = $AdminModel->TotalBalance();
$NewPaymentRequest = $AdminModel->NewPaymentRequest();

?>
<div class="row">
	<div class="col-lg-4 col-md-7">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-money fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">${{$TotalBalance}}</div>
						<div>Total Balance</div>
					</div>
				</div>
			</div>
		
		</div>
	</div>
	<div class="col-lg-4 col-md-7">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-usd fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$NewPaymentRequest}}</div>
						<div>New Payment Requests</div>
					</div>
				</div>
			</div>
			<a href="<?php echo url('admin/payment-requests'); ?>">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-4 col-md-7">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-users fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{ $users }}</div>
						<div>Users</div>
					</div>
				</div>
			</div>
			<a href="<?php echo url('admin/users'); ?>">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	
</div>

<div class="row">
	
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Recent Transactions Panel</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								
								<th>Transaction ID</th>
								<th>Date</th>
								<th>User</th>
								<th>Amount (USD)</th>
							</tr>
						</thead>
						<tbody>
						<?php
						if(count($transactions)>0){
								
							foreach( $transactions as $transaction ){
							?>
								<tr>
									
									<td><a href="{{ url( 'admin/single-transaction/'.$transaction->id ) }}" target="_blank" >{{$transaction->transaction_id}}</a></td>
									<td>{{$transaction->created_on}}</td>
									<td><a href="{{url('admin/user/'.$transaction->userid)}}" target="_blank" >{{ $AdminModel->Index($transaction->userid)->username }}</a></td>
									<td>${{$transaction->amount}}</td>
									
								</tr>
							<?php  
							
							}
							
						}else{
							?>
							<tr>
								<td></td>
								<td>No Record Found!</td>
								<td></td>
								<td></td>
							</tr>
							<?php
						}
						?>									
						</tbody>
					</table>
				</div>
				<?php if(count($transactions)>0){ ?>
				<div class="text-right">
					<a href="{{ url('admin/transactions') }}">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	
</div>
<!-- /.row -->

@include('admin/footer')