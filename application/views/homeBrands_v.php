<section class="clients bg-silver" >
	<div class="section-title" style="height: 50px;">
		<h2>Brand'<span>s</span></h2>
		<span class="s-title-icon"><i class="icofont icofont-diamond"></i></span>
	</div>
	<div class="container ptb-10 mb-5">
		<div class="row">
			<div class="col-md-12">
				<div id="owl-clients-6" class="owl-carousel clients-logo text-center">
					<?php foreach ($brandsAll as $brands) { ?>
						<div class="item">
							<a href="<?=$brands->brandsLink?>"><img  alt="" src="<?=base_url()?>admin/uploads/<?=$brands->brandsImage?>"></a>
						</div>
					<?php	} ?>
				</div>
			</div>
		</div>
	</div>
</section>