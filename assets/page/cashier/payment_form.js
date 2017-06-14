$(document).ready(function(){
	$('.select2').select2();
	$('.money').autoNumeric("init",{
		vMin: '0', vMax: '999999999',
        // aSep: '.',
        // aDec: ','
    });

	$("#px-sales-kontrak-form-date_end" ).datepicker();

	// $( "#form-payment" ).validate({
	//   rules: {
	//     nominal: {
	//       required : true,
	//     }
	//   }
	// });

	$.validator.addMethod('notEqual',function(value, element, param){
		return this.optional(element)||value != param;
	}, "This field is required" );

	$('#form-payment').validate({
		rules: {                                            
			nominal: {
				required: true
			},
			rekening_id: {
				notEqual: 0
			}
		},
		submitHandler: function(form) {
			var target = $(form).attr('action');
			$('#form-payment .alert-warning').removeClass('hidden');
			$('#form-payment .alert-success').addClass('hidden');
			$('#form-payment .alert-danger').addClass('hidden');
			$('.px-summernote').each(function() {
				$(this).val($(this).code());
			});
			$.ajax({
				url : target,
				type : 'POST',
				dataType : 'json',
				data : $(form).serialize(),
				success : function(response){
					$('#form-payment .alert-warning').addClass('hidden');
					if(response.status == 'ok'){
						$('#form-payment .alert-success').removeClass('hidden').children('span').text(response.msg);
						window.location.href = response.redirect;
					}
					else
						$('#form-payment .alert-danger').removeClass('hidden').children('span').text(response.msg);	
				},
				error : function(jqXHR, textStatus, errorThrown) {
					alert(textStatus, errorThrown);
				}
			});
		}
	});
	$('#form-payment-static-content-content').summernote({
		toolbar: [
			['style', ['style']],
			['font', ['bold', 'italic', 'underline', 'clear']],
			['fontname', ['fontname']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['height', ['height']],
			['table', ['table']],
			['insert', ['link', 'picture', 'hr']],
			['view', ['fullscreen', 'codeview']],
			['help', ['help']]
		],
		height: '300px',
		onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable);
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
                $('#form-payment .panel-body').after('<input type="hidden" name="images[]" value="'+url+'">');
            }
        });
    }
    var base_url = $("#base_url").val();
    $('#px-sales-kontrak-unit-id').change(function(){  ;  
        var id = $(this).val();  
        if(id != 0){
            $.ajax({
              url : base_url+"sales/get_unit_price/"+id,
              type: "GET",
              // dataType: "JSON",
              success: function(data)
              {
               	$("#price").val(addCommas(data));            
              }
          });
        }        
    });

    $("#kontrak_id").change(function(){
        var id = $(this).val();
        var kontrak_record_id = $('#id').val();
        //console.log(kontrak_record_id);
        if(id != 0){
        	var url = base_url+"cashier/get_kontrak_detail/"+id;
            $('#detail-kontrak').html('<img src="/rgproperty/assets/backend_assets/img/ajax-loader.gif"> loading...');
            $.ajax({
		        type: 'POST',
		        data : {'kontrak_record_id':kontrak_record_id},
		        url: url,
		        success: function(data) {
					$("#detail-kontrak").html(data);
					$(document).find("select.select2").select2({
				        dropdownAutoWidth : true
				    });
		        }
		    });
        }
    })
    .change();
});

function hitung(){
	var a = parseFloat($("#price").val().replace(/,/g,"")),
		b = parseFloat($("#booking-fee").val().replace(/,/g,""));
		c = a-b;
	$("#sisa-hutang").val(addCommas(c));
}


function addCommas(nStr)
{
  nStr += '';
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  return x1 + x2;
}