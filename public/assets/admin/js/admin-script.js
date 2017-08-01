$(document).ready(function(){
	
	$('.decline-payment-request').click(function(){
		
		$(this).next().toggle();
		return false;
	
	});
	
	$('.delete').click(function(){
		
		if(confirm('Are you sure want to delete?') == true){
			return true;
		}
		return false;
	
	});
	
});