<div id="open-alert"></div>

<script src="<?=base_url(); ?>assets/js/core/popper.min.js"></script>
<script src="<?=base_url(); ?>assets/js/core/bootstrap.min.js"></script>
<!-- DROPZONE  -->


<!-- jQuery UI -->
<script src="<?=base_url(); ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?=base_url(); ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?=base_url(); ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- MODAL JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>

<!-- Chart JS -->
<script src="<?=base_url(); ?>assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="<?=base_url(); ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="<?=base_url(); ?>assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="<?=base_url(); ?>assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="<?=base_url(); ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="<?=base_url(); ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=base_url(); ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Sweet Alert -->
<script src="<?=base_url(); ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Atlantis JS -->
<script src="<?=base_url(); ?>assets/js/atlantis.min.js"></script>

<!-- SWAL -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="<?=base_url(); ?>assets/js/setting-demo.js"></script>
<script src="<?=base_url(); ?>assets/js/demo.js"></script>


<script>
	Circles.create({
		id:'circles-1',
		radius:45,
		value:60,
		maxValue:100,
		width:7,
		text: 5,
		colors:['#f1f1f1', '#FF9E27'],
		duration:400,
		wrpClass:'circles-wrp',
		textClass:'circles-text',
		styleWrapper:true,
		styleText:true
	})

	Circles.create({
		id:'circles-2',
		radius:45,
		value:70,
		maxValue:100,
		width:7,
		text: 36,
		colors:['#f1f1f1', '#2BB930'],
		duration:400,
		wrpClass:'circles-wrp',
		textClass:'circles-text',
		styleWrapper:true,
		styleText:true
	})

	Circles.create({
		id:'circles-3',
		radius:45,
		value:40,
		maxValue:100,
		width:7,
		text: 12,
		colors:['#f1f1f1', '#F25961'],
		duration:400,
		wrpClass:'circles-wrp',
		textClass:'circles-text',
		styleWrapper:true,
		styleText:true
	})

	var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

	var mytotalIncomeChart = new Chart(totalIncomeChart, {
		type: 'bar',
		data: {
			labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
			datasets : [{
				label: "Total Income",
				backgroundColor: '#ff9e27',
				borderColor: 'rgb(23, 125, 255)',
				data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
			}],
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: false,
			},
			scales: {
				yAxes: [{
					ticks: {
											display: false //this will remove only the label
										},
										gridLines : {
											drawBorder: false,
											display : false
										}
									}],
									xAxes : [ {
										gridLines : {
											drawBorder: false,
											display : false
										}
									}]
								},
							}
						});

	$('#lineChart').sparkline([105,103,123,100,95,105,115], {
		type: 'line',
		height: '70',
		width: '100%',
		lineWidth: '2',
		lineColor: '#ffa534',
		fillColor: 'rgba(255, 165, 52, .14)'
	});
</script>

<?php $this->load->view("alert.php"); ?>

</body>
</html>
<script>
	$(document).ready(function($) {

		$("#add-row").on('change', '#isActive', function(event) {
			var dataID = $(this).data("id");
			var status = $(this).prop("checked");
			$.ajax({
				url: '<?=base_url('sliders/updateIsActiveSlider')?>',
				type: 'POST',
				data: "dataID="+dataID+"&status="+status,
				dataType: 'JSON',
				error: function() {
					alert("Hata oluştu");
				},
				success: function(response) {
					if (response.success==1) {
						$("#open-alert").iziModal({
							title: 'Tebrikler',
							subtitle: 'Durumu Başarıyla Güncellediniz',
							headerColor: 'green',
							background: 'green',
												 theme: 'white',  // light
												 icon: "fas fa-check-circle",
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
												 iframe: false,
												 iframeHeight: 400,
												 iframeURL: null,
												 focusInput: true,
												 group: '',
												 loop: false,
												 arrowKeys: true,
												 navigateCaption: true,
												 navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
												 history: false,
												 restoreDefaultContent: false,
												 autoOpen: 0, // Boolean, Number
												 bodyOverflow: false,
												 fullscreen: false,
												 openFullscreen: false,
												 closeOnEscape: true,
												 closeButton: true,
												 appendTo: 'body', // or false
												 appendToOverlay: 'body', // or false
												 overlay: true,
												 overlayClose: true,
												 overlayColor: 'rgba(0, 0, 0, 0.4)',
												 timeout: false,
												 timeoutProgressbar: false,
												 pauseOnHover: false,
												 timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
												 transitionIn: 'comingIn',
												 transitionOut: 'comingOut',
												 transitionInOverlay: 'fadeIn',
												 transitionOutOverlay: 'fadeOut',
												 onFullscreen: function(){},
												 onResize: function(){},
												 onOpening: function(){},
												 onOpened: function(){},
												 onClosing: function(){},
												 onClosed: function(){},
												 afterRender: function(){}

												});

						$("#open-alert").iziModal("open");
					}else{
						alert("Başarısız");
					}
				}
			});
		});

	});
