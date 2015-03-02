<nav class="navbar navbar-fixed-top <?php if (is_user_logged_in()) { echo 'admin';} ?>" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" <?php if (is_singular('post')) { ?> style="background-color: <?php the_field('header_bg')?>";<?php } ?>>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        &#9776; Menu
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->

    <?php wp_nav_menu( array(
        'menu'        => 'primary',
        'theme_location'  => 'primary',
        'depth'       => 2,
        'container'     => 'div',
        'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
        'menu_class'    => 'nav navbar-nav',
        'fallback_cb'   => 'wp_bootstrap_navwalker::fallback',
        'walker'      => new wp_bootstrap_navwalker())
      );
    ?>
  </div><!-- /.container-fluid -->
</nav>