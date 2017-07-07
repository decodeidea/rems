        <div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?><?php echo $controller."/".$function?>_<?php if(isset($data)){echo"update";}else{echo"add";} ?>">
                <input type="hidden" name="id" value="<?php if(isset($data)){ echo $data->id; } ?>">
                <input type="hidden" name="controller" id="controller" value="<?php echo $controller ?>">
              <input type="hidden" name="method" value="<?php echo $function ?>" id="method">
                <div class="grid-body no-border">
                  <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-8">
                      <div class="form-group">
                        <label class="form-label">Name</label>
                        <div class="controls">
                          <input type="text" name="name" required class="form-control" value="<?php if(isset($data)){ echo $data->name; } ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Area</label>
                        <div class="controls">
                          <select name="area_id" class="select2 form-control">
                            <option value="">Pilih Area</option>
                            <?php foreach ($area as $key) { ?>
                             <option <?php if(isset($data) and $data->area_id==$key->id){ echo"selected"; } ?>  value="<?php echo $key->id ?>"><?php echo $key->name ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Unit Type</label>
                        <div class="controls">
                          <select name="unit_type" class="select2 form-control">
                            <option value="">Pilih Type Unit</option>
                            <?php foreach ($unit_type as $key) { ?>
                             <option <?php if(isset($data) and $data->unit_type==$key->id){ echo"selected"; } ?>  value="<?php echo $key->id ?>"><?php echo $key->name ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Luas Netto</label>
                        <div class="controls">
                          <input type="text" name="luas_netto" class="form-control" value="<?php if(isset($data)){ echo $data->luas_netto; } ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Luas Semigross</label>
                        <div class="controls">
                          <input type="text" name="luas_semigross" class="form-control" value="<?php if(isset($data)){ echo $data->luas_semigross; } ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Block</label>
                        <div class="controls">
                          <input type="text" name="block" class="form-control" value="<?php if(isset($data)){ echo $data->block; } ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Number</label>
                        <div class="controls">
                          <input type="text" name="number" class="form-control" value="<?php if(isset($data)){ echo $data->number; } ?>">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="form-label">Floor</label>
                        <div class="controls">
                          <input type="text" name="floor" class="form-control" value="<?php if(isset($data)){ echo $data->floor; } ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Price</label>
                        <div class="controls">
                          <input type="text" name="price" class="form-control" value="<?php if(isset($data)){ echo $data->price; } ?>">
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <label class="form-label">Struktur</label>
                        <div class="controls">
                          <input type="text" name="struktur" class="form-control" value="<?php if(isset($data)){ echo $data->struktur; } ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Lantai</label>
                        <div class="controls">
                          <input type="text" name="lantai" class="form-control" value="<?php if(isset($data)){ echo $data->lantai; } ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Dapur</label>
                        <div class="controls">
                          <input type="text" name="dapur" class="form-control" value="<?php if(isset($data)){ echo $data->dapur; } ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Listrik</label>
                        <div class="controls">
                          <input type="text" name="listrik" class="form-control" value="<?php if(isset($data)){ echo $data->listrik; } ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Dinding</label>
                        <div class="controls">
                          <input type="text" name="dinding" class="form-control" value="<?php if(isset($data)){ echo $data->dinding; } ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Pintu</label>
                        <div class="controls">
                          <input type="text"  name="pintu" class="form-control" value="<?php if(isset($data)){ echo $data->pintu; } ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Sanitasi</label>
                        <div class="controls">
                          <input type="text" name="sanitasi" class="form-control" value="<?php if(isset($data)){ echo $data->sanitasi; } ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Jendela</label>
                        <div class="controls">
                          <input type="text" name="jendela" class="form-control" value="<?php if(isset($data)){ echo $data->jendela; } ?>">
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
