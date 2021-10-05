<!--TOP HEADER (topHeader.php) -->
<?php $this->load->view("topHeader.php") ?>
<!-- END TOP HEADER (topHeader.php) -->
<style>

	.switch {
		position: relative;
		display: inline-block;
		width: 60px;
		height: 34px;
	}

	.switch input {
		opacity: 0;
		width: 0;
		height: 0;
	}

	.slider {
		position: absolute;
		cursor: pointer;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #ccc;
		-webkit-transition: .4s;
		transition: .4s;
	}

	.slider:before {
		position: absolute;
		content: "";
		height: 26px;
		width: 26px;
		left: 4px;
		bottom: 4px;
		background-color: white;
		-webkit-transition: .4s;
		transition: .4s;
	}

	input:checked + .slider {
		background-color: #2196F3;
	}

	input:focus + .slider {
		box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
		-webkit-transform: translateX(26px);
		-ms-transform: translateX(26px);
		transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
		border-radius: 34px;
	}

	.slider.round:before {
		border-radius: 50%;
	}

</style>

<div class="wrapper">

	<!-- HEADER (Header.php) -->
	<?php $this->load->view("Header.php") ?>
	<!-- END HEADER (Header.php) -->

	<!-- Sidebar -->
	<?php $this->load->view("sideBar.php") ?>
	<!-- End Sidebar -->

	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
		
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<!-- <div class="card-header">
								<h4 class="card-title">Nav Pills With Icon (Vertical Tabs)</h4>
							</div> -->
							<div class="card-body">
								<div class="row">
									<div class="col-5 col-md-2">
										<div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab-with-icon" role="tablist" aria-orientation="vertical">
											<a class="nav-link active" id="v-pills-home-tab-icons" data-toggle="pill" href="#v-pills-home-icons" role="tab" aria-controls="v-pills-home-icons" aria-selected="true">
												<i class="flaticon-imac"></i>
												Site Ayarları
											</a>
											<a class="nav-link" id="v-pills-contact-tab-icons" data-toggle="pill" href="#v-pills-contact-icons" role="tab" aria-controls="v-pills-contact-icons" aria-selected="false">
												<i class="flaticon-chat-4"></i>
												İletişim Ayarları
											</a>
											<a class="nav-link" id="v-pills-smtp-tab-icons" data-toggle="pill" href="#v-pills-smtp-icons" role="tab" aria-controls="v-pills-smtp-icons" aria-selected="false">
												<i class="flaticon-envelope-1"></i>
												Smtp Ayarları
											</a>
											<a class="nav-link" id="v-pills-lf-tab-icons" data-toggle="pill" href="#v-pills-lf-icons" role="tab" aria-controls="v-pills-lf-icons" aria-selected="false">
												<i class="flaticon-shapes-1"></i>
												Logo & Favicon Ayarları
											</a>
											<a class="nav-link" id="v-pills-sm-tab-icons" data-toggle="pill" href="#v-pills-sm-icons" role="tab" aria-controls="v-pills-sm-icons" aria-selected="false">
												<i class="flaticon-share"></i>
												Sosyal Medya Ayarları
											</a>
										</div>
									</div>
									<div class="col-7 col-md-10">
										<div class="tab-content" id="v-pills-with-icon-tabContent">
											<div class="tab-pane fade show active" id="v-pills-home-icons" role="tabpanel" aria-labelledby="v-pills-home-tab-icons">
												
												
												<form action="<?php echo base_url('settings/updateGenericSettings').'/'.$settings->siteID ?>" method="POST" enctype="multipart/form-data">
													<div class="form-group">
														<label for="">Site Title</label>
														<input type="text" name="siteTitle" value="<?php echo $settings->siteTitle; ?>" class="form-control"></input>
													</div>
													<div class="form-group">
														<label for="">Site Description</label>
														<input type="text" name="siteDescription" value="<?php echo $settings->siteDescription?>" class="form-control"></input>
													</div>
													<div class="form-group">
														<label for="">Site Author</label>
														<input type="text" name="siteAuthor" value="<?php echo $settings->siteAuthor ?>" class="form-control"></input>
													</div>
													<div class="form-group">
														<label for="">Site Keywords</label>
														<input type="text" name="siteKeywords" value="<?php echo $settings->siteKeywords  ?>" class="form-control"></input>
													</div>
													<div class="form-group">
														<label for="">Site Footer</label>
														<input type="text" name="siteFooter" value="<?php echo $settings->siteFooter  ?>" class="form-control"></input>
													</div>
													<div class="form-group text-right">
														<button type="submit" name="submitBtn" class="btn btn-primary">GÜNCELLE</button>
													</div>
												</form>

											</div>
											<div class="tab-pane fade" id="v-pills-contact-icons" role="tabpanel" aria-labelledby="v-pills-contact-tab-icons">
												<form action="<?php echo base_url('settings/updateContactSettings').'/'.$settings->siteID ?>" method="POST" enctype="multipart/form-data">

													<div class="form-group">
														<label for="">Telefon</label>
														<input type="text" name="sitePhone" value="<?php echo $settings->sitePhone;  ?>" class="form-control"></input>
													</div>
													<div class="form-group">
														<label for="">Mail</label>
														<input type="text" name="siteMail" value="<?php echo $settings->siteMail;  ?>" class="form-control"></input>
													</div>
													<div class="form-group">
														<label for="">Adres</label>
														<input type="text" name="siteAdress" value="<?php echo $settings->siteAdress;  ?>" class="form-control"></input>
													</div>
													<div class="form-group">
														<label for="">Harita</label>
														<textarea rows="5" type="text" name="siteMaps" class="form-control"><?php echo $settings->siteMaps;  ?></textarea>
													</div>

													<div class="form-group text-right">
														<button type="submit" name="submitBtn" class="btn btn-primary">GÜNCELLE</button>
													</div>
													
												</form>
											</div>


											<div class="tab-pane fade" id="v-pills-smtp-icons" role="tabpanel" aria-labelledby="v-pills-smtp-tab-icons">
												<form action="<?php echo base_url('settings/updateSmtpSettings').'/'.$settings->siteID ?>" method="POST" enctype="multipart/form-data">

													<div class="form-group">
														<label for="">Host</label>
														<input type="text" name="siteSmtpHost" value="<?php echo $settings->siteSmtpHost ?>" class="form-control"></input>
													</div>
													<div class="form-group">
														<label for="">Kullanıcı Mail</label>
														<input type="text" name="siteSmtpUserMail" value="<?php echo $settings->siteSmtpUserMail ?>" class="form-control"></input>
													</div>
													<div class="form-group">
														<label for="">Şifre</label>
														<input type="text" name="siteSmtpUserPassword" value="<?php echo $settings->siteSmtpUserPassword ?>" class="form-control"></input>
													</div>
													<div class="form-group">
														<label for="">Port</label>
														<input type="text" name="siteSmtpPort" value="<?php echo $settings->siteSmtpPort ?>" class="form-control"></input>
													</div>
													<div class="form-group">
														<label for="">Bilgilendirilecek Mail</label>
														<input type="text" name="siteSmtpNotification" value="<?php echo $settings->siteSmtpNotification ?>" class="form-control"></input>
													</div>
													
													<div class="form-group text-right">
														<button type="submit" name="submitBtn" class="btn btn-primary">GÜNCELLE</button>
													</div>
													
												</form>
											</div>
											<div class="tab-pane fade" id="v-pills-lf-icons" role="tabpanel" aria-labelledby="v-pills-lf-tab-icons">
												<form action="<?php echo base_url('settings/updateLogoSettings').'/'.$settings->siteID ?>" method="POST" enctype="multipart/form-data">

													<div class="form-group">
														<label for="">Yüklü Olan Logo</label><br>
														<img width="250" height="250" src="<?php echo base_url("uploads/").$settings->siteLogo; ?>" name="siteLogo"  class="img-thumbnail">
													</div>
													<div class="form-group">
														<input type="file" name="siteLogo" value="" class="form-control"></input>
													</div>
													<div class="form-group text-right">
														<button type="submit" name="submitBtn" class="btn btn-primary">GÜNCELLE</button>
													</div>
													
												</form>

												<form action="<?php echo base_url('settings/updateFaviconSettings').'/'.$settings->siteID ?>" method="POST" enctype="multipart/form-data">

													<div class="form-group">
														<label for="">Yüklü Olan Favicon</label><br>
														<img width="100" height="100" src="<?php echo base_url("uploads/").$settings->siteFavicon; ?>" name="siteFavicon"  class="img-thumbnail">
													</div>
													<div class="form-group">
														<input type="file" name="siteFavicon" value="" class="form-control"></input>
													</div>
													<div class="form-group text-right">
														<button type="submit" name="submitBtn" class="btn btn-primary">GÜNCELLE</button>
													</div>
													
												</form>

											</div>
											<div class="tab-pane fade" id="v-pills-sm-icons" role="tabpanel" aria-labelledby="v-pills-sm-tab-icons">
												



												
												<div class="col-md-12">
													<div class="card">
														<div class="card-header">
															<div class="d-flex align-items-center">
																<h4 class="card-title">Hesap Listesi</h4>
																<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
																	<i class="fa fa-plus"></i>
																	Yeni Ekle
																</button>
															</div>
														</div>
														<div class="card-body">

															<!-- Modal -->
															<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header no-bd">
																			<h5 class="modal-title">
																				<i class="flaticon-share"></i>
																				<span class="fw-mediumbold">
																				Hesap</span> 
																				<span class="fw-light">
																					Ekle
																				</span>
																			</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<div class="modal-body">
																			<p class="small">Yeni Hesap Oluşturmak İçin Bilgileri Eksiksiz Doldurunuz</p>
																			<!-- FORM -->
																			<form action="<?php echo base_url("settings/insertSocialSettings") ?>" method="POST">
																				<div class="row">
																					<div class="col-sm-12">
																						<div class="form-group form-group-default">
																							<label>Başlık</label>
																							<input id="addName" name="socialTitle" type="text" class="form-control" placeholder="">
																						</div>
																					</div>
																					<div class="col-md-12">
																						<div class="form-group form-group-default">
																							<label>İcon</label>
																							<input id="addPosition" type="text" class="form-control" name="socialIcon" placeholder="">
																						</div>
																					</div>
																					<div class="col-md-12">
																						<div class="form-group form-group-default">
																							<label>Link</label>
																							<input id="addOffice" type="text" class="form-control" placeholder="" name="socialLink">
																						</div>
																					</div>
																					<div class="modal-footer no-bd">
																						<button type="submit" id="addRowButton" class="btn btn-primary float-right">Ekle</button>
																						<button type="button" class="btn btn-danger float-right" data-dismiss="modal">Kapat</button>
																					</div>
																				</div>
																			</form>
																		</div>
																		<!-- /FORM -->
																		
																	</div>
																</div>
															</div>

															<div class="table-responsive">
																<table id="add-row" class="display table table-striped table-hover text-center datatable">
																	<thead>
																		<tr>
																			<th>#</th>
																			<th>İCON</th>
																			<th>BAŞLIK</th>
																			<th>LİNK</th>
																			<th>DURUM</th>
																			<th style="width: 8%">İŞLEMLER</th>
																		</tr>
																	</thead>

																	<tbody>

																		<?php
																		if ($settingsAll) {
																			$i = 0;
																			foreach ($settingsAll as $data){
																				$i++;
																				?>
																				<tr>
																					<td><?php echo $i ?></td>
																					<td><i class="<?php echo $data->socialIcon ?> fa-2x"></i></td>
																					<td><?php echo $data->socialTitle ?></td>
																					<td><?php echo $data->socialLink ?></td>
																					<td>
																						<label class="switch">
																							<input id="isActive" type="checkbox" <?php echo ($data->socialStatus==1) ? "checked" : "" ?>
																							data-id="<?=$data->socialID ?>"
																							>
																							<span class="slider"></span>
																						</label>
																					</td>
																					<td>
																						<div class="form-button-action">
																							<button type="button"  data-toggle="modal" 
																							data-target="#editRowModal<?php echo $data->socialID ?>" title="" class="btn btn-primary btn-sm" data-original-title="Düzenle">
																							<i class="fa fa-edit"></i>
																						</button>&nbsp&nbsp
																						<button type="button"  title="" class="btn btn-danger btn-sm" data-original-title="Sil" data-toggle="modal" 
																						data-target="#deleteRowModal<?php echo $data->socialID ?>">

																						<i class="fa fa-times"></i>
																					</button>
																				</div>
																			</td>
																		</tr>
																		<!-- Modal EDİT ------------------------>
																		<div class="modal fade" id="editRowModal<?php echo $data->socialID ?>" tabindex="-1" role="dialog" aria-hidden="true">
																			<div class="modal-dialog" role="document">
																				<div class="modal-content">
																					<div class="modal-header no-bd">
																						<h5 class="modal-title">
																							<i class="fa fa-edit"></i>
																							<span class="fw-mediumbold">
																							Hesap</span> 
																							<span class="fw-light">
																								Düzenle
																							</span>
																						</h5>
																						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p class="small">Hesabınızı Düzenlemek İçin Bilgileri Eksiksiz Doldurunuz</p>
																						<!-- FORM -->
																						<form action="<?php echo base_url("settings/updateSocialSettings/").$data->socialID ?>" method="POST">
																							<div class="row">
																								<div class="col-sm-12">
																									<div class="form-group form-group-default">
																										<label>Başlık</label>
																										<input id="addName" name="socialIcon" type="text" class="form-control" placeholder="" value="<?php echo $data->socialIcon ?>">
																									</div>
																								</div>
																								<div class="col-md-12">
																									<div class="form-group form-group-default">
																										<label>İcon</label>
																										<input id="addPosition" type="text" class="form-control" name="socialTitle" placeholder="" value="<?php echo $data->socialTitle ?>">
																									</div>
																								</div>
																								<div class="col-md-12">
																									<div class="form-group form-group-default">
																										<label>Link</label>
																										<input id="addOffice" type="text" class="form-control" placeholder="" name="socialLink" value="<?php echo $data->socialLink ?>">
																									</div>
																								</div>
																							</div>

																							<div class="modal-footer no-bd">
																								<button type="submit" id="addRowButton" class="btn btn-primary">Düzenle</button>

																								<button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
																							</div>
																						</form><!-- /FORM -->
																					</div>
																				</div>
																			</div>
																		</div> <!-- / MODAL EDİT -->

																		<!-- Modal DELETE ------------------------>
																		<div class="modal fade" id="deleteRowModal<?php echo $data->socialID ?>" tabindex="-1" role="dialog" aria-hidden="true">
																			<div class="modal-dialog" role="document">
																				<div class="modal-content">
																					<div class="modal-header no-bd">
																						<h5 class="modal-title">
																							<span class="fw-mediumbold">
																								<i class="fas fa-exclamation-triangle"></i>
																								&nbsp DİKKAT
																							</span>
																						</h5>
																						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">

																						<!-- FORM -->
																						<form action="<?php echo base_url("settings/deleteSocialSettings/").$data->socialID ?>" method="POST">
																							<div class="row">
																								<h4>&nbsp&nbsp Silmek İstediğinize Emin Misiniz ?</h4>
																							</div>

																							<div class="modal-footer no-bd">
																								<button type="submit" id="addRowButton" class="btn btn-primary">EVET</button>

																								<button type="button" class="btn btn-danger" data-dismiss="modal">HAYIR</button>
																							</div>
																						</form><!-- /FORM -->
																					</div>
																				</div>
																			</div>
																		</div> <!-- / MODAL DELETE -->

																	<?php } } else{ ?>
																		<tr>
																			<td></td>
																			<td></td>
																			<td>Herhangi Bir Kayıt Bulunamadı !</td>
																			<td></td>
																			<td></td>
																		</tr>
																	<?php } ?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>


										</div>


									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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