$(document).ready(function(){
	$("#select2").select2();
   $('#price').autoNumeric("init",{
    vMin: '0', vMax: '999999999999',
        // aSep: '.',
        // aDec: ','
    });
	$('#px-pengajuan-form').validate({

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
});
$(document).ready(function() { $(".select2").select2(); });

 function change_kontrak()
          {
           var controller_name = $('#controller_name').val();
           var id=$("#px-customer-form-pengajuan-unit").val();
           $.ajax({
            url : controller_name + "/get_area_no/" + id,
              type: "GET",
              dataType: "JSON",
              success: function(data)
              {   
                  var harganye=data.price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");;
                  $('[name="kamar"]').val(data.number);
                  $('[name="area"]').val(data.area);
                  $('[name="price"]').val(harganye);
                  
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error get data from ajax');
              }
          });
          }
function masking(){
 var price=document.getElementById("price").value.replace(/,/g, '');
 parseFloat(price);

}