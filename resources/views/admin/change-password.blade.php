@include('admin/header')

	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-6">
				
				@if (session('msg'))
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						{{ session('msg') }}
					</div>	
				@endif
				
				<div class="col-md-12">
					@if(Session::has('error'))
					<div class="alert-box success">
					  <h2>{{ Session::get('error') }}</h2>
					</div>
					@endif
				</div>
				
				{{ Form::open(array('action' => 'Admin\ChangePassword@Index')) }}
			
					{!! csrf_field() !!}
					
					<div class="form-group">
						
						{{ Form::label('password', 'New Password') }}
						{{ Form::text('password', Null, array('required', 'class' => 'form-control', 'placeholder' => 'New Password') ) }}
						 <p class="errors">{{$errors->first('password')}}</p>
					</div>
					
					<div class="form-group">
						
						{{ Form::label('password_confirmation', 'Confirm Password') }}
						{{ Form::text('password_confirmation', Null, array('required', 'class' => 'form-control', 'placeholder' => 'Confirm Password') ) }}
						 <p class="errors">{{$errors->first('password_confirmation')}}</p>
					</div>
					
					<div class="form-group">
						
						{{ Form::button('submit', array('class' => 'btn btn-primary', 'type' => 'submit' ) ) }}
						
					</div>
					
					<a class="btn btn-warning" href="{{ url('/admin/user/'.$id) }}" ><i class="fa fa-user"></i> Edit Profile</a>
				
				{{ Form::close() }}
				
			</div>			
		</div>
	</div>
		
@include('admin/footer')