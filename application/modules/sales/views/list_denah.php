   
<?php if($this->session->flashdata('notif')){ ?> 
  <div class="alert alert-<?php echo $this->session->flashdata('notif') ?>">
  <button class="close" data-dismiss="alert"></button>
<?php echo $this->session->flashdata('notif') ?>:&nbsp;<?php echo $this->session->flashdata('msg') ?>
  </div>
<?php } ?>

     <div class="row-fluid" style=" overflow: scroll;">
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
                <div class="page-content-wrap">
                    <div class="row">
						<div class="col-md-12">
						<form id="add_unit" class="form" method="POST" action="<?= base_url('sales/form_denah_submit')?>">
							<div class="areaA01">
								<?php if($a1->status=='1'){ echo'not-available';}else{ ?>
									<input name="unit_id[]" value="<?php echo $a1->id ?>" type="checkbox">
								<?php
									}
								?>
								
							</div>
							<div class="areaA02">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaA03">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaA04">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaA05">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaA06">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaA07">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaA08">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaA09">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaA10">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaA11">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaA12">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaA14">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							
							<div class="areaB01">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB02">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB03">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB04">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB05">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB06">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB07">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB08">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB09">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB10">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB11">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB12">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB14">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB15">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB16">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB17">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB18">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB19">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB20">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB21">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaB22">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							
							<div class="areaC01">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC02">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC03">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC04">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC05">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC06">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC07">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC08">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC09">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC10">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC11">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC12">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC14">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC15">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC16">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC17">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC18">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC19">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC20">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC21">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC22">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC23">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC24">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							<div class="areaC25">
								<input name="unit_id[]" value="" type="checkbox">
							</div>
							
							<div class="button_denah">
								<button class="btn btn-primary pull-right" name="kontrak_button">Buat Kontrak</button>
								<button class="btn btn-danger pull-right" name="pengajuan_button" style="margin-right: 10px;">Pengajuan Harga</button>
						  </div>
						</form>
						
						
						
						
						
							<style>
							
								path:hover{ fill:#c2d8f9;}
							</style>
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="850px"
								 height="1200px" viewBox="0 0 850 1200" enable-background="new 0 0 850 1200" xml:space="preserve">
							<g id="Layer_1">
								<path fill="#9CBDFF" d="M96.923,574.105l97.58,51.169c0,0,8.329,0.397,12.693-7.14c4.363-7.535,292.738-549.78,292.738-549.78
									l-124.554-40.46l-44.427,60.293v7.14l-16.66,34.113l-15.865,99.167l-12.694-0.793l-70.606,158.665l-46.014,3.177l-53.946,103.925
									L96.923,574.105z"/>
								<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="347.184" y1="63.856" x2="472.366" y2="121.592"/>
								
									<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="325.349" y1="106.604" x2="450.531" y2="164.339"/>
								
									<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="309.421" y1="146.006" x2="434.604" y2="203.741"/>
								<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="298.429" y1="188.745" x2="423.612" y2="246.48"/>
								
									<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="284.593" y1="228.251" x2="409.775" y2="285.986"/>
								
									<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="262.757" y1="276.919" x2="387.939" y2="334.654"/>
								
									<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="240.388" y1="315.713" x2="365.571" y2="373.448"/>
								
									<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="228.173" y1="358.406" x2="320.992" y2="404.186"/>
								<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="166.172" y1="395.326" x2="296.87" y2="450.014"/>
								<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="148.83" y1="428.733" x2="276.538" y2="488.198"/>
								<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="127.103" y1="470.59" x2="254.995" y2="528.645"/>
								
									<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="109.899" y1="516.833" x2="231.521" y2="572.686"/>
								
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 447.6934 71.9253)" font-family="'MyriadPro-Regular'" font-size="16.66">A01</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 414.5352 120.7153)" font-family="'MyriadPro-Regular'" font-size="16.66">A02</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 392.7002 160.7705)" font-family="'MyriadPro-Regular'" font-size="16.66">A03</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 371.521 197.792)" font-family="'MyriadPro-Regular'" font-size="16.66">A04</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 348.374 236.9614)" font-family="'MyriadPro-Regular'" font-size="16.66">A05</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 328.9185 274.0869)" font-family="'MyriadPro-Regular'" font-size="16.66">A06</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 306.5493 323.0181)" font-family="'MyriadPro-Regular'" font-size="16.66">A07</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 284.5928 363.478)" font-family="'MyriadPro-Regular'" font-size="16.66">A08</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 267.5176 401.5581)" font-family="'MyriadPro-Regular'" font-size="16.66">A09</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 243.959 450.1367)" font-family="'MyriadPro-Regular'" font-size="16.66">A10</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 223.3955 489.4067)" font-family="'MyriadPro-Regular'" font-size="16.66">A11</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 202.9482 532.2466)" font-family="'MyriadPro-Regular'" font-size="16.66">A12</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 181.6421 579.8467)" font-family="'MyriadPro-Regular'" font-size="16.66">A14</text>
							</g>
							<g id="Layer_2">
								<path fill="#9CBDFF" d="M541.578,94.167l-43.634,82.506c0,0-5.553,11.107,7.934,15.074l122.174,60.293l45.221-71.4l-26.181-12.692
									l-39.667-40.46L541.578,94.167z"/>
								<path fill="#9CBDFF" d="M633.346,279.601l-143.499-76.469c0,0-10.386-10.386-22.657,6.607l-77.414,149.164
									c0,0-7.553,16.049,0,22.657l137.834,68.916L633.346,279.601z"/>
								<path fill="#9CBDFF" d="M275.234,564.963l82.135-151.995c0,0,5.192-16.519,25.726-5.896l97.711,49.563
									c0,0,11.328,9.205,6.372,16.994l-82.841,154.354c0,0-2.833,12.745-17.701,7.081l-104.792-51.688
									C281.844,583.375,272.874,578.41,275.234,564.963z"/>
								<path fill="#9CBDFF" d="M167.537,765.021l77.886-145.822c0,0,11.328-20.569,24.781-9.949l97.711,50.272
									c0,0,14.161,7.08,8.496,16.993l-80.009,147.983c0,0-7.081,19.824-19.825,14.16L173.909,787.68
									C173.909,787.68,159.749,779.606,167.537,765.021z"/>
								
									<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="579.241" y1="112.906" x2="534.451" y2="205.456"/>
								
									<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="625.973" y1="147.045" x2="582.864" y2="229.233"/>
								<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="525.654" y1="221.552" x2="429.23" y2="400.459"/>
								
									<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="586.488" y1="254.304" x2="480.794" y2="426.697"/>
								
									<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="426.987" y1="286.671" x2="580.637" y2="364.366"/>
								<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="410.145" y1="421.367" x2="315.575" y2="600.58"/>
								
									<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="454.203" y1="443.715" x2="357.048" y2="621.036"/>
								<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="319.145" y1="490.345" x2="446.34" y2="556.398"/>
								
									<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="297.213" y1="623.014" x2="207.341" y2="804.136"/>
								
									<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="342.805" y1="646.471" x2="245.069" y2="822.869"/>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 512.3125 177.9492)" font-family="'MyriadPro-Regular'" font-size="16.66">B01</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 468.5508 238.0757)" font-family="'MyriadPro-Regular'" font-size="16.66">B04</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 408.0059 369.1157)" font-family="'MyriadPro-Regular'" font-size="16.66">B07</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 358.0215 441.562)" font-family="'MyriadPro-Regular'" font-size="16.66">B10</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 291.3145 567.3687)" font-family="'MyriadPro-Regular'" font-size="16.66">B14</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 249.876 637.6768)" font-family="'MyriadPro-Regular'" font-size="16.66">B17</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 180.3389 770.4453)" font-family="'MyriadPro-Regular'" font-size="16.66">B20</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 222.2227 790.3994)" font-family="'MyriadPro-Regular'" font-size="16.66">B21</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 262.939 810.6289)" font-family="'MyriadPro-Regular'" font-size="16.66">B22</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 290.7012 657.9063)" font-family="'MyriadPro-Regular'" font-size="16.66">B18</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 335.0693 685.0488)" font-family="'MyriadPro-Regular'" font-size="16.66">B19</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 333.1973 586.7446)" font-family="'MyriadPro-Regular'" font-size="16.66">B15</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 375.0605 606.9746)" font-family="'MyriadPro-Regular'" font-size="16.66">B16</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 400.0313 462.9849)" font-family="'MyriadPro-Regular'" font-size="16.66">B11</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 440.7656 484.7744)" font-family="'MyriadPro-Regular'" font-size="16.66">B12</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 526.5107 266.6382)" font-family="'MyriadPro-Regular'" font-size="16.66">B05</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 452.8389 390.4194)" font-family="'MyriadPro-Regular'" font-size="16.66">B08</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 502.5869 418.2163)" font-family="'MyriadPro-Regular'" font-size="16.66">B09</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 577.9531 290.7461)" font-family="'MyriadPro-Regular'" font-size="16.66">B06</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 552.0859 198.3652)" font-family="'MyriadPro-Regular'" font-size="16.66">B02</text>
								<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 599.6406 223.9292)" font-family="'MyriadPro-Regular'" font-size="16.66">B03</text>
								
									<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="207.341" y1="690.498" x2="330.724" y2="761.019"/>
							</g>
							<g id="Layer_3">
								<g>
									<path fill="#9CBDFF" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" d="M497.431,513.186l-69.813,128.917
										c0,0-11.106,12.694,0,18.247l124.554,67.433c0,0,16.66,10.313,21.42,0l53.945-99.168l-8.726-22.212l-53.947-40.461l-19.04-11.899
										L497.431,513.186z"/>
									<path fill="#9CBDFF" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" d="M643.403,685.737l-32.527,57.915
										c0,0-8.13,14.077,4.365,18.242l101.149,54.146l8.33-29.155c0,0-0.595-19.391-61.285-66.045
										C663.436,720.84,648.363,709.539,643.403,685.737z"/>
									<path fill="#9CBDFF" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" d="M322.454,839.847l82.474-150.219
										c0,0,6.629-16.937,27.246-4.419l286.449,154.638c0,0,22.091,12.519,10.311,24.302l-92.784,145.801c0,0-8.1,21.355-25.773,11.047
										L328.347,869.302C328.347,869.302,309.304,863.8,322.454,839.847z"/>
									
										<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="564.863" y1="565.941" x2="497.678" y2="695.694"/>
									
										<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="470.052" y1="559.991" x2="544.64" y2="601.347"/>
									
										<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="433.417" y1="622.774" x2="585.042" y2="706.729"/>
									
										<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="455.219" y1="591.132" x2="604.419" y2="671.108"/>
									
										<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="698.727" y1="830.75" x2="584.096" y2="1008.511"/>
									
										<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="660.444" y1="808.899" x2="545.814" y2="986.66"/>
									
										<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="618.445" y1="791.171" x2="503.813" y2="968.932"/>
									
										<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="582.062" y1="766.876" x2="467.43" y2="944.637"/>
									
										<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="542.089" y1="748.379" x2="427.457" y2="926.141"/>
									
										<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="505.385" y1="727.311" x2="390.754" y2="905.071"/>
									<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="465.05" y1="705.86" x2="350.42" y2="883.621"/>
									
										<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="365.66" y1="761.151" x2="672.793" y2="944.637"/>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 440.5576 653.9951)" font-family="'MyriadPro-Regular'" font-size="16.66">C01</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 412.4961 711.4902)" font-family="'MyriadPro-Regular'" font-size="16.66">C17</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 332.7651 842.0215)" font-family="'MyriadPro-Regular'" font-size="16.66">C18</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 372.8018 867.0098)" font-family="'MyriadPro-Regular'" font-size="16.66">C19</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 411.3052 888.4297)" font-family="'MyriadPro-Regular'" font-size="16.66">C20</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 451.6396 909.8496)" font-family="'MyriadPro-Regular'" font-size="16.66">C21</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 488.3438 932.4609)" font-family="'MyriadPro-Regular'" font-size="16.66">C22</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 527.7012 952.6904)" font-family="'MyriadPro-Regular'" font-size="16.66">C23</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 567.2441 975.2998)" font-family="'MyriadPro-Regular'" font-size="16.66">C24</text>
									<g>
										<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 605.6094 995.5303)" font-family="'MyriadPro-Regular'" font-size="16.66">C25</text>
									</g>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 458.791 736.8311)" font-family="'MyriadPro-Regular'" font-size="16.66">C16</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 497.6787 759.2188)" font-family="'MyriadPro-Regular'" font-size="16.66">C15</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 533.6504 780.6387)" font-family="'MyriadPro-Regular'" font-size="16.66">C14</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 573.1953 800.6895)" font-family="'MyriadPro-Regular'" font-size="16.66">C12</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 613.0371 822.1406)" font-family="'MyriadPro-Regular'" font-size="16.66">C11</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 650.9307 842.0195)" font-family="'MyriadPro-Regular'" font-size="16.66">C10</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 689.0117 864.6309)" font-family="'MyriadPro-Regular'" font-size="16.66">C09</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 457.5996 618.2969)" font-family="'MyriadPro-Regular'" font-size="16.66">C02</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 472.4316 587.356)" font-family="'MyriadPro-Regular'" font-size="16.66">C03</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 488.3428 554.0356)" font-family="'MyriadPro-Regular'" font-size="16.66">C04</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 544.4688 707.0508)" font-family="'MyriadPro-Regular'" font-size="16.66">C05</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 646.8086 746.1289)" font-family="'MyriadPro-Regular'" font-size="16.66">C08</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 562.3203 672.2998)" font-family="'MyriadPro-Regular'" font-size="16.66">C06</text>
									<text transform="matrix(0.9272 0.3746 -0.3746 0.9272 581.7158 629.9316)" font-family="'MyriadPro-Regular'" font-size="16.66">C07</text>
								</g>
							</g>
							</svg>

						<!--<div class="panel panel-default">
							<div class="panel-body">
							  <div class="col-md-2"><label>Select Block  : </label> </div>
							  <div class="col-md-3">
								<select onchange="change_block(<?php echo $area->id ?>)" name="list-block"  id="select2">
								  <option value="">select Block</option>
								  <?php foreach ($unit as $data) {  ?>
								  <option  value="<?php echo $data->block ?>">Block - <?php echo $data->block ?></option>
								  <?php } ?>
								</select>
							  </div>
							</div>
						</div>!-->
						</div>
                    </div>   
                    <div class="col-md-12 col-xs-12 col-sm-12 ">
                        <hr class="line">
                    </div>
                    <div class="row" id="denah">
					
						
					
                    </div>
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


