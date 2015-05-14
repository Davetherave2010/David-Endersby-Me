<?php get_header(); ?>

<?php 
	$headerImage = get_field('header_img');
	if (!empty($headerImage)) { ?>
	<header class="container-fluid" style="background-color: <?php the_field('header_bg');?>;">
<!-- 		<img src="<?php echo $headerImage['url']; ?>" alt="<?php echo $headerImage['alt']; ?>" /-->
		<picture>
			<!--[if IE 9]><video style="display: none;"><![endif]-->
			<source srcset="<?php echo $headerImage['url']; ?>" media="(min-width: <?php echo $headerImage['sizes']['large-width']; ?>px)">
			<source srcset="<?php echo $headerImage['sizes']['large']; ?>" media="(min-width: <?php echo $headerImage['sizes']['medium-width']; ?>px)">
			<source srcset="<?php echo $headerImage['sizes']['thumbnail']; ?>" media="(min-width: 100px)">
			<!--[if IE 9]></video><![endif]-->
			<img srcset="<?php echo $headerImage['sizes']['medium']; ?>" alt="<?php echo $headerImage['alt']; ?>">
		</picture>
	</header>
<?php }else{ ?>
	<header id="drawing" class="svg-image-header grey-bg">
		<noscript>
		  <svg>
	      <image xlink:href="<?php bloginfo('template_directory'); ?>/img/blogHeaderDesk.svg" src="<?php bloginfo('template_directory'); ?>/img/blogHeaderDesk.png" width="100%" height="100%" class="img-responsive" alt="A black cog with a brain inside with an illuminated lightbulb in the top"/>
	    </svg>
		</noscript>
	</header>
<?php } ?>
<div class="container-fluid" <?php if (!empty($headerImage)) { ?> style="background-color: <?php the_field('header_bg'); ?>"<?php }?>>
  <ol class="breadcrumb container" <?php if (!empty($headerImage)) { ?>style="background-color: <?php the_field('header_bg'); ?>; color: <?php the_field('breadcrumbs_color'); ?>; font-weight: 100; <?php }?>;">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
  </ol>
</div>

<div class="container content-wrapper">
	
<?php if (have_posts()):while (have_posts()):the_post();?>
	<article>
		<h4 class="col-md-text-align-left date"><?php the_date('jS F Y'); ?></h4>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?> 
		<!--<?php //comments_template(); ?>-->
	</article>
  <div class="social">
    <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
    <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="none" data-url="<?php the_permalink();?>">Tweet</a>
  </div>
	<?php comments_template(); ?> 	
	<?php endwhile;else: ?>
	<article>
		<p>There are no posts to display</p>
	</article>	
	<?php endif; ?>


</div>
<?php get_footer(); ?>
