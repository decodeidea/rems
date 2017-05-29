        <div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <form enctype="multipart/form-data" method="post" action="<?php if($data)echo $controller.'/list_customer_edit'; else echo $controller.'/list_customer_add'; ?>">
                  <input type="hidden" name="id" value="<?php if(isset($data)){ echo $data->id; } ?>">
             
              <input type="hidden" name="controller" id="controller" value="<?php echo $controller ?>">
                <input type="hidden" name="method" value="<?php echo $function ?>" id="method">
              
                <div class="grid-body no-border">
                  <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-8">
                     	
                     	<div class="form-group">
                        <label class="form-label">Name</label>
                        <div class="controls">
                      	<input type="text" class="form-control" name="name"value="<?php if($data!=null) echo $data->name; ?>">
						  </div>
                      </div>

					<div class="form-group">
                        <label class="form-label">Gender</label>
                        <div class="controls">
                     	<select class="form-control"  name="gender">
								<option value="">Choose Gender</option>
								<option <?php if($data!=null){ if($data->gender='female'){ echo"selected";  }  } ?> value="Female">Female</option>
								<option <?php if($data!=null){ if($data->gender='female'){ echo"selected";  }  } ?> value="Male">Male</option>
							</select>	  </div>
                      </div>


						<div class="form-group">
                        <label class="form-label">Date of Birth</label>
                        <div class="controls">
                     	<input type="text" class="datepicker form-control" name="date_of_birth"  value="<?php if($data!=null) echo $data->date_of_birth; ?>">
					 </div>
                      </div>


						<div class="form-group">
		                        <label class="form-label">Address</label>
		                        <div class="controls">
		                   				<textarea class="form-control ignore" name="address" ><?php if($data!=null) echo $data->address; ?></textarea>
						  		</div>
		                </div>


						<div class="form-group">
                          <label class="form-label">Phone</label>
                           <div class="controls">
                   					<input type="text" class="form-control" name="phone" value="<?php if($data!=null) echo $data->phone; ?>">
						  </div>
                		</div>
                

					<div class="form-group">
                        <label class="form-label">Email</label>
                        <div class="controls">
                   			<input type="email" class="form-control" name="email" value="<?php if($data!=null) echo $data->email; ?>">
						</div>
                		</div>

				
					<div class="form-group">
                        <label class="form-label">No KTP</label>
                        <div class="controls">
                   			<input type="text" class="form-control" name="no_ktp"  value="<?php if($data!=null) echo $data->no_ktp; ?>">
						</div>
                		</div>
					

					<div class="form-group">
                        <label class="form-label">No NPWP</label>
                        <div class="controls">
                   				<input type="text" class="form-control" name="no_npwp" value="<?php if($data!=null) echo $data->no_npwp; ?>">
					    </div>
                		</div>


					

					<div class="form-group">
                        <label class="form-label">Job</label>
                        <div class="controls">
                   			<input type="text" class="form-control" name="pekerjaan"  value="<?php if($data!=null) echo $data->pekerjaan; ?>">
						</div>
                	</div>

					
					<div class="form-group">
                        <label class="form-label">Office</label>
                        <div class="controls">
                				<input type="text" class="form-control" name="nama_kantor" value="<?php if($data!=null) echo $data->nama_kantor; ?>">
						</div>
                	</div>


						<div class="form-group">
	                        <label class="form-label">Office Address</label>
	                        <div class="controls">
	             				<textarea class="form-control ignore" name="alamat_kantor" id="px-address-form-customer-alamat-kantor"><?php if($data!=null) echo $data->alamat_kantor; ?></textarea>
							</div>
                	    </div>


	

	              <div class="form-group">
                        <label class="form-label">photos</label>
                        <div class="controls">
				                       <div class="box">
          <input type="file" name="photo" id="file-7" class="inputfile" accept="image/*" onchange="loadFile(event)" />
          <label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
        </div>

         <img id="output" class="ouput_image_input" <?php if($data){ ?> src="<?php echo base_url() ?>assets/uploads/customer/photo/<?php if($data->photo==''){echo"default.jpg";}else{echo $data->id."/".$data->photo;} }?> " />
        
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

