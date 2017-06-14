$(document).ready(function(){
	$("#px-voucher-form-voucher_type_id").change(function() {
		if (this.value == 2) {
			$("#field-ceque").removeClass("hidden");
			$("#field-kas").addClass("hidden");
		}else if(this.value == 1){
			$("#field-ceque").addClass("hidden");
			$("#field-kas").removeClass("hidden");
		}else{
			$("#field-ceque").addClass("hidden");
			$("#field-kas").addClass("hidden");
		}
	});
	$(".select2").select2();
	$('#px-voucher-form').validate({
		rules: {
			voucher_type_id: {
				required: true
			},                                            
			rekening_id: {
				required: true
			}
		},
		submitHandler: function(form) {
			var target = $(form).attr('action');
			$('#px-voucher-form .alert-warning').removeClass('hidden');
			$('#px-voucher-form .alert-success').addClass('hidden');
			$('#px-voucher-form .alert-danger').addClass('hidden');
			$.ajax({
				url : target,
				type : 'POST',
				dataType : 'json',
				data : $(form).serialize(),
				success : function(response){
					$('#px-voucher-form .alert-warning').addClass('hidden');
					if(response.status == 'ok'){
						$('#px-voucher-form .alert-success').removeClass('hidden').children('span').text(response.msg);
						window.location.href = response.redirect;
					}
					else
						$('#px-voucher-form .alert-danger').removeClass('hidden').children('span').text(response.msg);	
				},
				error : function(jqXHR, textStatus, errorThrown) {
					alert(textStatus, errorThrown);
				}
			});
		}
	});
});

function addRow(tableID){
    var table=document.getElementById(tableID);
    var rowCount=table.rows.length;
    $("#btnAdd").attr('disabled',true);
    $.ajax({
        url: 'finance/add_row_voucher/'+rowCount,
        success: function(response){
            $("#"+tableID).find('tbody').append(response);
            // $("#submit").show();
            $("#btnAdd").attr('disabled',false);
            $(document).find("select.select2").select2({
                dropdownAutoWidth : true
            });
         },
         dataType:"html"
    });
}

$(document).on('click', 'button.removebutton', function () {
 $(this).closest('tr').remove();
 return false;
});

