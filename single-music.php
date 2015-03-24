<?php get_header(); ?>
<header class="container-fluid red-bg">
  <div class="row">
    <div class="col-md-12 single-music-banner banner-text">
      <h1><?php the_field('title1') ?></h1>
      <h2><?php the_field('artist1') ?></h2>
    </div>
  </div>
</header>

<div class="container single-music-blogWrapper content-wrapper">
	<?php if (have_posts()):while (have_posts()):the_post();?>
  <div class="row">
    <div class="col-sm-12 col-md-10 col-md-offset-1 single-music-video">
      <iframe width="100%" height="100%" src="http://www.youtube.com/embed/<? the_field('youtube_video_id1');?>?rel=0&controls=0&iv_load_policy=3&showinfo=0&autoplay=<?php if (get_field('number_of_videos') == 1) {
        echo 1;}else{echo 0;}?>" frameborder="0" allowfullscreen></iframe>
      </div>

<div class="col-sm-11 col-md-offset-1 vid_info" itemprop="about">
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
              echo "<a href=$link1><h3><span itemprop='datePublished'>Released on <time datetime='" . $date2->format('d-m-y') . "'>" . $date2->format('F jS, Y') . "</time>" . "</span></h3></a>";
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
  </div>

<?php if (get_field('number_of_videos') == 2) {?> 
  </div>
  <div class="container-fluid red-bg">
    <div class="row">
      <div class="col-md-12">
        <div class="banner-text second-video-banner-text">
          <h1><?php the_field('artist2') ?></h1>
          <h2><?php the_field('title2') ?></h2>
        </div>
      </div>
    </div>
  </div>
  <div class="container single-music-blogWrapper">
    <div class="row">
      <div class="col-sm-12 col-md-10 col-md-offset-1 single-music-video">
        <iframe width="100%" height="100%" src="http://www.youtube.com/embed/<? the_field('youtube_video_id2');?>?rel=0&controls=0&iv_load_policy=3&showinfo=0&autoplay=0" frameborder="0" allowfullscreen></iframe>
      </div>
      <h2 class="col-sm-12 col-md-8 col-md-offset-1">Release Date: <?php
      $acfdate2 = get_field('release_date3');
      $date3 = new DateTime($acfdate2);
      $release_date2 = strtotime($date3->format('d-m-Y'));
      $isKnown2 = get_field('release_date2');

      if($isKnown2 === "Yes") {
        #You know the release date
        if ($release_date2 < $today || $release_date2 === $today) {
          #The release date is in the past
          $link2 = get_field('beatport_url2');
          if ($link2 !== "//www.beatport.com/release/") {
            #you know the url
            echo "<a href=$link2>Out Now!</a>";
          }else{
            #you don't know the url
            echo "<span>Out Now!</span>";
          }
        }elseif ($release_date2 > $today) {
          #The release date is in the future
          echo $date3->format('d-m-Y');
        }
      }else{
        #You don't know the release date
        echo "Unknown";
      }?> </h2>
    </div>
  </div>
<?php } ?>
  <div class="social">
    <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
    <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="none" data-url="<?php the_permalink();?>">Tweet</a>
  </div>
<?php comments_template(); ?> 
</div>

<?php endwhile;else: ?>
	<article>
		<p>You have encountered an error. This could be disastrous!</p>
	</article>	
<?php endif; ?>

<?php get_footer(); ?>
