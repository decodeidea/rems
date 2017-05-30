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
                        <label class="form-label">No.Rekening</label>
                        <div class="controls">
                          <input type="text" name="no_rek" required class="form-control" value="<?php if(isset($data)){ echo $data->no_rek; } ?>">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="form-label">Bank</label>
                        <div class="controls">
                          <input type="text" name="bank" required class="form-control" value="<?php if(isset($data)){ echo $data->bank; } ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Atas Nama</label>
                        <div class="controls">
                          <input type="text" name="atas_nama" required class="form-control" value="<?php if(isset($data)){ echo $data->atas_nama; } ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Saldo</label>
                        <div class="controls">
                          <input type="text" name="saldo" class="form-control" value="<?php if(isset($data)){ echo $data->saldo; } ?>">
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
