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
			<h2>Project</h2>
			<div class="breadcrumb">
				<ul>
					<li><a href="<?=base_url("Home")?>">Home</a></li>
					<li>Project</li>
				</ul>
			</div>
		</div>
	</div>
</div>
</section>
<section class="section-padding gray-brackground" id="portfolio">
	<div class="container">
		<div class="section-title">
			<h2>Our <span>Project</span></h2>
			<span class="s-title-icon"><i class="icofont icofont-diamond"></i></span>
		</div>
		<div class="portfolio-content">
			<?php foreach ($project as $projects) { ?>
				<div class="portfolio portfolio-gutter portfolio-style-2 portfolio-container portfolio-masonry portfolio-column-count-4 ">
					<!-- Single portfolio item -->
					<div class="portfolio-item cat1 cat3">
						<div class="portfolio-item-content">
							<div class="item-thumbnail">
								<!-- Change the dummy image -->
								<img src="<?=base_url()?>admin/uploads/<?=$projects->projectImage?>" alt="">
							</div>
							<div class="portfolio-description">
								<h4><a href="<?=$projects->projectTitle?>" ><?=$projects->projectTitle?></a></h4>

								<!-- Change the dummy image -->
								<a href="<?=base_url()?>admin/uploads/<?=$projects->projectImage?>" class="portfolio-gallery-set"><i class="fa fa-search-plus"></i></a><a target="_blank" href="<?=$projects->projectLink?>"><i class="fa fa-link"></i></a>
							</div>                                    
						</div>
					</div>
				</div>          
			<?php	} ?>
			<div class="text-center">
				<a class="btn btn-default btn-style hvr-shutter-out-vertical" href="#">View More</a>
			</div>           
		</div>   
	</div>
</section>

<?php $this->load->view("homeFooter_v") ?>
<!-- ==== footer section end ==== -->

<!-- All JS Here -->
<?php $this->load->view("homeBottomFooter_v") ?>