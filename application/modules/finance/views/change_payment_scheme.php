<?php if($this->session->flashdata('notif')){ ?>
	<div class="alert alert-<?php echo $this->session->flashdata('notif') ?>">
		<button class="close" data-dismiss="alert"></button>
		<?php echo $this->session->flashdata('notif') ?>:&nbsp;<?php echo $this->session->flashdata('msg') ?></div>
<?php } ?>


<div class="row">
	<div class="col-md-12">
		<div class="grid simple">
			<div class="grid-title no-border">

				<div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
			</div>
			<form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?><?php echo $controller.'/change_payment_scheme_add' ?>">
				<input type="hidden" id="base_url" value="<?php echo base_url() ?>">
				<div class="grid-body no-border">
					<div class="row">
						<div class="col-md-12 col-sm-8 col-xs-8">
							<div class="form-group">
								<label class="form-label">No. Kontrak</label>
								<div class="controls">
									<select class="select2" style="width:100%" name="kontrak_id" id="kontrak_id">
										<option value="0">-- Choose Kontrak --</option>
										<?php foreach ($kontrak as $k) { ?>
											<option value="<?php echo $k->id; ?>"><?php echo $k->no_kontrak; ?></option>
										<?php } ?>
									</select>

								</div>
							</div>

							<div id="detail-kontrak">


							</div>
							<div class="form-group">
								<div class="controls">
									<button class="btn btn-primary pull-right" type="submit">Save</button>
									<a href="cashier/payment"><span class="btn btn-primary pull-right" style="margin-right: 5px;">Back</span></a>

								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/plugins/jquery-validation/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/plugins/summernote/summernote.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/plugins/jquery-mask-money/jquery.maskMoney.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/page/finance/change_payment_scheme.js"></script>
