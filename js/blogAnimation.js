//Creates a drawing surface
var s = Snap("#drawing");

//Loads the desktop svg file
Snap.load("/davidendersby.wordpress/wp-content/themes/davidendersby_wp/img/blogHeaderDesk.svg", function(f){
	//Appends it to the surface
	s.append(f);
	//selects the right bar of the graph in the tablet
	var rightBar = f.select('.rightBar');
	//redraws the bar so the start is in the bottom left corner
	rightBar.attr('d', 'M442 305h11v-19h-11z');
	//animates the height value. Duration 2000ms. When complete calls function
	rightBar.animate({'d':'M442 305h11v-40h-11z'}, 1800, function(){
		//Returns to start
		rightBar.animate({'d':'M442 305h11v-19h-11z'}, 1800);
	});
	//selects the middle bar of the graph in the tablet
	var middleBar = f.select('.middleBar');
	middleBar.attr('d', 'M422 305h11v-55h-11z');
	middleBar.animate({'d':'M422 305h11v-10h-11z'}, 2000, function(){
			middleBar.animate({'d':'M422 305h11v-55h-11z'}, 2000);
	});
//selects the left bar of the graph in the tablet
	var leftBar = f.select('.leftBar');
	leftBar.attr('d', 'M402 305h11v-36h-11z');
	leftBar.animate({'d':'M402 305h11v-50h-11z'}, 1500, function(){
		leftBar.animate({'d':'M402 305h11v-36h-11z'}, 1500);
	});
});	
