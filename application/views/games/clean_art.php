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
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>
    <span class="container center-block">
      <img id="robot" src="<?php echo base_url() ?>assets/img/cleanArt/image1.jpg" />
      <img id="redux" src="<?php echo base_url() ?>assets/img/cleanArt/image2.png" />
      <div id="progress">0%</div>
    </span>

    <script src='http://code.jquery.com/jquery-2.1.1.min.js' type='text/javascript'></script>
    <script src='<?php echo base_url() ?>assets/js/cleanArt/jquery.eraser.js' type='text/javascript'></script>
    

    <script type = "text/javascript">

      $(function(){
        

        $('#redux').eraser({
          progressFunction: function(p) {
            $('#progress').html(Math.round(p*100)+'%');
            
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

