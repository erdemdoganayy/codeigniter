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
			<h2><?=$pagesDetail->pagesTitle?></h2>
			<div class="breadcrumb">
				<ul>
					<li><a href="<?=base_url("Home")?>">Home</a></li>
					<li>Pages</li>
				</ul>
			</div>
		</div>
	</div>
</div>
</section>


<section class="blog-details-post section-padding">
	<div class="container">
		<div class="row">
			<div class="col col-lg-12">
				<div class="post-content">
					<div class="blog-grids-s2 blog-content-wrapper">
					</div>
					<div class="entry-body">
						<?=$pagesDetail->pagesContent?>

					</div>

				</div>
			</div>



		</div> <!-- end row -->
	</div> <!-- end container -->
</section>

<?php $this->load->view("homeFooter_v") ?>
<!-- ==== footer section end ==== -->

<!-- All JS Here -->
<?php $this->load->view("homeBottomFooter_v") ?>