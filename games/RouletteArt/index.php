<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>[START] | RouletteArt</title>

<link href='http://fonts.googleapis.com/css?family=Gravitas+One&text=1234567' rel='stylesheet' type='text/css'>

<!-- Syntax highlighting, ignore this -->
<link rel="stylesheet" href="SyntaxHighlighter/Styles/SyntaxHighlighter.css" type="text/css" media="screen" title="no title" charset="utf-8">
    <script Language="Javascript"> <!-- function LienAuHasard() { Url = new Array; base = "http://www.commentcamarche.net/"; Url[0] = "../PuzzleArt/"; Url[1] = "../CleanArt"; Url[2] = "../MemorArt/"; ChoixLien = Math.floor(Math.random() * Url.length); window.open(base + Url[ChoixLien],'_blank'); } //--> </script>
<style type="text/css">

ul {
    padding: 0;
    margin: 0;
    list-style: none;
}

.jSlots-wrapper {
    overflow: hidden;
    height: 20px;
    display: inline-block; /* to size correctly, can use float too, or width*/
    border: 1px solid #999;
}

.slot {
    float: left;
}

input[type="button"] {
    display: block;
}

/* ---------------------------------------------------------------------
   FANCY EXAMPLE
--------------------------------------------------------------------- */
.fancy .jSlots-wrapper {
    overflow: hidden;
    height: 100px;
    display: inline-block; /* to size correctly, can use float too, or width*/
    width : 300px;
    height:500px;
    border: 1px solid #999;
}

.fancy .slot li {
    width: 300px;
    height:500px;
    line-height: 100px;
    text-align: center;
    font-size: 70px;
    font-weight: bold;
    color: #fff;
    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.8);
    font-family: 'Gravitas One', serif;
    border-left: 1px solid #999;

}

.fancy .slot:first-child li {
    border-left: none;
}
.fancy .slot li:nth-child(3) {
    background: no-repeat center/80% url("../../images/logo-creteil.png");
}
.fancy .slot li:nth-child(2) {
    background: no-repeat center/80% url("../../images/logo-creteil.png");
}
.fancy .slot li:nth-child(1),
.fancy .slot li:nth-child(8) {
    background: no-repeat center/80% url("../../images/logo-creteil.png");
}

.fancy .slot li span {
    display: block;
}

/* ---------------------------------------------------------------------
   FANCY2 EXAMPLE
--------------------------------------------------------------------- */
.fancy2 .jSlots-wrapper {
    overflow: hidden;
    height: 100px;
    display: inline-block; /* to size correctly, can use float too, or width*/
    width : 300px;
    height:500px;
    border: 1px solid #999;
}

.fancy2 .slot2 li {
    width: 300px;
    height:500px;
    line-height: 100px;
    text-align: center;
    font-size: 70px;
    font-weight: bold;
    color: #fff;
    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.8);
    font-family: 'Gravitas One', serif;
    border-left: 1px solid #999;
}

.fancy2 .slot2:first-child li {
    border-left: none;
}
.fancy2 .slot2 li:nth-child(3) {
    background: no-repeat center/80% url("../../images/logo-creteil.png");
}
.fancy2 .slot2 li:nth-child(2) {
    background: no-repeat center/80% url("../../images/logo-creteil.png");
}
.fancy2 .slot2 li:nth-child(1),
.fancy2 .slot2 li:nth-child(8) {
    background: no-repeat center/80% url("../../images/logo-creteil.png");
}

.fancy2 .slot2 li span {
    display: block;
}

/* ---------------------------------------------------------------------
   ANIMATIONS
--------------------------------------------------------------------- */

@-webkit-keyframes winner {
        0%, 50%, 100% {
            -webkit-transform: rotate(0deg);
            font-size:70px;
            color: #fff;
        }
        25% {
            -webkit-transform: rotate(20deg);
            font-size:90px;
            color: #FF16D8;
        }
        75% {
            -webkit-transform: rotate(-20deg);
            font-size:90px;
            color: #FF16D8;
        }
}
@-moz-keyframes winner {
        0%, 50%, 100% {
            -moz-transform: rotate(0deg);
            font-size:70px;
            color: #fff;
        }
        25% {
            -moz-transform: rotate(20deg);
            font-size:90px;
            color: #FF16D8;
        }
        75% {
            -moz-transform: rotate(-20deg);
            font-size:90px;
            color: #FF16D8;
        }
}
@-ms-keyframes winner {
        0%, 50%, 100% {
            -ms-transform: rotate(0deg);
            font-size:70px;
            color: #fff;
        }
        25% {
            -ms-transform: rotate(20deg);
            font-size:90px;
            color: #FF16D8;
        }
        75% {
            -ms-transform: rotate(-20deg);
            font-size:90px;
            color: #FF16D8;
        }
}


