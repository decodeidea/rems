     
<?php if($this->session->flashdata('notif')){ ?> 
  <div class="alert alert-<?php echo $this->session->flashdata('notif') ?>">
  <button class="close" data-dismiss="alert"></button>
<?php echo $this->session->flashdata('notif') ?>:&nbsp;<?php echo $this->session->flashdata('msg') ?>
  </div>
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
                <table class="table datatable table-bordered">
                  <thead>
                    <tr>
                      <th width="6%" class="text-center">No</th>
                      <th width="6%" class="text-center">Nama Customer</th>
                      <th width="15%" class="text-center">Nominal</th>
                      <th width="15%" class="text-center">Status</th>
                      <th width="15%" class="text-center">Date Created</th>
                      <th width="15%" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; 
                    if ($data->num_rows() > 0) {
                    foreach ($data->result() as $d_row) { ?>
                    <tr>
                      <td class="text-center"><?php echo $no; ?></td>
                      <td class="text-center"><?php echo $d_row->nama; ?></td>
                      <td class="text-center"><?php echo to_idr($d_row->nominal); ?></td>
                      <td class="text-center"><?php 
                      if($d_row->status==1){echo"Aproved";}elseif ($d_row->status==0){echo"Waiting";}else{ echo"Rejected"; } 
                      ?></td>
                      <td class="text-center"><?php echo $d_row->date_created; ?></td>
                      <td class="text-center">
                      
                        <form action="<?php echo $controller.'/'.$function_form; ?>" method="post">
                          <input type="hidden" name="id" value="<?php echo $d_row->id; ?>">
                          <a data-toggle="tooltip" data-placement="top" data-original-title="Detail" href="<?php echo $controller.'/pengajuan_harga_detail/'.$d_row->id; ?>" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>

                          <?php if($d_row->status==1){?>
                          <a data-toggle="tooltip" data-placement="top" data-original-title="Kontrak" href="<?php echo $controller.'/kontrak_form/'.$d_row->id.'/2' ?>" class="btn btn-default btn-xs">Kontrak</a>
                          <?php } ?>
                          <!-- <button class="btn btn-info btn-xs btn-edit" type="submit" data-original-title="Update" data-placement="top" data-toggle="tooltip"><i class="fa fa-edit"></i></button> -->
                          
                        </form>
                        
                       </td>
                    </tr>
                    <?php $no++; }} ?>
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