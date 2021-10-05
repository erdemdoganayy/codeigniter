<div class="sidebar sidebar-style-2">			
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="<?=base_url(); ?>uploads/<?=$admin->adminImage?>" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							<?=$admin->adminName?>
							<span class="user-level">Yönetici</span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="#profile">
									<span class="link-collapse">Siteye Git</span>
								</a>
							</li>
							<li>
								<a href="#edit">
									<span class="link-collapse">Profili Gör</span>
								</a>
							</li>
			
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav nav-primary">
				<li class="nav-item <?=$url == "home" ? "active" : ""; ?>">
					<a href="<?=base_url("Home"); ?>">
						<i class="fas fa-home"></i>
						<p>Anasayfa</p>
					</a>
				</li>
				<li class="nav-item <?=$url == "settings" ? "active" : ""; ?>">
					<a href="<?=base_url("Settings"); ?>">
						<i class="fas fa-cogs"></i>
						<p>Genel Ayarlar</p>
					</a>
				</li>

				<li class="nav-item <?=$url == "aboutUs" ? "active" : ""  ?>">
					<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
						<i class="fas fa-briefcase"></i>
						<p>Kurumsal</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="dashboard">
						<ul class="nav nav-collapse">
							<li>
								<a href="<?=base_url("aboutUs")?>">
									<span class="sub-item">Hakkımızda</span>
								</a>
							</li>
							<li>
								<a href="<?=base_url("Mission")?>">
									<span class="sub-item">Misyonumuz</span>
								</a>
							</li>
							<li>
								<a href="<?=base_url("Vision")?>">
									<span class="sub-item">Vizyonumuz</span>
								</a>
							</li>
						</ul>
					</div>
				</li>


				<li class="nav-item <?=$url == "sliders" ? "active" : ""; ?>">
					<a href="<?=base_url("Sliders"); ?>">
						<i class="fas fa-image"></i>
						<p>Slider</p>
					</a>
				</li>
				<li class="nav-item <?=$url == "team" ? "active" : ""; ?>">
					<a href="<?=base_url("Team"); ?>">
						<i class="fas fa-users"></i>
						<p>Ekibimiz</p>
					</a>
				</li>
				<li class="nav-item <?=$url == "project" ? "active" : ""; ?>">
					<a href="<?=base_url("Project"); ?>">
						<i class="fas fa-project-diagram"></i>
						<p>Projeler</p>
					</a>
				</li>
				<li class="nav-item <?=$url == "comment" ? "active" : ""; ?>">
					<a href="<?=base_url("clientComment"); ?>">
						<i class="fas fa-comments"></i>
						<p>Müşteri Yorumları</p>
					</a>
				</li>
				<li class="nav-item <?=$url == "brands" ? "active" : ""; ?>">
					<a href="<?=base_url("Brands"); ?>">
						<i class="fas fa-feather-alt"></i>
						<p>Referanslar</p>
					</a>
				</li>
				<li class="nav-item <?=$url == "services" ? "active" : ""; ?>">
					<a href="<?=base_url("Services"); ?>">
						<i class="fab fa-cloudversify"></i>
						<p>Hizmetler</p>
					</a>
				</li>
				<li class="nav-item <?=$url == "faq" ? "active" : ""; ?>">
					<a href="<?=base_url("Faq"); ?>">
						<i class="fas fa-question-circle"></i>
						<p>Sıkça Sorulan Sorular</p>
					</a>
				</li>
				<li class="nav-item <?=$url == "albums" ? "active" : ""; ?>">
					<a href="<?=base_url("Albums"); ?>">
						<i class="far fa-images"></i>
						<p>Albüm</p>
					</a>
				</li>
				<li class="nav-item <?=$url == "videos" ? "active" : ""; ?>">
					<a href="<?=base_url("Videos"); ?>">
						<i class="fas fa-video"></i>
						<p>Videolar</p>
					</a>
				</li>
				<li class="nav-item <?=$url == "pages" ? "active" : ""; ?>">
					<a href="<?=base_url("Pages"); ?>">
						<i class="fa fa-list"></i>
						<p>Sayfalar</p>
					</a>
				</li>
				<li class="nav-item <?=$url == "counter" ? "active" : ""; ?>">
					<a href="<?=base_url("Counter"); ?>">
						<i class="fas fa-sort-amount-up"></i>
						<p>İstatistikler</p>
					</a>
				</li>
					<li class="nav-item <?=$url == "news" ? "active" : ""; ?>">
					<a href="<?=base_url("News"); ?>">
						<i class="fas fa-newspaper"></i>
						<p>Haberler</p>
					</a>
				</li>
				<li class="nav-item <?=$url == "subcribers" ? "active" : ""; ?>">
					<a href="<?=base_url("Subscribers"); ?>">
						<i class="fas fa-users"></i>
						<p>Aboneler</p>
					</a>
				</li>
				<li class="nav-item <?=$url == "meesages" ? "active" : ""; ?>">
					<a href="<?=base_url("Messages"); ?>">
						<i class="fas fa-envelope"></i>
						<p>Gelen Mesajlar</p>
					</a>
				</li>
				
				
			</ul>
		</div>
	</div>
</div>