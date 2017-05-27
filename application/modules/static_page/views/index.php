<div class="menu-margin"></div>
<section class="p-xlg">
					<div class="container">
						<div class="row">
						<div class="col-md-8 left-bar">

						<div class="title-static">
							<h3><?php echo $data->title ?></h3>
						</div>

						<div class="text-center header-image">
						<img width="100%" src="<?php echo base_url() ?>assets/uploads/static-page/<?php echo $data->id ?>/
						<?php echo $data->images ?>">
						</div>

						<div class="text-left content-static">
						<?php echo $data->content ?>
						</div>
						</div>

						<?php $this->load->view('sidebar_front'); ?>
						</div>
					</div>
</section>