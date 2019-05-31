<?php 
    
    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
    $color2 = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
    $color3 = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
    
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>[START] | COLORART</title>
		  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/screen.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/colorArt.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />

	</head>
	<body>
	<style>
	body{
	background: url("<?php echo base_url() ?>assets/img/background/PALETTTE-COULEUR-START.png");
  background-size: cover;
	}
  .swal2-popup {
      height: 600px !important;
  }
	</style>

	<section id="examples" class="examples-section">
	    <div class="container">	
	      <div id="example-images"></div>
	    </div>
	</section>

    <div id="countdown">
    <div style="font-size: 25px;" id="countdown-number"></div>
      <svg>
        <circle r="18" cx="48" cy="20"></circle>
      </svg>
    </div>

    <div id="blocklock">
      <img id="loser" class="topArrow" src="<?php echo base_url() ?>assets/img/colorArt/svg/go-to-the-top-hand-drawn-interface-symbol-with-an-arrow-pointing-up-to-a-thin-rectangle.svg" />
      <img id="loser" class="topArrow" src="<?php echo base_url() ?>assets/img/colorArt/svg/go-to-the-top-hand-drawn-interface-symbol-with-an-arrow-pointing-up-to-a-thin-rectangle.svg" />
      <img id="winner" class="topArrow" src="<?php echo base_url() ?>assets/img/colorArt/svg/go-to-the-top-hand-drawn-interface-symbol-with-an-arrow-pointing-up-to-a-thin-rectangle.svg" />
      <img id="loser" class="topArrow" src="<?php echo base_url() ?>assets/img/colorArt/svg/go-to-the-top-hand-drawn-interface-symbol-with-an-arrow-pointing-up-to-a-thin-rectangle.svg" />
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  	<script src="<?php echo base_url() ?>assets/js/demo.js"></script>
  	<script src="<?php echo base_url() ?>assets/js/mustache.js"></script>
  	<script src="<?php echo base_url() ?>assets/js/color-thief.js"></script>

  	<!-- Mustache templates -->
  <script id='image-section-template' type='text/x-mustache' >
    {{#images}}
    <div class="image-section {{class}}">
      <div class="image-wrap">
        <button style="display:none;" class="run-functions-button">
          <span class="no-touch-label">Click</span>
          <span class="touch-label">Tap</span>
        </button>
        <img class="target-image" src="{{file}}" />
      </div>
      <div class="color-thief-output"></div>
    </div>
    {{/images}}
  </script>

    <script id="color-thief-output-template" type="text/x-mustache">
    <div class="function get-color">
      <h3 class="function-title">Quelle est la couleur dominante du tableau?</h3>
      <div class="swatches">
        <div id="color2" class="swatch" style="background-color: <?php echo $color?>"></div>
        <div id="color2" class="swatch" style="background-color: <?php echo $color2?>"></div>
        <div id="color1" class="swatch" style="background-color: rgb({{color.0}}, {{color.1}}, {{color.2}})"></div>
        <div id="color2" class="swatch" style="background-color: <?php echo $color3?>"></div>
      </div>
    </div>
  </script>

  <script>
    $(document).ready(function(){

        $('#blocklock').hide();

        var countdownNumberEl = document.getElementById('countdown-number');
        var countdown = 60;

        countdownNumberEl.textContent = countdown;

        setInterval(function() {
          countdown = --countdown <= 0 ? 10: countdown;

          countdownNumberEl.textContent = countdown;
        }, 1000);

        $('#loser').click(function(){
          Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: '<a href>Why do I have this issue?</a>'
          })
        });

        $('#winner').click(function(){
          var time = countdownNumberEl.textContent;
          var points = 25;
          $.ajax({      
                url:"<?php echo site_url('Game/color_art')?>",
                type:'POST',
                data:{time:time,points:points},
                 success: function(repons) {
                  swal.fire({
                  title: "Bravo tu retrouvé la bonne couleur!",
                  text: "Maintenant tu peux continuer",
                  type: "success",
                  confirmButtonText: 'Suivant',
                  animation: false,
                  customClass: {
                      popup: 'animated tada'
                    }
                  })
                  .then(function() {
                      document.location.href="score_final";
                  });
                    },
                 error: function() {
                    alert("Invalide!");
                  }
              
                });
        });

    });
  </script>

	</body>
</html>