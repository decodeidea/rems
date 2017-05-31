<div class="row">
	<div class="col-md-12">
		<div class="grid simple">
			<div class="grid-title no-border">

				<div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
			</div>
			<form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?><?php echo $controller."/".$function?>_<?php if(isset($data)){echo"update";}else{echo"add";} ?>">
				<input type="hidden" name="id" value="<?php if(isset($data)){ echo $data->id; } ?>">
				<input type="hidden" name="controller" id="controller" value="<?php echo $controller ?>">
				<input type="hidden" name="method" value="<?php echo $function ?>" id="method">
				<div class="grid-body no-border">
					<div class="row">
						<div class="col-md-12 col-sm-8 col-xs-8">


							<div class="form-group">
								<label class="form-label">Name</label>
								<div class="controls">
									<input type="text" name="title" required class="form-control" value="<?php if($data!=null) echo $data->title; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">Kontrak Type</label>
								<div class="controls">
									<select class="select2" name="kontrak_type" style="width: 100%">
										<option>-- Choose Contract Type --</option>
										<?php foreach ($kontrak_type as $k) {
											$selected = ($data->kontrak_type == $k->id) ? 'selected' : '';
											echo "<option value='$k->id' $selected>$k->name</option>";
										}?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">Bunga(%)</label>
								<div class="controls">
									<input type="text" class="form-control" name="bunga" id="bunga" value="<?php if($data!=null) echo $data->bunga;?>">
								</div>
							</div>
							<fieldset>
								<legend>Schema Detail</legend>
								<div class="row">
									<div class="col-md-12">
										<button id="btnAdd" class="btn btn-primary pull-left" type="button" onclick="addRow('tbl')"><i class="fa fa-plus"> Add Detail</i></button>
									</div>
								</div>
								<br/>
								<div class="row">
									<div class="col-md-12">
										<table class="table table-bordered" id="tbl">
											<thead>
											<tr>
												<th width="20%">Title</th>
												<th width="20%">Payment Type</th>
												<th width="20%">Tenor</th>
												<th width="20%">Interval Day</th>
												<th width="20%">Persentase(%)</th>
												<th width="5%"></th>
											</tr>
											</thead>
											<tbody>
											<?php if($detail->num_rows() > 0){
												foreach($detail->result() as $d): ?>
													<tr>
														<td>
															<input type="text" name="title_detail[]" class="form-control" required="" value="<?=$d->title?>">
														</td>
														<td>
															<select class="select2" name="payment_type_id[]" style="width: 100%">
																<option>-- Choose Payment Type --</option>
																<?php
																foreach ($payment_type->result() as $r) {
																	$selected = ($d->payment_type_id == $r->id) ? 'selected="selected"' : '';
																	echo '<option value="'.$r->id.'"'.$selected.'>'.$r->title.'</option>';
																}
																?>
															</select>
														</td>
														<td>
															<input type="text" name="tenor[]" class="form-control" value="<?=$d->tenor?>">
														</td>
														<td>
															<input type="text" name="interval[]" class="form-control" value="<?=$d->interval?>">
														</td>
														<td>
															<input type="text" name="persentase[]" class="form-control" value="<?=$d->persentase?>">
														</td>
														<td><button type="button" class="btn btn-danger removebutton"><i class="fa fa-times"></i></button></td>
													</tr>
												<?php endforeach;}?>
											</tbody>
										</table>
									</div>
								</div>
							</fieldset>


						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>


<link href="<?php echo base_url() ?>assets/css/select2.css" rel="stylesheet"/>
<script src="<?php echo base_url() ?>assets/js/select2.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/page/finance/payment_schema.js"></script>

