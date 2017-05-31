// var base_url = $("#base_url").val();
$(document).ready(function(){
$('#bunga').autoNumeric("init",{
    vMin: '0.00', vMax: '99.99',
    anDefault: "99.99",
    // aSep: '.',
    // aDec: ','
});
});
$('.select2').select2();
function addRow(tableID){
    var table=document.getElementById(tableID);
    var rowCount=table.rows.length;
    $("#btnAdd").attr('disabled',true);
    $.ajax({
        url: 'finance/add_row/'+rowCount,
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