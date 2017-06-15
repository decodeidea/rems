<input type="hidden" class="form-control" name="no_kontrak" id="customer" value="<?php echo $data->no_kontrak?>">
<div class="form-group">
	<label class="form-label">Customer</label>
	<div class="controls">
		<input type="text" class="form-control" id="customer" value="<?php if($data!=null) echo getValue('name', $this->tbl_customer, array('id'=>'where/'.$data->customer_id)); ?>">
		<input type="hidden" class="form-control" name="customer_id" id="customer" value="<?php echo $data->customer_id?>">
	</div>
</div>

<div class="form-group">
	<label class="form-label">Sales</label>
	<div class="controls">
		<input type="text" class="form-control" id="sales" value="<?php if($data!=null) echo getValue('username', $this->tbl_user, array('id'=>'where/'.$data->sales_id)); ?>">
		<input type="hidden" class="form-control" name="sales_id" id="sales_id" value="<?php echo $data->sales_id?>">
	</div>
</div>

<!-- <div class="form-group">
	<label class="col-md-2 col-xs-12 control-label" for="#px-system-useraccess-form-id-usergroup">Area Name</label>
	<div class="col-md-6 col-xs-12">
		<?php $area_id = getValue('area_id', $this->tbl_unit, array('id'=>'where/'.$data->unit_id)); ?>
		<input type="text" class="form-control" id="customer" value="<?php if($data!=null) echo getValue('name', $this->tbl_area, array('id'=>'where/'.$area_id)); ?>">
	</div>
</div> -->

<div class="form-group">
<label class="form-label">Unit</label>
<div class="controls">
	<table class="table">
		<thead>
		<th>No</th>
		<th>Area</th>
		<th>Unit Name</th>
		<th>Price</th>
		</thead>
		<?php
		$i=1;$total_price=0;foreach($kontrak_unit as $k){
			$unit = getAll($this->tbl_unit, array('id'=>'where/'.$k->unit_id))->row();
			$total_price = $total_price + $unit->price;
			?>
			<tr>
				<td><?=$i++?></td>
				<td><?=getValue('name', $this->tbl_area, array('id'=>'where/'.$unit->area_id))?></td>
				<td><?=$unit->name?></td>
				<td><?=number_format($unit->price, 0)?></td>
			</tr>
		<?php } ?>
	</table>
</div>
</div>


<div class="form-group">
	<label class="form-label">Payment Scheme</label>
	<div class="controls">
		<input type="text" class="form-control money text-right" name="price" id="price" value="<?php if($data!=null) echo getValue('title', $this->tbl_payment_scheme, array('id'=>'where/'.$data->payment_scheme_id));else echo 0; ?>">
	</div>
</div>


<div class="form-group">
	<label class="form-label">Price Total</label>
	<div class="controls">
		<input type="text" class="form-control money text-right" name="price" id="price" value="<?php if($data!=null) echo number_format($data->price, 0);else echo 0; ?>">
	</div>
</div>


<div class="form-group">
	<label class="form-label">Sisa Hutang</label>
	<div class="controls">
		<input type="text" class="form-control money text-right" name="sisa_hutang" id="sisa-hutang" value="<?php if($data!=null) echo number_format($data->sisa_hutang, 0); ?>">
	</div>
</div>

<div class="form-group">
	<label class="form-label">Kontrak Payment Schedule</label>
	<div class="controls">
		<select class="select2" style="width:100%" name="payment_scheme_id" id="payment_scheme">
			<option value="0">-- Choose New Kontrak Payment Scheme --</option>
			<?php foreach ($payment_scheme->result() as $p) { ?>
				<option <?php //if($data!=null and $k->id==$data->unit_id){ echo"selected"; } ?> value="<?php echo $p->id; ?>"><?php echo $p->title; ?></option>
			<?php } ?>
		</select>

	</div>
</div>


<div class="form-group">
	<label class="form-label">Kontrak Type</label>
	<div class="controls">
		<input type="text" name="" id="kontrak_type_name" value="" class="form-control">
		<input type="hidden" name="kontrak_type_id" id="kontrak_type" value="">
	</div>
</div>

<div class="form-group">
	<label class="form-label">Bunga(%)</label>
	<div class="controls">
		<input type="text" name="bunga" id="bunga" value="0" class="form-control" readonly>
	</div>
</div>


<script type="text/javascript">
	var base_url = $("#base_url").val();

	console.log(base_url);
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

</script>

