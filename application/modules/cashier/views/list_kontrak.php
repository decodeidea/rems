     
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
              <input type="hidden" name="method" value="<?php echo $function ?>" id="method">
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" class="reload"></a> </div>
            </div>
            <div class="grid-body ">
					<table class="table" id="list_data" >
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">No Kontrak</th>
								<!-- <th class="text-center">Unit</th> -->
								<th class="text-center">Customer</th>
								<th class="text-center">Sales</th>
								<th class="text-center">Payment Schema</th>
								<!-- <th class="text-center">Tipe Kontrak</th> -->
								<th width="15%" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($list as $d_row) { ?>
							<tr>
								<td class="text-center"><?php echo $no; ?></td>
								<td class="text-center"><?php echo $d_row->no_kontrak; ?></td>
								<td class="text-center"><?php echo $d_row->customer; ?></td>
								<td class="text-center"><?php echo $d_row->sales; ?></td>
								<td class="text-center"><?php echo $d_row->payment_scheme; ?></td>
								<td class="text-center">
                     
                     <a data-toggle="tooltip"  data-placement="top" data-original-title="Detail Kontrak" href="<?php echo base_url()."".$controller.'/kontrak_detail/'.$d_row->id; ?>" class="btn btn-info btn-xs btn-mini tip"><i class="fa fa-eye"></i></a>
                    </td>
							</tr>
							<?php $no++; } ?>
						</tbody>
					</table>
				</div>
          </div>
        </div>
      </div>

<div class="admin-bar" id="quick-access" style="display: none;">
<div class="admin-bar-inner delete-bar">
<div class="form-horizontal">
<h4><b>Are you sure you want to delete this data?</b></h4>
</div>
<button class="btn btn-primary btn-cons btn-add" onclick="delete_data()" id="delete_confirm"   data-id="" type="button">Yes</button>
<button class="btn btn-white btn-cons btn-cancel" type="button">Cancel</button>
</div>
</div>