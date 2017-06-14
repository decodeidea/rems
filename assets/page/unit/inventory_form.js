$(document).ready(function(){
	$('.select2').select2();
	$('#px-unit-unit-inventory-form').validate({

		submitHandler: function(form) {
			var target = $(form).attr('action');
			$('#px-unit-unit-inventory-form .alert-warning').removeClass('hidden');
			$('#px-unit-unit-inventory-form .alert-success').addClass('hidden');
			$('#px-unit-unit-inventory-form .alert-danger').addClass('hidden');
			$.ajax({
				url : target,
				type : 'POST',
				dataType : 'json',
				data : $(form).serialize(),
				success : function(response){
					$('#px-unit-unit-inventory-form .alert-warning').addClass('hidden');
					if(response.status == 'ok'){
						$('#px-unit-unit-inventory-form .alert-success').removeClass('hidden').children('span').text(response.msg);
						window.location.href = response.redirect;
					}
					else
						$('#px-unit-unit-inventory-form .alert-danger').removeClass('hidden').children('span').text(response.msg);	
				},
				error : function(jqXHR, textStatus, errorThrown) {
					alert(textStatus, errorThrown);
				}
			});
		}
	});
	$('#px-site-content-static-content-message-form').validate({
		ignore: [],
		rules: {                                            
			id: {
				required: true
			}
		},
		submitHandler: function(form) {
			var target = $(form).attr('action');
			$('#px-site-content-static-content-message-form .msg-status').text('Deleting data');
			$.ajax({
				url : target,
				type : 'POST',
				dataType : 'json',
				data : $(form).serialize(),
				success : function(response){
					if(response.status == 'ok'){
						$('#px-site-content-static-content-message-form .msg-status').text('Delete Success...');
						window.location.href = response.redirect;
					}
					else
						$('#px-site-content-static-content-message-form .msg-status').text('Delete Failed');	
				},
				error : function(jqXHR, textStatus, errorThrown) {
					alert(textStatus, errorThrown);
				}
			});
		}
	});
	$('body').delegate('.btn-delete','click',function(){
		$('#px-site-content-static-content-message-box').addClass('open');
		var id = $(this).attr('data-target-id');
		$('#px-site-content-static-content-message-form input[name="id"]').val('');
		$('#px-site-content-static-content-message-form input[name="id"]').val(id);
	});
})