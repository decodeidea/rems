     
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
 <div class="grid-body no-border">
                  <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-8">
                  <form id="form-payment" method="POST" action="<?php  echo base_url()."".$controller.'/'.$function."_add";?>">
        <input type="hidden" name="id" value="<?php if(isset($data)){ echo $data->id; } ?>">
                    <input type="hidden" name="controller" id="controller" value="<?php echo $controller ?>">
                    <input type="hidden" name="method" value="<?php echo $function ?>" id="method">
            <div class="form-group">
              <label class="form-label" >No. Kontrak</label>
              <div class="control">
                <select class="select2 form-control" name="kontrak_id" id="kontrak_id">
                <option value="0">-- Choose Kontrak --</option>
                <?php foreach ($kontrak as $k) { ?>
                  <option <?php if($data!=null and $k->id==$kontrak_id){ echo"selected"; } ?> value="<?php echo $k->id; ?>"><?php echo $k->no_kontrak; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div id="detail-kontrak">
              

            </div>
            <br/>
            <div class="form-group">
              <label class="form-label">Total Payment</label>
              <div class="control">
                <input type="text" class="form-control money text-right" name="nominal" id="nominal" value="<?php if($data!=null) echo $data->nominal;else echo 0; ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="form-label" for="#form-payment-static-content-title">Transfered to</label>
              <div class="control">
                <select class="select2 form-control" name="rekening_id" id="rekening_id">
                  <option value="0">-- Choose Bank Account --</option>
                  <?php foreach ($rekening as $r) { ?>
                    <option <?php if($data!=null and $r->id==$data->rekening_id){ echo"selected"; } ?> value="<?php echo $r->id; ?>"><?php echo $r->bank.' - '.$r->no_rek.' a.n. '.$r->atas_nama; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
        <div class="form-group">
                                <div class="control">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </div>
        </form>
</div>
</div>
              </div>
            </div>
          </div>

  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/plugins/jquery-mask-money/jquery.maskMoney.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/page/cashier/payment_form.js"></script>
