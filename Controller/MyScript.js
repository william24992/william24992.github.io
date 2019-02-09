function onClick(elem) {
  $("#active").attr("id", "");
  $(elem).attr("id", "active");
}

$(document).on(
  {
    mouseenter: function() {
      $(this)
        .parent()
        .find(".add-btn")
        .css("background-color", "red");
    },
    mouseleave: function() {
      $(this)
        .parent()
        .find(".add-btn")
        .css("background-color", "rgb(42, 167, 79)");
    },
    click: function() {
      if (
        $(this)
          .parent()
          .find("input")
          .val() == ""
      ) {
        alert("Please insert the album id");
        return;
      }
      $.ajax({
        url: "../Controller/addToServer.php",
        type: "post",
        data: {
          link: $("#path-value").val() + "/",
          name: $(this)
            .parent()
            .find(".song-file")
            .attr("href"),
          album: $(this)
            .parent()
            .find("input")
            .val()
        }
      }).done(function(params) {
        console.log(params);
        //disini code buat liat hasil execute dari add to server
      });
      $(this)
        .parent()
        .find("input")
        .remove();
      $(this)
        .parent()
        .find(".song-file")
        .html("added")
        .addClass("song-file-added")
        .removeClass("song-file")
        .parent()
        .find(".add-btn")
        .removeClass("add-btn")
        .addClass("btn-added")
        .css("background-color", "red");
    }
  },
  ".song-file, .add-btn"
);
