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
									<h4 class="card-title">─░statistikler Listesi</h4>
									<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
										<i class="fa fa-plus"></i>
										Yeni ─░statistik Ekle
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
													<i class="fas fa-sort-amount-up"></i>
													<span class="fw-mediumbold">
													─░statistik</span> 
													<span class="fw-light">
														Ekle
													</span>
												</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p class="small">Yeni ─░statistik Olu┼čturmak ─░├žin Bilgileri Eksiksiz Doldurunuz</p>
												<!-- FORM -->
												<form action="<?=base_url("counter/insertCounter") ?>" method="POST" enctype="multipart/form-data">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group form-group-default">
																<label>─░con</label>
																<input  type="text" class="form-control" name="counterIcon" placeholder="" value="">
															</div>

																	<p class="small"> <i class="fa fa-info-circle font-xs" rel="tooltip" title="├ľrnek ─░con Kodu : fa fa-money" ></i> ─░con Eklemek ─░├žin <a href="https://fontawesome.com/">T─▒klay─▒n─▒z</a></p>
														</div>
														<div class="col-md-12">
															<div class="form-group form-group-default">
																<label>Ba┼čl─▒k</label>
																<input  type="text" class="form-control" name="counterTitle" placeholder="" >
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group form-group-default">
																<label>Say─▒ </label>
																<input  type="text" class="form-control" name="counterCount" placeholder="" value="">
																</textarea>
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
									<table id="add-row-counter" class="display table table-striped table-hover text-center datatable">
										<thead>
											<tr>
												<th><i class="fa fa-bars"></i></th>
												<th>#</th>
												<th>─░CON</th>
												<th>BA┼×LIK</th>
												<th>SAYI</th>
												<th>DURUM</th>
												<th style="width: 8%">─░┼×LEMLER</th>
											</tr>
										</thead>

										<tbody id="sortable" data-url="<?=base_url("counter/updateRankCounter")?>">

											<?php
											if ($counterAll) {

												foreach ($counterAll as $data){

													?>
													<tr id="rank=<?=$data->counterID; ?>">
														<td style="cursor:grabbing;"><i class="fa fa-bars"></i></td>
														<td><?=$data->counterID; ?></td>
														<td><i class="<?=$data->counterIcon ?> fa-2x"></i></td>
														<td><?=$data->counterTitle; ?></td>
														<td><?=$data->counterCount; ?></td>
														<td>
															<label class="switch">
																<input id="isActive" type="checkbox" <?=($data->counterStatus==1) ? "checked" : "" ?>
																data-id="<?=$data->counterID ?>"
																>
																<span class="slider"></span>
															</label>
														</td>
														<td>
															<div class="form-button-action">
																<button type="button"  data-toggle="modal" 
																data-target="#editRowModal<?=$data->counterID ?>" title="" class="btn btn-primary btn-sm" data-original-title="D├╝zenle">
																<i class="fa fa-edit"></i>
															</button>&nbsp&nbsp
															<button type="button"  title="" class="btn btn-danger btn-sm" data-original-title="Sil" data-toggle="modal" 
															data-target="#deleteRowModal<?=$data->counterID ?>">

															<i class="fa fa-times"></i>
														</button>
													</div>
												</td>
											</tr>
											<!-- Modal ED─░T ------------------------>
											<div class="modal fade" id="editRowModal<?=$data->counterID ?>" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header no-bd">
															<h5 class="modal-title">
																<i class="fas fa-sort-amount-up"></i>
																<span class="fw-mediumbold">
																─░statistik</span> 
																<span class="fw-light">
																	D├╝zenle
																</span>
															</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p class="small">─░statistiklar─▒ D├╝zenlemek ─░├žin Bilgileri Eksiksiz Doldurunuz</p>
															<!-- FORM -->
															<form action="<?=base_url("counter/updateCounter/").$data->counterID ?>" method="POST" enctype="multipart/form-data">
																<div class="row">
																	<div class="col-sm-12">
																		<div class="form-group form-group-default">
																			<label>Mevcut ─░con</label>
																			<i class="<?=$data->counterIcon; ?> fa-2x"></i>
																		</div>
																	</div>
																	<div class="col-sm-12">
																		<div class="form-group form-group-default">
																			<label>─░con</label>
																			<input type="text" class="form-control" name="counterIcon" value=" <?=$data->counterIcon; ?>" >
																		</div>
																	</div>
																	<div class="col-sm-12">
																		<div class="form-group form-group-default">
																			<label>Ba┼čl─▒k</label>
																			<input id="addOffice" type="text" class="form-control" placeholder="" name="counterTitle" value="<?=$data->counterTitle; ?>">
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="form-group form-group-default">
																			<label>Say─▒</label>
																			<input id="addOffice" type="text" class="form-control" placeholder="" name="counterCount" value="<?=$data->counterCount; ?>">
																		</textarea>
																	</div>
																</div>

															</div>

															<div class="modal-footer no-bd">
																<button type="submit" id="addRowButton" class="btn btn-primary">D├╝zenle</button>

																<button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
															</div>
														</form><!-- /FORM -->
													</div>
												</div>
											</div>
										</div> <!-- / MODAL ED─░T -->

										<!-- Modal DELETE ------------------------>
										<div class="modal fade" id="deleteRowModal<?php echo $data->counterID ?>" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header no-bd">
														<h5 class="modal-title">
															<span class="fw-mediumbold">
																<i class="fas fa-exclamation-triangle"></i>
																&nbsp D─░KKAT
															</span>
														</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">

														<!-- FORM -->
														<form action="<?php echo base_url("counter/deleteCounter/").$data->counterID ?>" method="POST">
															<div class="row">
																<h4>&nbsp&nbsp Silmek ─░stedi─činize Emin Misiniz ?</h4>
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

									<?php } } else if (!$counterAll){ ?>
										<tr>
											<td colspan="7">Herhangi Bir Kay─▒t Bulunamad─▒ !</td>												
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