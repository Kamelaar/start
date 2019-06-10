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
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />
  </head>

  <body>
    <style>
    body{
    background: url("<?php echo base_url() ?>assets/img/background/CLEAN-ART-START.png");
    background-size: cover;
    }
    .swal2-popup {
      height: 600px !important;
    }
    .placeButton{
        margin-top: 175px;
    }
    .swal-wide{
    width:850px;
}
    </style>
    <span class="container center-block">
      <img id="robot" src="<?php echo base_url('assets/img/' . $rand_img) ?>" />
      <img id="redux" src="<?php echo base_url() ?>assets/img/cleanArt/dust.png" />
      <div id="progress">0%</div>
    </span>

    <div id="countdown">
    <div style="font-size: 25px;" id="countdown-number"></div>
      <svg>
        <circle r="18" cx="48" cy="20"></circle>
      </svg>
    </div>


    <?php $titre = substr($rand_img, 0, -5); ?>

    <script src='http://code.jquery.com/jquery-2.1.1.min.js' type='text/javascript'></script>
    <script src='<?php echo base_url() ?>assets/js/cleanArt/jquery.eraser.js' type='text/javascript'></script>
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type = "text/javascript">

      $(function(){
        
        var countdownNumberEl = document.getElementById('countdown-number');
        var countdown = 60;

        $("#progress").hide();

        $('#redux').eraser({
          progressFunction: function(p) {
          	var progress = p;
            $('#progress').html(Math.round(p*100)+'%');
            if (progress == '0.6875'){

				let time = countdownNumberEl.textContent;

				$("#countdown").hide();

            swal.fire({
                background: 'no-repeat center url(/start/assets/img/cleanArt/popup-bravo.png)',
  					showConfirmButton : true,
            confirmButtonClass : 'placeButton',
            confirmButtonColor: '#e95549',
            animation: false,
            customClass: {
                popup: 'animated tada'
              }
  					})
            .then(function() {

				//request ajax
				$.ajax({
					url:"<?php echo site_url('game/puzzle_art')?>",
					type:'POST',
					data:{time:time},
					success: function(repons) {
						// METTRE LA FICHER ARTISTE ICI //
          Swal.fire({
            html:
              '<h2><?php echo $titre ?></h2></br>' +
              '<img id="imgPopup" src="<?php echo base_url('assets/img/' . $rand_img) ?>" /> ' + 
              '<p>Etiam nec dui ante. Nam viverra ligula quis massa rutrum, ac elementum tortor bibendum. Curabitur feugiat tincidunt tortor nec consequat. Donec et libero ac urna pellentesque dapibus. In nec pulvinar mi. Aenean a ipsum a eros bibendum tempus vitae sit amet libero. Ut pharetra ut eros id efficitur. Nulla id mauris vitae neque faucibus posuere eget eu </p>',
            confirmButtonText:'Jeu suivant !', 
            animation: false, 
            confirmButtonColor : '#e95549', 
            customClass: {
                popup: 'animated slideInLeft swal-wide'

              },function() {
            window.location = "puzzle_art";
                });
            }, 1000);
						// PUIS REDIRIGER UTILISATEUR VERS PUZZLE-ART //
					
					},
                 error: function() {
                    alert("Invalide!");
                  }

                })
				;
            })
          }
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



        countdownNumberEl.textContent = countdown;

        setInterval(function() {
          countdown = --countdown <= 0 ? 10: countdown;

          countdownNumberEl.textContent = countdown;
        }, 1000);      

    });    
    </script>

    <script>
      $(document).ready(function(){
            swal.fire({
            background: 'no-repeat center url(/start/assets/img/cleanArt/popup-regle.png)',
            showConfirmButton : true,
            confirmButtonClass : 'placeButton',
            confirmButtonColor : '#e95549', 

             })
      })
    </script>

  </body>

</html>

