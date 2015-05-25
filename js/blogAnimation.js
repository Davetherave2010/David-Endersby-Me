//Creates a drawing surface
var s = Snap("#drawing");

//Loads the desktop svg file. Was /davidendersby.wordpress/wp-content/themes/davidendersby_wp/img/blogHeaderDesk.svg
Snap.load("/websites/older-davidendersby.me/wp-content/themes/davidendersby_wp/img/blogHeaderDesk.svg", function(f){
	//Appends it to the surface
	s.append(f);
	//selects the right bar of the graph in the tablet
	var rightBar = f.select('.rightBar');
	//redraws the bar so the start is in the bottom right corner
	rightBar.attr('d', 'M148.5 134.4h-3.6v-6.2h3.6v6.2z');
	//animates the height value. Duration 2000ms. When complete calls function
	rightBar.animate({'d':'M148.5 134.4h-3.6v-2.2h3.6v6.2z'}, 1800, function(){
		//Returns to start
		rightBar.animate({'d':'M148.5 134.4h-3.6v-6.2h3.6v6.2z'}, 1800);
	});
	//selects the middle bar of the graph in the tablet
	var middleBar = f.select('.middleBar');
	middleBar.attr('d', 'M142 134.4h-3.6v-18h3.6v18z');
	middleBar.animate({'d':'M142 134.4h-3.6v-10h3.6v10z'}, 1800, function(){
			middleBar.animate({'d':'M142 134.4h-3.6v-14h3.6v14z'}, 1800);
	});
//selects the left bar of the graph in the tablet
	var leftBar = f.select('.leftBar');
	leftBar.attr('d', 'M135.4 134.4h-3.6v-11.8h3.6v11.8z');
	leftBar.animate({'d':'M135.4 134.4h-3.6v-7.8h3.6v7.8z'}, 1500, function(){
		leftBar.animate({'d': 'M135.4 134.4h-3.6v-4h3.6v4z'}, 1500);
	});
});	
