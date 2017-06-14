function show(d){
	var id = d.getAttribute("id-unit");
	$.ajax
    ({ 
        url: 'sales/detail_unit/'+id,
        data: {"id": id},
        type: 'post',
        success: function(response)
        {
        	document.getElementById("detail_unit").innerHTML = response.result;
        	document.getElementById("pengajuan_harga").setAttribute("href", "sales/pengajuan_harga_form?id="+response.id_unit);
        	
        	
        },
          dataType: "json",
    });
}