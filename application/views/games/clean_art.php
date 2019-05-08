<?php
  $chiffre = rand (1,12);
?>
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
    background: url("<?php echo base_url() ?>assets/img/background/CLEAN-ART-START.png");
    background-size: cover;
    }
    .container{
      position : absolute;
      top : 50%; left : 50%;
      transform: translate(-50%, -50%);
    }
    </style>
    <span class="container center-block">
      <img id="robot" src="<?php echo base_url() ?>assets/img/cleanArt/image1.jpg" />
      <img id="redux" src="<?php echo base_url() ?>assets/img/cleanArt/dust.png" />
      <div id="progress">0%</div>
    </span>

    <div id="countdown">
    <div style="font-size: 25px;" id="countdown-number"></div>
      <svg>
        <circle r="18" cx="48" cy="20"></circle>
      </svg>
    </div>

    <div id="myModal" class="modal">
      <span class="close">&times;</span>
      <img class="modal-content" id="img01">
      <div id="caption"></div>
    </div>


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

        var countdownNumberEl = document.getElementById('countdown-number');
        var countdown = 60;

        countdownNumberEl.textContent = countdown;

        setInterval(function() {
          countdown = --countdown <= 0 ? 10: countdown;

          countdownNumberEl.textContent = countdown;
        }, 1000);
      });

    </script>

    <script>
</script>

  </body>

</html>

