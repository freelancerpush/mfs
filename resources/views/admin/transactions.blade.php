@include('admin/header')


<div class="table-responsive">

	@if (session('success'))
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			{{ session('success') }}
		</div>	
	@endif
	
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Transaction ID</th>
				<th>Date</th>
				<th>User</th>
				<th>Amount (USD)</th>
				<th>Status</th>
				<th>Type</th>
				<th>Comment</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$i = 1;
		if(count($transactions)>0){
			
			foreach( $transactions as $transaction ){
				
				if(is_object($transaction)){
					
			?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><a href="{{ url( 'admin/single-transaction/'.$transaction->id ) }}" target="_blank" >{{ $transaction->transaction_id }}</a></td>
					<td>{{ $transaction->created_on }}</td>
					<td><a target="_blank" href="{{ url('admin/user/'.$transaction->userid) }}" >{{ $TransactionsModel->Index($transaction->userid)->username }}</a></td>
					<td>${{ $transaction->amount }}</td>
					<td>{{ $transaction->status }}</td>
					<td>{{ $transaction->type }}</td>
					<td>{{ $transaction->comment }}</td>
					<td>
					
					<a href="{{ url( 'admin/single-transaction/'.$transaction->id ) }}" class="btn btn-xs btn-info" title="View Detail" ><i class="fa fa-arrow-right"></i></a>
					
					<a href="{{ url( 'admin/delete-transaction/'.$transaction->id ) }}" class="btn btn-xs btn-danger delete" title="Delete" ><i class="fa fa-remove"></i></a>
					
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
				<td>No Records Found!</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>	
			<?php
		}
		?>									
		</tbody>
	</table>
	
	<?php if( count($transactions)>0 ){ echo '<div class="col-md-12">'.$transactions->links().'</div>'; } ?>

</div>

@include('admin/footer')