
      <div id="container">
        <div class="row 2col">
          <div class="col-md-6 col-sm-6 spacing-bottom-sm spacing-bottom">
            <div class="tiles blue added-margin">
              <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> </div>
                <div class="tiles-title">RUMAH TERJUAL</div>
                <div class="heading"> <span class="animate-number" data-value="<?php echo $unit_sold ?>" data-animation-duration="700"><?php echo $unit_sold ?></span> </div>
                  <div class="progress transparent progress-white progress-small no-radius">
                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="<?php echo $unit_all-$unit_sold ?>%"></div>
                  </div>
                 <div class="description"><i class="icon-custom-up"></i><br>
                jumlah customer yang terdaftar
                <!-- <span class="text-white mini-description ">&nbsp; 3% higher <span class="blend">than last month</span></span> --></div>
                </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 spacing-bottom-sm spacing-bottom">
            <div class="tiles green added-margin">
              <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> </div>
                <div class="tiles-title">SISA RUMAH</div>
                <div class="heading"> <span class="animate-number" data-value="<?php echo $unit_available ?>" data-animation-duration="700"><?php echo $unit_available ?></span> </div>
                  <div class="progress transparent progress-white progress-small no-radius">
                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="<?php echo $unit_all-$unit_available ?>%"></div>
                  </div>
                <div class="description"><i class="icon-custom-up"></i><br>
                Sisa rumah yang belum terjual
                <!-- <span class="text-white mini-description ">&nbsp; 3% higher <span class="blend">than last month</span></span> --></div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 spacing-bottom">
            <div class="tiles red added-margin">
              <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> </div>
                <div class="tiles-title">PENJUALAN HARI INI</div>
                <div class="heading"> <span class="animate-number" data-value="<?php echo $unit_buy ?>" data-animation-duration="700"><?php echo $unit_buy ?></span> </div>
                  <div class="progress transparent progress-white progress-small no-radius">
                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="12%"></div>
                  </div>
                 <div class="description"><i class="icon-custom-up"></i><br>
                Data pembelian rumah hari ini
                <!-- <span class="text-white mini-description ">&nbsp; 3% higher <span class="blend">than last month</span></span> --></div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="tiles purple added-margin">
              <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> </div>
                <div class="tiles-title">JUMLAH CUSTOMER</div>
                <div class="row-fluid">
                  <div class="heading"> <span class="animate-number" data-value="<?php echo $customer ?>" data-animation-duration="700"><?php echo $customer ?></span> </div>
                  <div class="progress transparent progress-white progress-small no-radius">
                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="50%"></div>
                  </div>
                </div>
                <div class="description"><i class="icon-custom-up"></i><br>
                Jumlah customer yang terdaftar
                <!-- <span class="text-white mini-description ">&nbsp; 3% higher <span class="blend">than last month</span></span> --></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      