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
<section class="page-title bg-opacity section-padding" style="background: rgba(0,0,0,0) url(<?=base_url()?>uploads/counterBg/counter.jpg);
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
			<h2>Contact</h2>
			<div class="breadcrumb">
				<ul>
					<li><a href="<?=base_url("Home")?>">Home</a></li>
					<li>Contact</li>
				</ul>
			</div>
		</div>
	</div>
</div>
</section>


<section class="section-padding">
	<div class="container">
		<div class="section-title">
			<h2>Contact <span>Us</span></h2>
			<span class="s-title-icon"><i class="icofont icofont-diamond"></i></span>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="contact-info text-center">
					<span><i class="fa fa-map-marker"></i></span>
					<h4>Our Address</h4>
					<h6><?=$settings->siteAdress?></h6>
				</div>
			</div>
			<div class="col-md-3">
				<div class="contact-info text-center">
					<span><i class="fa fa-phone" aria-hidden="true"></i></span>
					<h4>Call Us</h4>
					<h6><?=$settings->sitePhone?>
					</h6>
				</div>
			</div>
			<div class="col-md-3">
				<div class="contact-info text-center">
					<span><i class="fa fa-map-marker"></i></span>
					<h4>Email Us</h4>
					<h6><?=$settings->siteMail?></h6>
				</div>
			</div>
			<div class="col-md-3">
				<div class="contact-info text-center">
					<span><i class="fa fa-globe" aria-hidden="true"></i></span>
					<h4>Our Website</h4>
					<h6>www.erdemdoganay.xyz</h6>
				</div>
			</div>
		</div>
		<div class="row padding-60">
			<div class="col-md-7 contact-team">
				<h3 class="text-center">Contact <span>Our Team</span></h3>
				<div class="contact-send-message">
					<form class="contact-form row" action="<?=base_url("Contact/insertMessages")?>" method="POST">
						<div class="col col-sm-6">
							<input type="text" class="form-control" name="messagesName" placeholder="Enter Name*">
						</div>
						<div class="col col-sm-6">
							<input type="email" class="form-control" name="messagesMail" placeholder="Enter E-mail*">
						</div>
						<div class="col col-sm-6">
							<input type="text" class="form-control" name="messagesSubject" placeholder="Enter Subject*">
						</div>
						<div class="col col-sm-6">
							<input type="text" class="form-control" name="messagesPhone" placeholder="Enter Phone*">
						</div>
						<div class="col col-sm-12">
							<textarea class="form-control" name="messagesContent" placeholder="Enter Your Message*"></textarea>
						</div>
						<div class="col col-sm-12 text-center">
							<button type="submit" class="btn btn-default btn-style hvr-shutter-out-vertical">Send Message</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-5">
				<div id="map" class="thumbnail" >
					<?=$settings->siteMaps?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $this->load->view("homeFooter_v") ?>
<!-- ==== footer section end ==== -->

<!-- All JS Here -->
<?php $this->load->view("homeBottomFooter_v") ?>