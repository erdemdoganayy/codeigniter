<section id="service" class="service section-padding-top">
	<div class="container">
		<div class="section-title">
			<h2>Our <span>Services</span></h2>
			<span class="s-title-icon"><i class="icofont icofont-diamond"></i></span>
		</div>
		<div class="row content service-grid-s1">
			<!-- single serivce-->
			<?php foreach ($services as $service) { ?>
				<div class="col-md-4 col-sm-6">
					<div class="grid">
						<div class="icon">
							<i class="<?=$service->servicesIcon?>"></i>
						</div>
						<div class="details">
							<h3><a href="javascript:void(0)"><?=$service->servicesTitle?></a></h3>
							<p><?=$service->servicesContent?></p>
						</div>
					</div>
				</div>
			<?php	} ?>
			<!-- single serivce-->

		</div>
	</div>
</section>