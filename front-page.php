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

<div class="full-width row">
  <section class="container introduction">
    <div class="col-md-12 text-center">
        <h2>David Endersby<wbr> MSc BSc(Hons) FGS</h2>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <p> Hello, I am a Web design developer based in london with a background in geography and geological hazards. I currently spend my daytime working for Universal Music UK and the rest of my time doing personal projects based around my web dev skill set. I'm actively persuing pure javascript and looking to learn Node and Angular to be able to build web applications.</p>


        <p>Did I mention that I'm also a Fellow of the British Geological Society.</p>
    </div>
  </section>
  <hr>
</div>

<div class="container mainContent content-wrapper">

  <div class="row">
    <section class="col-md-8 padding-left-8pc">
      <h2>Blog</h2>
      <p>My blog is a space for me to talk about interesting things that are going on in my life and things that I'm interested in around the world - like news and events. It contains some of my experiences and what I have been up to, for example: Web conferences, and what I've learnt from them.Its alto a place where I post relese notes for projects that I've worked on, showing new features and fixed bugs. Its all there.</p>
      <a href="<?php the_permalink('blog'); ?>">Read my Blog &rarr;</a>
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
      <h2>About Me</h2>
      <p>The about page shows some of my achivements using data gathered from the furthest coners of the internet. It shows my Treehouse score and what I'm currently learning as well as how much time I've spent (or wasted) on Battlefield. Top 5% worldwide though, Just saying.</p>
      <a href="about/">Find out more &rarr;</a>
    </section>
  </div>
</div>
<?php get_footer(); ?>