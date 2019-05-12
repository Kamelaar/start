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
    <img id="imgEmotion" src="<?php echo base_url() ?>assets/img/emotionArt/david.jpg">
    <div id="container">
    	<ul>
    		<li><img class="emo animated infinite heartBeat" src="<?php echo base_url() ?>assets/img/emotionArt/emoticones/émoticoneAngry.png"></li>
    		<li><img class="emo animated infinite heartBeat" src="<?php echo base_url() ?>assets/img/emotionArt/emoticones/émoticoneContent.png"></li>
    		<li><img class="emo animated infinite heartBeat" src="<?php echo base_url() ?>assets/img/emotionArt/emoticones/émoticoneLove.png"></li>
    		<li><img class="emo animated infinite heartBeat" src="<?php echo base_url() ?>assets/img/emotionArt/emoticones/émoticonePeur.png"></li>
            <li><img class="emo animated infinite heartBeat" src="<?php echo base_url() ?>assets/img/emotionArt/emoticones/émoticoneTriste.png"></li>
    	</ul>
    </div>

    <div id="block" style="min-width: 310px; height: 350px; max-width: 400px; margin: 0 auto"></div>

    <div id="countdown">
    <div style="font-size: 25px;" id="countdown-number"></div>
      <svg id="cercle">
        <circle r="18" cx="48" cy="20"></circle>
      </svg>
    </div>

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

        // LE GRAPHIQUE
        Highcharts.chart('block', {
          chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
          },
          title: {
            text: 'Statistiques emoticones',
            align: 'middle',
            verticalAlign: 'top',
            y: 40
          },
          tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          },
          plotOptions: {
            pie: {
              dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                  fontWeight: 'bold',
                  color: 'white'
                }
              },
              startAngle: -90,
              endAngle: 90,
              center: ['50%', '75%'],
              size: '110%'
            }
          },
          series: [{
            type: 'pie',
            name: 'Browser share',
            innerSize: '50%',
            data: [
              ['Furieux', 30.5],
              ['Content', 21.5],
              ['Love', 10.4],
              ['Wow', 26.6],
              ['Triste', 11],
            ]
          }]
        });
        $("li").click(function(){
            $("#imgEmotion").animate({left: '250px'});
            $("#block").toggle('slow');
            setTimeout(
              function() 
              {
                        swal.fire({
                title: "Bravo tu sauvé le tableau!",
                text: "Maintenant tu peux continuer",
                type: "success",
                confirmButtonText: 'Suivant',
                //METTRE DANS CETTE URL UN GIF OU UNE IMAGE SUR LE VOILE
                backdrop: `
                  rgba(0,0,123,0.4)
                  url("/start/assets/img/logo-creteil.png")
                  center left
                  no-repeat
                `,
                //METTRE DANS CETTE URL LE FOND DE LA BOX
                background: '#ecf0f1 url(/start/assets/img/logo-creteil.png)',
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
                        // METTRE LA FICHER ARTISTE ICI //
                        // PUIS REDIRIGER UTILISATEUR VERS PUZZLE-ART //
                        //document.location.href="color_art";
                           },
                 error: function() {
                    alert("Invalide!");
                  }
                });
            });
        
              }, 3000);
        });  
        });

      
    </script>
</body>