<!--TOP HEADER (topHeader.php) -->
<?php $this->load->view("topHeader.php") ?>
<!-- END TOP HEADER (topHeader.php) -->


<div class="wrapper">

	<!-- HEADER (Header.php) -->
	<?php $this->load->view("Header.php") ?>
	<!-- END HEADER (Header.php) -->

	<!-- Sidebar -->
	<?php $this->load->view("sideBar.php") ?>
	<!-- End Sidebar -->

	<div class="main-panel">
		<div class="content">
			<div class="panel-header bg-primary-gradient">
				<div class="page-inner py-5">
					<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
						<div>
							<h2 class="text-white pb-2 fw-bold">Yönetim Paneli</h2>
							<h5 class="text-white op-7 mb-2">Merhaba <span style="color:#FFF; font-weight: 999;"><b><?=$admin->adminName?></b>,<br></span>Sol Menüden Dilediğin Ayarları Düzenleyebilirsin.</h5>
						</div>

					</div>
				</div>
			</div>
			
			<div class="page-inner mt--5">
				<div class="row">
					<div class="col-sm-6 col-md-4">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-primary bubble-shadow-small">
											<i class="flaticon-web"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Slaytlar</p>
											<h4 class="card-title"><?= $this->sm->count("tblSlider", array());?> Adet</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-info bubble-shadow-small">
											<i class="flaticon-profile-1"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Ekibimiz</p>
											<h4 class="card-title"><?= $this->sm->count("tblTeam", array());?> Adet</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-success bubble-shadow-small">
											<i class="flaticon-chat-8"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Müşteri Yorumları</p>
											<h4 class="card-title"><?= $this->sm->count("tblclientComment", array());?> Adet</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-secondary bubble-shadow-small">
											<i class="flaticon-network"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Projeler</p>
											<h4 class="card-title"><?= $this->sm->count("tblProject", array());?> Adet</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-primary bubble-shadow-small">
											<i class="flaticon-suitcase"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Referanslar</p>
											<h4 class="card-title"><?= $this->sm->count("tblbrands", array());?> Adet</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-info bubble-shadow-small">
											<i class="flaticon-cloud"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Hizmetler</p>
											<h4 class="card-title"><?= $this->sm->count("tblServices", array());?> Adet</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-success bubble-shadow-small">
											<i class="flaticon-round"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Sıkça Sorulan Sorular</p>
											<h4 class="card-title"><?= $this->sm->count("tblFaq", array());?> Adet</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-secondary bubble-shadow-small">
											<i class="flaticon-picture"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Albüm</p>
											<h4 class="card-title"><?= $this->sm->count("tblAlbums", array());?> Adet</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-primary bubble-shadow-small">
											<i class="flaticon-play-button-1"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Videolar</p>
											<h4 class="card-title"><?= $this->sm->count("tblVideos", array());?> Adet</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-info bubble-shadow-small">
											<i class="flaticon-file-1"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Sayfalar</p>
											<h4 class="card-title"><?= $this->sm->count("tblPages", array());?> Adet</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-success bubble-shadow-small">
											<i class="flaticon-presentation"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">İstatistikler</p>
											<h4 class="card-title"><?= $this->sm->count("tblCounter", array());?> Adet</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-secondary bubble-shadow-small">
											<i class="flaticon-interface-6"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Haberler</p>
											<h4 class="card-title"><?= $this->sm->count("tblNews", array());?> Adet</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-primary bubble-shadow-small">
											<i class="flaticon-users"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Aboneler</p>
											<h4 class="card-title"><?= $this->sm->count("tblSubscribers", array());?> Adet</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-info bubble-shadow-small">
											<i class="flaticon-message"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Gelen Mesajlar</p>
											<small>Okunmamış :</small>
											<?=$this->sm->count("tblMessages",array("messagesStatus" => 0))?> Adet
											<h4 class="card-title"><?= $this->sm->count("tblMessages", array());?> Adet</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-success bubble-shadow-small">
											<i class="flaticon-settings"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Ayarlar</p>
											<a href="<?=base_url("Settings")?>"><h4 class="card-title">Ayarlara Git</h4></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>		<!-- // ROW BİTİŞ -->





			</div>		

		</div>

		<!-- FOOTER -->
		<?php $this->load->view("footer.php") ?>
		<!-- END FOOTER -->

		
	</div>

	<!-- Custom template | don't include it in your project! -->
	<!-- <div class="custom-template">
		<div class="title">Settings</div>
		<div class="custom-content">
			<div class="switcher">
				<div class="switch-block">
					<h4>Logo Header</h4>
					<div class="btnSwitch">
						<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
						<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
						<br/>
						<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
					</div>
				</div>
				<div class="switch-block">
					<h4>Navbar Header</h4>
					<div class="btnSwitch">
						<button type="button" class="changeTopBarColor" data-color="dark"></button>
						<button type="button" class="changeTopBarColor" data-color="blue"></button>
						<button type="button" class="changeTopBarColor" data-color="purple"></button>
						<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
						<button type="button" class="changeTopBarColor" data-color="green"></button>
						<button type="button" class="changeTopBarColor" data-color="orange"></button>
						<button type="button" class="changeTopBarColor" data-color="red"></button>
						<button type="button" class="changeTopBarColor" data-color="white"></button>
						<br/>
						<button type="button" class="changeTopBarColor" data-color="dark2"></button>
						<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
						<button type="button" class="changeTopBarColor" data-color="purple2"></button>
						<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
						<button type="button" class="changeTopBarColor" data-color="green2"></button>
						<button type="button" class="changeTopBarColor" data-color="orange2"></button>
						<button type="button" class="changeTopBarColor" data-color="red2"></button>
					</div>
				</div>
				<div class="switch-block">
					<h4>Sidebar</h4>
					<div class="btnSwitch">
						<button type="button" class="selected changeSideBarColor" data-color="white"></button>
						<button type="button" class="changeSideBarColor" data-color="dark"></button>
						<button type="button" class="changeSideBarColor" data-color="dark2"></button>
					</div>
				</div>
				<div class="switch-block">
					<h4>Background</h4>
					<div class="btnSwitch">
						<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
						<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
						<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
						<button type="button" class="changeBackgroundColor" data-color="dark"></button>
					</div>
				</div>
			</div>
		</div>
		<div class="custom-toggle">
			<i class="flaticon-settings"></i>
		</div>
	</div> -->
	<!-- End Custom template -->
</div>
<!--   Core JS Files   -->


<!-- BOTTOM FOOTER -->
<?php $this->load->view("bottomFooter.php") ?>
<!-- END BOTTOM FOOTER