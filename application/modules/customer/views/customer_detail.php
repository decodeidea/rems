

<div class="row">
	<div class="col-md-12">
		<div class="grid simple">
			<div class="grid-title no-border">

				<div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
			</div>
			<form enctype="multipart/form-data" method="post">

				<div class="grid-body no-border">
					<div class="row">
						<div class="col-md-8 col-sm-8 col-xs-8">

							<div class="form-group">
								<label class="form-label">photos</label>
								<div class="controls">

									<img id="output" class="ouput_image_input" <?php if($customer){ ?> src="<?php echo base_url() ?>assets/uploads/customer/photo/<?php if($customer->photo==''){echo"default.jpg";}else{echo $customer->id."/".$customer->photo;} }?> " />

								</div>
							</div>


							<div class="form-group">
								<label class="form-label">Name  </label>
								<div class="controls">
									<?php echo $customer->name ?>
								</div>
							</div>



							<div class="form-group">
								<label class="form-label">Gender  </label>
								<div class="controls">
									<?php echo $customer->gender ?>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">Date of  Birth </label>
								<div class="controls">
									<?php echo substr(date('d M Y H:i:s', strtotime($customer->gender)),0,12);  ?>

								</div>
							</div>

							<div class="form-group">
								<label class="form-label">Address</label>
								<div class="controls">
									<?php echo $customer->address;  ?>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">No Phone</label>
								<div class="controls">
									<?php echo $customer->phone;  ?>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">Email</label>
								<div class="controls">
									<?php echo $customer->email;  ?>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">No KTP</label>
								<div class="controls">
									<?php echo $customer->no_ktp;  ?>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">No NPWP</label>
								<div class="controls">
									<?php echo $customer->no_npwp;  ?>
								</div>
							</div>


							<div class="form-group">
								<label class="form-label">Pekerjaan</label>
								<div class="controls">
									<?php echo $customer->pekerjaan;  ?>
								</div>
							</div>


							<div class="form-group">
								<label class="form-label">Nama Kantor</label>
								<div class="controls">
									<?php echo $customer->nama_kantor;  ?>
								</div>
							</div>


							<div class="form-group">
								<label class="form-label">Alamat Kantor</label>
								<div class="controls">
									<?php echo $customer->alamat_kantor;  ?>
								</div>
							</div>

						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- PAGE CONTENT WRAPPER -->

