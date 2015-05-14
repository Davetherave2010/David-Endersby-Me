(function($) {
   // Your jQuery code goes here. Use $ as normal.
   function getVidPlayBttnCenter($parent){      
      var videoCutout = $($parent).find('.vid_cutout'),
          playBttn = $($parent).find('.vid_play'),
          centerY = (videoCutout.height() / 2) - (playBttn.height() / 2),
          centerX = (videoCutout.width() / 2) - (playBttn.width() / 2);

      //Align so play button is always central using css
      playBttn.css({
         "top": centerY,
         "left": centerX,
         "display": "block"
      });
   }

   getVidPlayBttnCenter('.oneVideo');   
   getVidPlayBttnCenter('.twoVideos');


    var resizeTimer; // Set resizeTimer to empty so it resets on page load

    function resizeFunction() {
      // Stuff that should happen on resize
      getVidPlayBttnCenter('.oneVideo');
      getVidPlayBttnCenter('.twoVideos');
    };

    // On resize, run the function and reset the timeout
    // 250 is the delay in milliseconds. Change as you see fit.
    $(window).resize(function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(resizeFunction, 100);
    });



})(jQuery);