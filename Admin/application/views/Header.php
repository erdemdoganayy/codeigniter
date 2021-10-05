<div class="main-header">
	<!-- Logo Header -->
	<div class="logo-header" data-background-color="blue">

		<a href="<?= base_url("Home"); ?>" class="logo">
			<img width="150" height="50px;" src="<?= base_url(); ?>uploads/<?=$settings->siteLogo?>" alt="navbar brand" class="navbar-brand">
		</a>
		<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon">
				<i class="icon-menu"></i>
			</span>
		</button>
		<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
		<div class="nav-toggle">
			<button class="btn btn-toggle toggle-sidebar">
				<i class="icon-menu"></i>
			</button>
		</div>
	</div>
	<!-- End Logo Header -->

	<!-- Navbar Header -->
	<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

		<div class="container-fluid">
			<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
<!-- 				<li class="nav-item toggle-nav-search hidden-caret">
					<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
						<i class="fa fa-search"></i>
					</a>
				</li> -->
				<li class="nav-item dropdown hidden-caret">
					<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-bell"></i>
						<span class="notification"><?=$countSubs?></span>
					</a>
					<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
						<li>
							<div class="dropdown-title"><?=$countSubs?> Yeni Abone</div>
						</li>
						<li>
							<div class="notif-center">
								<?php foreach ($subcribes as $countSubscribers) { ?>
									<a href="<?=base_url("Subscribers")?>">
										<div class="notif-icon notif-success"> <i style="font-size: 25px;" class="flaticon-add-user"></i> </div>
										<div class="notif-content">
											<span class="block">
												<?=$countSubscribers->subscribersMail?>
											</span>
											<?php 
											$tarih=$countSubscribers->subscribersCreatedAt;
											echo $trtarih=date('d-m-Y',strtotime($tarih));
											?>
											<span class="time"><?= XZamanOnce($trtarih);?></span> 
										</div>
									</a>
								<?php	} ?>
							</div>
						</li>
						<li>
							<a class="see-all" href="<?=base_url("Subcribers")?>">Tüm Aboneleri Gör<i class="fa fa-angle-right"></i> </a>
						</li>
					</ul>
				</li>
				<!-- MESAJ -->
				<li class="nav-item dropdown hidden-caret submenu">
					<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-envelope"></i>
						<span class="notification"><?=$count?></span>
					</a>
					<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
						<li>
							<div class="dropdown-title d-flex justify-content-between align-items-center">
								<?=$count?> Yeni Mesaj								
								<!-- <a href="#" class="small">Mark all as read</a> -->
							</div>
						</li>
						<li>

							<div class="scroll-wrapper message-notif-scroll scrollbar-outer" style="position: relative;"><div class="message-notif-scroll scrollbar-outer scroll-content scroll-scrolly_visible" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 250px;">
								<div class="notif-center">

									<?php foreach ($messages as $message) { ?>
										<a href="<?=base_url("Messages")?>">
											<div class="notif-img"> 
												<i class="flaticon-user-1 fa-2x"></i>
											</div>
											<div class="notif-content">
												<span class="subject"><?=$message->messagesSubject?></span>
												<span class="block">
													<?=substr($message->messagesContent,0,15)?>.. ?
												</span>
												<?php 
												$tarih=$message->messagesCreatedAt;
												echo $trtarih=date('d-m-Y',strtotime($tarih));
												?>
												<span class="time"><?= XZamanOnce($trtarih);?></span> 
											</div>
										</a>
									<?php  } ?>

								</div>
							</div><div class="scroll-element scroll-x scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle" style="width: 86px;"></div></div></div><div class="scroll-element scroll-y scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle" style="height: 195px; top: 0px;"></div></div></div></div>
						</li>
						<li>
							<a class="see-all" href="<?=base_url("Messages")?>">Tüm Mesajları Gör<i class="fa fa-angle-right"></i> </a>
						</li>
					</ul>
				</li>
				<!-- / MESAJ -->
				<li class="nav-item dropdown hidden-caret">
					<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
						<div class="avatar-sm">
							<img src="<?= base_url(); ?>uploads/<?=$admin->adminImage?>" alt="..." class="avatar-img rounded-circle">
						</div>
					</a>
					<ul class="dropdown-menu dropdown-user animated fadeIn">
						<div class="dropdown-user-scroll scrollbar-outer">
							<li>
								<div class="user-box">
									<div class="avatar-lg"><img src="<?= base_url(); ?>uploads/<?=$admin->adminImage?>" alt="image profile" class="avatar-img rounded"></div>
									<div class="u-text">
										<h4><?=$admin->adminName?></h4>
										<p class="text-muted"><?=$admin->adminMail?></p><a href="<?=base_url("Profile")?>" class="btn btn-xs btn-secondary btn-sm">Profili Gör</a>
									</div>
								</div>
							</li>
							<li>

								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?=base_url("Login/logout")?>"><i class="fas fa-sign-out-alt">    Çıkış</i></a>
							</li>
						</div>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<!-- End Navbar -->
</div>