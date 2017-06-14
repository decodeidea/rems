$(document).ready(function(){
	$("#select2").select2();
  
	
   
});

function change_block(area){
    
    var block=$("#select2").val();
    $.ajax({

        url:$("#base_url").val()+$("#controller").val()+"/area"+area+"_block"+block,
        type: 'GET',
        dataType: 'html',
       
        success:function(content,code)
        {
              
            $('#denah').html(content);
        }
    });        
}

function change_floor(area){
    alert("aaaa");
    var floor=$("#select2").val();


    $.ajax({

        url:$("#controller").val()+"/area"+area+"_floor"+floor,
        type: 'GET',
        dataType: 'html',
       
        success:function(content,code)
        {
            console.log(url);
            $('#denah').html(content);
        }
    });        
}

