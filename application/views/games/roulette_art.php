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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>[START] | RouletteArt</title>

<!-- Syntax highlighting, ignore this -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/rouletteart.css">
</head>

<body>

    <div id="wrapper">
        <div id="content">
            <div class="fancy">
                <ul class="slot">
                    <!-- In reverse order so the 7s show on load -->
                    <li><span>3</span></li>
                    <li><span>2</span></li>
                    <li><span>1</span></li>
                </ul>
                <input type="button" class="bouton17" id="playFancy" value="Play">
            </div>
            <div class="fancy2">
                <ul class="slot2">
                    <!-- In reverse order so the 7s show on load -->
                    <li><span>3</span></li>
                    <li><span>2</span></li>
                    <li><span>1</span></li>
                </ul>
                <input type="button" class="bouton17" id="playFancy2" value="Play">
            </div>
        </div>
    </div>
    <input type="button" class="bouton17" id="btnConfirm" value="Confirmer">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.jSlots.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
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
            }
        });

        $('#btnConfirm').click(function(){
            Swal.fire({
              title: 'Tu penses avoir reconstitué le tableau?',
              text: "You won't be able to revert this!",
              type: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Oui ! Jeu suivant.',
              cancelButtonText : 'Non ! Rejouer.'
            }).then((result) => {
              if (result.value) {
               document.location.href="";
              }
            })
        });
    </script>
</body>
</html>
