<?php
/**
 * Created by IntelliJ IDEA.
 * User: Informatique
 * Date: 12/04/2019
 * Time: 09:51
 */
?>
<!DOCTYPE html><html lang="en">
<head>
    <meta charset="utf-8">
	<title>[START] | EmotionArt</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/emotionart.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>
<body>
    <style>
    body{
    background: url("<?php echo base_url() ?>assets/img/background/JEU-EMOTIONS-START.png");
    background-size: cover;
    }
    </style>
    <img id="imgEmotion" src="<?php echo base_url() ?>assets/img/david.jpg">
    <div id="container">
    	<ul>
    		<li><img class="animated infinite heartBeat" src="<?php echo base_url() ?>assets/img/svg/in-love.svg"></li>
    		<li><img class="animated infinite heartBeat" src="<?php echo base_url() ?>assets/img/svg/happy.svg"></li>
    		<li><img class="animated infinite heartBeat" src="<?php echo base_url() ?>assets/img/svg/confused.svg"></li>
    		<li><img class="animated infinite heartBeat" src="<?php echo base_url() ?>assets/img/svg/unhappy.svg"></li>
    	</ul>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
    	$("li").click(function(){
    		(async function getText () {
				const {value: text} = await Swal.fire({
				  title: 'Pourquoi tu as utilisé cet emoji?',
				  input: 'textarea',
				  inputPlaceholder: 'Exprime toi..',
				  showCancelButton: true,
				  cancelButtonText: 'je choisis un autre emoji',
				  confirmButtonText: 'Jeu suivant !'
				})

				if (text) {
				  Swal.fire(text)
				  document.location.href="clean_art";
				}
				})()
    	});
    </script>
</body>