</script>  <!-- Settings Status -->

<script>
	$(document).ready(function($) {

		$("#add-row-team").on('change', '#isActive', function(event) {
			var dataID = $(this).data("id");
			var status = $(this).prop("checked");
			$.ajax({
				url: '<?=base_url('team/updateIsActiveTeam')?>',
				type: 'POST',
				data: "dataID="+dataID+"&status="+status,
				dataType: 'JSON',
				error: function() {
					alert("Hata oluştu");
				},
				success: function(response) {
					if (response.success==1) {
						$("#open-alert").iziModal({
							title: 'Tebrikler',
							subtitle: 'Durumu Başarıyla Güncellediniz',
							headerColor: 'green',
							background: 'green',
												 theme: 'black',  // light
												 icon: "fas fa-check-circle",
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
												 iframe: false,
												 iframeHeight: 400,
												 iframeURL: null,
												 focusInput: true,
												 group: '',
												 loop: false,
												 arrowKeys: true,
												 navigateCaption: true,
												 navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
												 history: false,
												 restoreDefaultContent: false,
												 autoOpen: 0, // Boolean, Number
												 bodyOverflow: false,
												 fullscreen: false,
												 openFullscreen: false,
												 closeOnEscape: true,
												 closeButton: true,
												 appendTo: 'body', // or false
												 appendToOverlay: 'body', // or false
												 overlay: true,
												 overlayClose: true,
												 overlayColor: 'rgba(0, 0, 0, 0.4)',
												 timeout: false,
												 timeoutProgressbar: false,
												 pauseOnHover: false,
												 timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
												 transitionIn: 'comingIn',
												 transitionOut: 'comingOut',
												 transitionInOverlay: 'fadeIn',
												 transitionOutOverlay: 'fadeOut',
												 onFullscreen: function(){},
												 onResize: function(){},
												 onOpening: function(){},
												 onOpened: function(){},
												 onClosing: function(){},
												 onClosed: function(){},
												 afterRender: function(){}

												});

						$("#open-alert").iziModal("open");
					}else{
						alert("Başarısız");
					}
				}
			});
		});



	});
</script>  <!-- Team Status -->

<script>
	$(document).ready(function($) {

		$("#add-row-project").on('change', '#isActive', function(event) {
			var dataID = $(this).data("id");
			var status = $(this).prop("checked");
			$.ajax({
				url: '<?=base_url('project/updateIsActiveProject')?>',
				type: 'POST',
				data: "dataID="+dataID+"&status="+status,
				dataType: 'JSON',
				error: function() {
					alert("Hata oluştu");
				},
				success: function(response) {
					if (response.success==1) {
						$("#open-alert").iziModal({
							title: 'Tebrikler',
							subtitle: 'Durumu Başarıyla Güncellediniz',
							headerColor: 'green',
							background: 'green',
												 theme: 'black',  // light
												 icon: "fas fa-check-circle",
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
												 iframe: false,
												 iframeHeight: 400,
												 iframeURL: null,
												 focusInput: true,
												 group: '',
												 loop: false,
												 arrowKeys: true,
												 navigateCaption: true,
												 navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
												 history: false,
												 restoreDefaultContent: false,
												 autoOpen: 0, // Boolean, Number
												 bodyOverflow: false,
												 fullscreen: false,
												 openFullscreen: false,
												 closeOnEscape: true,
												 closeButton: true,
												 appendTo: 'body', // or false
												 appendToOverlay: 'body', // or false
												 overlay: true,
												 overlayClose: true,
												 overlayColor: 'rgba(0, 0, 0, 0.4)',
												 timeout: false,
												 timeoutProgressbar: false,
												 pauseOnHover: false,
												 timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
												 transitionIn: 'comingIn',
												 transitionOut: 'comingOut',
												 transitionInOverlay: 'fadeIn',
												 transitionOutOverlay: 'fadeOut',
												 onFullscreen: function(){},
												 onResize: function(){},
												 onOpening: function(){},
												 onOpened: function(){},
												 onClosing: function(){},
												 onClosed: function(){},
												 afterRender: function(){}

												});

						$("#open-alert").iziModal("open");
					}else{
						alert("Başarısız");
					}
				}
			});
		});



	});
