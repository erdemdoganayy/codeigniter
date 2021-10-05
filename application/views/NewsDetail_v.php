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
			<h2><?=$news->newsTitle?></h2>
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


<section class="blog-details-post section-padding">
	<div class="container">
		<div class="row">
			<div class="col col-lg-9">
				<div class="post-content">
					<div class="blog-grids-s2 blog-content-wrapper">
						<div class="entry-media">
							<img src="<?=base_url()?>admin/uploads/<?=$news->newsImage?>" alt="" class="img img-responsive">
						</div>
						<div class="entry-header">
							<div class="entry-meta">
								<ul>
									<li><i class="fa fa-user"></i>Post by: <a href="#">admin</a></li>
									<li><i class="fa fa-calendar"></i> <a href="#"><?=$news->newsCreatedAt?></a></li>
								</ul>
							</div>
							<div class="entry-title">
								<h2><?=$news->newsTitle?></h2>
							</div>
						</div>
					</div>
					<div class="entry-body">
						<p><?=$news->newsContent?></p>

					</div>
					<div class="tag-social-share">
						<div class="tag">

							<?php 
							$explode = explode("," ,$news->newsSeoTags);
							foreach ($explode as $data) { ?>
								<a href="javascript:void(0)">#<?=$data ?></a>
							<?php }
							?>
						</div>
						<div class="social-share">
							<span>Share:</span>
							<ul class="social-links">
								<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?=base_url("News/NewsDetail/").$news->newsID?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li>
									<a href="https://twitter.com/share?url=<?=base_url("News/NewsDetail/").$news->newsID?>"target="_blank" title="Share on Twitter"><i class="fa fa-twitter"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>


				<div class="col col-lg-3">
					<div class="blog-sidebar">
						<div class="widget recent-posts-widget">
							<h3>Recent posts</h3>
							<div class="post">
								<?php foreach ($newsAll as $data ) { ?>
									<a href="<?=base_url("News/NewsDetail/").$data->newsID?>"><img width="200px;" src="<?=base_url()?>admin/uploads/<?=$data->newsImage?>"></a><br>
									<h4><a href="<?=base_url("News/NewsDetail/").$data->newsID?>"><?=$data->newsTitle?></a></h4>
									<span class="date"><?=$data->newsCreatedAt?></span>
								<?php	} ?>
							</div>
						</div>
						<div class="widget tags-widget">
							<h3>Tags Clouds</h3>
							<div>
								<?php 
								$explode = explode("," ,$news->newsSeoTags);
								foreach ($explode as $data) { ?>
									<a href="javascript:void(0)">#<?=$data ?></a>
								<?php }
								?>
							</div>
						</div>
						<div class="widget subscribe search-widget">
							<h3>Subscribe</h3>
							<p>Lorem ipsum dolor sit amet, conse ctetur adipisicing</p>
							<form class="form"  action="<?=base_url("Subscribers/insertSubscribersNews")?>" method="POST">
								<input type="hidden" name="newsID" value="<?=$news->newsID?>">
								<div>
									<input type="email" name="subs" class="form-control" placeholder="Enter your email here...">
									<button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
								</div>
							</form>
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