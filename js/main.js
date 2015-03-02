(function($) {
   // Your jQuery code goes here. Use $ as normal.
   //Get the document window size
  
	var $windowWidth = $(window).width();
	//console.log($windowWidth);
   	if ($windowWidth < 768) {
   		$("nav").removeClass('navbar-fixed-top');
   	}else if($windowWidth >= 768){
   		$("nav").addClass('navbar-fixed-top');
   	};
   //refresh value on resize
  $(window).on("resize", function(){
		$windowWidth = $(window).width();
		if ($windowWidth < 768) {
   		$("nav").removeClass('navbar-fixed-top');
   	}else if($windowWidth >= 768){
   		$("nav").addClass('navbar-fixed-top');
   	};
  });

   //if the window is less then 768px then remove the navbar-fixed top class
})(jQuery);