</script>  <!-- Project Status -->

<script>
	$(document).ready(function($) {

		$("#add-row-client").on('change', '#isActive', function(event) {
			var dataID = $(this).data("id");
			var status = $(this).prop("checked");
			$.ajax({
				url: '<?=base_url('ClientComment/updateIsActiveClientComment')?>',
				type: 'POST',
				data: "dataID="+dataID+"&status="+status,
				dataType: 'JSON',
				error: function() {
					alert("Hata oluştu");
				},
				success: function(response) {
					if (response.success==1) {
						$("#open-alert").iziModal({
							title: 'Tebrikler',
							subtitle: 'Durumu Başarıyla Güncellediniz',
							headerColor: 'green',
							background: 'green',
												theme: 'black',  // light
												icon: "fas fa-check-circle",
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
												iframe: false,
												iframeHeight: 400,
												iframeURL: null,
												focusInput: true,
												group: '',
												loop: false,
												arrowKeys: true,
												navigateCaption: true,
												navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
												history: false,
												restoreDefaultContent: false,
												autoOpen: 0, // Boolean, Number
												bodyOverflow: false,
												fullscreen: false,
												openFullscreen: false,
												closeOnEscape: true,
												closeButton: true,
												appendTo: 'body', // or false
												appendToOverlay: 'body', // or false
												overlay: true,
												overlayClose: true,
												overlayColor: 'rgba(0, 0, 0, 0.4)',
												timeout: false,
												timeoutProgressbar: false,
												pauseOnHover: false,
												timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
												transitionIn: 'comingIn',
												transitionOut: 'comingOut',
												transitionInOverlay: 'fadeIn',
												transitionOutOverlay: 'fadeOut',
												onFullscreen: function(){},
												onResize: function(){},
												onOpening: function(){},
												onOpened: function(){},
												onClosing: function(){},
												onClosed: function(){},
												afterRender: function(){}

											});

						$("#open-alert").iziModal("open");
					}else{
						alert("Başarısız");
					}
				}
			});
		});



	});
</script>  <!-- ClientCommnet Status -->
<script>
	$(document).ready(function($) {

		$("#add-row-brands").on('change', '#isActive', function(event) {
			var dataID = $(this).data("id");
			var status = $(this).prop("checked");
			$.ajax({
				url: '<?=base_url('Brands/updateIsActiveBrands')?>',
				type: 'POST',
				data: "dataID="+dataID+"&status="+status,
				dataType: 'JSON',
				error: function() {
					alert("Hata oluştu");
				},
				success: function(response) {
					if (response.success==1) {
						$("#open-alert").iziModal({
							title: 'Tebrikler',
							subtitle: 'Durumu Başarıyla Güncellediniz',
							headerColor: 'green',
							background: 'green',
												 theme: 'black',  // light
												 icon: "fas fa-check-circle",
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
												 iframe: false,
												 iframeHeight: 400,
												 iframeURL: null,
												 focusInput: true,
												 group: '',
												 loop: false,
												 arrowKeys: true,
												 navigateCaption: true,
												 navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
												 history: false,
												 restoreDefaultContent: false,
												 autoOpen: 0, // Boolean, Number
												 bodyOverflow: false,
												 fullscreen: false,
												 openFullscreen: false,
												 closeOnEscape: true,
												 closeButton: true,
												 appendTo: 'body', // or false
												 appendToOverlay: 'body', // or false
												 overlay: true,
												 overlayClose: true,
												 overlayColor: 'rgba(0, 0, 0, 0.4)',
												 timeout: false,
												 timeoutProgressbar: false,
												 pauseOnHover: false,
												 timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
												 transitionIn: 'comingIn',
												 transitionOut: 'comingOut',
												 transitionInOverlay: 'fadeIn',
												 transitionOutOverlay: 'fadeOut',
												 onFullscreen: function(){},
												 onResize: function(){},
												 onOpening: function(){},
												 onOpened: function(){},
												 onClosing: function(){},
												 onClosed: function(){},
												 afterRender: function(){}

												});

						$("#open-alert").iziModal("open");
					}else{
						alert("Başarısız");
					}
				}
			});
		});



	});
