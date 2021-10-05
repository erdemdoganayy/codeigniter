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
			<h2>FAQ</h2>
			<div class="breadcrumb">
				<ul>
					<li><a href="<?=base_url("Faq")?>">Home</a></li>
					<li>FAQ</li>
				</ul>
			</div>
		</div>
	</div>
</div>
</section>


<section class="section-padding">
	<div class="container">
		<div class="row">

			<div class="col-md-7 col-xs-12">
				<div class="panel-group accordion-s1" id="accordion">
					<?php foreach ($faq as $faqs) { ?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#<?=$faqs->faqID?>" aria-expanded="true"><i class="<?=$faqs->faqIcon?>"></i>  <?=$faqs->faqTitle?></a>
							</div>
							<div id="<?=$faqs->faqID?>" class="panel-collapse collapse <?=($faqs->faqRank == 0) ? "in" : ""?>">
								<div class="panel-body">
									<p><?=$faqs->faqContent?></p>
								</div>
							</div>
						</div>
					<?php	} ?>
				</div>
			</div>
			<div class="col-md-5 col-xs-12">
				<div class="faq-text text-center">
					<h1>FAQ</h1>
					<h5><span>F</span>requently <span>A</span>sked <span>Q</span>uestions</h5>
				</div>
			</div>
		</div> <!-- end row -->

	</div>
</section>






<?php $this->load->view("homeFooter_v") ?>
<!-- ==== footer section end ==== -->

<!-- All JS Here -->
<?php $this->load->view("homeBottomFooter_v") ?>