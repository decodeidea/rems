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
						$('#px-site-content-static-content-message-form .msg-status').text('Cancel Success...');
						window.location.href = response.redirect;
					}
					else
						$('#px-site-content-static-content-message-form .msg-status').text('Cancel Failed');	
				},
				error : function(jqXHR, textStatus, errorThrown) {
					alert(textStatus, errorThrown);
				}
			});
		}
	});


});


$('body').delegate('.btn-cancel','click',function(){
	$('#message_box').html('Are you sure want to cancel this contract?');
	$('#px-site-content-static-content-message-form').attr('action', 'administration/cancel_contract');

	var id = $(this).attr('data-target-id');
	$('#px-site-content-static-content-message-form input[name="id"]').val('');
	$('#px-site-content-static-content-message-form input[name="id"]').val(id);

	$('#px-site-content-static-content-message-box').addClass('open');
});
