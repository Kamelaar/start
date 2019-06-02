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
    .swal2-popup {
      height: 600px !important;
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
        type: 'column'
    },
    title: {
        text: 'Emoticone/nombre de personnes'
    },
    xAxis: {
        categories: [
          'Triste',
          'Choqué',
          'love',
          'content',
          'furieux'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nombre de personnes :'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Tokyo',
        data: [49.9, 71.5, 106.4, 129.2, 144.0]

    }]
});
        $("li").click(function(){
            $("#imgEmotion").animate({left: '250px'});
            $("#block").toggle('slow');
            setTimeout(
              function() 
              {
                swal.fire({
                background: 'no-repeat center url(/start/assets/img/emotionArt/popup-bravo.png)',
                showConfirmButton : false,
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
                        // METTRE LA FICHER ARTISTE ICI //
                        // PUIS REDIRIGER UTILISATEUR VERS PUZZLE-ART //
                        document.location.href="color_art";
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
    <script>
      $(document).ready(function(){
            swal.fire({
            background: 'no-repeat center url(/start/assets/img/emotionArt/popup-regle.png)',
            showConfirmButton : false
            })
      })
    </script>
</body>