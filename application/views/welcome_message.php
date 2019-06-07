<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Start</title>
	<!--Pour les mouvements du logo: librairie animate.css-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
	<!--meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Dragon Hunt Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
         Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//meta tags ends here-->
	<!--booststrap-->
	<link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" media="all">
	<!--//booststrap end-->
	<!-- font-awesome icons -->
	<link href="<?= base_url('assets/css/fontawesome-all.min.css')?>" rel="stylesheet" type="text/css" media="all">
	<!-- //font-awesome icons -->
	<!-- Custom fonts for this template-->
	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" >
	<!-- Nav-CSS -->
	<link href="<?= base_url('assets/css/nav.css')?>" rel="stylesheet" type="text/css" media="all" />
	<script src="<?= base_url('assets/js/modernizr.custom.js')?>"></script>
	<!-- //Nav-CSS -->
	<!-- banner -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/uncover.css')?>" />
	<!--//banner -->
	<!--stylesheets-->
	<link href="<?= base_url('assets/css/style.css')?>" rel='stylesheet' type='text/css' media="all">
	<!--//stylesheets-->
	<link href="//fonts.googleapis.com/css?family=Cinzel+Decorative:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<!--The home page soundtrack-->
<audio autoplay loop>
	<source src="<?= base_url('assets/audio/home_page.mp3')?>" type="audio/ogg">
	Votre navigateur ne supporte pas le format MP3.
</audio>

<!--The game logo-->
<div class = "start_logo">
	<!-- Button trigger modal -->

	<a class="nav-link button-start-position flashit"  data-toggle="modal" data-target="#exampleModal">
		<i class="far fa-hand-pointer fa-2x"></i>
	</a>



	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content pseudo-modal">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Saisis ton nom et appuies sur commencer</h5>
				</div>

				<?= form_open('game/clean_art') ?>

				<div class="modal-body">
					<input type="text" class="form-control" id="player_name" name="player_name">
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value = "Commencer la partie">
				</div>

				<?= form_close() ?>

			</div>
		</div>
	</div>
</div>

</body>



<!-- js working-->
<script src="<?=base_url('assets/js/jquery-2.2.3.min.js')?>"></script>
<!--//js working-->
<!-- For-Banner -->
<script src="<?=base_url('assets/js/imagesloaded.pkgd.min.js')?>"></script>
<script src="<?=base_url('assets/js/anime.min.js')?>"></script>
<script src="<?=base_url('assets/js/uncover.js')?>"></script>
<script src="<?=base_url('assets/js/demo1.js')?>"></script>
<!-- //For-Banner -->
<!--nav menu-->
<script src="<?=base_url('assets/js/classie.js')?>"></script>
<script src="<?=base_url('assets/js/demonav.js')?>"></script>
<!-- //nav menu-->
<!-- bootstrap working-->
<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
<!-- // bootstrap working-->


</html>
