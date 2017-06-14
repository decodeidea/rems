$(document).ready(function(){
	$("#select2").select2();
	
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


	$("#kontrak").change(function() {
    var selectedValue = document.getElementById("kontrak").value;
		$.ajax({
        url: 'finance/kontrak_change',
        type: 'POST',
        data: {value : selectedValue},
        success: function(result) {
            document.getElementById("isi").innerHTML = result;
        }
    });
});


