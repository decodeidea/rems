$(document).ready(function(){
	$('#px-accounting-rekening-message-form').validate({
		ignore: [],
		rules: {                                            
			id: {
				required: true
			}
		},
		submitHandler: function(form) {
			var target = $(form).attr('action');
			$('#px-accounting-rekening-message-form .msg-status').text('Deleting data');
			$.ajax({
				url : target,
				type : 'POST',
				dataType : 'json',
				data : $(form).serialize(),
				success : function(response){
					if(response.status == 'ok'){
						$('#px-accounting-rekening-message-form .msg-status').text('Delete Success...');
						window.location.href = response.redirect;
					}
					else
						$('#px-accounting-rekening-message-form .msg-status').text('Delete Failed');	
				},
				error : function(jqXHR, textStatus, errorThrown) {
					alert(textStatus, errorThrown);
				}
			});
		}
	});
	$('body').delegate('.btn-delete','click',function(){
		$('#px-accounting-rekening-message-box').addClass('open');
		var id = $(this).attr('data-target-id');
		$('#px-accounting-rekening-message-form input[name="id"]').val('');
		$('#px-accounting-rekening-message-form input[name="id"]').val(id);
	});

});

