@include('admin/header')

	<div class="row">
		<div class="col-lg-12">
		
		<?php  if(is_object($userdata)){ ?>
			<div class="col-lg-6">
			
				@if(isset($msg) && trim($msg)!='')
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						{{ $msg }}
					</div>	
				@endif
				
				@if ($errors->any())
					
					<div class="col-lg-12">
						<div class="alert alert-info alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<?php 
							
							$errors = $errors->all();
							
							foreach( $errors as $error ){
								echo '<i class="fa fa-exclamation-triangle "></i> '.$error.'<br>';
							}
							
							?>
						</div>
					</div>
					
				@endif
				
				
				
				{{ Form::open( array('action' => array('Admin\EditUser@Index', $userdata->id) ) ) }}
			
					@if($userdata->id!=1)
						
					<div class="form-group">
						
						{{ Form::label('first_name', 'First Name') }}
						{{ Form::text('first_name', $userdata->first_name, array('required', 'class' => 'form-control', 'placeholder' => 'Enter First Name') ) }}
						
					</div>
					
					<div class="form-group">
						
						{{ Form::label('last_name', 'Last Name') }}
						{{ Form::text('last_name', $userdata->last_name, array('required', 'class' => 'form-control', 'placeholder' => 'Enter Last Name') ) }}
						
					</div>
					
					@endif
					
					<div class="form-group">
					
						{{ Form::label('username', 'Username') }}
						{{ Form::text('username', $userdata->username, array('required', 'class' => 'form-control', 'placeholder' => 'Enter Username') ) }}

					</div>
					
					<div class="form-group">
					
						{{ Form::label('email', 'Email Address') }}
						{{ Form::email('email', $userdata->email, array('required', 'class' => 'form-control', 'placeholder' => 'Enter Email Address' ) ) }}
		
					</div>
					
					@if($userdata->id!=1)
						
					<div class="form-group">
					
						{{ Form::label('phone', 'Phone') }}
						{{ Form::text('phone', $userdata->phone, array('required', 'class' => 'form-control', 'placeholder' => 'Enter Phone' ) ) }}
						
					</div>
					
						
					<div class="form-group">
			
						{{ Form::label('role', 'Role') }}
						<select class="form-control" name="role">
								
								<option value="" >Select Role</option>
							
							<?php foreach ($roles as $role){ ?>
							
								<option <?php if($userdata->role == $role->id ){ echo 'selected'; } ?> value="{{ $role->id }}">{{ $role->name }}</option>
							
							<?php } ?>
							
						</select>  
			
					</div>
					
					@endif
					
					@if($userdata->id==1)
						<input type="hidden" name="role" value="1">
						<input type="hidden" name="phone" value="8888888888">
						<input type="hidden" name="first_name" value="admin">
						<input type="hidden" name="last_name" value="admin">
					@endif
					
					<div class="form-group">
						
						{{ Form::button('submit', array('class' => 'btn btn-primary', 'type' => 'submit' ) ) }}
						
					</div>
				
				{{ Form::close() }}
				
			</div>		
			
			@if($userdata->id!=1)
			
			<div class="col-lg-12">
				<hr>		
				<table class="" >
					<tr>
						<td>
							
						</td>
						<td>
							{{ Form::open(array('action' => array( 'Admin\DeleteUser@Index', $userdata->id ), 'style' => '')) }}
							<button type="submit" class="btn btn-danger delete" title="Delete" name="submit" >Delete</button>
							{{ Form::close() }}
						</td>
					</tr>
				</table>		
				
			</div>
			
			@endif
			
				<?php }else{
					
					?>
					
					<p>No Record Found!</p>
					
					<?php
					
				} ?>
			
		</div>
	</div>
		
@include('admin/footer')