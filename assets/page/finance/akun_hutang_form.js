$(document).ready(function(){
	$('#px-akun-hutang-form').validate({
		submitHandler: function(form) {
			var target = $(form).attr('action');
			$('#px-akun-hutang-form .alert-warning').removeClass('hidden');
			$('#px-akun-hutang-form .alert-success').addClass('hidden');
			$('#px-akun-hutang-form .alert-danger').addClass('hidden');
			$.ajax({
				url : target,
				type : 'POST',
				dataType : 'json',
				data : $(form).serialize(),
				success : function(response){
					$('#px-akun-hutang-form .alert-warning').addClass('hidden');
					if(response.status == 'ok'){
						$('#px-akun-hutang-form .alert-success').removeClass('hidden').children('span').text(response.msg);
						window.location.href = response.redirect;
					}
					else
						$('#px-akun-hutang-form .alert-danger').removeClass('hidden').children('span').text(response.msg);	
				},
				error : function(jqXHR, textStatus, errorThrown) {
					alert(textStatus, errorThrown);
				}
			});
		}
	});
});
$(document).ready(function() { $(".select2").select2(); });

