     
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
                  <a id="add_button" href="<?php echo base_url() ?>customer/list_customer_album_form/?customer_id=<?php echo $this->uri->segment('3')?>"><button class="btn btn-primary">Add Image</button></a>
                  <div class="row gallery-list">
                      <?php foreach ($list as $key) {?>
                          <div class="col-md-3">
                              <img width="100%" src="<?php echo base_url() ?>assets/uploads/customer/album/<?php echo $key->id ?>/<?php echo $key->filename ?>">
                              <div class="footer-gallery">
                                  <div class="text-center">
                                      <p><?php echo $key->caption ?></p>
                                  </div>
                                  <a href="<?php echo base_url() ?>customer/list_customer_album_delete/<?php echo $key->id ?>/<?php echo $this->uri->segment('3')?>">
                                      <button id="del<?php echo $key->id ?>" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-xs btn-mini tip" type="button"><i class="fa fa-times"></i></button></a></div>
                          </div>
                      <?php } ?>
                  </div>
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