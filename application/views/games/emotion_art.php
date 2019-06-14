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
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<title>[START] | EmotionArt</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/emotionart.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>
<body>
    <style>
    body{
    background: url("<?php echo base_url() ?>assets/img/background/JEU-EMOTIONS-START.png");
    background-size: cover;
    overflow-y:hidden;
    }
    .swal2-popup {
      height: 600px !important;
    }
    .placeButton{
        margin-top: 150px;
    }
    .swal-wide{
    width:950px;
    height: 650px;
}
    </style>
    <img id="imgEmotion" src="<?php echo base_url('assets/img/' . $rand_img) ?>">
    <div id="container">
    	<ul>
    		<li><img class="emo animated infinite heartBeat" id="colère" src="<?php echo base_url() ?>assets/img/emotionArt/emoticones/colère.png"></li>
    		<li><img class="emo animated infinite heartBeat" id="joie" src="<?php echo base_url() ?>assets/img/emotionArt/emoticones/joie.png"></li>
    		<li><img class="emo animated infinite heartBeat" id="amour" src="<?php echo base_url() ?>assets/img/emotionArt/emoticones/amour.png"></li>
    		<li><img class="emo animated infinite heartBeat" id="peur" src="<?php echo base_url() ?>assets/img/emotionArt/emoticones/peur.png"></li>
            <li><img class="emo animated infinite heartBeat" id="tristesse" src="<?php echo base_url() ?>assets/img/emotionArt/emoticones/tristesse.png"></li>
    	</ul>
    </div>

    <div id="block" style="min-width: 310px; height: 350px; max-width: 400px; margin: 0 auto"></div>

    <div id="countdown" style="">
    <div style="font-size: 20px;background-color:white;border-radius:20px;width:40px" id="countdown-number"></div>
      <svg id="cercle">
        <circle r="18" cx="48" cy="20"></circle>
      </svg>
    </div>
    

    <?php $titre = substr($rand_img, 0, -5); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
    <script>
    
        $(document).ready(function(){
        $("#block").hide();

        var countdownNumberEl = document.getElementById('countdown-number');
        var countdown = 60;

        countdownNumberEl.textContent = countdown;

        setInterval(function() {
          countdown = --countdown <= 0 ? 10: countdown;

          countdownNumberEl.textContent = countdown;
        }, 1000);

        $("li").click(function(){

            setTimeout(
              function() 
              {
                  swal.fire({
                background: 'no-repeat center url(/start/assets/img/emotionArt/popup-bravo.png)',
                showConfirmButton : true,
                confirmButtonClass : 'placeButton',
                animation: false,
                customClass: {
                    popup: 'animated tada'
                  }
                    })
                .then(function() {
                var time = countdownNumberEl.textContent;
                $.ajax({              //request ajax
                url:"<?php echo site_url('Game/emotion_art')?>",
                type:'POST',
                data:{time:time},
                 success: function(repons) {
                            Swal.fire({
                             html:
                                 '<h2><?php echo $work_of_art ?></h2></br>' +
                                 '<img id="imgPopup" src="<?php echo base_url('assets/img/' . $rand_img) ?>" /> ' + 
                                 '<p><?php echo $description ?></p>',
                             confirmButtonText:'Jeu suivant !', 
                            confirmButtonColor : '#e95549', 
                            animation: false, 
                            customClass: {
                                 popup: 'animated slideInLeft swal-wide'
                            }
                        })
                            .then(function (repons) {
                                    window.location = "color_art";
                            })
                        },
                 error: function() {
                    alert("Invalide!");
                  }
                });
            });
        
              }, 0);
            



        });  
        });
    </script>
    <script>
      $(document).ready(function(){
            swal.fire({
            background: 'no-repeat center url(/start/assets/img/emotionArt/popup-regle.png)',
            showConfirmButton : true,
            confirmButtonClass : 'placeButton'
            })
      })
    </script>
</body>
