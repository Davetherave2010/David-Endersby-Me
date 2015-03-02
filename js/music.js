(function($) {
   // Your jQuery code goes here. Use $ as normal.
   //Align so play button is always central using css
   function getVidPlayBttnCenterX($parent){
   	//Select the video image cuttout element and get the width
   	//Get the width of the play button
   	//Calcuate the center points of the play button and the video
   	var videoCutoutWidth = $($parent).find('.vid_cutout').width(),
   			playBttnWidth = $($parent).find('.vid_play').width(),
   			centerX = (videoCutoutWidth / 2) - (playBttnWidth / 2);
   			//console.log(videoCutoutWidth);
   	//Align so play button is always central using css
   	return $($parent).find('.vid_play').css("left", centerX);
   }
   function getVidPlayBttnCenterY($parent){
   	//Select the video image cuttout element and get the height
   	//Get the height of the play button
   	//Calcuate the center points of the play button and the video
   	var	videoCutoutHeight = $($parent).find('.vid_cutout').height(),
   			playBttnHeight = $($parent).find('.vid_play').height(),
   			centerY = (videoCutoutHeight / 2) - (playBttnHeight / 2);
   			//console.log(videoCutoutHeight);
   	//Align so play button is always central using css
   	return $($parent).find('.vid_play').css("top", centerY);
   }
   	getVidPlayBttnCenterX('.oneVideo');
   	getVidPlayBttnCenterY('.oneVideo');
      getVidPlayBttnCenterX('.twoVideos');
      getVidPlayBttnCenterY('.twoVideos');
   //redraws on resize
   $(window).resize(function(){
      getVidPlayBttnCenterX('.oneVideo');
      getVidPlayBttnCenterY('.oneVideo');
      getVidPlayBttnCenterX('.twoVideos');
      getVidPlayBttnCenterY('.twoVideos');
   });
})(jQuery);