@include('admin/header')

	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-6">
				
				
				<?php if(is_object($singleTransaction)){ ?>
					
				<table class="table table-bordered" >
					<tr>
						<th>Transaction ID</th>
						<td>{{ $singleTransaction->transaction_id }}</td>
					</tr>
					<tr>
						<th>Created On</th>
						<td>{{ $singleTransaction->created_on }}</td>
					</tr>
					<tr>
						<th>UserID</th>
						<td><a target="_blank" href="{{ url('admin/user/'.$singleTransaction->userid) }}" >{{ $SingleTransactionModel->Index( $singleTransaction->userid )->username }}</a></td>
					</tr>
					<tr>
						<th>Amount</th>
						<td>${{ $singleTransaction->amount }}</td>
					</tr>
					<tr>
						<th>Status</th>
						<td>{{ $singleTransaction->status }}</td>
					</tr>
					<tr>
						<th>Comment</th>
						<td>{{ $singleTransaction->comment }}</td>
					</tr>
					<tr>
						<th>Type</th>
						<td>{{ $singleTransaction->type }}</td>
					</tr>
				</table>
				
				
				<a href="{{ url( 'admin/delete-transaction/'.$singleTransaction->id ) }}" class="btn btn-xs btn-danger delete" title="Delete" ><i class="fa fa-remove"></i> Delete</a>
					
				<?php }else{ ?>
					
					<p>No Record Found!</p>
					
				<?php  } ?>
				
				<a class="btn btn-xs btn-info" href="{{ URL::previous() }}" ><i class="fa fa-arrow-left"></i> Back</a> 
				
			</div>			
		</div>
	</div>
		
@include('admin/footer')