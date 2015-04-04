<?php
/*Template Name: About page */
?>
<?php get_header(); ?>

<header class="container-fluid">

  <div class="col-md-12">
    <h1>About</h1>
    <p>A little bit about me</p>
  </div>

</header>

<div class="container content-wrapper">
  <div class="col-md-12 about-intro">
    <h2>TL;DR</h2>
    <p>I'm a 24 year old, London based web design/developer currently working for Universal Music. I've got absolutally no formal qualifications in what I do and I'm completely self taught, having spent many evenings and weekends working my way through Treehouse. I do absolutally love Web development though. I'm a propper little (okay not so little) Nerd. It wasn't always this way. The original plan was to get a job in the geography world, probably involving me standing out in the middle of a field, in the rain, taking soil samples. Then I caught the web dev bug and within 2 years was working for the biggest music companies in the world. It hasn't been plain sailing but its totally worth it and I'm not stopping here. I'm currently spending my evenings and weekends learning new skills like Angular and Node - Yes the guys and girls at work think its wierd 'working' at the weekends, but I'm not too bothered.</p>
  </div>


  <div class="col-md-4 about-profile">
    <img src="https://graph.facebook.com/10152555016045907/picture?type=large" itemprop="image">
    <h2>David Endersby</h2>
    <ul>
      <li>Junior Web Designer &amp; Developer for Universal Music</li>
      <li>Geological &amp; Environmental Hazards Post-Graduate</li>
      <li>Geography Graduate</li>
    </ul>
    <h3>Skills</h3>
    <ul class="about-profile-skills">
      <li class="about-profile-html"><img src="<?php bloginfo('template_directory'); ?>/img/about/logos-html.svg" alt="HTML5 Logo"></li>
      <li class="about-profile-css"><img src="<?php bloginfo('template_directory'); ?>/img/about/logos-css.svg" alt="CSS3 Logo"></li>
      <li class="about-profile-sass"><img src="<?php bloginfo('template_directory'); ?>/img/about/logos-sass.svg" alt="Sass Logo"></li>
      <li class="about-profile-js"><img src="<?php bloginfo('template_directory'); ?>/img/about/logos-js.svg" alt="Javascript Logo"></li>
      <li class="about-profile-php"><img src="<?php bloginfo('template_directory'); ?>/img/about/logos-php.svg" alt="PHP Logo"></li>
      <li class="about-profile-wp"><img src="<?php bloginfo('template_directory'); ?>/img/about/logos-wp.svg" alt="Wordpress Logo"></li>
    </ul>
    <h3>Also interested in</h3>
    <ul>
      <li>Angular.js</li>
      <li>Node.js</li>
      <li>Security &amp; Encryption</li>
    </ul>
  </div>


  <div class="col-md-8 about-treehouse">
    <h2>My Treehouse Points</h2>
    <p><span>15,000</span> Total Points</p>
    <ul class="about-treehouse-skills">
      <!-- Style like treehouse Profile page -->
      <li class="html"><span>•</span>Html - <span>1000</span>pts</li>
      <li class="css"><span>•</span>Css - <span>1000</span>pts</li>
      <li class="js"><span>•</span>Javascript - <span>1000</span>pts</li>
      <li class="php"><span>•</span>PHP - <span>1000</span>pts</li>
      <li class="bus"><span>•</span>Business - <span>1000</span>pts</li>
      <li class="dev"><span>•</span>Dev tools - <span>1000</span>pts</li>
      <li class="word"><span>•</span>Wordpress - <span>100</span>pts (self taught)</li>
      <li class="des"><span>•</span>Design - <span>100</span>pts</li>
    </ul>
    <!-- Add Most Recent Badges -->
  </div>

  <div class="col-md-12 about-battlefield"></div>

</div>

<?php include_once ("footer.php"); ?>