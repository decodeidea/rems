        <div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="grid-body no-border">
        <div class="row">
        <div class="col-md-8">
               <form method="POST" action="<?php echo base_url()."".$controller.'/'.$function."_add"?>">
        <input type="hidden" value="<?php if($data!=null) echo $data->id; ?>" name="id">
        <input type="hidden" value="<?php if($data!=null) echo $data->is_signed; ?>" name="is_signed">
        
          <input type="hidden" id="base_url" val=<?=base_url()?>>
        

            <div class="form-group">
              <label class="form-label">No. Kontrak</label>
              <div class="controls">
                <input type="text" class="form-control" name="no_kontrak" id="px-unit-area-name" value="<?php echo sprintf('%08d', $id) ?>">
              </div>
            </div>

            <div class="form-group">
              <div class="controls">
                <table class="table table-bordered">
                  <thead>
                    <th>No</th>
                    <th>Area</th>
                    <th>Unit Name</th>
                    <th>Price</th>
                  </thead>
                  <?php 
                    $i=1;$total_price=0;
                    if($flag==null):
                      foreach($kontrak_unit as $k){ 
                      $unit = getAll($this->tbl_unit, array('id'=>'where/'.$k->unit_id))->row();
                      $total_price = $total_price + $unit->price;
                  ?>
                  <tr>
                    <td><?=$i++?></td>
                    <td><?=getValue('name', $this->tbl_area, array('id'=>'where/'.$unit->area_id))?></td>
                    <td><?=$unit->name?></td>
                    <td><?=number_format($unit->price, 0)?></td>
                  </tr>
                  <?php }
                    else:
                    foreach($pengajuan_unit as $k){ 
                      $unit = getAll($this->tbl_unit, array('id'=>'where/'.$k->unit_id))->row();
                      $total_price = $total_price + $unit->price;
                   ?>
                  <tr>
                    <td><?=$i++?><input type="hidden" name="unit_id[]" value="<?php echo $k->unit_id ?>"></td>
                    <td><?=getValue('name', $this->tbl_area, array('id'=>'where/'.$unit->area_id))?></td>
                    <td><?=$unit->name?></td>
                    <td><?=number_format($unit->price, 0)?></td>
                  </tr>
                <?php 
                  }
                endif; ?>
                </table>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label" >Customer</label>
              <div class="controls">
                <?php if ($flag != null) {
                  $disabled = "disabled";
                  echo "<input type='hidden' name='customer_id' value=".$customer_pengajuan.">";
                }else{
                  $disabled = "";
                  } ?>
                <select class="select2" style="width:100%"  name="customer_id" id="px-system-useraccess-form-id-usergroup" <?php echo $disabled ?>>
                <option value="-">-- Choose Customer --</option>
                <?php foreach ($customer as $c) { ?>
                  <?php if($data!=null and $c->id==$data->customer_id){ 
                      $selected = "selected"; 
                    } elseif($flag!=null && $c->id == $customer_pengajuan){
                      $selected = "selected";
                    }else{
                      $selected = "";
                    }
                  ?>
                  <option value="<?php echo $c->id; ?>" <?=$selected?>><?php echo $c->name; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Sales</label>
              <div class="controls">
              <?php if ($flag != null) {
                  $disabled = "disabled";
                  echo "<input type='hidden' name='sales_id' value=".$data_pengajuan->id_created.">";
                }else{
                  $disabled = "";
                  } ?>
                <select class="select2" style="width:100%"  name="sales_id" id="px-system-useraccess-form-id-usergroup" <?php echo $disabled ?>>
                <option value="-">-- Choose Sales --</option>
                <?php foreach ($all_user as $au) { ?>
                <?php if($data!=null and $au->id==$data->id_created){ 
                      $selected = "selected"; 
                    } elseif($flag!=null && $au->id == $data_pengajuan->id_created){
                      $selected = "selected";
                    }else{
                      $selected = "";
                    }
                  ?>
                  <option value="<?php echo $au->id; ?>" <?php echo $selected ?>><?php echo $au->username; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Payment Schema</label>
              <div class="controls">
                <select class="select2" style="width:100%" name="payment_scheme_id" id="payment_scheme">
                  <option value="-">-- Choose Payment Schema --</option>
                  <?php foreach ($payment_scheme as $p) { ?>
                    <option <?php if($data!=null and $p->id==$data->payment_scheme_id){ echo"selected"; } ?> value="<?php echo $p->id; ?>"><?php echo $p->title; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Kontrak Type</label>
              <div class="controls">
                <!-- <select class="select2" style="width:100%" name="kontrak_type" id="px-system-useraccess-form-id-usergroup">
                  <option value="-">-- Choose Kontrak Type --</option>
                  <?php foreach ($kontrak_type as $k) { ?>
                    <option <?php if($data!=null and $k->id==$data->kontrak_type){ echo"selected"; } ?> value="<?php echo $k->id; ?>"><?php echo $k->name; ?></option>
                  <?php } ?>
                </select> -->
                <input type="text" name="" id="kontrak_type_name" value="" class="form-control">
                <input type="hidden" name="kontrak_type_id" id="kontrak_type" value="">
              </div>
            </div>

            <div class="form-group">
              <label class="form-label" >Bunga(%)</label>
              <div class="controls">
                <input type="text" name="bunga" id="bunga" value="0" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="form-label">Price</label>
              <div class="controls">
                <?php if($flag!=null){?>
                  <input type="text" class="form-control money text-right" onkeyup="hitung()" name="price" id="price" value="<?php echo $nominal_pengajuan; ?>" readonly>
                <?php
                }else{
                  ?>
                <input type="text" class="form-control money text-right" onkeyup="hitung()" name="price" id="price" value="<?php echo $total_price; ?>" readonly>
                <?php } ?>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Booking Fee</label>
              <div class="controls">
                <input type="text" class="form-control money text-right" onkeyup="hitung()" name="booking_fee" id="booking_fee" value="<?php if($booking_fee!=null) echo $booking_fee;else echo 0; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Sisa Hutang</label>
              <div class="controls">
                <input type="text" class="form-control money text-right" name="sisa_hutang" id="sisa-hutang" value="<?php if($data!=null) echo $data->sisa_hutang; ?>" readonly>
              </div>
            </div>
            <input type="hidden" name="rekening_id" value="0">
            <br/>
      <div class="controls">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
        </form>
        </div>
        </div>
        </div>
              </div>
            </div>
          </div>
          </div>

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>

  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/plugins/jquery-mask-money/jquery.maskMoney.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/page/sales/kontrak_form.js"></script>