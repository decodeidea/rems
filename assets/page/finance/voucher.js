$(document).ready(function(){
	$('#accounting-voucher-form').validate({
		submitHandler: function(form) {
			var target = $(form).attr('action');
			$('#accounting-voucher-form .alert-warning').removeClass('hidden');
			$('#accounting-voucher-form .alert-success').addClass('hidden');
			$('#accounting-voucher-form .alert-danger').addClass('hidden');
			$.ajax({
				url : target,
				type : 'POST',
				dataType : 'json',
				data : $(form).serialize(),
				success : function(response){
					$('#accounting-voucher-form .alert-warning').addClass('hidden');
					if(response.status == 'ok'){
						$('#accounting-voucher-form .alert-success').removeClass('hidden').children('span').text(response.msg);
						window.location.href = response.redirect;
					}
					else
						$('#accounting-voucher-form .alert-danger').removeClass('hidden').children('span').text(response.msg);	
				},
				error : function(jqXHR, textStatus, errorThrown) {
					alert(textStatus, errorThrown);
				}
			});
		}
	});
    function sendFile(file, editor, welEditable) {
        data = new FormData();
        data.append('image', file);
        $.ajax({
            data: data,
            type: 'post',
            url: 'upload/image',
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                editor.insertImage(welEditable, url);
                $('#px-site-content-static-content-form .panel-body').after('<input type="hidden" name="images[]" value="'+url+'">');
            }
        });
    }
});
$(document).ready(function() { $(".select2").select2(); });

