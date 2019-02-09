$(document).ready(function() {
  $(".playlist-name").ready(function() {
    let request;
    request = $.ajax({
      url: "../Controller/loadAllSongs.php",
      type: "post"
    }).done(function(res) {
      var temp = JSON.parse(res);
      $("#content-holder").html(temp);
      $(".not-loaded").each(function(i, e) {
        let temp = "";
        if ($(e).attr("id") == "") temp = "ADD_PLS.png";
        else temp = $(e).attr("id");
        $(e).css("background-image", "url('../pict/" + temp + "')");
        $(e).removeAttr("id");
        $(e).removeClass("not-loaded");
      });
    });
  });
});