@-webkit-keyframes winnerBox {
        0%, 50%, 100% {
            box-shadow: inset 0 0  0px yellow;
            background-color: #FF0000;
        }
        25%, 75% {
            box-shadow: inset 0 0 30px yellow;
            background-color: aqua;
        }
}
@-moz-keyframes winnerBox {
        0%, 50%, 100% {
            box-shadow: inset 0 0  0px yellow;
            background-color: #FF0000;
        }
        25%, 75% {
            box-shadow: inset 0 0 30px yellow;
            background-color: aqua;
        }
}
@-ms-keyframes winnerBox {
        0%, 50%, 100% {
            box-shadow: inset 0 0  0px yellow;
            background-color: #FF0000;
        }
        25%, 75% {
            box-shadow: inset 0 0 30px yellow;
            background-color: aqua;
        }
}



.winner li {
    -webkit-animation: winnerBox 2s infinite linear;
       -moz-animation: winnerBox 2s infinite linear;
        -ms-animation: winnerBox 2s infinite linear;
}
.winner li span {
     -webkit-animation: winner 2s infinite linear;
        -moz-animation: winner 2s infinite linear;
         -ms-animation: winner 2s infinite linear;
}
#point{
    height: 500px;
    z-index : -1;
}
/* Syntax Highlighter, ignore */
.dp-highlighter ol {
    padding: 10px;
}

#content{
    display: inline-flex;
    height: 600px;
}

#wrapper{
    border : 2px solid black;
    text-align: center;
}

.bouton17 {
    width:85px;
    height:85px;
    background:#fafafa;
    box-shadow:2px 2px 8px #aaa;
    font:bold 13px Arial;
    border-radius:50%;
    color:#555;
    margin-left: 100px;
}
#btnRestart{
    float : left;
    margin-left: 30%
}
#btnNext{
    float :right;
    margin-right : 30%;
}
#btns{
    position: absolute; /* postulat de départ */
    top: 85%; left: 50%; /* à 50%/50% du parent référent */
    transform: translate(-50%, -50%);     
    width : 100%;
}
#messagebox{
    background-color: red;
    display : inline-grid;
    height : 150px;
    position: absolute; /* postulat de départ */
    top: 85%; left: 50%; /* à 50%/50% du parent référent */
    transform: translate(-50%, -50%); 
}
label {
     vertical-align: top;
     text-align: center;
}
textarea{
}
</style>



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
            <img id="point" src="../../images/pointInterrogation.png" />
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
     <div id="messagebox">
        <label for="story">Penses-tu voir une oeuvre d'art ? Oui, tu ecris, non tu relances ?</label>
        <textarea id="story" name="story"
          rows="3" cols="33">
        </textarea>
    </div>  
    <div id="btns">
        <a href="#" onClick="goSomewhere(); return false;">Gimme something weird!
            <input type="button" class="bouton17" id="btnNext" value="Next">
        </a>
        <a href="#" onClick="LienAuHasard()">Lien aléatoire</a>
        <input  type="button" class="bouton17" id="btnRestart" value="Restart" href="#" onClick="LienAuHasard();"   >
        <input type="button" class="bouton17" id="btnNext" value="Next">
    </div>

  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
    <script src="jquery.jSlots.min.js" type="text/javascript" charset="utf-8"></script>
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
            loops : 6,
            onStart : function() {
                $('.slot').removeClass('winner');
            },
            onWin : function(winCount, winners, finalNumbers) {
                // only fires if you win

                $.each(winners, function() {
                    this.addClass('winner');
                });
            }
        });
        $('#playFancy').click(function(){
            $('#playFancy').hide();
            $(".fancy .jSlots-wrapper").css("position","fixed" ).animate({
                                                                        zindex :'2',
                                                                        left: '470px',
                                                                      });
        } );

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
            loops : 10,
            onStart : function() {
                $('.slot2').removeClass('winner');
            },
            onWin : function(winCount, winners, finalNumbers) {
                // only fires if you win

                $.each(winners, function() {
                    this.addClass('winner');
                });
            }
        });

        $('#playFancy2').click(function(){
            $('#playFancy2').hide();
            $(".fancy2 .jSlots-wrapper").css("position","fixed" ).animate({
                                                                        zindex :'2',
                                                                        right: '470px',
                                                                      });
        });

        $(document).ready(function(){
            $("#messagebox").hide();
            $("#bts").hide();
        });

        var urls = [
        "/start1/games/PuzzleArt/",
        "/start1/"
   
    ];

    function goSomewhere() {
        var url = urls[Math.floor(Math.random()*urls.length)];
        window.location = url; // redirect
    }

    </script>

    <!-- Syntax highlighting, ignore this -->
    <script src="SyntaxHighlighter/Scripts/shCore.js" type="text/javascript" charset="utf-8"></script>
    <script src="SyntaxHighlighter/Scripts/shBrushCss.js" type="text/javascript" charset="utf-8"></script>
    <script src="SyntaxHighlighter/Scripts/shBrushJScript.js" type="text/javascript" charset="utf-8"></script>
    <script src="SyntaxHighlighter/Scripts/shBrushXml.js" type="text/javascript" charset="utf-8"></script>
    <script language="javascript">
        dp.SyntaxHighlighter.ClipboardSwf = '/flash/clipboard.swf';
        dp.SyntaxHighlighter.HighlightAll('code', false, false )//, [collapseAll], [firstLine], [showColumns] );
        //HighlightAll(name, [showGutter], [showControls], [collapseAll], [firstLine], [showColumns])
    </script>
    <!-- /Syntax highlighting -->

</body>
</html>
