     
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
                <ul class="grid cs-style-7">
                  <?php foreach ($area as $data) { ?>
                  <li>
                    <figure>
                    <?php if($data->image==''){ ?>
                      <a class="pull-right" href="sales/area_unit/<?php echo $data->id ?>"><img src="<?php echo base_url() ?>assets/uploads/area/default.png" alt="default.png"></a>
                    <?php }else{ ?>
                      <a class="pull-right" href="sales/area_unit/<?php echo $data->id ?>"> <img src="<?php echo base_url() ?>assets/uploads/area/<?php echo $data->id ?>/<?php echo $data->image ?>" alt="<?php echo $data->caption ?>"></a>
                    
                      <div class="caption-area text-center" >
                        <h3 style="color: #fff"><?php echo $data->name ?></h3>
                      
                      </div>
                    <?php } ?>
                    <!-- <figcaption>
                      <h3><?php echo $data->name ?></h3>
                      </br></br>
                      <a href="sales/area_unit/<?php echo $data->id ?>">Detail</a>
                    </figcaption> -->
                      <a class="pull-right" href="<?php echo base_url() ?>sales/list_denah/<?php echo $data->id ?>"><button class="btn btn-primary">Detail</button></a>
                      
                    </figure>
                  </li>
                  <?php } ?>
                </ul>
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