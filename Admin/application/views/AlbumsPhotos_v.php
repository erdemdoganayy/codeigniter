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

					<!--/ÇOKLU FOTOĞRAF -->
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="d-flex align-items-center col-md-6">
									<h4 class="card-title"><?=$Albums->albumsTitle?>&nbsp&nbsp&nbsp<i class="fas fa-angle-double-right"></i> &nbsp&nbsp Çoklu Fotoğraf Ekle</h4>
								</div>	
							</div>
							<div class="card-body">
								<form action="<?=base_url("Albums/uploadPhotos/").$Albums->albumsID;?>" class="dropzone"	id="my-dropzone"></form>
							</div>
						</div>
					</div> 
					<!--/ ÇOKLU FOTOĞRAF -->


					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="d-flex align-items-center">
									<h4 class="card-title"><?=$Albums->albumsTitle?>&nbsp&nbsp&nbsp&nbsp<i class="fas fa-angle-double-right"></i>&nbsp&nbsp Mevcut Fotoğrafları</h4>
									<button class="btn btn-danger btn-round ml-auto" data-toggle="modal" data-target="#deleteRowModal<?=$Albums->albumsID ?>">
										<i class="fas fa-trash-alt"></i>&nbsp
										Tümünü Sil
									</button>

								</div>
							</div>
							<div class="card-body">

								<div class="modal fade" id="deleteRowModal<?=$Albums->albumsID ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
												<form action="<?php echo base_url("Albums/deleteAllAlbumsPhotos/").$Albums->albumsID ?>" method="POST">
													<div class="row">
														<h4>&nbsp&nbsp <b>Tüm Fotoğrafları Silmek İstediğinize Emin Misiniz ?</b></h4>
													</div>

													<div class="modal-footer no-bd">
														<button type="submit" id="addRowButton" class="btn btn-primary">EVET, TÜMÜNÜ SİL</button>
														<button type="button" class="btn btn-danger" data-dismiss="modal">HAYIR</button>
													</div>
												</form><!-- /FORM -->
											</div>
										</div>
									</div>
								</div> <!-- / MODAL DELETE -->


								<div class="table-responsive">
									<table id="add-row-albumsPhotos" class="display table table-striped table-hover text-center datatable">
										<thead>
											<tr>
												<th><i class="fa fa-bars"></i></th>
												<th>#</th>
												<th>RESİM</th>
												<th>DURUM</th>
												<th style="width: 8%">İŞLEMLER</th>
											</tr>
										</thead>

										<tbody id="sortable" data-url="<?=base_url("albums/updateRankAlbumsPhotos")?>">

											<?php
											if ($AlbumsAll) {
												// $i = 0;
												foreach ($AlbumsAll as $data){
													// $i++;
													?>
													<tr id="rank=<?=$data->albumsPhotosID; ?>">
														<td style="cursor:grabbing;"><i class="fa fa-bars"></i></td>
														<td><?=$data->albumsPhotosID ?></td>
														<td><img width="120" height="80"  src="<?=base_url(); ?>/uploads/<?=$data->albumsPhotosImage ?>">
														</td>
														<td>
															<label class="switch">
																<input data-id="<?=$data->albumsPhotosID ?>" id="isActive" type="checkbox" <?=($data->albumsPhotosStatus==1) ? "checked" : ""; ?>>
																<span class="slider"></span>
															</label>
														</td>
														<td>
															<div class="form-button-action">
																<button type="button"  title="" class="btn btn-danger btn-sm" data-original-title="Sil" data-toggle="modal" 
																data-target="#deleteRowModal<?=$data->albumsPhotosID ?>">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
												</tr>
												<script>
													Dropzone.autoDiscover = false;
												// or disable for specific dropzone:
												// Dropzone.options.myDropzone = false;

												$(function() {
												  // Now that the DOM is fully loaded, create the dropzone, and setup the
												  // event listeners
												  var myDropzone = new Dropzone("#my-dropzone");
												  myDropzone.on("queuecomplete", function(file) {
												  	$("#open-alert").iziModal({
												  		title: 'Tebrikler !',
												  		subtitle: 'Resim Ekleme İşlemi Tamamlandı !',
												  		headerColor: 'green',
												  		background: 'green',
			   											 theme: 'White',  // light
			   											 icon: "fa fa-check-circle",
			   											 iconText: null,
			   											 iconColor: 'white',
			   											 rtl: false,
			   											 width: 600,
			   											 top: null,
			   											 bottom: null,
			   											 borderBottom: true,
			   											 padding: 0,
			   											 radius: 3,
			   											 zindex: 999,
			   											 bodyOverflow: false,
			   											 openFullscreen: false,
			   											 closeOnEscape: true,
			   											 closeButton: true,
			   											 timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
			   											 transitionIn: 'comingIn',
			   											 transitionOut: 'comingOut',
			   											 transitionInOverlay: 'fadeIn',
			   											 transitionOutOverlay: 'fadeOut',
			   											 onClosed: function(){
			   											 	window.location.href = "<?php echo base_url("Albums/uploadPage/").$data->albumsID;?>"
			   											 },

			   											});

												  	$("#open-alert").iziModal("open");
												  });
												});
											</script>
											<!-- Modal EDİT ------------------------>

											<!-- / MODAL EDİT -->

											<!-- Modal DELETE ------------------------>
											<div class="modal fade" id="deleteRowModal<?=$data->albumsPhotosID ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
															<form action="<?php echo base_url("albums/deleteAlbumsPhotos/").$data->albumsPhotosID ?>" method="POST">
																<input type="hidden" name="albumsID" value="<?=$Albums->albumsID;?>">
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

<!-- Custom template | don't include it in your albums! -->
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