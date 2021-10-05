<section id="home" >
	<!-- == Color schemes == -->
<!-- 		<div class="color-schemes">
			<div class="color-handle">
				<i class="fa fa-cogs fa-spin" aria-hidden="true"></i>
			</div>
			<div class="color-plate">
				<h5>Chose color</h5>
				<a href="css/colors/defaults-color.css" class="single-color defaults-color">Defaults</a>
				<a href="css/colors/red-color.css" class="single-color red-color">Red</a>
				<a href="css/colors/purple-color.css" class="single-color purple-color">Purple</a>
				<a href="css/colors/sky-color.css" class="single-color sky-color">sky</a>
				<a href="css/colors/green-color.css" class="single-color green-color">Green</a>
				<a href="css/colors/blue-color.css" class="single-color pink-color">Pink</a>
			</div>
		</div> -->
		<!-- == /Color schemes == -->	
		<!-- silider start -->
		<div class="main-slider-1 white-clr-all">
			<div id="carosel-mr-1" class="carousel home-carousel-2 slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<?php foreach ($slider as $sliders){ ?>
						<li data-target="#carosel-mr-1" data-slide-to="<?= $sliders->sliderRank ?>" class="<?= ($sliders->sliderRank==0) ? "active" : ""; ?>"></li>
					<?php } ?>
				</ol>
				<div class="carousel-inner main-sld" role="listbox">
					<?php foreach ($slider as $sliders){ ?>
						<div class="item main-sld <?= ($sliders->sliderRank==0) ? "active" : ""; ?> ">
							<!-- change slider image -->
							<div class="slider-bg" style="background-image: url('Admin/uploads/<?= $sliders->sliderImage ?>');"></div>
							<div class="slider-cell">
								<div class="slider-ver">
									<div class="slider-con text-center">
										<h1><?= $sliders->sliderTitle ?></span></h1>
										<p><?= $sliders->sliderContent ?></p>
										<a class="btn btn-default btn-animate btn-style hvr-shutter-out-vertical" href="<?= $sliders->sliderBtnLeftLink ?>"><?= $sliders->sliderBtnLeft ?></a>
										<a class="btn btn-default btn-animate btn-style hvr-shutter-out-vertical" href="<?= $sliders->sliderBtnRightLink ?>"><?= $sliders->sliderBtnRight ?></a>
									</div>
									<!-- end slider content -->
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- end slider bar -->
		<!--slider section start-->	
	</section>