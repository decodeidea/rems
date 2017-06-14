$('#px-voucher-type-form').validate({
	rules: {                                            
		name: {
			required: true
		}
	},
	submitHandler: function(form) {
		var target = $(form).attr('action');
		$('#px-voucher-type-form .alert-warning').removeClass('hidden');
		$('#px-voucher-type-form .alert-success').addClass('hidden');
		$('#px-voucher-type-form .alert-danger').addClass('hidden');
		$.ajax({
			url : target,
			type : 'POST',
			dataType : 'json',
			data : $(form).serialize(),
			success : function(response){
				$('#px-voucher-type-form .alert-warning').addClass('hidden');
				if(response.status == 'ok'){
					$('#px-voucher-type-form .alert-success').removeClass('hidden').children('span').text(response.msg);
					window.location.href = response.redirect;
				}
				else
					$('#px-voucher-type-form .alert-danger').removeClass('hidden').children('span').text(response.msg);	
			},
			error : function(jqXHR, textStatus, errorThrown) {
				alert(textStatus, errorThrown);
			}
		});
	}
});