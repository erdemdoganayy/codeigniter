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
			<h2>News</h2>
			<div class="breadcrumb">
				<ul>
					<li><a href="<?=base_url("Home")?>">Home</a></li>
					<li>News</li>
				</ul>
			</div>
		</div>
	</div>
</div>
</section>


<section class="blog-main-section section-padding">
	<div class="container">
		<div class="row">
			<div class="col col-lg-12">
				<div class="blog-grids-s2 blog-content-wrapper">
					<div class="row">
						<?php foreach ($news as $new) { ?>
							<div class="col-md-6 m-b-30">
								<div class="grid">
									<div class="entry-header">
										<a href="<?=base_url("News/NewsDetail/").$new->newsID?>"><img src="<?=base_url()?>admin/uploads/<?=$new->newsImage?>" alt="" class="img img-responsive"></a>
									</div>
									<div class="entry-body">
										<div class="entry-meta">
											<ul>
												<li><i class="fa fa-user"></i>Post by: <a href="#">admin</a></li>
												<li><i class="fa fa-calendar"></i> <a href="#"><?=$new->newsCreatedAt?></a></li>
											</ul>
										</div>
										<div class="entry-details">
											<h3><a href="<?=base_url("News/NewsDetail/").$new->newsID?>"><?=$new->newsTitle?></a></h3>
											<p><?=substr($new->newsContent, 0,200)?></p>
											<a href="<?=base_url("News/NewsDetail/").$new->newsID?>">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>

	</div> <!-- end container -->
</section>

<?php $this->load->view("homeFooter_v") ?>
<!-- ==== footer section end ==== -->

<!-- All JS Here -->
<?php $this->load->view("homeBottomFooter_v") ?>