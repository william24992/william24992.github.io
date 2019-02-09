var audio;
$(document).ready(function() {
  $(".inner-card").on({
    mouseenter: function() {
      $.ajax({
        url: "../Controller/loadPreview.php",
        type: "post",
        data: {
          albumname: $(this)
            .find(".card-back > h1")
            .attr("id")
        }
      }).done(function(params) {
        // console.log(params);
        audio = document.getElementById("audio");
        audio.volume = 1;

        audio.src = params; //change the source
        audio.load(); //load the new source
        audio.play();
        audio.currentTime += 60;
      });
    },
    mouseleave: function() {
      audio.pause();
      audio = null;
    }
  });
});
