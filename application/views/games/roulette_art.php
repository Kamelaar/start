<?php
/**
 * Created by IntelliJ IDEA.
 * User: Informatique
 * Date: 12/04/2019
 * Time: 10:58
 */
?>
<h1> <?= $title ?> </h1>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>[START] | RouletteArt</title>

<link href='http://fonts.googleapis.com/css?family=Gravitas+One&text=1234567' rel='stylesheet' type='text/css'>

<!-- Syntax highlighting, ignore this -->
<link rel="stylesheet" href="SyntaxHighlighter/Styles/SyntaxHighlighter.css" type="text/css" media="screen" title="no title" charset="utf-8">
    <script Language="Javascript"> <!-- function LienAuHasard() { Url = new Array; base = "http://www.commentcamarche.net/"; Url[0] = "../PuzzleArt/"; Url[1] = "../CleanArt"; Url[2] = "../MemorArt/"; ChoixLien = Math.floor(Math.random() * Url.length); window.open(base + Url[ChoixLien],'_blank'); } //--> </script>
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
    <!-- <div id="messagebox">
        <label for="story">Penses-tu voir une oeuvre d'art ? Oui, tu ecris, non tu relances ?</label>
        <textarea id="story" name="story"
          rows="3" cols="33">
        </textarea>
    </div>  
    <div id="btns">
        <input  type="button" class="bouton17" id="btnRestart" value="Restart" href="#" onClick="LienAuHasard();"   >
        <input type="button" class="bouton17" id="btnNext" value="Next">
    </div>-->

  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
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