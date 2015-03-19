<?php get_header(); ?>

<!--This is Your home page-->
<header class="container-fluid frontPage-banner blue-bg">
  <div class="container">
  <div class="row">
    <div class="col-md-6 hidden-sm hidden-xs">
      <svg class="frontPage-brand-img">
        <image xlink:href="<?php bloginfo('template_directory'); ?>/img/logo2.svg" src="<?php bloginfo('template_directory'); ?>/img/logo2.png" width="100%" height="100%" class="img-responsive" alt="A black cog with a brain inside with an illuminated lightbulb in the top"/>
      </svg>
    </div>
    <div class="col-md-6 banner-text">
      <h2>Who is that</h2>
      <h1>David Endersby<wbr>?</h1>
    </div>
  </div>
</header>

<div class="full-width row">
  <section class="container introduction">
    <div class="col-md-12 text-center">
        <h2>David Endersby<wbr> MSc BSc(Hons) FGS</h2>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <p>Hey. My name is David Endersby, I'm 24 and I am a Web Designer/Developer. I have a Masters degree in Geological and Environmental Hazards and a Batchelors of Science degree in Geography. I'm also a Fellow of the British Geological Society.</p>
    </div>
  </section>
  <hr>
</div>

<div class="container mainContent">
  <div class="row">
    <svg class="col-md-4 hidden-xs hidden-sm frontPage-icons" width="100%" height="280">
      <image xlink:href="<?php bloginfo('template_directory'); ?>/img/idea.svg" src="<?php bloginfo('template_directory'); ?>/img/idea.png" width="100%" height="280" class="img-responsive" alt="An illuminated light bulb illustration with 'idea' as the filament"/>
    </svg>
    <section class="col-md-8 padding-right-8pc">
        <h2>About this site</h2>
        <p>The idea behind this website is for a place where I can exercise my creative online spark, using lots of different types of media based around the things I enjoy and the things I hope others will enjoy. I've got loads of ideas - From a music page, with my favourite tunes on, to a page dedicated to Dave the Rave, my alter-ego. The end product will be a series of pages that will help you answer 'Who is that David Endersby?' and show off what I am capable of creatively.</p>
    </section>
  </div>

  <div class="row">
    <section class="col-md-8 padding-left-8pc">
      <h2>Blog</h2>
      <p>My blog is a space for me to talk about interesting things that are going on in my life and things that I'm interested in around the world - like news and events. It contains some of my experiences and what I have been up to, for example: Web conferences, and what I've learnt from them. If I find or hear of something thats interesting then I'll whack a link up so others can check it out too.</p>
      <a href="<?php the_permalink('blog'); ?>">Read my Blog &rarr;</a>
    </section>        
    <svg class="frontPage-icons col-md-4 hidden-xs hidden-sm" width="100%" height="280">
      <image xlink:href="<?php bloginfo('template_directory'); ?>/img/blog.svg" src="<?php bloginfo('template_directory'); ?>/img/blog.png" width="100%" height="280" class="img-responsive" alt="An illustration of a red megaphone in a hand. It looks like it is being shouted through"/>
    </svg>
  </div>

  <div class="row">
    <svg class="col-md-4 hidden-xs hidden-sm frontPage-icons" width="100%" height="280">
      <image xlink:href="<?php bloginfo('template_directory'); ?>/img/about1.svg" src="<?php bloginfo('template_directory'); ?>/img/about1.png" width="100%" height="280" class="img-responsive" alt="An illustrated man holding an xray of his abdomen up to his chest"/>
    </svg>
    <section class="col-md-8 padding-right-8pc">
      <h2>About Me</h2>
      <p>I have collected together some of the best things I have done, combined them with a sprinkle of education, and a dash of work history to create a page that tells you whatever you want to know. The idea behind this page was to create an 'online cv' to give you abit of information on my background and stuff that I have achieved. Its like a snazzier version of my LinkedIn.</p>
      <a href="about/">Find out more &rarr;</a>
    </section>
  </div>
</div>
<?php get_footer(); ?>