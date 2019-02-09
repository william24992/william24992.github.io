var audio = null;
var songInter;
function loadSong(e) {
  $(".fa-pause-circle")
    .removeClass("fa-pause-circle")
    .addClass("fa-play-circle");
  let link = $(e)
    .attr("href")
    .substring(1, $(e).attr("href").length);
  let pict = $(e)
    .parent()
    .find(".song-pict")
    .css("background-image");
  $.ajax({
    url: "../Controller/loadSong.php",
    type: "post",
    data: {
      link: link,
      url: pict
    }
  }).done(function(res) {
    var obj = JSON.parse(res);
    // console.log(obj);

    audio = document.getElementById("audio");
    audio.src = obj.link; //change the source
    audio.load(); //load the new source
    audio.play(); //play
    $(".fa-play-circle")
      .removeClass("fa-play-circle")
      .addClass("fa-pause-circle");

    $("#song-title").html(obj.name);
    $("#song-artist").html(obj.artist);
    $("#song-pict-bar").css("background-image", obj.url);
    $("#song-pict-bar").css("background-size", "cover");

    songInter = setInterval(time, 100);
  });
}

function convert(angka) {
  let sec = Math.floor(angka % 60) + "";
  let min = Math.floor(angka / 60) + "";
  let out = "00:00";

  if (sec.length == 1) sec = "0" + sec;
  if (min.length == 1) min = "0" + min;
  return min + ":" + sec;
}

function time() {
  if (audio.pause == true) {
    return;
  }

  $("#bar-fill").css("width", (audio.currentTime / audio.duration) * 100 + "%");
  let floored = Math.floor(audio.currentTime);
  $("#current-duration").text(convert(floored) + "");
  floored = convert(Math.floor(audio.duration));
  $("#duration").text(floored + "");

  if (audio.currentTime / audio.duration == 1) {
    $(".fa-pause-circle")
      .removeClass("fa-pause-circle")
      .addClass("fa-play-circle");
    clearInterval(songInter);
    lastSong = 1;
  }
}
var lastSong = null;
$(function() {
  $(".play-btn").click(function(e) {
    e.preventDefault();
    if ($(this).hasClass("fa-play-circle")) {
      console.log("play");

      if (audio == null) {
        // alert("Please choose a song first!");
        return;
      }

      songInter = setInterval(time, 100);
      $(this)
        .removeClass("fa-play-circle")
        .addClass("fa-pause-circle");
      audio.play();
      if (lastSong != null) {
        audio.play();
      }
    } else if ($(this).hasClass("fa-pause-circle")) {
      if (audio == null) return;
      clearInterval(songInter);
      $(this)
        .removeClass("fa-pause-circle")
        .addClass("fa-play-circle");
      audio.pause();
      console.log("pause");
    }
  });
});
