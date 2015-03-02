<!-- Twitter -->
<meta name="twitter:card" content="photo">
<meta name="twitter:site" content="@davidendersby1">
<meta name="twitter:creator" content="@davidendersby1">
<meta name="twitter:title" content="<?php echo wp_title('-', true,'right'); ?>">
<?php if ( is_page('music')/*|| $post->post_parent == 'music'*/ ){ ?>  
	<meta name="twitter:image:src" content="http://www.davidendersby.me/wp-content/uploads/2014/01/fb_music.png">
<?php }else{ ?>
	<meta name="twitter:image:src" content="http://www.davidendersby.me/wp-content/uploads/2014/01/fb.png">
<?php } ?>
<meta name="twitter:domain" content="<?php echo get_permalink(); ?>">

<!-- Facebook -->
<meta property="og:url"   content="<?php echo get_permalink(); ?>" /> 
<meta property="og:title" content="<?php echo wp_title('-', true,'right'); ?>" />
<?php if ( is_page('music') or is_singular('music') ){ ?> 
	<meta property="og:image" content="http://www.davidendersby.me/wp-content/uploads/2014/01/fb_music.png" />
	<?php if(is_singular('music')){ ?>
		<meta property="og:video" content="http://www.youtube.com/v/<?php the_field('youtube_video_id1'); ?>" />
	<?php }
}else if(is_singular('post') && get_field('header_img') !=""){
	$headerImage = get_field('header_img'); ?>
	<meta property="og:image" content="<?php echo $headerImage['url']; ?>" />
<?php }else{ ?>  
	<meta property="og:image" content="http://www.davidendersby.me/wp-content/uploads/2014/01/fb.png" />
<?php } ?> 
<meta property="og:site_name"   content="davidendersby.me" />