	<footer class="footer-bg section-padding-top footer">
		<div class="footer-widget-area">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="f-widget">
							<a href="index.html">
								<!-- Change the logo here-->
								<img src="<?=base_url()?>admin/uploads/<?=$settings->siteLogo?>">
							</a>
							<p class="m-t-30"><?=substr($aboutUs[0]->aboutUsContent, 0,180)?>   <a style="color:#0E60B7" href="<?=base_url("AboutUs")?>">  ...More</a></p>
							<ul class="f-address">
								<li><i class="fa fa-map-marker" aria-hidden="true"></i><?=$settings->siteAdress?></li>
								<li><i class="fa fa-phone"></i> <?=$settings->sitePhone?></li>
								<li><i class="fa fa-envelope" aria-hidden="true"></i>  <?=$settings->siteMail?></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3">
						<div class="f-widget">
							<div class="f-widget-title">
								<h4>Pages Links</h4>
							</div>
							<ul class="useful-links">
								<?php foreach ($page as $pages) { ?>
									<li><i class="<?=$pages->pagesIcon?>" aria-hidden="true"></i> <a href="<?=base_url("Pages/PagesDetail/").$pages->pagesID?>"><?=$pages->pagesTitle?></a></li>
								<?php	} ?>
							</ul>
						</div>
					</div>
					<div class="col-md-3">
						<div class="f-widget">
							<div class="f-widget-title">
								<h4>Projects</h4>
							</div>
							<ul class="instagram-widget">
								<?php foreach ($project as $projects) { ?>
									<li><a href="<?=$projects->projectLink?>"><img src="<?=base_url()?>admin/uploads/<?=$projects->projectImage?>" alt="" class="img-responsive"></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<div class="col-md-3">
						<div class="f-widget">
							<div class="f-widget-title">
								<h4>Subscribers</h4>
							</div>
							<p>Subscribe to our MailChimp newsletter and stay up to date with all events coming straight in your mailbox:</p>
							<div class="newsletter">
									<form action="<?=base_url("Subscribers/insertSubscribers")?>" method="POST">
								<div class="input-group">
										<input type="email" name="subs" class="form-control" placeholder="Your email Address" aria-label="Search for..." autocomplete="off">
										<span class="input-group-btn">
											<button class="btn newsletter-btn" type="submit"><i class="fa Example of paper-plane fa-paper-plane"></i></button>
										</span>
								</div>
									</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright-area">
			<div class="container">
				<div class="row text-center">
					<div class="copyright-social">
						<ul class="social-profile">
							<?php foreach ($social as $socials) { ?>
								<li><a href="<?=$socials->socialLink?>"><i class="<?=$socials->socialIcon?>"></i></a></li>
							<?php	} ?>
						</ul>
					</div> 
					<div class="copyright-text">
						<p><?=$settings->siteFooter?></p>
					</div>
				</div>
			</div>
		</div>
	</footer>