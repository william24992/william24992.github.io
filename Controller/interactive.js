$(document).ready(function() {
  $("#my-song").click(function() {
    $("#mid").css(
      "background",
      "linear-gradient(rgb(47, 187, 47), rgb(19, 4, 48) 85%)"
    );
    $.ajax({
      url: "../Controller/loadAllSongs.php",
      type: "post"
    }).done(function(res) {
      var temp = JSON.parse(res);
      $("#content-holder").html(temp);
      $(".not-loaded").each(function(i, e) {
        $(e).css("background-image", "url('../pict/" + $(e).attr("id") + "')");
        $(e).removeAttr("id");
        $(e).removeClass("not-loaded");
      });
    });
    $("#content-holder")
      .parent()
      .find("h1")
      .text("List of Songs");
  });
  $("#playlists").click(function() {
    //ajax
    $("#mid").css(
      "background",
      "linear-gradient(rgb(120,80,40), rgb(0,0,0) 85%)"
    );
    $.ajax({
      url: "../Controller/fetchPlaylist.php",
      type: "post"
    }).done(function(params) {
      $("#content-holder").html(params);
    });

    $("#content-holder")
      .parent()
      .find("h1")
      .text("My Playlists");
  });
  $("#favorites").click(function() {
    $("#mid").css("background", "linear-gradient(tomato, rgb(19, 4, 48) 85%)");
    $("#content-holder").html("");
    $("#content-holder")
      .parent()
      .find("h1")
      .text("My Favorites");
  });
  $("#search").click(function() {
    $("#mid").css(
      "background",
      "linear-gradient(	rgb(50,128,114), rgb(0, 80, 48) 85%)"
    );
    $("#content-holder")
      .parent()
      .find("h1")
      .html(
        "<input type='text' onkeyup='search_query();' placeholder='Search here' id='search-val'>"
      )
      .parent();
    $("#content-holder").html("");
  });

  $("#query-me").click(function() {
    $("#mid").css(
      "background",
      "linear-gradient(	rgb(250,128,114), rgb(100, 80, 48) 85%)"
    );

    $("#content-holder").html(
      "<input type='text'  id='query-zone' size='25'>" +
        "<input type='submit' value='Query' onclick='goQuery();'>" +
        "<input type='submit' value='Delete' onclick='auto_del();'>" +
        "<input type='submit' value='Update' onclick='auto_upd();'>"
    );
    $("#content-holder")
      .parent()
      .find("h1")
      .text("Query Zone");
  });
  $("#charts").click(function() {
    $("#mid").css(
      "background",
      "linear-gradient(rgb(81, 100, 192), rgb(22, 10, 5) 85%)"
    );
    $("#content-holder").html("");
    $("#content-holder")
      .parent()
      .find("h1")
      .text("Charts");
  });
  $("#add-own").click(function() {
    $("#mid").css(
      "background",
      "linear-gradient(rgb(150,150, 100), rgb(80, 50, 105) 85%)"
    );

    $("#content-holder").html(
      "<div id='form-wraper'>" +
        "<input type='text'  autocomplete='off'  id='path-value' value='../TEMP' onkeyup='getPath();' placeholder='e.g. D:/my-song/'></input>" +
        "<div id='content-search'></div>" +
        "</div>"
    );
    getPath();
    $("#content-holder")
      .parent()
      .find("h1")
      .text("Search your folder :");
  });
  $(".volume-btn").click(function() {
    if ($(this).hasClass("not-muted")) {
      $(this)
        .removeClass("not-muted")
        .addClass("muted")
        .removeClass("fa-volume-up")
        .addClass("fa-volume-off");
      document.getElementById("audio").volume = 0;
    } else if ($(this).hasClass("muted")) {
      $(this)
        .removeClass("muted")
        .addClass("not-muted")
        .removeClass("fa-volume-off")
        .addClass("fa-volume-up");
      document.getElementById("audio").volume = 0.5;
    }
  });
});
function getPath() {
  // console.log("test:" + $("#path-value").val());

  $.ajax({
    url: "../Controller/getPath.php",
    type: "post",
    data: {
      path: $("#path-value").val()
    }
  }).done(function(res) {
    $("#content-search").html(res);
  });
}
function getChildToLoad(e) {
  loadSong(
    $(e)
      .parent()
      .find(".song-text")
  );
}
function goQuery() {
  $.ajax({
    url: "../Controller/doQuery.php",
    type: "post",
    data: {
      query: $("#query-zone").val()
    }
  }).done(function(params) {
    alert(params);
  });
}
function auto_del() {
  $("#query-zone").val("DELETE FROM table WHERE col = cond1");
}
function auto_upd() {
  $("#query-zone").val("UPDATE table SET col1 = val1,col2 = val2 WHERE ");
}
function search_query() {
  $.ajax({
    url: "../Controller/Search.php",
    type: "post",
    data: {
      value: $("#search-val")
        .val()
        .trim()
    }
  }).done(function(params) {
    var temp = JSON.parse(params);
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
}
