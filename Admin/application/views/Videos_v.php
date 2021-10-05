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
							<div class="card-header">
								<div class="d-flex align-items-center">
									<h4 class="card-title">Video Listesi</h4>
									<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
										<i class="fa fa-plus"></i>
										Yeni Video Ekle
									</button>
								</div>
							</div>
							<div class="card-body">

								<!-- Modal -->
								<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document" >
										<div class="modal-content">
											<div class="modal-header no-bd">
												<h5 class="modal-title">
													<i class="fa fa-video"></i>
													<span class="fw-mediumbold">
													Video</span> 
													<span class="fw-light">
														Ekle
													</span>
												</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="alert alert-info">
													<p><b>Bilgi :  </b><a href="https://youtube.com" target="_blank">Youtube </a>Üzerinden Video Eklemek İçin Aşağıdaki Adımları İzleyin.</p>
													<p><b>1.Adım : </b><a href="https://youtube.com" target="_blank">Youtube </a>'dan Yüklemek İstediğiniz Videoyu Açın.</p>
													<p><b>2.Adım : </b><a href="https://youtube.com" target="_blank">Youtube </a>'dan  Açtığınız Videonun Adres Çubuğundaki <b>=</b> 'den Sonraki Kodu Kopyalayıp Aşağıdaki  <b>'Youtube Kodu'</b> Bölümüne Yapıştırın.</p>
													<p><b>Örneğin : </b> https://www.youtube.com/watch?v=<u><b>K189GsKqs9w</b></u></p>
												</div>
												<p class="small">Yeni Video Eklemek İçin Bilgileri Eksiksiz Doldurunuz</p>
												<!-- FORM -->
												<form action="<?=base_url("videos/insertVideos") ?>" method="POST" enctype="multipart/form-data">
													<div class="row">
														<div class="col-sm-12">
															<div class="form-group form-group-default">
																<label>Video Kodu</label>
																<input id="addName" name="videosLink" type="text" class="form-control" placeholder="Örnek : K189GsKqs9w">
															</div>
														</div>

														<div class="col-md-12">
															<div class="form-group form-group-default">
																<label>Video Başlık</label>
																<input id="addOffice" type="text" class="form-control" placeholder="Lütfen Bir Video Başlık Giriniz" name="videosTitle">
															</div>
														</div>


													</div>
													<div class="modal-footer no-bd">
														<button type="submit" id="addRowButton" class="btn btn-primary">Ekle</button>
														<button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
													</div>
												</form>
											</div>
											<!-- /FORM -->
											
										</div>
									</div>
								</div>

								<div class="table-responsive">
									<table id="add-row-videos" class="display table table-striped table-hover text-center datatable">
										<thead>
											<tr>
												<th><i class="fa fa-bars"></i></th>
												<th>#</th>
												<th>LİNK</th>
												<th>BAŞLIK</th>
												<th>DURUM</th>
												<th style="width: 8%">İŞLEMLER</th>
											</tr>
										</thead>

										<tbody id="sortable" data-url="<?=base_url("videos/updateRankVideos")?>">

											<?php
											if ($videosAll) {
												// $i = 0;
												foreach ($videosAll as $data){
													// $i++;
													?>
													<tr id="rank=<?=$data->videosID; ?>">
														<td style="cursor:grabbing;"><i class="fa fa-bars"></i></td>
														<td><?=$data->videosID ?></td>
														<td> <a target="_blank" href="https://www.youtube.com/embed/<?=$data->videosLink ?>"><i class="fa fa-video"></i> Videoya Git</a>
														</td>
														<td><?=$data->videosTitle ?></td>
														<td>
															<label class="switch">
																<input data-id="<?=$data->videosID ?>" id="isActive" type="checkbox" <?=($data->videosStatus==1) ? "checked" : ""; ?>>
																<span class="slider"></span>
															</label>
														</td>
														<td>
															<div class="form-button-action">
																<button type="button"  data-toggle="modal" 
																data-target="#editRowModal<?=$data->videosID ?>" title="" class="btn btn-primary btn-sm" data-original-title="Düzenle">
																<i class="fa fa-edit"></i>
															</button>&nbsp&nbsp
															<button type="button"  title="" class="btn btn-danger btn-sm" data-original-title="Sil" data-toggle="modal" 
															data-target="#deleteRowModal<?=$data->videosID ?>">
															<i class="fa fa-times"></i>
														</button>
													</div>
												</td>

											</tr>
											<!-- Modal EDİT ------------------------>
											<div class="modal fade" id="editRowModal<?=$data->videosID ?>" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header no-bd">
															<h5 class="modal-title">
																<span class="fw-mediumbold">
																	<i class="fa fa-video"></i>
																Video</span> 
																<span class="fw-light">
																	Düzenle
																</span>
															</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p class="small">Videoyu Düzenlemek İçin Bilgileri Eksiksiz Doldurunuz</p>
															<!-- FORM -->
															<form action="<?=base_url("videos/updateVideos/").$data->videosID ?>" method="POST" enctype="multipart/form-data">
																<div class="row">
																	<div class="col-sm-12">
																	</div>
																	<div class="col-sm-12">
																		<div class="form-group form-group-default">
																			<label>MEVCUT VİDEO</label>
																			<iframe class="rounded" width="100%" height="350"  src="https://www.youtube.com/embed/<?=$data->videosLink ?>" frameborder="0"></iframe>
																		</div>
																	</div>
																	<div class="col-sm-12">
																		<div class="form-group form-group-default">
																			<label>Link</label>
																			<input id="addName" name="videosLink" type="text" class="form-control" placeholder="" value="<?=$data->videosLink; ?>">
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="form-group form-group-default">
																			<label>Başlık</label>
																			<input id="addOffice" type="text" class="form-control" name="videosTitle" value="<?=$data->videosTitle; ?>">
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
											<div class="modal fade" id="deleteRowModal<?=$data->videosID ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
															<form action="<?php echo base_url("videos/deleteVideos/").$data->videosID ?>" method="POST">
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
												<td colspan="7">Herhangi Bir Kayıt Bulunamadı !</td>												
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

<!-- FOOTER -->
<?php $this->load->view("footer.php") ?>
<!-- END FOOTER -->


</div>

<!-- Custom template | don't include it in your videos! -->
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