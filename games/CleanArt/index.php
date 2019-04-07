<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name='HandheldFriendly' content='True' />
    <!-- <meta name='viewport' content='initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' /> -->
    <meta name='viewport' content='user-scalable=0' />
    <meta name="viewport" content="width=device-width" />
        <title>[START] | CleanArt</title>

    <style type="text/css">
    * {
      -webkit-touch-callout: none; /* prevent callout to copy image, etc when tap to hold */
      -webkit-text-size-adjust: none; /* prevent webkit from resizing text to fit */
    /* make transparent link selection, adjust last value opacity 0 to 1.0 */
      -webkit-tap-highlight-color: rgba(100,0,0,0);
      -webkit-user-select: none; /* prevent copy paste, to allow, change 'none' to 'text' */
     /* -webkit-tap-highlight-color: rgba(0,0,0,0); */
    }

      body {
        background: #FFF;
        color: #000;
        margin: 5px;
        padding: 0px;
        margin-bottom: 45px;
        text-align: center;
        font-family: Helvetica, Arial;
      }

      a {
        color: #000;
      }

      .box {
        display: inline-block;
        color: #FFF;
        background: #000;
        padding: 10px;
        margin: 10px;
        cursor: pointer;
      }

      .box:hover {
        background: #444;
      }

      .big {
        font-size: 2em;
        display: inline-block;
        margin: 10px;
      }
      .container {
        position: relative;
        display: inline-block;
        width: 400px;
        height: 500px;
      }

      #robot {
        position: absolute;
        top: 0px;
        left: 0px;
        width : 400px;
        height: 500px ;
        z-index: 1;
        -webkit-box-shadow: 0px 0px 20px 0px #707070;
        -moz-box-shadow: 0px 0px 20px 0px #707070;
        box-shadow: 0px 0px 20px 0px #707070;
      }

      #redux {
        position: absolute;
        width : 400px;
        height: 500px;
        top: 0px;
        left: 0px;
        z-index: 2;
      }

      #progress {
        position: absolute;
        top: 4px;
        right: 4px;
        color: black;
        pointer-events: none;
        z-index: 3;
        text-shadow: 0px 0px 2px #FFFFFF;
      }
      small {
        font-size: 12px;
        color: #BBB;
        font-weight: normal;
      }

    </style>
  </head>
  <body>

    <span class="container">
      <img id="robot" src="img/mon.jpg" />
      <img id="redux" src="img/caca.png" />
      <div id="progress">0%</div>
    </span>
      <a href="../PuzzleArt/index.html" target="_blank"> <input type="button" value="Bouton"> </a>
    <p>
      <div id="resetBtn" class="box"> RESET </div>
      <div id="clearBtn" class="box"> CLEAR </div>
      <div id="toggleBtn" class="box"> DISABLE </div>
    </p>


    <script src='http://code.jquery.com/jquery-2.1.1.min.js' type='text/javascript'></script>
    <script src='jquery.eraser.js' type='text/javascript'></script>
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
