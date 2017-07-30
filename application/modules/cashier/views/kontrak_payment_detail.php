     
    <?php if($this->session->flashdata('notif')){ ?> 
    <div class="alert alert-<?php echo $this->session->flashdata('notif') ?>">
<button class="close" data-dismiss="alert"></button>
<?php echo $this->session->flashdata('notif') ?>:&nbsp;<?php echo $this->session->flashdata('msg') ?></div>
<?php } ?> 


<div class="page-content-wrap">
        <div class="col-md-12">
		    <div class="row">
	            <!-- Nav tabs category -->
	            <ul class="nav nav-tabs faq-cat-tabs">
	                <li class="active"><a href="#tab-1" data-toggle="tab">Kontrak</a></li>
	                <li><a href="#tab-2" data-toggle="tab">Customer</a></li>
	                <li><a href="#tab-3" data-toggle="tab">Unit</a></li>
	                <li><a href="#tab-4" data-toggle="tab">Payment Schedule</a></li>
	                <li><a href="#tab-5" data-toggle="tab">Payment Record</a></li>
	            </ul>
	    
	            <!-- Tab panes -->
	            <div class="tab-content faq-cat-content">
	            	<!-- TAB KONTRAK -->
	                <div class="tab-pane active in fade" id="tab-1">
	                    <div class="panel panel-default">
			                <div class="panel-heading">                                
			                    <h3 class="panel-title">Data Kontrak <?php echo $kontrak->no_kontrak ?></h3></br></br>
			                    <div class="text-right"><p><?php if(isset($update)) echo 'Last Updated by '.$update->name.' ('.$update->date_modified.')'; ?></p></div>
			                </div>
		                    <div class="panel-body">
		                        <div class="form-group">
		                            <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Posted By</label>
		                            <div class="col-md-9 col-xs-12">
		                                <?php echo $kontrak->posted_by ?>
		                            </div>
		                        </div></br>
				                <div class="form-group">
	                            	<label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-date_created">Date Created</label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $kontrak->date_created ?>
			                            </div>
	                        	</div></br></br>

	                            
	                        	<div class="form-group">
		                           <div class="col-md-9 col-xs-12">
		                               <h2 class="non-margin">Detail Kontrak</h2>
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                        <div class="box-back">
		                        	<div class="form-group">
		                            	<label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">No Kontrak </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $kontrak->no_kontrak ?>
			                            </div>
		                        	</div></br>
		                        	<div class="form-group">
		                            	<label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Payment Scheme </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $kontrak_payment_scheme?>
			                            </div>
		                        	</div></br>
		                        	<div class="form-group">
		                            	<label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Kontrak Type </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $kontrak_type ?>
			                            </div>
		                        	</div></br>
		                        	<div class="form-group">
		                            	<label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Date End </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $kontrak->date_end ?>
			                            </div>
		                        	</div></br>
		                        	<div class="form-group">
		                            	<label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Sisa Hutang </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $kontrak->sisa_hutang ?>
			                            </div>
		                        	</div></br>
		                            <div class="form-group">
		                            	<label class="col-md-12 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Unit </label>
			                            <div class="col-md-12 col-xs-12">
			                                <table >
												<thead>
													<th>No</th>
													<th>Area</th>
													<th>Unit Name</th>
													<th>Price</th>
												</thead>
												<?php 
													$i=1;$total_price=0;foreach($kontrak_unit as $k){ 
													$unit = getAll($this->tbl_unit, array('id'=>'where/'.$k->unit_id))->row();
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
		                        	</div></br>
		                        	<div class="clearfix"></div>
		                        </div>

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
			                    </div>
			                    <div class="form-group">
		                           <div class="col-md-9 col-xs-12">
		                               <h2 class="non-margin">Detail Pembayaran Terakhir</h2>
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
	                        	<div class="box-back">
			                        <table class="table table-bordered">
		                            	<thead>
		                            		<th>Rekening</th>
		                            		<th>Nominal</th>
		                            		<th>Payment Type</th>
		                            		<th>Date Payment</th>
		                            	</thead>
		                            	<tbody>
		                            	<?php if($last_num_rows > 0){
		                            		$r = getAll($this->tbl_rekening, array('id'=>'where/'.$last->rekening_id))->row();
		                            			?>
		                            		<tr>
		                            			<td><?=(!empty($r)) ? $r->bank.' - '.$r->no_rek.' a.n '.$r->atas_nama : '-';?></td>
		                            			<td class="text-right"><?=number_format($last->nominal, 0)?></td>
		                            			<td><?=$last->payment_type?></td>
		                            			<td><?=$last->date_created?></td>
		                            		</tr>
		                            	<?php }else{ ?>

		                            	<td colspan="4">Belum ada pembayaran </td>
		                            		<?php } ?>
		                            	</tbody>
		                            </table>
	                        	</div>
		                    	<div class="form-group">
		                           <div class="col-md-9 col-xs-12">
		                               <h2 class="non-margin">Pelunasan Kontrak</h2>
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
	                        	<div class="box-back">
	                        	 <div class="col-md-9 col-xs-12">
	                        	<?php if($kontrak->sisa_hutang==0){ ?>

			                        <p>Kontrak ini sudah Lunas</p>
			                        <button class="btn btn-success" data-target-id="<?php echo $kontrak->id ?>">Kontrak Lunas</button>
	                        		<?php }else{ ?>
			                        <p>Kasir dapat melakukan pelunasan kontrak sesuai dengan peraturan yang berlaku.</p>
			                        <button class="btn btn-danger btn-cancel" type="button" data-original-title="Lunas" data-placement="top" data-toggle="tooltip" data-target-id="<?php echo $kontrak->id ?>">Lunasi Kontrak</button>
			                        <?php } ?>
			                        </div>
			                        <div class="clearfix"></div>
	                        	</div>
		                    </div>
		                </div>
	                </div>

	                <!-- TAB CUSTOMER -->
	                <div class="tab-pane fade" id="tab-2">
	                    <div class="panel panel-default">
			                <div class="panel-heading">                                
			                    <h3 class="panel-title">Data Customer <?php echo $customer->name ?></h3></br></br>
			                </div>
		                    <div class="panel-body">
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
		                    </div>
		                </div>
	                </div>

	                <!-- TAB UNIT -->
	                <div class="tab-pane fade" id="tab-3">
	                    <div class="panel panel-default">
			                <div class="panel-heading">                                
			                    <h3 class="panel-title">Data Unit</h3></br></br>
			                </div>
		                    <div class="panel-body">
		                    	<div class="form-group">
		                           <div class="col-md-9 col-xs-12">
		                               <h2 class="non-margin">Detail Unit</h2>
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                        <div class="box-back" >
		                        	<div class="table-responsive" style="overflow-x: auto;">
		                        	<table class="table" >
										<thead>
											<th>No</th>
											<th>Area</th>
											<th>Unit Name</th>
											<th>Room Type</th>
											<th>Luas Netto</th>
											<th>Luas Semigross</th>
											<th>Number</th>
											<th>Floor</th>
											<th>Block</th>
											<th>Price</th>
											<th>Struktur</th>
											<th>Lantai</th>
											<th>Dapur</th>
											<th>Listrik</th>
											<th>Dinding</th>
											<th>Pintu</th>
											<th>Sanitasi</th>
											<th>Jendela</th>
										</thead>
										<?php 
											$i=1;$total_price=0;foreach($kontrak_unit as $k){ 
											$unit = getAll($this->tbl_unit, array('id'=>'where/'.$k->unit_id))->row();
											$total_price = $total_price + $unit->price;
										?>
										<tr>
											<td><?=$i++?></td>
											<td><?=getValue('name', $this->tbl_area, array('id'=>'where/'.$unit->area_id))?></td>
											<td><?=$unit->name?></td>
											<td><?=$unit->unit_type?></td>
											<td><?=$unit->luas_netto?></td>
											<td><?=$unit->luas_semigross?></td>
											<td><?=$unit->number?></td>
											<td><?=$unit->floor?></td>
											<td><?=$unit->block?></td>
											<td><?=number_format($unit->price, 0)?></td>
											<td><?=$unit->struktur?></td>
											<td><?=$unit->lantai?></td>
											<td><?=$unit->dapur?></td>
											<td><?=$unit->listrik?></td>
											<td><?=$unit->dinding?></td>
											<td><?=$unit->pintu?></td>
											<td><?=$unit->sanitasi?></td>
											<td><?=$unit->jendela?></td>
										</tr>
										<?php } ?>
									</table>
									</div>

		                            <!-- <div class="form-group">
			                            <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Room Type </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $unit->room_type ?>
			                            </div>
			                        </div></br>
			                        <div class="form-group">
			                            <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Unit Name </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $unit->name ?>
			                            </div>
			                        </div></br>
			                        <div class="form-group">
			                            <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Luas Neto </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $unit->luas_netto ?>
			                            </div>
			                        </div></br>
			                        <div class="form-group">
			                            <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Luas Semigross </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $unit->luas_semigross ?>
			                            </div>
			                        </div></br>
			                         <div class="form-group">
			                            <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Number </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $unit->number ?>
			                            </div>
			                        </div></br>
			                        <div class="form-group">
			                            <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Floor </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $unit->floor ?>
			                            </div>
			                        </div></br>
			                         <div class="form-group">
			                            <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Block </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $unit->block ?>
			                            </div>
			                        </div></br>
			                        <div class="form-group">
			                            <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Price </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $unit->price ?>
			                            </div>
			                        </div></br>
			                        <div class="form-group">
			                            <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Struktur </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $unit->struktur ?>
			                            </div>
			                        </div></br>
			                        <div class="form-group">
			                            <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Lantai </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $unit->lantai ?>
			                            </div>
			                        </div></br>
			                         <div class="form-group">
			                            <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Dapur </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $unit->dapur ?>
			                            </div>
			                        </div></br>
			                        <div class="form-group">
			                            <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Listrik </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $unit->listrik ?>
			                            </div>
			                        </div></br>
			                        <div class="form-group">
			                            <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Dinding </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $unit->dinding ?>
			                            </div>
			                        </div></br>
			                        <div class="form-group">
			                            <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Pintu </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $unit->pintu ?>
			                            </div>
			                        </div></br>
			                        <div class="form-group">
			                            <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Sanitasi </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $unit->sanitasi ?>
			                            </div>
			                        </div></br>
			                        <div class="form-group">
			                            <label class="col-md-2 col-xs-12 control-label" for="#px-campaign-campaign_list-form-posted_by">Jendela </label>
			                            <div class="col-md-9 col-xs-12">
			                                <?php echo $unit->jendela ?>
			                            </div>
			                        </div></br> -->
			                    </div>
		                    </div>
		                </div>
	                </div>

	                <!-- TAB PAYMENT SCHEDULE -->
	                <div class="tab-pane fade" id="tab-4">
	                    <div class="panel panel-default">
			                <div class="panel-heading">                                
			                    <h3 class="panel-title">Data Payment Schedule</h3></br></br>
			                </div>
		                    <div class="panel-body">
		                    	<div class="form-group">
		                           <div class="col-md-9 col-xs-12">
		                               <h2 class="non-margin">Detail Payment Schedule</h2>
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                        <div class="box-back">
		                            <table class="table table-bordered">
		                            	<thead>
		                            		<th>Paymet Type</th>
		                            		<th>Title</th>
		                            		<th>Jatuh Tempo</th>
		                            		<th>Nominal</th>
		                            		<th>Nominal Paid</th>
		                            		<th>Date Payment</th>
		                            	</thead>
		                            	<tbody>
		                            		<?php foreach ($payment_schedule as $p) {?>
		                            		<tr>
		                            			<td><?=getValue('title', $this->tbl_payment_type, array('id'=>'where/'.$p->payment_type))?></td>
		                            			<td><?=$p->title?></td>
		                            			<td><?=$p->jatuh_tempo?></td>
		                            			<td class="text-right"><?=$p->nominal?></td>
		                            			<td class="text-right"><?=$p->nominal_paid?></td>
		                            			<td><?=$p->date_payment?></td>
		                            		</tr>
		                            		<?php } ?>
		                            	</tbody>
		                            </table>
			                    </div>
		                    </div>
		                </div>
	                </div>

	                <!-- TAB PAYMENT record -->
	                <div class="tab-pane fade" id="tab-5">
	                    <div class="panel panel-default">
			                <div class="panel-heading">                                
			                    <h3 class="panel-title">Data Payment Record</h3></br></br>
			                </div>
		                    <div class="panel-body">
		                    	<div class="form-group">
		                           <div class="col-md-9 col-xs-12">
		                               <h2 class="non-margin">Detail Payment Record</h2>
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                        <div class="box-back">
		                            <table class="table table-bordered">
		                            	<thead>
		                            		<th>Rekening</th>
		                            		<th>Nominal</th>
		                            		<th>Payment Name</th>
		                            		<th>Status</th>
		                            		<th>Date Payment</th>
		                            	</thead>
		                            	<tbody>
		                            		<?php foreach ($payment_record as $pr) {
		                            				$r = getAll($this->tbl_rekening, array('id'=>'where/'.$pr->rekening_id))->row();
		                            			?>
		                            		<tr>
		                            			<td><?=(!empty($r)) ? $r->bank.' - '.$r->no_rek.' a.n '.$r->atas_nama : '-';?></td>
		                            			<td class="text-right"><?=$pr->nominal?></td>
		                            			<td><?=$pr->payment_title?></td>
		                            			<td><?=$pr->status?></td>
		                            			<td><?=$pr->date_created?></td>
		                            		</tr>
		                            		<?php } ?>
		                            	</tbody>
		                            </table>
			                    </div>
		                    </div>
		                </div>
	                </div>

	                <!-- e.o tab -->
	            </div>
		    </div>
        </div>	  
</div>
<!-- PAGE CONTENT WRAPPER -->