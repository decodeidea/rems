$(document).ready(function(){
	$('#px-accounting-payment-type-form').validate({
		submitHandler: function(form) {
			var target = $(form).attr('action');
			$('#px-accounting-payment-type-form .alert-warning').removeClass('hidden');
			$('#px-accounting-payment-type-form .alert-success').addClass('hidden');
			$('#px-accounting-payment-type-form .alert-danger').addClass('hidden');
			$.ajax({
				url : target,
				type : 'POST',
				dataType : 'json',
				data : $(form).serialize(),
				success : function(response){
					$('#px-accounting-payment-type-form .alert-warning').addClass('hidden');
					if(response.status == 'ok'){
						$('#px-accounting-payment-type-form .alert-success').removeClass('hidden').children('span').text(response.msg);
						window.location.href = response.redirect;
					}
					else
						$('#px-accounting-payment-type-form .alert-danger').removeClass('hidden').children('span').text(response.msg);	
				},
				error : function(jqXHR, textStatus, errorThrown) {
					alert(textStatus, errorThrown);
				}
			});
		}
	});
});

