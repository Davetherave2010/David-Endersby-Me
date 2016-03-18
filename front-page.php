<?php get_header(); ?>

<!--This is Your home page-->
<header class="container-fluid frontPage-banner blue-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12 banner-text">
        <h1>David Endersby</h1>
        <ul>
          <li>Web Developer</li>
          <li>Geographer</li>
          <li>Pizza lover</li>
        </ul>
      </div>
    </div>
  </div>
</header>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="full-width row">
    <section class="container introduction">
      <div class="col-md-12 text-center">
          <h2>David Endersby<wbr> MSc BSc(Hons) FGS</h2>
      </div>
      <div class="col-md-10 col-md-offset-1">
          <?php echo the_content(); ?>
      </div>
    </section>
    <hr>
  </div>

  <div class="container mainContent content-wrapper">

    <div class="row">
      <section class="col-md-8 padding-left-8pc">
        <h2><?php the_field('blog_title'); ?></h2>
        <p><?php the_field('blog_text'); ?></p>
        <a href="<?php echo site_url( '/blog/'); ?>">Read my Blog &rarr;</a>
      </section>
      <img class="frontPage-icons col-md-4 hidden-xs hidden-sm" src="<?php bloginfo('template_directory'); ?>/img/blog.svg" onerror="this.onerror=null; this.src='<?php bloginfo('template_directory'); ?>/img/blog.png'" alt="An illustration of a red megaphone in a hand. It looks like it is being shouted through">
    </div>

    <div class="row">
      <img class="frontPage-icons col-md-4 hidden-xs hidden-sm" src="<?php bloginfo('template_directory'); ?>/img/about1.svg" onerror="this.onerror=null; this.src='<?php bloginfo('template_directory'); ?>/img/about1.png'" alt="An illustrated man holding an xray of his abdomen up to his chest">

  <!--     <svg class="col-md-4 hidden-xs hidden-sm frontPage-icons" width="100%" height="280">
        <image xlink:href="<?php bloginfo('template_directory'); ?>/img/about1.svg" src="<?php bloginfo('template_directory'); ?>/img/about1.png" width="100%" height="280" class="img-responsive" alt="An illustrated man holding an xray of his abdomen up to his chest"/>
      </svg>
   -->    
      <section class="col-md-8 padding-right-8pc">
        <h2><?php the_field('about_title'); ?></h2>
        <p><?php the_field('about_text'); ?></p>
        <a href="<?php echo site_url( '/about/'); ?>">Find out more &rarr;</a>
      </section>
    </div>
  </div>
<?php endwhile; else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>