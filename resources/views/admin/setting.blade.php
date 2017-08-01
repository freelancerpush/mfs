@include('admin/header')

	<div class="row">
		
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Paypal Detail</h3>
				</div>
				<div class="panel-body">
					<div>
						
						<form name="paypal_form_iv" class="form-horizontal">
								
							  <div class="form-group">
								<label for="text" class="col-md-3 control-label">Gateway Mode</label>
								<div class="col-md-5">
									
									<select name="paypal_mode" id="paypal_mode" class="form-control">
										<option value="test">Test Mode</option>
										<option value="live">Live Mode</option>		
									</select>	
								
								</div>
							  </div> 
							 
							  <div class="form-group">
								<label for="text" class="col-md-3 control-label">PayPal API Username <span class="chili"></span></label>
								<div class="col-md-5">
								  <input type="text" class="form-control" name="paypal_username" id="paypal_username" value="" placeholder="Enter Paypal Username">
								</div>
							  </div>
							
							  <div class="form-group">
								<label for="inputEmail3" class="col-md-3 control-label">PayPal API Password <span class="chili"></span></label>
								<div class="col-md-5">
								  <input type="text" class="form-control" id="paypal_api_password" name="paypal_api_password" value="" placeholder="Enter Paypal Api Password">
								</div>
							  </div>
							  
							  <div class="form-group">
								<label for="inputEmail3" class="col-md-3 control-label">PayPal API Signature <span class="chili"></span></label>
								<div class="col-md-5">
								  <input type="text" class="form-control" id="paypal_api_signature" name="paypal_api_signature" value="" placeholder="Enter Paypal Api Signature">
								</div>
							  </div>
							  
							  <div class="form-group">
								<label for="inputEmail3" class="col-md-3 control-label">PayPal API Currency Code</label>
								<div class="col-md-5">
									
									<select id="paypal_api_currency" name="paypal_api_currency" class="form-control">
									
										<option value="USD">US Dollars ($)</option>
										<option value="EUR">Euros (€)</option>
										<option value="GBP">Pounds Sterling (£)</option>
										<option value="AUD">Australian Dollars ($)</option>
										<option value="BRL">Brazilian Real (R$)</option>
										<option value="CAD">Canadian Dollars ($)</option>
										<option value="CNY">Chinese Yuan</option>
										<option value="CZK">Czech Koruna</option>
										<option value="DKK">Danish Krone</option>
										<option value="HKD">Hong Kong Dollar ($)</option>
										<option value="HUF">Hungarian Forint</option>
										<option value="INR">Indian Rupee</option>
										<option value="ILS">Israeli Sheqel</option>
										<option value="JPY">Japanese Yen (¥)</option>
										<option value="MYR">Malaysian Ringgits</option>
										<option value="MXN">Mexican Peso ($)</option>
										<option value="NZD">New Zealand Dollar ($)</option>
										<option value="NOK">Norwegian Krone</option>
										<option value="PHP">Philippine Pesos</option>
										<option value="PLN">Polish Zloty</option>
										<option value="SGD">Singapore Dollar ($)</option>
										<option value="ZAR">South African Rand</option>
										<option value="KRW">South Korean Won</option>
										<option value="SEK">Swedish Krona</option>
										<option value="CHF">Swiss Franc</option>
										<option value="RUB">Russian Ruble</option> 
										<option value="TWD">Taiwan New Dollars</option>
										<option value="THB">Thai Baht</option>
										<option value="TRY">Turkish Lira</option>
										
									</select>
											
									<!--
								  <input type="text" class="form-control" id="paypal_api_currency" name="paypal_api_currency" value=""  placeholder="Enter Paypal Api Currency">
								  -->
								</div>
							  </div>
							  
							  <div class="form-group">
								<div class="col-md-5 col-md-offset-3">
									<input type="submit" name="submit" class="btn btn-primary" >
								</div>
							  </div>
										  
						  
						</form>
				
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
	<!-- /.row -->

@include('admin/footer')