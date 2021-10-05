<section id="team" class="section-padding">
	<div class="container">
		<div class="section-title">
			<h2>Our Best <span>Team</span></h2>
			<span class="s-title-icon"><i class="icofont icofont-diamond"></i></span>
		</div>
		<div class="row">
			<!-- Single team item-->  
			<?php foreach ($team as $teams) { ?>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="team-single text-center m-b-30">
						<div class="team-img">
							<img height="360" src="<?=base_url()?>admin/uploads/<?=$teams->teamImage?>" alt="">
							<ul>
								<li><a href="<?=$teams->teamFacebook?>"><i class="fa fa-facebook"></i></a></li>
								<li><a href="<?=$teams->teamTwitter?>"><i class="fa fa-twitter"></i></a></li>
								<li><a href="<?=$teams->teamLinkedin?>"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="<?=$teams->teamGoogle?>"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
						<div class="team-content">
							<h3><a href="single-team-page.html"><?=$teams->teamName?></a></h3>
							<span><?=$teams->teamDegree?></span>
						</div>
					</div>
				</div>
			<?php	} ?>
			<!-- Single team item-->  
		</div>
	</div>
</section>