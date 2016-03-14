<?php
/*
Template name: Music
*/

// The Release Date function
// Arguements: Release date, Link to beatport
// It calculates todays date in a d/m/yy format and converts both dates into the number of seconds since January 1 1970 00:00:00 UTC
// If the release date is before or today is outputs Out now and the link
// If the date is in the future is outputs that date
// If the date is unknown then it outputs unknown


?>
<?php get_header(); ?>


<header class="red-bg container-fluid">
  <div class="container">
    <div class="row">
<!--       <div class="col-md-6 hidden-sm hidden-xs">
        <img src="<?php bloginfo('template_directory'); ?>/img/music.svg" onerror="this.onerror=null; this.src='<?php bloginfo('template_directory'); ?>/img/music.png'" alt="Single Headphones illustration with lightning bolt running through the gap inbetween them">
      </div> -->
      <div class="col-md-12 banner-text">
          <h2>The Very Latest</h2>
          <h1>Music</h1>
          <h2>Electronic &amp; Dance</h2>
      </div>
    </div>
  </div>
</header>

<div class="container blurb">
  <div class="row">
    <div class="col-md-10 col-md-offset-1 introduction">
        <?php if (have_posts()): while (have_posts()):the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; endif; 
        wp_reset_query(); ?>  
    </div>
  </div>
</div>

<div class="container musicBlogWrapper content-wrapper" itemscope itemtype="https://schema.org/CreativeWork">
    
  <div class="row banner-text red-bg">
    <h2>Music Wall</h2>
  </div>
<?php 
$args = array(
  'post_type' => 'music',
);

$the_query = new WP_Query($args); ?>

<?php if (have_posts()): while ($the_query->have_posts()): $the_query->the_post(); ?>

