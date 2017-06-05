$(document).ready(function(){
	$("#select2").select2();
  
	
   
});

function change_floor(area){
	var floor=$("#select2").val();
	$.ajax({
        url:$("#controller").val()+"/area"+area+"_floor"+floor,
        type: 'GET',
        dataType: 'html',
        success:function(content,code)
        {

            console.log(content);
            $('#denah').html(content);
        }
        });        
    }
