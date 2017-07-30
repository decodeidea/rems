<div class="form-group">
	<label class="label-form">Customer</label>
	<div class="control">
		<input type="text" class="form-control" id="customer" value="<?php if($data!=null) echo getValue('name', $this->tbl_customer, array('id'=>'where/'.$data->customer_id)); ?>">
	</div>
</div>
<div class="form-group">
	<label class="label-form">Price</label>
	<div class="control">
		<input type="text" class="form-control money text-right" name="price" id="price" value="<?php if($data!=null) echo number_format($data->price, 0);else echo 0; ?>" readonly>
	</div>
</div>
<div class="form-group">
	<label class="label-form" >Sisa Hutang</label>
	<div class="control">
		<input type="text" class="form-control money text-right" name="sisa_hutang" id="sisa-hutang" value="<?php if($data!=null) echo number_format($data->sisa_hutang, 0); ?>" readonly>
	</div>
</div>

<div class="form-group">
	<label class="label-form" >Kontrak Payment Schedule</label>
	<div class="control">
		<select class="select2 form-control" name="kontrak_payment_schedule_id" id="kontrak_payment_schedule_id">
		<option value="0">-- Choose Kontrak Payment Schedule --</option>
		<?php if ($record_id) { ?>
			<option value="<?php echo $kontrak_payment_schedule->id ?>" selected><?php echo $kontrak_payment_schedule->title; ?></option>
		<?php } ?>
		<?php foreach ($ps->result() as $p) { ?>
			<option <?php //if($data!=null and $k->id==$data->unit_id){ echo"selected"; } ?> value="<?php echo $p->id; ?>"><?php echo $p->title; ?></option>
			<?php } ?>
		</select>
	</div>
</div>

<script type="text/javascript">
	var base_url = $("#base_url").val();
	$("#kontrak_payment_schedule_id").change(function(){
        var id = $(this).val();
        if(id != 0){
        	var url = base_url+"cashier/get_payment_schedule_nominal/"+id;
            $.ajax({
		        type: 'POST',
		        url: url,
		        success: function(data) {
					$("#nominal").val(data);
		        }
		    });
        }
    })
    .change();

</script>