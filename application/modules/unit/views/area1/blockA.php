    <div class="col-md-9 col-sm-12 col-xs-12">
      <!-- START DEFAULT DATATABLE -->
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-3 col-xs-12"></div>
            <div class="col-md-9 col-xs-12">
              <div class="row" id="stat">
               <div class="stat-available red"> </div> <span > Unitfgfg 3BR</span>
               <div class="stat-not-available"> </div> <span>Non Availabe</span>
               <div class="clearfix"></div>
              </div>
            </div>
          </div>


          <form id="add_unit" class="form" method="POST" action="<?= base_url('sales/form_denah_submit')?>">
         
            <div class="row template-rumah list-unit">
                <div class="col-md-12 col-xs-12 col-sm-12">
                  <ul style="padding: 0;">
                    <li>
						<input name="unit_id[]" value="<?php echo $a1->id ?>" type="radio">
						<div id-unit="" class="kotak-unit <?php if($a1->status=='1'){ echo'not-available';}else{ ?>available red<?php } ?>">
							<h2><?php echo $a1->name ?></h2>
						</div>
					</li>
                   
                   </ul>


                                     
                   
                </div>
                 <div class="col-md-12 col-xs-12 col-sm-12 ">
                    <hr class="line">
                 </div>
         
            </div>

           
            


        
<div class="row col-md-12">
          <button class="btn btn-primary pull-right" name="kontrak_button">Buat Kontrak</button>
            <button class="btn btn-danger pull-right" name="pengajuan_button" style="margin-right: 10px;">Pengajuan Harga</button>
          </div>
            </form>
          </div>
        </div>
</div>   
