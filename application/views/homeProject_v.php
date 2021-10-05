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