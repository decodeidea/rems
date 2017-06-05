$(document).ready(function(){
	$( "#px-customer-form-customer-date_of_birth" ).datepicker();
	$('#px-customer-form').validate({
		submitHandler: function(form) {
			var target = $(form).attr('action');
			$('#px-customer-form .alert-warning').removeClass('hidden');
			$('#px-customer-form .alert-success').addClass('hidden');
			$('#px-customer-form .alert-danger').addClass('hidden');
			$.ajax({
				url : target,
				type : 'POST',
				dataType : 'json',
				data : $(form).serialize(),
				success : function(response){
					$('#px-site-content-static-content-form .alert-warning').addClass('hidden');
					if(response.status == 'ok'){
						$('#px-site-content-static-content-form .alert-success').removeClass('hidden').children('span').text(response.msg);
						window.location.href = response.redirect;
					}
					else
						$('#px-site-content-static-content-form .alert-danger').removeClass('hidden').children('span').text(response.msg);	
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
})