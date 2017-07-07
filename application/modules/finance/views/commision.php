
<?php if($this->session->flashdata('notif')){ ?>
	<div class="alert alert-<?php echo $this->session->flashdata('notif') ?>">
		<button class="close" data-dismiss="alert"></button>
		<?php echo $this->session->flashdata('notif') ?>:&nbsp;<?php echo $this->session->flashdata('msg') ?></div>
<?php } ?>

<div class="row-fluid">
	<div class="span12">
		<div class="grid simple ">
			<div class="grid-title">
				<h4><span class="semi-bold">List <?php echo $method ?></span></h4>
				<input type="hidden" name="base_url" value="<?php echo base_url() ?>" id="base_url">
				<input type="hidden" name="controller" id="controller" value="<?php echo $controller ?>">
<!--				<input type="hidden" name="method" value="--><?php //echo $function ?><!--" id="method">-->
				<div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" class="reload"></a> </div>
			</div>
			<div class="grid-body ">
				<table class="table" id="" >
					<thead>
					<tr>

						<th width="6%" class="text-center">No</th>
						<th class="text-center">Name</th>
						<th class="text-center">No. Kontrak</th>
						<th class="text-center">Nominal</th>
						<th class="text-center">Status</th>
						<th width="15%" class="text-center">Action</th>

					</tr>
					</thead>
					<?php $no=1; foreach ($data as $d_row) { ?>
						<tr>
							<td class="text-center"><?php echo $no; ?></td>
							<td class="text-center"><?php echo $d_row->user_id; ?></td>
							<td class="text-center"><?php echo $d_row->kontrak_id; ?></td>
							<td class="text-center"><?php echo $d_row->nominal; ?></td>
							<td class="text-center"><?php
								if ($d_row->status == 0)
									echo "Unpaid";
								else
									echo "Paid";
								?></td>
							<td class="text-center">
									<!-- <input type="hidden" name="id" value="<?php echo $d_row->id; ?>">
										<button class="btn btn-info btn-xs btn-edit" type="submit" data-original-title="Update" data-placement="top" data-toggle="tooltip"><i class="fa fa-edit"></i></button>-->
									<?php if ($d_row->status == 0) { ?>
										<button class="dolarr btn btn-success btn-xs btn-pay" onclick="pay_id('<?php echo $d_row->id ?>')" type="button" data-original-title="Pay" data-placement="top" data-toggle="tooltip" data-target-id="<?php echo $d_row->id; ?>"><i class="fa fa-dollar"></i></button>
									<?php } ?>
									<button class="delete btn btn-danger btn-xs btn-delete"  onclick="pasdel_id('<?php echo $d_row->id ?>')" type="button" data-original-title="Delete" data-placement="top" data-toggle="tooltip" data-target-id="<?php echo $d_row->id; ?>"><i class="fa fa-trash-o"></i></button>

							</td>
						</tr>
						<?php $no++; } ?>

				</table>
			</div>
		</div>
	</div>
</div>

<div class="admin-bar" id="quick-access" style="display: none;">
	<div class="admin-bar-inner delete-bar">
			<input type="hidden" name="id">
			<div class="mb-title"><span class="fa fa-warning"></span> Warning</div>
			<div class="mb-content">
				<p>Are you sure you want to delete this data?</p>
				<p class="msg-status"></p>
			</div>
			<div class="mb-footer">
				<button class="btn btn-primary btn-cons btn-add" id="delete_confirm" onclick="delete_commision()" type="submit">Yes</button>
				<button class="btn btn-white btn-cons btn-cancel" type="button">Cancel</button>

			</div>
	</div>
</div>


<div class="admin-bar" id="quick-dolarr" style="display: none;">
	<div class="admin-bar-inner delete-bar">
			<input type="hidden" name="id">
			<div class="mb-title"><span class="fa fa-warning"></span> Warning</div>
			<div class="mb-content">
				<p>Are you sure?</p>
				<p class="msg-status"></p>
			</div>
			<div class="mb-footer">
				<button class="btn btn-primary btn-cons btn-add" id="pay_confirm" onclick="pay_confirm()" type="submit">Pay</button>
				<button class="btn btn-white btn-cons btn-cancel-comission" type="button">Cancel</button>

			</div>
	</div>
</div>


<!-- START SCRIPTS -->
<!-- THIS PAGE PLUGINS -->
<script type="text/javascript" src="assets/backend_assets/js/plugins/jquery-validation/jquery.validate.js"></script>
<script type="text/javascript" src="assets/backend_assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/backend_assets/js/plugins/summernote/summernote.js"></script>
<!-- END PAGE PLUGINS -->
<!-- START TEMPLATE -->
<script type="text/javascript" src="assets/backend_assets/js/settings.js"></script>

<script type="text/javascript" src="assets/backend_assets/js/plugins.js"></script>
<script type="text/javascript" src="assets/backend_assets/js/actions.js"></script>
<!-- END TEMPLATE -->
<!-- THIS PAGE JS SETTINGS -->
<script type="text/javascript" src="assets/backend_assets/page/finance/commision.js"></script>
<!--  -->
<!-- END SCRIPTS -->




