     
    <?php if($this->session->flashdata('notif')){ ?> 
    <div class="alert alert-<?php echo $this->session->flashdata('notif') ?>">
<button class="close" data-dismiss="alert"></button>
<?php echo $this->session->flashdata('notif') ?>:&nbsp;<?php echo $this->session->flashdata('msg') ?></div>
<?php } ?>

     <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4><span class="semi-bold"><?php echo $method ?></span></h4>
              <input type="hidden" name="base_url" value="<?php echo base_url() ?>" id="base_url">
              <input type="hidden" name="controller" id="controller" value="<?php echo $controller ?>">
              <input type="hidden" name="method" value="<?php echo $function ?>" id="method">
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" class="reload"></a> </div>
            </div>
            <div class="grid-body ">
              <table class="table" id="list_data" >
                <thead>
                  <tr>
                  <th>No</th>
                   <td>Name</td>
                     <td>Area</td>
                      <td>Unit Type</td>
                      <td>Luas Netto</td>
                      <td>Luas Semigross</td>
                      <td>Block</td>
                      <td>Number</td>
                      <td>Price</td>
                      <td>Status</td>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
               <?php
                $no=0;
                foreach ($list as $data) {
                $no++;
                ?>
                  <tr >
                    <td><?php echo $no ?></td>
                    <td><?php echo $data->name ?></td>
                     <td><?php echo $data->area ?></td>
                      <td><?php echo $data->unit_type ?></td>
                      <td><?php echo $data->luas_netto ?></td>
                      <td><?php echo $data->luas_semigross ?></td>
                      <td><?php echo $data->block ?></td>
                      <td><?php echo $data->number ?></td>
                      <td><?php echo idr($data->price) ?></td>
                      <td><?php if($data->status >0){echo"Not Available";}else{echo "Available";} ?></td>
                    <td>
                    <a href="<?php echo base_url()."".$controller."/".$function."_form/"."".$data->id; ?>" ><button   data-toggle="tooltip" data-original-title="Edit" class="btn btn-warning btn-xs btn-mini tip" type="button"><i class="fa fa-pencil"></i></button></a> 
                    <a href="<?php echo base_url()."".$controller."/unit_album/"."".$data->id; ?>" ><button   data-toggle="tooltip" data-original-title="Album" class="btn btn-info btn-xs btn-mini tip" type="button"><i class="fa fa-picture-o"></i></button></a>
                    <button id="del<?php echo $data->id ?>"  data-toggle="tooltip" data-original-title="Delete" onclick="pasdel_id('<?php echo $data->id ?>')" class="delete btn btn-danger btn-xs btn-mini tip" type="button"><i class="fa fa-times"></i></button> </td>
                  </tr>
                  <?php } ?>
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