</script>  <!-- Brands Status -->
<script>
	$(document).ready(function($) {

		$("#add-row-services").on('change', '#isActive', function(event) {
			var dataID = $(this).data("id");
			var status = $(this).prop("checked");
			$.ajax({
				url: '<?=base_url('Services/updateIsActiveServices')?>',
				type: 'POST',
				data: "dataID="+dataID+"&status="+status,
				dataType: 'JSON',
				error: function() {
					alert("Hata oluştu");
				},
				success: function(response) {
					if (response.success==1) {
						$("#open-alert").iziModal({
							title: 'Tebrikler',
							subtitle: 'Durumu Başarıyla Güncellediniz',
							headerColor: 'green',
							background: 'green',
													theme: 'black',  // light
													icon: "fas fa-check-circle",
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
													iframe: false,
													iframeHeight: 400,
													iframeURL: null,
													focusInput: true,
													group: '',
													loop: false,
													arrowKeys: true,
													navigateCaption: true,
													navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
													history: false,
													restoreDefaultContent: false,
													autoOpen: 0, // Boolean, Number
													bodyOverflow: false,
													fullscreen: false,
													openFullscreen: false,
													closeOnEscape: true,
													closeButton: true,
													appendTo: 'body', // or false
													appendToOverlay: 'body', // or false
													overlay: true,
													overlayClose: true,
													overlayColor: 'rgba(0, 0, 0, 0.4)',
													timeout: false,
													timeoutProgressbar: false,
													pauseOnHover: false,
													timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
													transitionIn: 'comingIn',
													transitionOut: 'comingOut',
													transitionInOverlay: 'fadeIn',
													transitionOutOverlay: 'fadeOut',
													onFullscreen: function(){},
													onResize: function(){},
													onOpening: function(){},
													onOpened: function(){},
													onClosing: function(){},
													onClosed: function(){},
													afterRender: function(){}

												});

						$("#open-alert").iziModal("open");
					}else{
						alert("Başarısız");
					}
				}
			});
		});



	});
</script>  <!-- Services Status -->
<script>
	$(document).ready(function($) {

		$("#add-row-faq").on('change', '#isActive', function(event) {
			var dataID = $(this).data("id");
			var status = $(this).prop("checked");
			$.ajax({
				url: '<?=base_url('Faq/updateIsActiveFaq')?>',
				type: 'POST',
				data: "dataID="+dataID+"&status="+status,
				dataType: 'JSON',
				error: function() {
					alert("Hata oluştu");
				},
				success: function(response) {
					if (response.success==1) {
						$("#open-alert").iziModal({
							title: 'Tebrikler',
							subtitle: 'Durumu Başarıyla Güncellediniz',
							headerColor: 'green',
							background: 'green',
													theme: 'black',  // light
													icon: "fas fa-check-circle",
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
													iframe: false,
													iframeHeight: 400,
													iframeURL: null,
													focusInput: true,
													group: '',
													loop: false,
													arrowKeys: true,
													navigateCaption: true,
													navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
													history: false,
													restoreDefaultContent: false,
													autoOpen: 0, // Boolean, Number
													bodyOverflow: false,
													fullscreen: false,
													openFullscreen: false,
													closeOnEscape: true,
													closeButton: true,
													appendTo: 'body', // or false
													appendToOverlay: 'body', // or false
													overlay: true,
													overlayClose: true,
													overlayColor: 'rgba(0, 0, 0, 0.4)',
													timeout: false,
													timeoutProgressbar: false,
													pauseOnHover: false,
													timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
													transitionIn: 'comingIn',
													transitionOut: 'comingOut',
													transitionInOverlay: 'fadeIn',
													transitionOutOverlay: 'fadeOut',
													onFullscreen: function(){},
													onResize: function(){},
													onOpening: function(){},
													onOpened: function(){},
													onClosing: function(){},
													onClosed: function(){},
													afterRender: function(){}

												});

						$("#open-alert").iziModal("open");
					}else{
						alert("Başarısız");
					}
				}
			});
		});



	});