<?php if(get_field('number_of_videos') === '1') {?>
  <div class="row musicBlogRow">
    <div class="col-md-8 col-md-offset-2 oneVideo">
      <a href="<?php the_permalink();?>">
          <div class="vid_cutout" style="background: url('//img.youtube.com/vi/<? the_field('youtube_video_id1');?>/hqdefault.jpg') center center no-repeat;">
            <!-- <img class="vid_img img-responsive" src="https://img.youtube.com/vi/<? the_field('youtube_video_id1');?>/sddefault.jpg" itemprop="thumbnail"> -->
          <div class="vid_play"></div>
        </div>
      </a>
    </div>
    <div class="col-sm-12 col-md-8 col-md-offset-2 vid_info" itemprop="about">
        <h3 itemscope itemtype="https://schema.org/MusicRecording"><span itemprop="byArtist"><?php the_field('artist1'); ?></span></h3>
        <h3 itemscope itemtype="https://schema.org/Thing"><span itemprop="name"><?php the_field('title1'); ?></span></h3>
        <?php     
        date_default_timezone_set('UTC');

        $acfdate1 = get_field('release_date1');
        $date2 = new DateTime($acfdate1);
        $release_date = strtotime($date2->format('d-m-Y'));
        $today = $_SERVER['REQUEST_TIME'];
        $isKnown = get_field('release_date');

        if($isKnown === "Yes") {
          #You know the release date
          if ($release_date < $today || $release_date === $today) {
            #The release date is in the past
            $link1 = get_field('beatport_url1');
            if ($link1 !== "//www.beatport.com/release/") {
              #you know the url
              echo "<h3><span itemprop='datePublished'>Released on <time datetime='" . $date2->format('d-m-y') . "'>" . $date2->format('F jS, Y') . "</time>" . "</span></h3>";
            }else{
              #you don't know the url
              echo "<h3><span itemprop='datePublished'>Released on <time datetime='" . $date2->format('d-m-y') . "'>" . $date2->format('F jS, Y') . "</time></span><h3>";
            }
          }elseif ($release_date > $today) {
            #The release date is in the future
            echo "<h3><span itemprop='datePublished'>Release Date: <time datetime='" . $date2->format('d-m-y') . "'>" . $date2->format('d-m-Y') . "</time></span></h3>";
          }
        }else{
          #You don't know the release date
          echo "<h3><span>Release date Unknown</span></h3>";
        }?>        
    </div>
    <h4 class="col-md-12" itemscope itemtype="https://schema.org/MediaObject"><span itemprop="uploadDate">Posted: <?php echo get_the_date('jS F Y'); ?></span></h4>
  </div>
    <hr>
<?php }elseif (get_field('number_of_videos') === '2') {?> 
    <div class="row musicBlogRow">

        <div class="col-md-5 col-md-offset-1 twoVideos">
          <div class="vid_cutout">
            <a href="<?php the_permalink();?>"><img class="vid_img img-responsive" src="https://img.youtube.com/vi/<? the_field('youtube_video_id1');?>/sddefault.jpg">
              <div class="vid_play"></div>
            </a>
          </div>

          <div class="col-sm-12 vid_info" itemprop="about">
              <h3 itemscope itemtype="https://schema.org/MusicRecording"><span itemprop="byArtist"><?php the_field('artist1'); ?></span></h3>
              <h3 itemscope itemtype="https://schema.org/Thing"><span itemprop="name"><?php the_field('title1'); ?></span></h3>
              <?php     
              date_default_timezone_set('UTC');

              $acfdate1 = get_field('release_date1');
              $date2 = new DateTime($acfdate1);
              $release_date = strtotime($date2->format('d-m-Y'));
              $today = $_SERVER['REQUEST_TIME'];
              $isKnown = get_field('release_date');

              if($isKnown === "Yes") {
                #You know the release date
                if ($release_date < $today || $release_date === $today) {
                  #The release date is in the past
                  $link1 = get_field('beatport_url1');
                  if ($link1 !== "//www.beatport.com/release/") {
                    #you know the url
                    echo "<h3> <span itemprop='datePublished'>Released on <time datetime='" . $date2->format('d-m-y') . "'>" . $date2->format('F jS, Y') . "</time>" . "</span></h3>";
                  }else{
                    #you don't know the url
                    echo "<h3><span itemprop='datePublished'>Released on <time datetime='" . $date2->format('d-m-y') . "'>" . $date2->format('F jS, Y') . "</span></time><h3>";
                  }
                }elseif ($release_date > $today) {
                  #The release date is in the future
                  echo "<h3><span itemprop='datePublished'>Release Date: <time datetime='" . $date2->format('d-m-y') . "'>" . $date2->format('d-m-Y') . "</span></time></h3>";
                }
              }else{
                #You don't know the release date
                echo "<h3><span>Release date Unknown</span></h3>";
              }?>    
          </div><!-- End of Vid_info-->
        </div><!-- End of twoVideos-->
        
        <div class="col-md-5 twoVideos">
          <div class="vid_cutout">
            <a href="<?php the_permalink();?>"><img class="vid_img img-responsive" src="https://img.youtube.com/vi/<? the_field('youtube_video_id2');?>/sddefault.jpg">
              <div class="vid_play"></div>
            </a>
          </div>

          <div class="col-sm-12 vid_info" itemprop="about">
            <a href="<?php the_permalink();?>">
              <h3 itemscope itemtype="https://schema.org/MusicRecording"><span itemprop="byArtist"><?php the_field('artist2'); ?></span></h3></a>
            <a href="<?php the_permalink();?>">
              <h3 itemscope itemtype="https://schema.org/Thing"><span itemprop="name"><?php the_field('title2'); ?></span></h3>
            </a> 
              <?php     
              date_default_timezone_set('UTC');

                $acfdate2 = get_field('release_date3');
                $date3 = new DateTime($acfdate2);
                $release_date2 = strtotime($date3->format('d-m-Y'));
                $isKnown2 = get_field('release_date2');

              if($isKnown === "Yes") {
                #You know the release date
                if ($release_date2 < $today || $release_date2 === $today) {
                  #The release date is in the past
                  $link2 = get_field('beatport_url2');
                  if ($link2 !== "//www.beatport.com/release/") {
                    #you know the url
                    echo "<h3><span itemprop='datePublished'>Released on <time datetime='" . $date3->format('d-m-y') . "'>" . $date3->format('F jS, Y') . "</time>" . "</span></h3>";
                  }else{
                    #you don't know the url
                    echo "<h3><span itemprop='datePublished'>Released on <time datetime='" . $date2->format('d-m-y') . "'>" . $date3->format('F jS, Y') . "</span></time><h3>";
                  }
                }elseif ($release_date2 > $today) {
                  #The release date is in the future
                  echo "<h3><span itemprop='datePublished'>Release Date: <time datetime='" . $date2->format('d-m-y') . "'>" . $date3->format('d-m-Y') . "</span></time></h3>";
                }
              }else{
                #You don't know the release date
                echo "<h3><span>Release date Unknown</span></h3>";
              }?>    
          </div><!-- End of Vid_info-->
      </div><!-- End of twoVideos-->
      <h4 class="col-md-12" itemscope itemtype="https://schema.org/MediaObject"><span itemprop="uploadDate">Posted: <?php echo get_the_date('jS F Y'); ?></span></h4>
    </div><!-- End of musicBlogRow-->
  <hr>

<?php } ?>

<?php endwhile; ?>

<?php endif; ?>


</div>


<?php include_once ("footer.php"); ?>



