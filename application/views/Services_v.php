<?php $this->load->view("topHeader") ?>
<!-- ==== Preloader start ==== -->
<!-- <div id="loader-wrapper">
	<div id="loader"></div>
	<div class="loader-section section-left"></div>
	<div class="loader-section section-right"></div>
</div> -->
<!-- ==== Preloader end ==== -->
<!-- Header start -->
<?php $this->load->view("homeHeader_v") ?>

<section class="page-title bg-opacity section-padding" style="background: rgba(0,0,0,0) url(uploads/counterBg/counter.jpg);
background-clip: initial;
background-color: rgba(255,255,255,0);
background-origin: initial;
background-position: center;
background-repeat: no-repeat;
background-size: cover;
position: relative;
z-index: 0;">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Services</h2>
			<div class="breadcrumb">
				<ul>
					<li><a href="<?=base_url("Home")?>">Services</a></li>
					<li>Services</li>
				</ul>
			</div>
		</div>
	</div>
</div>
</section>

<section id="about" class="about section-padding-top" style="margin-bottom: 120px;">
	<div class="container">
		<div class="section-title">
			<h2>Servic <span>es</span></h2>
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

<?php $this->load->view("homeFooter_v") ?>
<!-- ==== footer section end ==== -->

<!-- All JS Here -->
<?php $this->load->view("homeBottomFooter_v") ?>