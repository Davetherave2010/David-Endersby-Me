<?php
//Enable Custom Menus
add_theme_support('menus');

/* Theme setup */
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'Assigned Menu' ),
) );

// Register custom navigation walker
    require_once('wp_bootstrap_navwalker.php');

function theme_styles(){
	//Add any css style sheets here
	wp_enqueue_style('bootstrap-min', get_template_directory_uri() .'/build/bootstrap.min.css');
	wp_enqueue_style('main', get_template_directory_uri() .'/build/davidendersby_wp.min.css');

	// wp_register_style('badges', get_template_directory_uri() .'/bootstrap3/css/badges.css');
	// if (is_page('about')) {
	// 	wp_enqueue_style('badges');
	// }
}
function theme_js(){
	wp_enqueue_script('modernizr', get_template_directory_uri() .'/js/modernizr.js', array(),'',false);
	wp_enqueue_script('bootstrap-min', get_template_directory_uri() .'/js/bootstrap.min.js', array(),'',true);
	wp_enqueue_script('response-min', get_template_directory_uri() .'/js/response.min.js', array('jquery'),'',true);
	wp_enqueue_script('mainjs', get_template_directory_uri() .'/js/main.js', array('jquery'),'',true);
	wp_enqueue_script('musicjs', get_template_directory_uri() .'/js/music.js', array('jquery'),'',true);
	
	wp_register_script('social', get_template_directory_uri() .'/js/social.js', array(),'',true);
	wp_register_script('snap', get_template_directory_uri() .'/js/snap.svg-min.js', array('jquery'),'',true);
	wp_register_script('blogAnimation', get_template_directory_uri() .'/js/blogAnimation.js', array('jquery'),'',true);

	//HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
	global $wp_scripts;
	wp_register_script('html5shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', true); 
	wp_register_script('respondjs', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', true); 

	$wp_scripts->add_data ('html5shiv', 'conditional', 'lt IE 9');
	$wp_scripts->add_data ('respondjs', 'conditional', 'lt IE 9');
	

	if (is_home() or is_singular('post')) {
		wp_enqueue_script('snap');
		wp_enqueue_script('blogAnimation');
	}
	if (is_single()) {
		wp_enqueue_script('social');
	}
}
//Adds all style sheets above to wp
add_action('wp_enqueue_scripts', 'theme_styles');
//Adds all javascript above to wp
add_action('wp_enqueue_scripts', 'theme_js');

add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() { //Removes wp admin inline css
	remove_action('wp_head', '_admin_bar_bump_cb');
}

/**
 * Add SVG capabilities
 */
function wpcontent_svg_mime_type( $mimes = array() ) {
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'wpcontent_svg_mime_type' );