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
									<h4 class="card-title">Hakkımızda</h4>

								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col col-md-4">
										<form id="profileImages" action="javascript:void(0)" method="POST" enctype="multipart/form-data">
											<div class="divd"></div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="image">* Yüklü Olan Resim :</label><br>
														<img id="updateImages" width="340" height="360" class="img-rounded"  src="<?=base_url()?>uploads/<?=$data->adminImage?>">
														
													</div>	
													<div class="form-group">
														<label for="image">* Resim Yükle :</label><br>
														<input type="file" name="adminImage" class="form-control">
													</div>	
													<div class="form-group text-right">
														<button type="submit" class="btn btn-primary btn-block profileImage">Güncelle</button>
													</div>	
												</div>		
											</div>
										</form>
									</div>
									<div class="col col-md-8">
										<form action="<?=base_url("Profile/updateProfileInfo/").$data->adminID;?>" method="POST" enctype="multipart/form-data">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="image">* Ad Soyad :</label><br>
														<input type="text" class="form-control" name="adminName" value="<?=$data->adminName?>">
													</div>	
													<div class="form-group">
														<label for="image">* Mail :</label><br>
														<input type="text" class="form-control" name="adminMail" value="<?=$data->adminMail?>">
													</div>	
													<div class="form-group text-right">
														<button type="submit" class="btn btn-primary">Güncelle</button>
													</div>	
												</div>
											</div>
										</form>
										<form action="<?=base_url("Profile/updateProfilePassword/").$data->adminID;?>" method="POST" enctype="multipart/form-data">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="image">* Yeni Şifre :</label><br>
														<input type="password" class="form-control" name="passwordOne" placeholder="Yeni Şifre Giriniz">
														<?php if (isset($form_error)): ?>				
															<small class="text-danger"><?=form_error('passwordOne'); ?></small>
														<?php endif ?>
													</div>	
													<div class="form-group">
														<label for="image">* Yeni Şifre Tekrar :</label><br>
														<input type="password" class="form-control" name="passwordTwo" placeholder="Yeni Şifrenizi Tekrar Giriniz">
														<?php if (isset($form_error)): ?>															
															<small class="text-danger"><?= form_error('passwordTwo'); ?></small>
														<?php endif ?>
													</div>	
													<div class="form-group text-right">
														<button class="btn btn-primary">Güncelle</button>
													</div>	
												</div>
											</div>
										</form>
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

</div>
<!--   Core JS Files   -->

<!-- BOTTOM FOOTER -->
<?php $this->load->view("bottomFooter.php") ?>
<!-- END BOTTOM FOOTER -->
<script>
	$(document).ready(function(){
		$("#profileImages").on("submit", function(e){
			e.preventDefault();
			$.ajax({
				url : "<?=base_url("profile/updateProfileImage")?>",
				type : "POST",
				data :  new FormData(this),
				contentType : false,
				processData : false,
				cache : true,
				success:function(response) {
					messageBox("Tebrikler !","Profil Resmi Güncelleme İşlemi Başarılı","green","fa fa-check-circle");					
				}
			});
		});
	});
</script>

