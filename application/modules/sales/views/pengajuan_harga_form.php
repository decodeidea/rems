        <div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>

                <form id="px-pengajuan-form" method="POST" action="<?php echo base_url() ?><?php echo $controller."/".$function?>_<?php if(isset($data)){echo"update";}else{echo"add";} ?>">
                    <input type="hidden" name="id" value="<?php if(isset($data)){ echo $data->id; } ?>">
                    <input type="hidden" name="controller" id="controller" value="<?php echo $controller ?>">
                    <input type="hidden" name="method" value="<?php echo $function ?>" id="method">
                    <div class="grid-body no-border">
                      <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <div class="alert alert-success hidden"><strong>Success! </strong><span></span></div>
                            <div class="alert alert-warning hidden"><strong>Processing! </strong><span>Please wait...</span></div>
                            <div class="alert alert-danger hidden"><strong>Failed! </strong><span></span></div>
                            
                            <div class="form-group">
                              <label class="form-label">Name</label>
                              <div class="controls">
                                <input type="text" class="form-control" name="nama" id="px-customer-form-pengajuan-nama" value="<?php if($data!=null) echo $data->nama; ?> ">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label">Email</label>
                              <div class="controls">
                                <input type="text" class="form-control" name="email" id="px-customer-form-pengajuan-email" value="<?php if($data!=null) echo $data->email; ?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label">No. HP</label>
                              <div class="controls">
                                <input type="text" class="form-control" name="tlp" id="px-customer-form-pengajuan-tlp" value="<?php if($data!=null) echo $data->email; ?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label">Alamat</label>
                              <div class="controls">
                                 <textarea name="alamat" class="form-control"><?php if($data!=null) echo $data->email; ?></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label">Instansi</label>
                              <div class="controls">
                                 <input type="text" class="form-control" name="instansi" id="px-customer-form-pengajuan-instansi" value="<?php if($data!=null) echo $data->email; ?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label">Atasan</label>
                              <div class="controls">
                                 <select  id="px-customer-form-pengajuan-atasan" class="select2" name="id_atasan" style="width:100%">
                                  <option value="">Choose Atasan</option>
                                  <?php foreach ($atasan as $atasan) {
                                  ?>
                                    <option  <?php if($data!=null and $atasan->id==$data->id_atasan){ echo"selected"; } ?> value="<?php echo $atasan->id ?>"><?php echo $atasan->first_name.$atasan->last_name ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>

                          

                            <div class="form-group">
                                <label class="form-label">Unit</label>
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
                                      foreach($checked_unit as $k){ 
                                        $unit = getAll($this->tbl_unit, array('id'=>'where/'.$k))->row();
                                        $total_price = $total_price + $unit->price;
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

                              <div class="form-group">
                                <label class="form-label">Nominal</label>
                                <div class="controls">
                                    <input type="text" class="form-control" onkeyup="masking()" name="nominal" id="price" value="<?php echo $total_price; ?>">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="controls">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </div>

                             
                        </div>
                      </div>
                    </div>

                   
                  </form>


              </div>
            </div>
          </div>

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
