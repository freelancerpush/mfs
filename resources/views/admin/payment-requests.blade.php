@include('admin/header')

<div class="table-responsive">

	@if (session('warning'))
		<div class="alert alert-warning alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			{{ session('warning') }}
		</div>	
	@endif

	@if (session('success'))
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<?php echo session('success'); ?>
		</div>	
	@endif
	
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Username</th>
				<th>Request Date/Time</th>
				<th>Requested Amount</th>
				<th>User Account Balance</th>
				<th>Status</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php
		
		$i = 1;
		
		if(count($payment_request)>0){
			
			foreach($payment_request as $request){
				
				if($request->userid!=0 || $request->userid!=''){
					$user = $PaymentRequestsModel->Index( $request->userid );
					
					$account = $PaymentRequestsModel->Balance( $request->userid );
					
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><a target="_blank" href="{{ url( 'admin/user/'.$request->userid ) }}" > {{ $user->username }}</a></td>
					<td>{{ $request->created_on }}</td>
					<td><?php if( $request->withdraw_amount > $account->balance ){ echo '<p style="color:red;" title="Insufficient Account Balance" >$'.$request->withdraw_amount.'</p>'; }else{  echo '<p style="color:green;">$'.$request->withdraw_amount.'</p>';  } ?></td>
					<td>${{ $account->balance }}</td>
					<td>{{ $request->status }}</td>
					<td>
					
					{{ Form::open(array('action' => array( 'Admin\ApprovePaymentRequest@Index', $request->id ), 'style' => 'display: inline-block;')) }}
						<button type="submit" class="btn btn-xs btn-success" title="Accept" name="submit" ><i class="fa fa-check"></i></button>
					{{ Form::close() }}
					
					<a class="btn btn-xs btn-danger decline-payment-request" title="Decline" ><i class="fa fa-remove"></i></a>
					
					{{ Form::open(array('action' => array( 'Admin\DeclinePaymentRequest@Index', $request->id ), 'style' => 'display: none;')) }}
					<div class="col-md-12" > 
						<textarea name="reason" class="form-control" style="margin: 10px 0;padding: 10px;float: left;" placeholder="Reason to Decline" required ></textarea>
						<button type="submit" class="btn btn-xs btn-danger delete" title="Decline" name="submit" >Decline</button>
					</div>
					{{ Form::close() }}
					
					</td>
				</tr>
				<?php  
				
				$i++;
				
				}
			
			}
		}else{
			
			?>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>No Records Found!</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			
		}
		?>									
		</tbody>
	</table>
	
	<?php if( count($payment_request)>0 ){ echo '<div class="col-md-12">'.$payment_request->links().'</div>'; } ?>
	
</div>

@include('admin/footer')