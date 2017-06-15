    $('#payment_scheme').change(function(){  
        var id = $(this).val();  
        if(id != 0){
            $.ajax({
              url : "http://localhost/rems/sales/get_kontrak_type/"+id,
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