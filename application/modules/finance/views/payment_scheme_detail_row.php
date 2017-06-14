<tr>
	<td>
		<input type="text" name="title_detail[]" class="form-control" required="">
	</td>
	<td>
		<select class="select2" name="payment_type_id[]" style="width: 100%">
			<option>-- Choose Payment Type --</option>
			<?php 
				foreach ($payment_type->result() as $r) {
					echo '<option value="'.$r->id.'">'.$r->title.'</option>';
				}
			?>
		</select>
	</td>
	<td>
		<input type="text" name="tenor[]" class="form-control">
	</td>
	<td>
		<input type="text" name="interval[]" class="form-control">
	</td>
	<td>
		<input type="text" name="persentase[]" class="form-control">
	</td>
	<td><button type="button" id="removebutton" class="btn btn-danger removebutton"><i class="fa fa-times"></i></button></td>
</tr>