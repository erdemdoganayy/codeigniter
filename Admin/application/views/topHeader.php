<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?=$settings->siteTitle?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?=base_url(); ?>uploads/<?=$settings->siteFavicon?>" type="image/x-icon"/>
	<!-- DROPZONE CSS -->
	<link rel="stylesheet" href="<?=base_url(); ?>assets/css/dropzone.css"/>
	<script src="<?=base_url(); ?>assets/js/dropzone.js"></script>
	<script src="<?=base_url(); ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?=base_url(); ?>public/jquery.php"></script>
	<script src="<?=base_url(); ?>public/script.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>

	<!-- Fonts and icons -->
	<script src="<?=base_url(); ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?=base_url(); ?>assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?=base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url(); ?>assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?=base_url(); ?>assets/css/demo.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css">

	<!-- CK EDİTÖR -->
	<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
</head>
<body>