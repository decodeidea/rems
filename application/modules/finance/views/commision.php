
<?php if($this->session->flashdata('notif')){ ?>
	<div class="alert alert-<?php echo $this->session->flashdata('notif') ?>">
		<button class="close" data-dismiss="alert"></button>
		<?php echo $this->session->flashdata('notif') ?>:&nbsp;<?php echo $this->session->flashdata('msg') ?></div>
<?php } ?>

<div class="page-content-wrap">

	<div class="row">
		<div class="col-md-12">

			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
					<h3 class="panel-title">Data</h3>
					<!-- <a class="btn btn-success pull-right btn-add" href="<?php echo $controller.'/'.$function_form; ?>"><i class="fa fa-plus"></i> Add New</a>-->
				</div>
				<div class="panel-body">
					<table class="table datatable table-bordered">
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
						<tbody>
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
									<form action="<?php echo $controller.'/'.$function_form; ?>" method="post">
										<!-- <input type="hidden" name="id" value="<?php echo $d_row->id; ?>">
										<button class="btn btn-info btn-xs btn-edit" type="submit" data-original-title="Update" data-placement="top" data-toggle="tooltip"><i class="fa fa-edit"></i></button>-->
										<?php if ($d_row->status == 0) { ?>
											<button class="btn btn-success btn-xs btn-pay" type="button" data-original-title="Pay" data-placement="top" data-toggle="tooltip" data-target-id="<?php echo $d_row->id; ?>"><i class="fa fa-dollar"></i></button>
										<?php } ?>
										<button class="btn btn-danger btn-xs btn-delete" type="button" data-original-title="Delete" data-placement="top" data-toggle="tooltip" data-target-id="<?php echo $d_row->id; ?>"><i class="fa fa-trash-o"></i></button>
								 	</form>
								 </td>
							</tr>
							<?php $no++; } ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END DEFAULT DATATABLE -->

		</div>
	</div>                                
	
</div>
<!-- PAGE CONTENT WRAPPER -->

<!-- MESSAGE BOX -->
<div id="px-site-content-static-content-message-box" class="message-box message-box-warning animated fadeIn fade">
	<div class="mb-container">
		<div class="mb-middle">
			<form action="<?php echo $controller.'/'.$function_delete; ?>" method="post" id="px-site-content-static-content-message-form">
			<input type="hidden" name="id">
			<div class="mb-title"><span class="fa fa-warning"></span> Warning</div>
			<div class="mb-content">
				<p>Are you sure you want to delete this data?</p>
				<p class="msg-status"></p>                  
			</div>
			<div class="mb-footer">
				<button class="btn btn-danger btn-lg btnpull-right" type="submit">Delete</button>
				<button class="btn btn-default btn-lg pull-right mb-control-close" type="button">Cancel</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- EOF MESSAGE BOX -->



<!-- MESSAGE BOX -->
<div id="px-finance-commision-message-box" class="message-box message-box-warning animated fadeIn fade">
	<div class="mb-container">
		<div class="mb-middle">
			<form action="<?php echo $controller.'/commision_pay'?>" method="post" id="px-finance-commision-message-form">
			<input type="hidden" name="id">
			<div class="mb-title"><span class="fa fa-warning"></span> Warning</div>
			<div class="mb-content">
				<p>Are you sure?</p>
				<p class="msg-status"></p>                  
			</div>
			<div class="mb-footer">
				<button class="btn btn-success btn-lg btnpull-right" type="submit">Pay</button>
				<button class="btn btn-default btn-lg pull-right mb-control-close" type="button">Cancel</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- EOF MESSAGE BOX -->

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