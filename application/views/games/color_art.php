<?php 
    
    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
    
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>[START] | COLORART</title>
		  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/screen.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/colorArt.css">
	</head>
	<body>
	<style>
	body{
	background: url("<?php echo base_url() ?>assets/img/background/PALETTTE-COULEUR-START.png");
  background-size: cover;
	}
	</style>

	<section id="examples" class="examples-section">
	    <div class="container">	
	      <div id="example-images"></div>
	    </div>
	</section>

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        <div id="color2" class="swatch" style="background-color: <?php echo 'red'?>"></div>
        <div id="color1" class="swatch" style="background-color: rgb({{color.0}}, {{color.1}}, {{color.2}})"></div>
        <div id="color2" class="swatch" style="background-color: <?php echo 'blue'?>"></div>
      </div>
    </div>
  </script>

  <script>

  </script>
	</body>
</html>