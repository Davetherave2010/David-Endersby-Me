<!DOCTYPE html>
<html>
	<head>
		<title><?php 
		//Displays the 'pagetitle - site title'
		wp_title('-', true,'right');  bloginfo('name');
		?></title>

		<?php wp_head();?>

		<?php get_template_part('content','meta'); ?>

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<?php if ( is_page('music') ){ ?>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon_music.ico" />
		<? }else{ ?>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
		<?php } ?>

<?php if (is_singular('post') && get_field('header_bg') != "#F7FAFA" ){ ?> 
	<style type="text/css">
		a{
			color: <?php the_field('header_bg');?>;
		}
		footer{
			background-color: <?php the_field('header_bg');?>;
		}
	</style>
<?php } ?>

	<script>
	  (function(d) {
	    var config = {
	      kitId: 'bni8gbd',
	      scriptTimeout: 3000,
	      async: true
	    },
	    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	  })(document);
	</script>

	</head>

	<?php get_template_part('content','navigation');?>
	
	<body <?php body_class(); ?>>
<?php if(is_single()){ ?>
	<div id="fb-root"></div>
<?php } ?>