</script>  <!-- Faq Status -->
<script>
	$(document).ready(function($) {

		$("#add-row-albums").on('change', '#isActive', function(event) {
			var dataID = $(this).data("id");
			var status = $(this).prop("checked");
			$.ajax({
				url: '<?=base_url('Albums/updateIsActiveAlbums')?>',
				type: 'POST',
				data: "dataID="+dataID+"&status="+status,
				dataType: 'JSON',
				error: function() {
					alert("Hata oluştu");
				},
				success: function(response) {
					if (response.success==1) {
						$("#open-alert").iziModal({
							title: 'Tebrikler',
							subtitle: 'Durumu Başarıyla Güncellediniz',
							headerColor: 'green',
							background: 'green',
												theme: 'black',  // light
												icon: "fas fa-check-circle",
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
												iframe: false,
												iframeHeight: 400,
												iframeURL: null,
												focusInput: true,
												group: '',
												loop: false,
												arrowKeys: true,
												navigateCaption: true,
												navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
												history: false,
												restoreDefaultContent: false,
												autoOpen: 0, // Boolean, Number
												bodyOverflow: false,
												fullscreen: false,
												openFullscreen: false,
												closeOnEscape: true,
												closeButton: true,
												appendTo: 'body', // or false
												appendToOverlay: 'body', // or false
												overlay: true,
												overlayClose: true,
												overlayColor: 'rgba(0, 0, 0, 0.4)',
												timeout: false,
												timeoutProgressbar: false,
												pauseOnHover: false,
												timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
												transitionIn: 'comingIn',
												transitionOut: 'comingOut',
												transitionInOverlay: 'fadeIn',
												transitionOutOverlay: 'fadeOut',
												onFullscreen: function(){},
												onResize: function(){},
												onOpening: function(){},
												onOpened: function(){},
												onClosing: function(){},
												onClosed: function(){},
												afterRender: function(){}

											});

						$("#open-alert").iziModal("open");
					}else{
						alert("Başarısız");
					}
				}
			});
		});



	});
</script>  <!-- Albums Status -->
<script>
	$(document).ready(function($) {

		$("#add-row-albumsPhotos").on('change', '#isActive', function(event) {
			var dataID = $(this).data("id");
			var status = $(this).prop("checked");
			$.ajax({
				url: '<?=base_url('Albums/updateIsActiveAlbumsPhotos')?>',
				type: 'POST',
				data: "dataID="+dataID+"&status="+status,
				dataType: 'JSON',
				error: function() {
					alert("Hata oluştu");
				},
				success: function(response) {
					if (response.success==1) {
						$("#open-alert").iziModal({
							title: 'Tebrikler',
							subtitle: 'Durumu Başarıyla Güncellediniz',
							headerColor: 'green',
							background: 'green',
												theme: 'black',  // light
												icon: "fas fa-check-circle",
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
												iframe: false,
												iframeHeight: 400,
												iframeURL: null,
												focusInput: true,
												group: '',
												loop: false,
												arrowKeys: true,
												navigateCaption: true,
												navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
												history: false,
												restoreDefaultContent: false,
												autoOpen: 0, // Boolean, Number
												bodyOverflow: false,
												fullscreen: false,
												openFullscreen: false,
												closeOnEscape: true,
												closeButton: true,
												appendTo: 'body', // or false
												appendToOverlay: 'body', // or false
												overlay: true,
												overlayClose: true,
												overlayColor: 'rgba(0, 0, 0, 0.4)',
												timeout: false,
												timeoutProgressbar: false,
												pauseOnHover: false,
												timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
												transitionIn: 'comingIn',
												transitionOut: 'comingOut',
												transitionInOverlay: 'fadeIn',
												transitionOutOverlay: 'fadeOut',
												onFullscreen: function(){},
												onResize: function(){},
												onOpening: function(){},
												onOpened: function(){},
												onClosing: function(){},
												onClosed: function(){},
												afterRender: function(){}

											});

						$("#open-alert").iziModal("open");
					}else{
						alert("Başarısız");
					}
				}
			});
		});



	});
