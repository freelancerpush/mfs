@include('admin/header')

	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-6">
				
				@if(isset($msg) && trim($msg)!='')
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<?php echo $msg; ?>
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
				
				
				
				{{ Form::open(array('action' => 'Admin\AddUser@Index')) }}
			
					<div class="form-group">
						
						{{ Form::label('first_name', 'First Name') }}
						{{ Form::text('first_name', old('first_name'), array('required', 'class' => 'form-control', 'placeholder' => 'Enter First Name') ) }}
						
					</div>
					
					<div class="form-group">
						
						{{ Form::label('last_name', 'Last Name') }}
						{{ Form::text('last_name', old('last_name'), array('required', 'class' => 'form-control', 'placeholder' => 'Enter Last Name') ) }}
						
					</div>
					
					<div class="form-group">
					
						{{ Form::label('username', 'Username') }}
						{{ Form::text('username', old('username'), array('required', 'class' => 'form-control', 'placeholder' => 'Enter Username') ) }}

					</div>
					
					<div class="form-group">
					
						{{ Form::label('email', 'Email Address') }}
						{{ Form::email('email', old('email'), array('required', 'class' => 'form-control', 'placeholder' => 'Enter Email Address' ) ) }}
		
					</div>
					
					<div class="form-group">
					
						{{ Form::label('phone', 'Phone') }}
						{{ Form::text('phone', old('phone'), array('required', 'class' => 'form-control', 'placeholder' => 'Enter Phone' ) ) }}
						
					</div>
					<div class="form-group">
					
						{{ Form::label('password', 'Password') }}
						{{ Form::password('password', array('required', 'class' => 'form-control', 'placeholder' => 'Enter Password', 'type' => 'password' ) ) }}
					
					</div>
					
					<div class="form-group">
			
						{{ Form::label('role', 'Role') }}
						<select class="form-control" name="role">
								
								<option value="" >Select Role</option>
								
							<?php foreach ($roles as $role){ ?>
							
								<option value="{{ $role->id }}">{{ $role->name }}</option>
							
							<?php } ?>
							
						</select>  
			
					</div>
					
					<div class="form-group">
						
						{{ Form::button('submit', array('class' => 'btn btn-primary', 'type' => 'submit' ) ) }}
						
					</div>
				
				{{ Form::close() }}
				
			</div>			
		</div>
	</div>
		
@include('admin/footer')