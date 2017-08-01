@include('admin/header')

<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Account Owner</th>
				<th>Balance (USD)</th>
				<th>Created On</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$i = 1;
		
		if(count($accounts)>0){
			
			foreach( $accounts as $account ){
				
				if($account->userid!=0 && $account->userid!=''){
					
					if(is_object($account)){
			?>
				<tr>
					<td>{{ $i }}</td>
					<td><a target="_blank" href="{{ url( 'admin/user/'.$account->id ) }}" title="View More Detail about {{ $account->first_name.' '.$account->last_name }}" >{{ $account->username }}</a></td>
					<td>${{ $account->balance }}</td>
					<td>{{ $account->creation_date }}</td>
					<td>
					
					<a href="{{ url('admin/transactions/user/'.$account->id) }}" class="btn btn-xs btn-info" title="Transactions of User" ><i class="fa fa-money"></i></a>
					
					</td>
				</tr>
				
					<?php  
					
						$i++;
					
					}
				}
			}
			
		}else{
			?>
			<tr>
				<td></td>
				<td></td>
				<td>No Record found!</td>
				<td></td>
				<td></td>
			</tr>
			<?php
		}
		?>									
		</tbody>
	</table>
	
	<?php if( count($accounts)>0 ){ echo '<div class="col-md-12">'.$accounts->links().'</div>'; } ?>
	
</div>

@include('admin/footer')