</script>  <!-- AlbumsPhotos Status -->
<script>
	$(document).ready(function($) {

		$("#add-row-videos").on('change', '#isActive', function(event) {
			var dataID = $(this).data("id");
			var status = $(this).prop("checked");
			$.ajax({
				url: '<?=base_url('videos/updateIsActiveVideos')?>',
				type: 'POST',
				data: "dataID="+dataID+"&status="+status,
				dataType: 'JSON',
				error: function() {
					alert("Hata oluştu");
				},
				success: function(response) {
					if (response.success==1) {
						$("#open-alert").iziModal({
							title: 'Tebrikler',
							subtitle: 'Durumu Başarıyla Güncellediniz',
							headerColor: 'green',
							background: 'green',
													theme: 'black',  // light
													icon: "fas fa-check-circle",
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
													iframe: false,
													iframeHeight: 400,
													iframeURL: null,
													focusInput: true,
													group: '',
													loop: false,
													arrowKeys: true,
													navigateCaption: true,
													navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
													history: false,
													restoreDefaultContent: false,
													autoOpen: 0, // Boolean, Number
													bodyOverflow: false,
													fullscreen: false,
													openFullscreen: false,
													closeOnEscape: true,
													closeButton: true,
													appendTo: 'body', // or false
													appendToOverlay: 'body', // or false
													overlay: true,
													overlayClose: true,
													overlayColor: 'rgba(0, 0, 0, 0.4)',
													timeout: false,
													timeoutProgressbar: false,
													pauseOnHover: false,
													timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
													transitionIn: 'comingIn',
													transitionOut: 'comingOut',
													transitionInOverlay: 'fadeIn',
													transitionOutOverlay: 'fadeOut',
													onFullscreen: function(){},
													onResize: function(){},
													onOpening: function(){},
													onOpened: function(){},
													onClosing: function(){},
													onClosed: function(){},
													afterRender: function(){}

												});

						$("#open-alert").iziModal("open");
					}else{
						alert("Başarısız");
					}
				}
			});
		});



	});
</script>  <!-- Videos Status -->
<script>
	$(document).ready(function($) {

		$("#add-row-pages").on('change', '#isActive', function(event) {
			var dataID = $(this).data("id");
			var status = $(this).prop("checked");
			$.ajax({
				url: '<?=base_url('Pages/updateIsActivePages')?>',
				type: 'POST',
				data: "dataID="+dataID+"&status="+status,
				dataType: 'JSON',
				error: function() {
					alert("Hata oluştu");
				},
				success: function(response) {
					if (response.success==1) {
						$("#open-alert").iziModal({
							title: 'Tebrikler',
							subtitle: 'Durumu Başarıyla Güncellediniz',
							headerColor: 'green',
							background: 'green',
													theme: 'black',  // light
													icon: "fas fa-check-circle",
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
													iframe: false,
													iframeHeight: 400,
													iframeURL: null,
													focusInput: true,
													group: '',
													loop: false,
													arrowKeys: true,
													navigateCaption: true,
													navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
													history: false,
													restoreDefaultContent: false,
													autoOpen: 0, // Boolean, Number
													bodyOverflow: false,
													fullscreen: false,
													openFullscreen: false,
													closeOnEscape: true,
													closeButton: true,
													appendTo: 'body', // or false
													appendToOverlay: 'body', // or false
													overlay: true,
													overlayClose: true,
													overlayColor: 'rgba(0, 0, 0, 0.4)',
													timeout: false,
													timeoutProgressbar: false,
													pauseOnHover: false,
													timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
													transitionIn: 'comingIn',
													transitionOut: 'comingOut',
													transitionInOverlay: 'fadeIn',
													transitionOutOverlay: 'fadeOut',
													onFullscreen: function(){},
													onResize: function(){},
													onOpening: function(){},
													onOpened: function(){},
													onClosing: function(){},
													onClosed: function(){},
													afterRender: function(){}

												});

						$("#open-alert").iziModal("open");
					}else{
						alert("Başarısız");
					}
				}
			});
		});



	});
