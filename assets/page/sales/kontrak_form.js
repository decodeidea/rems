$(document).ready(function(){
	var price = $('input[name="price"]').val();
	$('.select2').select2();
	$('.money').autoNumeric("init",{
		vMin: '0', vMax: '999999999999',
        // aSep: '.',
        // aDec: ','
    });
    $('#bunga').autoNumeric("init",{
	    vMin: '0.00', vMax: '99.99',
	    anDefault: "99.99",
	    // aSep: '.',
	    // aDec: ','
	});
	$("#px-sales-kontrak-form-date_end" ).datepicker();
	$('#form-kontrak').validate({
		rules: {                                            
			title: {
				      required: true
			}
		},
		submitHandler: function(form) {
			var target = $(form).attr('action');
			$('#form-kontrak .alert-warning').removeClass('hidden');
			$('#form-kontrak .alert-success').addClass('hidden');
			$('#form-kontrak .alert-danger').addClass('hidden');
			$('.px-summernote').each(function() {
				$(this).val($(this).code());
			});
			$.ajax({
				url : target,
				type : 'POST',
				dataType : 'json',
				data : $(form).serialize(),
				success : function(response){
					$('#form-kontrak .alert-warning').addClass('hidden');
					if(response.status == 'ok'){
						$('#form-kontrak .alert-success').removeClass('hidden').children('span').text(response.msg);
						window.location.href = response.redirect;
					}
					else
						$('#form-kontrak .alert-danger').removeClass('hidden').children('span').text(response.msg);
				},
				error : function(jqXHR, textStatus, errorThrown) {
					alert(textStatus, errorThrown);
				}
			});
		}
	});
	$('#form-kontrak-static-content-content').summernote({
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
                $('#form-kontrak .panel-body').after('<input type="hidden" name="images[]" value="'+url+'">');
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

    $('#payment_scheme').change(function(){  ;  
        var id = $(this).val();  
        if(id != 0){
            $.ajax({
              url : base_url+"sales/get_kontrak_type/"+id,
              type: "GET",
              dataType: "JSON",
              success: function(data)
              {
               	$("#kontrak_type_name").val(data.name);            
               	$("#kontrak_type").val(data.id);            
               	$("#bunga").val(data.bunga);            
              }
          });
        }        
    });

    $('#btnCancel').on('click', function(e) {
	    e.preventDefault();

	    var id = $(this).data('id');
	    $('#cancelModal').data('id', id).modal('show');
	});

	$('#cancelModal').on('show', function() {
	    var id = $(this).data('id'),
	        removeBtn = $(this).find('.danger');
	});

	$('#btnYes').click(function() {
	  	var id = $('#cancelModal').data('id');
	  	$.ajax({
            url : base_url+"sales/kontrak_delete/",
            type: "POST",
            data: {id:id},
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('[data-id='+id+']').remove();
	  			$('#cancelModal').modal('hide');
	  			window.location.replace(base_url+"sales/kontrak");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
	  	
	});


});

function hitung(){
	// var a = parseFloat($("#price").val().replace(/\./g, '')),
	// 	b = parseFloat($("#booking_fee").val().replace(/\./g, ''));
		a = parseFloat($("#price").val().replace(/,/g, '')),
		b = parseFloat($("#booking_fee").val().replace(/,/g, ''));
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