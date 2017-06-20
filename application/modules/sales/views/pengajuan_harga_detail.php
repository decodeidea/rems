     
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
              <h4><span class="semi-bold">Data <?php echo $method ?></span></h4>
              <input type="hidden" name="base_url" value="<?php echo base_url() ?>" id="base_url">
              <input type="hidden" name="controller" id="controller" value="<?php echo $controller ?>">
              <input type="hidden" name="method" value="<?php echo $function ?>" id="method">
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" class="reload"></a> </div>
            </div>
            <div class="grid-body ">
                
                <div class="form-group">
                    <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Posted By</label>
                    <div class="col-md-9 col-xs-12">
                        <?php echo $pengajuan->posted_by ?>
                    </div>
                </div></br>
                <div class="form-group">
                    <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-date_created">Date Created</label>
                    <div class="col-md-9 col-xs-12">
                        <?php echo $pengajuan->date_created ?>
                    </div>
                </div></br></br>

                <div class="form-group">
                   <div class="col-md-9 col-xs-12">
                       <h2 class="non-margin">Detail Customer</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="box-back">
                    <div class="form-group">
                    <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Name </label>
                    <div class="col-md-9 col-xs-12">
                        <?php echo $customer->name ?>
                    </div>
                </div></br>

                <div class="form-group">
                    <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Gender </label>
                    <div class="col-md-9 col-xs-12">
                        <?php echo $customer->gender ?>
                    </div>
                </div></br>
                <div class="form-group">
                    <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Date of  Birth </label>
                    <div class="col-md-9 col-xs-12">
                        <?php echo substr(date('d M Y H:i:s', strtotime($customer->gender)),0,12);  ?>
                    </div>
                </div></br>

                <div class="form-group">
                    <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Address</label>
                    <div class="col-md-9 col-xs-12">
                        <?php echo $customer->address;  ?>
                    </div>
                </div></br>

                 <div class="form-group">
                    <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Phone</label>
                    <div class="col-md-9 col-xs-12">
                        <?php echo $customer->phone;  ?>
                    </div>
                </div></br>
                 <div class="form-group">
                    <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Email</label>
                    <div class="col-md-9 col-xs-12">
                        <?php echo $customer->email;  ?>
                    </div>
                </div></br>
                 <div class="form-group">
                    <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">No Ktp</label>
                    <div class="col-md-9 col-xs-12">
                        <?php echo $customer->no_ktp;  ?>
                    </div>
                </div></br>

                 <div class="form-group">
                    <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">NO NPWP</label>
                    <div class="col-md-9 col-xs-12">
                        <?php echo $customer->no_npwp;  ?>
                    </div>
                </div></br>

                 <div class="form-group">
                    <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Pekerjaan</label>
                    <div class="col-md-9 col-xs-12">
                        <?php echo $customer->pekerjaan;  ?>
                    </div>
                </div></br>
                 <div class="form-group">
                    <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Nama Kantor</label>
                    <div class="col-md-9 col-xs-12">
                        <?php echo $customer->nama_kantor;  ?>
                    </div>
                </div></br>

                 <div class="form-group">
                    <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Alamat Kantor</label>
                    <div class="col-md-9 col-xs-12">
                        <?php echo $customer->alamat_kantor;  ?>
                    </div>
                </div></br>
               
                </div>
                </br></br>

                <div class="form-group">
                   <div class="col-md-9 col-xs-12">
                       <h2 class="non-margin">Detail Unit</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="box-back">
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label" for="#px-system-useraccess-form-id-usergroup">Unit</label>
                        <div class="col-md-6 col-xs-12">
                            <table class="table table-bordered">
                                <thead>
                                    <th>No</th>
                                    <th>Area</th>
                                    <th>Unit Name</th>
                                    <th>Price</th>
                                </thead>
                                <?php 
                                    $i=1;
                                    foreach($pengajuan_unit as $k){ 
                                        $unit = getAll($this->tbl_unit, array('id'=>'where/'.$k->unit_id))->row();
                                ?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=getValue('name', $this->tbl_area, array('id'=>'where/'.$unit->area_id))?></td>
                                    <td><?=$unit->name?></td>
                                    <td><?=number_format($unit->price, 0)?></td>
                                </tr>
                                <?php } ?>

                            </table>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Total Harga</label>
                        <div class="col-md-9 col-xs-12">
                            <?php echo $total_price;  ?>
                        </div>
                    </div></br>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Harga Pengajuan</label>
                        <div class="col-md-9 col-xs-12">
                            <?php echo $pengajuan->nominal;  ?>
                        </div>
                    </div></br>
                    <div class="clearfix"></div>
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