</script>  <!-- Pages Status -->
<script>
	$(document).ready(function($) {

		$("#add-row-counter").on('change', '#isActive', function(event) {
			var dataID = $(this).data("id");
			var status = $(this).prop("checked");
			$.ajax({
				url: '<?=base_url('Counter/updateIsActiveCounter')?>',
				type: 'POST',
				data: "dataID="+dataID+"&status="+status,
				dataType: 'JSON',
				error: function() {
					alert("Hata oluştu");
				},
				success: function(response) {
					if (response.success==1) {
						$("#open-alert").iziModal({
							title: 'Tebrikler',
							subtitle: 'Durumu Başarıyla Güncellediniz',
							headerColor: 'green',
							background: 'green',
													theme: 'black',  // light
													icon: "fas fa-check-circle",
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
													iframe: false,
													iframeHeight: 400,
													iframeURL: null,
													focusInput: true,
													group: '',
													loop: false,
													arrowKeys: true,
													navigateCaption: true,
													navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
													history: false,
													restoreDefaultContent: false,
													autoOpen: 0, // Boolean, Number
													bodyOverflow: false,
													fullscreen: false,
													openFullscreen: false,
													closeOnEscape: true,
													closeButton: true,
													appendTo: 'body', // or false
													appendToOverlay: 'body', // or false
													overlay: true,
													overlayClose: true,
													overlayColor: 'rgba(0, 0, 0, 0.4)',
													timeout: false,
													timeoutProgressbar: false,
													pauseOnHover: false,
													timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
													transitionIn: 'comingIn',
													transitionOut: 'comingOut',
													transitionInOverlay: 'fadeIn',
													transitionOutOverlay: 'fadeOut',
													onFullscreen: function(){},
													onResize: function(){},
													onOpening: function(){},
													onOpened: function(){},
													onClosing: function(){},
													onClosed: function(){},
													afterRender: function(){}

												});

						$("#open-alert").iziModal("open");
					}else{
						alert("Başarısız");
					}
				}
			});
		});



	});
</script>  <!-- Counter Status -->
<script>
	$(document).ready(function($) {

		$("#add-row-news").on('change', '#isActive', function(event) {
			var dataID = $(this).data("id");
			var status = $(this).prop("checked");
			$.ajax({
				url: '<?=base_url('News/updateIsActiveNews')?>',
				type: 'POST',
				data: "dataID="+dataID+"&status="+status,
				dataType: 'JSON',
				error: function() {
					alert("Hata oluştu");
				},
				success: function(response) {
					if (response.success==1) {
						$("#open-alert").iziModal({
							title: 'Tebrikler',
							subtitle: 'Durumu Başarıyla Güncellediniz',
							headerColor: 'green',
							background: 'green',
													theme: 'black',  // light
													icon: "fas fa-check-circle",
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
													iframe: false,
													iframeHeight: 400,
													iframeURL: null,
													focusInput: true,
													group: '',
													loop: false,
													arrowKeys: true,
													navigateCaption: true,
													navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
													history: false,
													restoreDefaultContent: false,
													autoOpen: 0, // Boolean, Number
													bodyOverflow: false,
													fullscreen: false,
													openFullscreen: false,
													closeOnEscape: true,
													closeButton: true,
													appendTo: 'body', // or false
													appendToOverlay: 'body', // or false
													overlay: true,
													overlayClose: true,
													overlayColor: 'rgba(0, 0, 0, 0.4)',
													timeout: false,
													timeoutProgressbar: false,
													pauseOnHover: false,
													timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
													transitionIn: 'comingIn',
													transitionOut: 'comingOut',
													transitionInOverlay: 'fadeIn',
													transitionOutOverlay: 'fadeOut',
													onFullscreen: function(){},
													onResize: function(){},
													onOpening: function(){},
													onOpened: function(){},
													onClosing: function(){},
													onClosed: function(){},
													afterRender: function(){}

												});

						$("#open-alert").iziModal("open");
					}else{
						alert("Başarısız");
					}
				}
			});
		});



	});
