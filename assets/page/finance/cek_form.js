$(document).ready(function(){
	$('.money').autoNumeric("init",{
    vMin: '0', vMax: '999999999',
        // aSep: '.',
        // aDec: ','
    });
});
$('#px-cek-form').validate({
		rules: {
			code: {
				required: true
			},                                            
			name: {
				required: true
			},                                            
			nominal: {
				required: true
			}
		},
		submitHandler: function(form) {
			var target = $(form).attr('action');
			$('#px-cek-form .alert-warning').removeClass('hidden');
			$('#px-cek-form .alert-success').addClass('hidden');
			$('#px-cek-form .alert-danger').addClass('hidden');
			$.ajax({
				url : target,
				type : 'POST',
				dataType : 'json',
				data : $(form).serialize(),
				success : function(response){
					$('#px-cek-form .alert-warning').addClass('hidden');
					if(response.status == 'ok'){
						$('#px-cek-form .alert-success').removeClass('hidden').children('span').text(response.msg);
						window.location.href = response.redirect;
					}
					else
						$('#px-cek-form .alert-danger').removeClass('hidden').children('span').text(response.msg);	
				},
				error : function(jqXHR, textStatus, errorThrown) {
					alert(textStatus, errorThrown);
				}
			});
		}
	});