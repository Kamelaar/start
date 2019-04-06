<style>

* {
  margin: 0;
  padding: 0;
}
body {
  font: 18px Verdana;
  color: #FFF;
  background: #CCC;
}
#picbox {
  margin: 0px auto;
  width: 640px;
}
#boxcard {
  z-index: 1;
  margin: 10px 0 0;
}
#boxcard div{
  float: left;
  width: 100px;
  height: 100px;
  margin: 5px;
  padding: 5px;
  border: 4px solid #EE872A;
  cursor: pointer;
  border-radius: 10px;
  box-shadow: 0 1px 5px rgba(0,0,0,.5);
  background: #B1B1B1;
  z-index: 2;
}
#boxcard div img {
  display: none;
  border-radius: 10px;
  z-index: 3;
}
#boxbuttons {
  text-align: center;
  margin: 20px;
  display: block;
}
#boxbuttons .button {
  text-transform: uppercase;
  background: #EE872A;
  padding: 5px 10px;
  margin: 5px;
  border-radius: 10px;
  cursor: pointer;
}
#boxbuttons .button:hover {
  background: #999;
}
</style>

<div id="picbox">
  <span id="boxbuttons">
    <span class="button">
      <span id="counter">0</span>
      Clicks
    </span>
    <span class="button">
      <a onclick="ResetGame();">Reset</a>
    </span> 
  </span>
  <div id="boxcard"></div>
</div>

<script>

var BoxOpened = "";
var ImgOpened = "";
var Counter = 0;
var ImgFound = 0;

var Source = "#boxcard";

var ImgSource = [
  "../../images/logo-creteil.png",
  "../../images/logo-creteil.png",
  "../../images/logo-creteil.png",
  "../../images/logo-creteil.png",
  "http://img4.uploadhouse.com/fileuploads/17699/176992601ca0f28ba4a8f7b41f99ee026d7aaed8.png",
  "http://img3.uploadhouse.com/fileuploads/17699/17699259cb2d70c6882adc285ab8d519658b5dd7.png",
  "http://img2.uploadhouse.com/fileuploads/17699/1769925824ea93cbb77ba9e95c1a4cec7f89b80c.png",
  "http://img7.uploadhouse.com/fileuploads/17699/1769925708af4fb3c954b1d856da1f4d4dcd548a.png",
  "http://img9.uploadhouse.com/fileuploads/17699/176992568b759acd78f7cbe98b6e4a7baa90e717.png",
  "http://img9.uploadhouse.com/fileuploads/17699/176992554c2ca340cc2ea8c0606ecd320824756e.png"
];

function RandomFunction(MaxValue, MinValue) {
    return Math.round(Math.random() * (MaxValue - MinValue) + MinValue);
  }
  
function ShuffleImages() {
  var ImgAll = $(Source).children();
  var ImgThis = $(Source + " div:first-child");
  var ImgArr = new Array();

  for (var i = 0; i < ImgAll.length; i++) {
    ImgArr[i] = $("#" + ImgThis.attr("id") + " img").attr("src");
    ImgThis = ImgThis.next();
  }
  
    ImgThis = $(Source + " div:first-child");
  
  for (var z = 0; z < ImgAll.length; z++) {
  var RandomNumber = RandomFunction(0, ImgArr.length - 1);

    $("#" + ImgThis.attr("id") + " img").attr("src", ImgArr[RandomNumber]);
    ImgArr.splice(RandomNumber, 1);
    ImgThis = ImgThis.next();
  }
}

function ResetGame() {
  ShuffleImages();
  $(Source + " div img").hide();
  $(Source + " div").css("visibility", "visible");
  Counter = 0;
  $("#success").remove();
  $("#counter").html("" + Counter);
  BoxOpened = "";
  ImgOpened = "";
  ImgFound = 0;
  return false;
}

function OpenCard() {
  var id = $(this).attr("id");

  if ($("#" + id + " img").is(":hidden")) {
    $(Source + " div").unbind("click", OpenCard);
  
    $("#" + id + " img").slideDown('fast');

    if (ImgOpened == "") {
      BoxOpened = id;
      ImgOpened = $("#" + id + " img").attr("src");
      setTimeout(function() {
        $(Source + " div").bind("click", OpenCard)
      }, 300);
    } else {
      CurrentOpened = $("#" + id + " img").attr("src");
      if (ImgOpened != CurrentOpened) {
        setTimeout(function() {
          $("#" + id + " img").slideUp('fast');
          $("#" + BoxOpened + " img").slideUp('fast');
          BoxOpened = "";
          ImgOpened = "";
        }, 400);
      } else {
        $("#" + id + " img").parent().css("visibility", "hidden");
        $("#" + BoxOpened + " img").parent().css("visibility", "hidden");
        ImgFound++;
        BoxOpened = "";
        ImgOpened = "";
      }
      setTimeout(function() {
        $(Source + " div").bind("click", OpenCard)
      }, 400);
    }
    Counter++;
    $("#counter").html("" + Counter);

    if (ImgFound == ImgSource.length) {
      $("#counter").prepend('<span id="success">You Found All Pictues With </span>');
    }
  }
}

$(function() {

for (var y = 1; y < 3 ; y++) {
  $.each(ImgSource, function(i, val) {
    $(Source).append("<div id=card" + y + i + "><img src=" + val + " />");
  });
}
  $(Source + " div").click(OpenCard);
  ShuffleImages();
});

</script>