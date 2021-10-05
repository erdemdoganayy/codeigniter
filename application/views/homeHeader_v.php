<body>
	<header>
		<div class="hidden-xs hidden-sm nav-top primary-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="nav-top-access">
							<!-- Social links -->
							<ul>
								<li><i class="fa fa-phone"></i> <?=$settings->sitePhone?></li>
								<li><i class="fa fa-envelope" aria-hidden="true"></i>  <?=$settings->siteMail?></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 text-right">
						<div class="nav-top-social">

							<ul>
								<?php foreach ($social as $socials) { ?>
									<li><a href="<?=$socials->socialLink?>"><i class="<?=$socials->socialIcon?>"></i></a></li>
								<?php	} ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="menu-area">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="logo">
							<!--== change the logo name ==-->
							<a href="index.php">
								<img src="<?=base_url()?>admin/uploads/<?=$settings->siteLogo?>">
							</a>
						</div>
						<!-- Responsive Menu Start -->
						<div class="responsive-menu"></div>
						<!-- Responsive Menu End -->
					</div>
					<div class="col-md-9 col-sm-12">
						<div class="mainmenu">
							<nav>
								<ul id="navigation">
									<li>
										<a href="about.html">
											Home
										</a>
									</li>
									<li >
										<a href="javascript:void(0)">Company</a>
										<ul>
											<li><a href="<?=base_url("AboutUs")?>">About Us</a></li>
											<li><a href="<?=base_url("Mission")?>">Mission</a></li>
											<li><a href="<?=base_url("Vision")?>">Vision</a></li>

										</ul>
									</li>
									<li>
										<a href="<?=base_url("Services")?>">Services</a>
									</li>
									<li>
										<a href="<?=base_url("Project")?>">Projects</a>
									</li>
									<li>
										<a href="<?=base_url("News")?>">News</a>
									</li>
									<li>
										<a href="javascript:void(0)">Multimedia</a>
										<ul>
											<li><a href="<?=base_url("Albums")?>">Gallery</a></li>
											<li><a href="<?=base_url("Videos")?>">Videos</a></li>
										</ul>
									</li>
									<li>
										<a href="<?=base_url("Faq")?>">FAQ</a>
									</li>
									<li><a href="<?=base_url("Contact")?>">Contact</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>