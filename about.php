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

<main class="container content-wrapper">
  <section class="col-md-12 about-intro">
    <div class="card">
      <h2>TL;DR</h2>
      <p>I'm a 24 year old, London based web design/developer currently working for Universal Music. I've got absolutally no formal qualifications in what I do and I'm completely self taught, having spent many evenings and weekends working my way through Treehouse. I do absolutally love Web development though. I'm a propper little (okay not so little) Nerd. It wasn't always this way. The original plan was to get a job in the geography world, probably involving me standing out in the middle of a field, in the rain, taking soil samples. Then I caught the web dev bug and within 2 years was working for the biggest music companies in the world. It hasn't been plain sailing but its totally worth it and I'm not stopping here. I'm currently spending my evenings and weekends learning new skills like Angular and Node - Yes the guys and girls at work think its wierd 'working' at the weekends, but I'm not too bothered.</p>
    </div>
  </section>


  <section class="col-md-4 about-profile">
    <div class="card">
      <img src="https://graph.facebook.com/10152555016045907/picture?type=large" itemprop="image">
      <h2>David Endersby</h2>
      <ul class="about-profile-intro">
        <li>
          <p>Junior Web Designer &amp; Developer
          <span>Universal Music UK</span></p> 
        </li>
        <li>
          <p>Geological &amp; Environmental Hazards MSc
          <span>Portsmouth University</span></p>
        </li>
        <li>
          <p>Geography BSc (Hons)
          <span>Plymouth University</span></p>
        </li>
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
  </section>


  <section class="col-md-8 about-treehouse">
    <div class="card">
      <h2>Treehouse</h2>
      <p>Completed <span class="completed-courses">100</span> courses and earned <span class="total-points">15,000</span> Points on Treehouse</p>
      <ul class="about-treehouse-skills">
        <!-- Style like treehouse Profile page -->
      </ul>
      <!-- Add Most Recent Badges -->
    </div>
  </section>

  <section class="col-md-8 about-battlefield">
    <div class="card">
      <h2>Battlefield 4</h2>
      <div class="col-md-12 about-battlefield-summary">
        <img class="col-xs-4" src="http://www.bf4stats.com/img/bf4/ranks/r111.png" alt="Rank 111 - Brigadier General II emblem">
        <div class="col-sm-7 about-battlefield-summary">
          <a href="http://battlelog.battlefield.com/bf4/user/Davetherave2014" id="battlefieldUserName">Davetherave2010</a>
          <p id="battlefieldRank">Brigadier General II</p>
          <p id="battlefieldWorldRank">World Rank <span>Top 5%</span></p>
          <p id="battlefieldScore">Score <span>10,748,637</span></p>
          <hr>
        </div>
      </div>
      <div class="row about-battlefield-detailed-stats">
        <p id="battlefieldTimePlayed"><span>304 hours 5 minutes</span>Spent Playing</p>
        <p id="battlefieldKills">Kills <span>11,306</span></p>
        <p id="battlefieldDeaths">Deaths <span>13,694</span></p>
        <p id="battlefieldShotsFired">Bullets fired <span>652,415</span></p>
        <p id="battlefieldLongestHeadshot">Longest Headshot <span>326.47m</span></p>
        <span class="battlefield-accuracy">91%</span>
        <p class="battlefield-accuracy"> of bullets fired <br> fail to hit anyone</p>
      </div>
      <div class="block-footer"><p>Data taken from <a href="http://battlelog.battlefield.com/bf4/soldier/Davetherave2010/stats/171303020/xboxone/" target="_blank">David Endersby's Battlefield 4 profile</a> using the <a href="http://bf4stats.com/xone/Davetherave2010" target="_blank">BF4stats API</a></p>
      </div>
    </div>
  </section>
</main>

<?php include_once ("footer.php"); ?>