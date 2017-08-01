@include('admin/header');

<a class="btn btn-primary" href="<?php echo url('admin/add-user'); ?>" ><i class="fa fa-plus"></i> Add New</a>

<hr>

<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Username</th>
				<th>Account Balance</th>
				<th>Email ID</th>
				<th>Phone</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$i = 1;
		
		if(count($users)>0){
			
			foreach($users as $user){
			?>
				<tr>
					<td>{{ $i }}</td>
					<td><a href="{{ url( 'admin/user/'.$user->id ) }}" >{{ $user->username }}</a></td>
					<td>$<?php echo rand(0,250000); ?></td>
					<td><a title="Mail to {{ $user->email }}" href="mailto:{{ $user->email }}" >{{ $user->email }}</a></td>
					<td><a href="tel:{{ $user->phone }}">{{ $user->phone }}</a> </td>
					
					<td>
					
					<a target="_blank" href="{{ url( 'admin/user/'.$user->id ) }}" class="btn btn-xs btn-info" title="Edit" ><i class="fa fa-edit"></i></a>
					<a target="_blank" href="{{ url( 'admin/transactions/user/'.$user->id ) }}" class="btn btn-xs btn-info" title="Transactions" ><i class="fa fa-money"></i></a>
					<a target="_blank" href="{{ url( 'admin/user-payment-requests/'.$user->id ) }}" class="btn btn-xs btn-info" title="Payment Requests" ><i class="fa fa-usd"></i></a>
					
					{{ Form::open(array('action' => array( 'Admin\DeleteUser@Index', $user->id ), 'style' => 'display: inline-block;')) }}
					<button type="submit" class="btn btn-xs btn-danger delete" title="Delete" name="submit" ><i class="fa fa-remove"></i></button>
					{{ Form::close() }}
					</td>
				</tr>
			<?php  
			$i++;
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
	
	<?php if( count($users)>0 ){ echo '<div class="col-md-12">'.$users->links().'</div>'; } ?>
	
</div>


@include('admin/footer');