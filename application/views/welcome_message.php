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
<a id="goTo" href="<?= base_url('/game/clean_art')?>"></a>
<div id="startGame" class="start_logo animated infinite pulse"></div>

<form method="POST">
	<input type="text" id="name" name="name" required
       minlength="4" maxlength="8" size="20" placeholder="Ton nom...">
</body>



<!-- js working-->
<script src="<?=base_url('assets/js/jquery-2.2.3.min.js')?>"></script>
<!--//js working-->
<script src="<?=base_url('assets/js/anime.min.js')?>"></script>

<script>
$('#startGame').click(function(){
	document.location.href="Game/clean_art";
});
</script>
</html>
