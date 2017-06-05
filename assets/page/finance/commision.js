$(document).ready(function(){
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
	$('#px-finance-commision-message-form').validate({
		ignore: [],
		rules: {                                            
			id: {
				required: true
			}
		},
		submitHandler: function(form) {
			var target = $(form).attr('action');
			$('#px-finance-commision-message-form .msg-status').text('Updating data');
			$.ajax({
				url : target,
				type : 'POST',
				dataType : 'json',
				data : $(form).serialize(),
				success : function(response){
					if(response.status == 'ok'){
						$('#px-finance-commision-message-form .msg-status').text('Update Success...');
						window.location.href = response.redirect;
					}
					else
						$('#px-finance-commision-message-form .msg-status').text('Update Failed');	
				},
				error : function(jqXHR, textStatus, errorThrown) {
					alert(textStatus, errorThrown);
				}
			});
		}
	});
	$('body').delegate('.btn-pay','click',function(){
		$('#px-finance-commision-message-box').addClass('open');
		var id = $(this).attr('data-target-id');
		$('#px-finance-commision-message-form input[name="id"]').val('');
		$('#px-finance-commision-message-form input[name="id"]').val(id);
	});
})