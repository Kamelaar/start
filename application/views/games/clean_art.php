<?php
/**
 * Created by IntelliJ IDEA.
 * User: Informatique
 * Date: 12/04/2019
 * Time: 09:51
 */
?>
<h1> <?= $title ?> </h1>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name='HandheldFriendly' content='True' />
    <!-- <meta name='viewport' content='initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' /> -->
    <meta name='viewport' content='user-scalable=0' />
    <meta name="viewport" content="width=device-width" />

     <title>[START] | CleanArt</title>

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/cleanart.css">
  </head>

  <body>
    <style>
    body{
    background: url("<?php echo base_url() ?>assets/img/background/CLEAN-ART-START.png")
    }
    </style>
    <span class="container center-block">
      <img id="robot" src="<?php echo base_url() ?>assets/img/cleanArt/image1.jpg" />
      <img id="redux" src="<?php echo base_url() ?>assets/img/cleanArt/image2.png" />
      <div id="progress">0%</div>
    </span>

    <script src='http://code.jquery.com/jquery-2.1.1.min.js' type='text/javascript'></script>
    <script src='<?php echo base_url() ?>assets/js/cleanArt/jquery.eraser.js' type='text/javascript'></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type = "text/javascript">

      $(function(){
        
        $("#progress").hide();

        $('#redux').eraser({
          progressFunction: function(p) {
          	var progress = p;
            $('#progress').html(Math.round(p*100)+'%');
            if (progress == '0.5'){
            	swal.fire({
					title: "Bravo tu sauvé le tableau!",
					text: "Maintenant tu peux continuer",
					type: "success",
					confirmButtonText: 'Suivant'
					}).then(function() {
					// Redirect the user
					document.location.href="puzzle_art";
					});
            };
          }
        });

        $('#resetBtn').click(function(event) {
          $('#redux').eraser('reset');
            $('#progress').html('0%');
          event.preventDefault();
        });

        $('#clearBtn').click(function(event) {
          $('#redux').eraser('clear');
            $('#progress').html('100%');
          event.preventDefault();
        });

        $('#toggleBtn').click(function(event) {
          var $redux = $('#redux'),
            $toggleBtn = $('#toggleBtn');

          if ($redux.eraser('enabled')) {
            $toggleBtn.text(' ENABLE ');
            $redux.eraser('disable');
          } else {
            $toggleBtn.text(' DISABLE ');
            $redux.eraser('enable');
          }

          event.preventDefault();
        });
      });

    </script>

  </body>

</html>

