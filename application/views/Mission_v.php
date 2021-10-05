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
			<h2>Mission</h2>
			<div class="breadcrumb">
				<ul>
					<li><a href="<?=base_url("Mission")?>">Home</a></li>
					<li>Mission</li>
				</ul>
			</div>
		</div>
	</div>
</div>
</section>

<section id="about" class="about section-padding-top" style="margin-bottom: 120px;">
	<div class="container">
		<div class="section-title">
			<h2>Missi <span>on</span></h2>
			<span class="s-title-icon"><i class="icofont icofont-diamond"></i></span>
		</div>
		<div class="row">
			<!-- About image -->
			<div class="col-md-6">
				<a href="#" class="img-about">
					<img src="<?=base_url()?>Admin/uploads/<?=$mission[0]->missionImage?>" alt="" class="img-responsive">
				</a>
			</div>
			<div class="col-md-6">
				<!-- About text-->
				<div class="about-details">
					<h5><?=$mission[0]->missionTitle?></h5>
					<p><?=$mission[0]->missionContent?></p>
<!-- 						<ul class="image-contact-list">
							<li><i class="icofont icofont-speech-comments"></i> <span> Reliable and Secure Platform</span></li>
							<li><i class="icofont icofont-package"></i> <span>Everything is perfectly organized</span></li>
							<li><i class="icofont icofont-settings"></i> <span>Simple Line Icon</span></li>
							<li><i class="icofont icofont-gift"></i> <span>Step on the new level</span></li>

						</ul> -->
						<!-- 	<a class="btn btn-default btn-style hvr-shutter-out-vertical" href="#">Read More</a> -->
					</div>
					<!-- /About text -->
				</div>
			</div>
		</div>
	</section>

	<?php $this->load->view("homeFooter_v") ?>
	<!-- ==== footer section end ==== -->

	<!-- All JS Here -->
	<?php $this->load->view("homeBottomFooter_v") ?>