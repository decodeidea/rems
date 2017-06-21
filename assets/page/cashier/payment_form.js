$(document).ready(function(){
	$('.money').autoNumeric("init",{
		vMin: '0', vMax: '999999999',
        // aSep: '.',
        // aDec: ','
    });

	
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