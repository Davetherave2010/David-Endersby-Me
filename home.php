<?php get_header(); ?>
<header id="drawing" class="grey-bg">
	<noscript>
	  <svg>
      <image xlink:href="<?php bloginfo('template_directory'); ?>/img/blogHeaderDesk.svg" src="<?php bloginfo('template_directory'); ?>/img/blogHeaderDesk.png" width="100%" height="100%" class="img-responsive" alt="A black cog with a brain inside with an illuminated lightbulb in the top"/>
    </svg>
	</noscript>
</header>
<div class="container blogWrapper content-wrapper">

<?php if (have_posts()): ?> 
<?php while (have_posts()): the_post(); ?>
	<div class="row blogRow">
		<article>
			<p class='col-sm-12 col-md-3 date'><?php echo get_the_date('jS F Y'); ?></p>
			<h2 class='col-sm-12 col-md-9'><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>

			<p class='col-md-12'><?php echo get_the_excerpt(); ?></p>
			<div class="col-md-12 post-link"><a href="<?php the_permalink(); ?>">Continue Reading &rarr;</a></div>
		</article>
	</div>
	<hr>
	<?php endwhile;?>

	<?php else: ?>
		<article>
			<p>There are no posts to display</p>
		</article>	
	<?php endif; ?>
</div>
<?php get_footer(); ?>