<?php $this->load->view("topHeader") ?>
<!-- ==== Preloader start ==== -->
<!-- <div id="loader-wrapper">
	<div id="loader"></div>
	<div class="loader-section section-left"></div>
	<div class="loader-section section-right"></div>
</div> -->
<!-- ==== Preloader end ==== -->
<!-- Header start -->
<?php $this->load->view("homeHeader_v") ?>
<!-- Header End -->

<!-- == Home Section Start == -->
<?php $this->load->view("homeSliders_v")?>
<!-- == Home Section End == -->

<!-- == About Section Start == -->
<?php $this->load->view("homeAboutUs_v") ?>
<!-- == About Section End == -->

<!-- == Service Section Start == -->
<?php $this->load->view("homeServices_v") ?>
<!-- == Service Section End == -->

<!-- == Team Section Start == -->
<?php $this->load->view("homeTeam_v") ?>
<!-- == Team Section End == -->

<!-- == Counter Section Start == -->
<?php $this->load->view("homeCounter_v") ?>
<!-- == Counter Section End == -->

<!-- ==== Portfolio section start ==== -->
<?php $this->load->view("homeProject_v") ?>
<!-- ==== Protfolio section end ==== -->

<!-- ==== Portfolio section start ==== -->
<?php $this->load->view("homeBrands_v") ?>
<!-- ==== Protfolio section end ==== -->

<!-- ==== footer section start ==== -->
<?php $this->load->view("homeFooter_v") ?>
<!-- ==== footer section end ==== -->

<!-- All JS Here -->
<?php $this->load->view("homeBottomFooter_v") ?>