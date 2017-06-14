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


});

function approve(id){
	
	$('#message_box').html('Are you sure to approve this');
	$('#link_atasan').attr('href',id);
	$('#px-site-content-static-content-message-box').addClass('open');
}
function reject(id){
	
	$('#message_box').html('Are you sure to Reject this');
	$('#link_atasan').attr('href',id);
	$('#px-site-content-static-content-message-box').addClass('open');
}