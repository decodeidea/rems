$(document).ready(function(){
	$('#px-accounting-rekening-form').validate({
		submitHandler: function(form) {
			var target = $(form).attr('action');
			$('#px-accounting-rekening-form .alert-warning').removeClass('hidden');
			$('#px-accounting-rekening-form .alert-success').addClass('hidden');
			$('#px-accounting-rekening-form .alert-danger').addClass('hidden');
			$.ajax({
				url : target,
				type : 'POST',
				dataType : 'json',
				data : $(form).serialize(),
				success : function(response){
					$('#px-accounting-rekening-form .alert-warning').addClass('hidden');
					if(response.status == 'ok'){
						$('#px-accounting-rekening-form .alert-success').removeClass('hidden').children('span').text(response.msg);
						window.location.href = response.redirect;
					}
					else
						$('#px-accounting-rekening-form .alert-danger').removeClass('hidden').children('span').text(response.msg);	
				},
				error : function(jqXHR, textStatus, errorThrown) {
					alert(textStatus, errorThrown);
				}
			});
		}
	});
});

