<?php
/**
 * Created by IntelliJ IDEA.
 * User: Informatique
 * Date: 12/04/2019
 * Time: 10:58
 */
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<title>[START] | RouletteArt</title>

<!-- Syntax highlighting, ignore this -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/rouletteart.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/component.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />

</head>

<body>
    <style>
    body{
    background: url("<?php echo base_url() ?>assets/img/background/ROULETTE-ART-START.png");
    background-size: cover;
    }
    .swal2-popup {
    height: 600px !important;
    }
    .placeButton{
    margin-top: 150px;
    }

	/*Roulette gauche*/

	.fancy .slot li:nth-child(4)
	{
		background: center url('<?php echo base_url('assets/img/' . $img_left_4) ?>');
		background-size: cover;
	}
	.fancy .slot li:nth-child(3)
	{
		background: center url('<?php echo base_url('assets/img/' . $img_left_3) ?>');
		background-size: cover;
	}
	.fancy .slot li:nth-child(2)
	{
		background: center url('<?php echo base_url('assets/img/' . $img_left_1) ?>');
		background-size: cover;
	}
	.fancy .slot li:nth-child(1),
	.fancy .slot li:nth-child(8)
	{
		background: center url('<?php echo base_url('assets/img/' . $img_left_2) ?>');
		background-size: cover;
	}

	/*roulette droite*/
	.fancy2 .slot2 li:nth-child(4)
	{
		background: center url('<?php echo base_url('assets/img/' . $img_right_4) ?>');
		background-size: cover;
	}
    .fancy2 .slot2 li:nth-child(3)
	{
    background: center url('<?php echo base_url('assets/img/' . $img_right_2) ?>');
    background-size: cover;
    }
    .fancy2 .slot2 li:nth-child(2)
	{
    background: center url('<?php echo base_url('assets/img/' . $img_right_3) ?>');
    background-size: cover;
    }
    .fancy2 .slot2 li:nth-child(1),
    .fancy2 .slot2 li:nth-child(8) {
    background: center url('<?php echo base_url('assets/img/' . $img_right_1) ?>');
    background-size: cover;
    }

    </style>
    <div id="wrapper">
        <div id="content">
            <div class="fancy">
                <ul class="slot">
                    <!-- In reverse order so the 7s show on load -->
					<li class="hardware"><span> </span></li>
                    <li class="hardware"><span> </span></li>
                    <li class="hardware"><span> </span></li>
                    <li class="hardware"><span> </span></li>
                </ul>
                <input type="button" class="btn-2j btn-2 btn" id="playFancy"  value="JOUER!">
            </div>
            <div class="fancy2">
                <ul class="slot2">
                    <!-- In reverse order so the 7s show on load -->
					<li class="hardware2"><span> </span></li>
					<li class="hardware2"><span> </span></li>
                    <li class="hardware2"><span> </span></li>
                    <li class="hardware2"><span> </span></li>
                </ul>
                <input type="button" class="btn-2j btn-2 btn" id="playFancy2"  value="JOUER!">
            </div>
        </div>
    </div>
    <div id="countdown">
    <div style="font-size: 25px;" id="countdown-number"></div>
      <svg>
        <circle r="18" cx="48" cy="20"></circle>
      </svg>
    </div>
    <input type="button" class="btn btn-2 btn-2h" id="btnConfirm" value="Confirmer">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.jSlots.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
        
$(document).ready(function(){
        var stringUrl, stringUrl2;
        // normal example
        $('.normal .slot').jSlots({
            spinner : '#playNormal',
            winnerNumber : 7
        });
        // fancy example
        $('.fancy .slot').jSlots({
            number : 1,
            winnerNumber : 1,
            spinner : '#playFancy',
            easing : 'swing',
            time : 1000,
            loops : 1,
            onStart : function() {

                $('.slot').removeClass('winner');
            },
            onWin : function(winCount, winners, finalNumbers) {

            },  
            onEnd : function(winCount, winners, finalNumbers) {
           
            var selector = $('.fancy .slot li:nth-child(' +winCount[0])
            stringUrl = selector.css('background-image'); //<==============
            stringUrl = stringUrl.replace('url(','').replace(')','');
            stringUrl = stringUrl.substr(41);


        }
        });

        // normal example
        $('.normal .slot2').jSlots({
            spinner : '#playNormal',
            winnerNumber : 7
        });
        // fancy example
        $('.fancy2 .slot2').jSlots({
            number : 1,
            winnerNumber : 1,
            spinner : '#playFancy2',
            easing : 'easeOutSine',
            time : 1000,
            loops : 1,
            onStart : function() {
                $('.slot2').removeClass('winner');
            },
            onWin : function(winCount, winners, finalNumbers) {

            },
            onEnd : function(winCount, winners, finalNumbers) { 
            var selector = $('.fancy2 .slot2 li:nth-child(' +winCount[0])
            stringUrl2 = selector.css('background-image'); //<==============
            stringUrl2 = stringUrl2.replace('url(','').replace(')','');
            stringUrl2 = stringUrl2.substr(41);
            
            }
        });

        $('#btnConfirm').click(function(){

			$("#countdown").hide();

           var toto = $( ".hardware:visible" ).css('background-image');
           var toto2 = $( ".hardware2:visible" ).css('background-image');
            var toto = $('.fancy2 .slot2 li:nth-child(2)').css('background-image');
            var toto2 = $('.fancy .slot li:nth-child(2)').css('background-image');
            var toto = toto.substr(45);
            var toto2 = toto2.substr(45);
            console.log(stringUrl);
            console.log(stringUrl2);
            if(stringUrl == stringUrl2){

            Swal.fire({
            background: 'no-repeat center url(/start/assets/img/rouletteArt/popup-bravo.png)',
            showConfirmButton : true,
            confirmButtonClass : 'placeButton',
            confirmButtonColor: '#253654',
              animation: false,
                customClass: {
                    popup: 'animated tada'
                }

            }).then((result) => {
              if (result.value) {
               var time = countdownNumberEl.textContent;
                        $.ajax({              //request ajax
                        url:"<?php echo site_url('Game/roulette_art')?>",
                        type:'POST',
                        data:{time:time},
                         success: function(repons) {
                                // METTRE LA FICHER ARTISTE ICI //
                                // PUIS REDIRIGER UTILISATEUR VERS PUZZLE-ART //
                                document.location.href="emotion_art";
                                   },
                         error: function() {
                            alert("Invalide!");
                          }
                        });
                      }
                    })
                    }
                else{
                    Swal.fire({
                        background: 'no-repeat center url(/start/assets/img/rouletteArt/popup-oups.png)',
                        showConfirmButton : true,
                        confirmButtonClass : 'placeButton',
                        confirmButtonColor: '#edc622',
                          animation: false,
                            customClass: {
                                popup: 'animated tada borderstyle'
                            }

                        })
                }
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
      $(document).ready(function(){
            swal.fire({
            background: 'no-repeat center url(/start/assets/img/rouletteArt/popup-regle.png)',
            showConfirmButton : true,
            confirmButtonClass : 'placeButton',
            confirmButtonColor: '#253654'
            })
      })
    </script>
    <script>
        function calcNumGauche() {
            var toto = $( ".hardware:visible" ).css('background-image');
            console.log(toto);
            return toto;
        }

        function calcNumDroite() {
             var toto2 = $( ".hardware2:visible" ).css('background-image');
             console.log(toto2)
             return toto2;
        }
    </script>


	<script>
		$(document).ready(function(){
			$("#playFancy2").click();
		});
	</script>
	<script>
		$(document).ready(function(){
			$("#playFancy").click();
		});
	</script>

</body>
</html>