</script>  <!-- News Status -->
<script>
	$(document).ready(function($) {

		$("#add-row-subscribers").on('change', '#isActive', function(event) {
			var dataID = $(this).data("id");
			var status = $(this).prop("checked");
			$.ajax({
				url: '<?=base_url('Subscribers/updateIsActiveSubscribers')?>',
				type: 'POST',
				data: "dataID="+dataID+"&status="+status,
				dataType: 'JSON',
				error: function() {
					alert("Hata oluştu");
				},
				success: function(response) {
					if (response.success==1) {
						$("#open-alert").iziModal({
							title: 'Tebrikler',
							subtitle: 'Durumu Başarıyla Güncellediniz',
							headerColor: 'green',
							background: 'green',
													theme: 'black',  // light
													icon: "fas fa-check-circle",
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
													iframe: false,
													iframeHeight: 400,
													iframeURL: null,
													focusInput: true,
													group: '',
													loop: false,
													arrowKeys: true,
													navigateCaption: true,
													navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
													history: false,
													restoreDefaultContent: false,
													autoOpen: 0, // Boolean, Number
													bodyOverflow: false,
													fullscreen: false,
													openFullscreen: false,
													closeOnEscape: true,
													closeButton: true,
													appendTo: 'body', // or false
													appendToOverlay: 'body', // or false
													overlay: true,
													overlayClose: true,
													overlayColor: 'rgba(0, 0, 0, 0.4)',
													timeout: false,
													timeoutProgressbar: false,
													pauseOnHover: false,
													timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
													transitionIn: 'comingIn',
													transitionOut: 'comingOut',
													transitionInOverlay: 'fadeIn',
													transitionOutOverlay: 'fadeOut',
													onFullscreen: function(){},
													onResize: function(){},
													onOpening: function(){},
													onOpened: function(){},
													onClosing: function(){},
													onClosed: function(){},
													afterRender: function(){}

												});

						$("#open-alert").iziModal("open");
					}else{
						alert("Başarısız");
					}
				}
			});
		});



	});
</script>  <!-- Subscribers Status -->
<!-- DATATABLE -->

<script >
	$(document).ready(function() {
		$('.datatable').DataTable({
			"pageLength": 5,
			language : {
				"url" : "//cdn.datatables.net/plug-ins/1.10.22/i18n/Turkish.json"
			}
		});

		$('#multi-filter-select').DataTable( {
			"pageLength": 5,
			initComplete: function () {
				this.api().columns().every( function () {
					var column = this;
					var select = $('<select class="form-control"><option value=""></option></select>')
					.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
							);

						column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
					} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			}
		});

			// Add Row

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('.datatable').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script> 
	<!-- /SERVİCES -->
	<!-- SORTABLE -->
	<script>
		$(document).ready(function(){

			$("#sortable").sortable();
			$("#sortable").on("sortupdate",function(){
				var data 	 = $(this).sortable("serialize");
				var data_url = $(this).data("url");

				$.post(data_url,{data : data},function(response){

					$("#open-alert").iziModal({
						title: 'Tebrikler',
						subtitle: 'Sıralama İşlemi Başarıyla Gerçekleşti !',
						headerColor: 'Green',
						background: 'Green',
			    		theme: 'white',  // light
			    		icon: "fas fa-check-circle",
			    		iconText: null,
			    		iconColor: 'White',
			    		rtl: false,
			    		width: 600,
			    		top: null,
			    		bottom: null,
			    		borderBottom: true,
			    		padding: 0,
			    		radius: 3,
			    		zindex: 999,
			    		iframe: false,
			    		iframeHeight: 400,
			    		iframeURL: null,
			    		focusInput: true,
			    		group: '',
			    		loop: false,
			    		arrowKeys: true,
			    		navigateCaption: true,
			    		navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
			    		history: false,
			    		restoreDefaultContent: false,
			    		autoOpen: 0, // Boolean, Number
			    		bodyOverflow: false,
			    		fullscreen: false,
			    		openFullscreen: false,
			    		closeOnEscape: true,
			    		closeButton: true,
			    		appendTo: 'body', // or false
			    		appendToOverlay: 'body', // or false
			    		overlay: true,
			    		overlayClose: true,
			    		overlayColor: 'rgba(0, 0, 0, 0.4)',
			    		timeout: false,
			    		timeoutProgressbar: false,
			    		pauseOnHover: false,
			    		timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
			    		transitionIn: 'comingIn',
			    		transitionOut: 'comingOut',
			    		transitionInOverlay: 'fadeIn',
			    		transitionOutOverlay: 'fadeOut',
			    		onFullscreen: function(){},
			    		onResize: function(){},
			    		onOpening: function(){},
			    		onOpened: function(){},
			    		onClosing: function(){},
			    		onClosed: function(){},
			    		afterRender: function(){}

			    	});

					$("#open-alert").iziModal("open");
				});

			});
		});

	</script>
