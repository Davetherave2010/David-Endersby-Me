<?php
/*Template name: test 
*/

 
$args =  array('post_type' => 'music');

$the_query = new WP_Query($args); ?>

<?php if (have_posts()): while ($the_query->have_posts()): $the_query->the_post(); ?>

<?php    

	date_default_timezone_set('UTC');


    $acfdate1 = get_field('release_date1');
    $date2 = new DateTime($acfdate1);
	$release_date = strtotime($date2->format('d-m-Y'));
	$today = $_SERVER['REQUEST_TIME'];
	$isKnown = get_field('release_date');
	
	if($isKnown[0] === "Yes") {
		#You know the release date
		if ($release_date < $today || $release_date === $today) {
			#The release date is in the past
			$link1 = get_field('beatport_url1');
			if ($link1 !== "//www.beatport.com/release/") {
				#you know the url
				echo "<a href=$link1>Out Now!</a>";
			}else{
				#you don't know the url
				echo "<span>Out Now!</span>";
			}
		}elseif ($release_date > $today) {
			#The release date is in the future
			echo $date2->format('d-m-Y');
		}
	}else{
		#You don't know the release date
		echo "Unknown";
	}
	echo "<br>";

	if (get_field('number_of_videos') == 2) {

	    $acfdate2 = get_field('release_date3');
	    $date3 = new DateTime($acfdate2);
		$release_date2 = strtotime($date3->format('d-m-Y'));
		$isKnown2 = get_field('release_date2');

		if($isKnown2[0] === "Yes") {
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
			}
			echo "<br>";
	}

?>
<?php


/*

$args =  array('post_type' => 'music');

$the_query = new WP_Query($args); ?>

<?php if (have_posts()): while ($the_query->have_posts()): $the_query->the_post(); ?>

	<pre>

		<?php 
		date_default_timezone_set('UTC');
		$acfdate = get_field('release_date1');
        $date = new DateTime($acfdate);
		$acfdate2 = get_field('release_date2');
        $date2 = new DateTime($acfdate2);                


		$link = get_field('beatport_url1');
	    //Todays date in unix timestamp
	    $today= $_SERVER['REQUEST_TIME'];
	    //Turns the rel date into unix timestamp
	    $release_date = strtotime($date->format('y-m-d'));

	    $link2 = get_field('beatport_url2');

	    var_dump($link);
	   var_dump($release_date);
	   	if ($today < $release_date) {
	    	echo "future";
	    }else{
	    	echo "past";
	    }
		*/
	    /*var_dump($link);
	    var_dump($link2);
	    $beatport = '//www.beatport.com/release/';
	    if ($link == $beatport) {
	    	echo "true";
	    }else{
	    	echo "false";
	    }

	   	if ($link2 == $beatport) {
	    	echo "true2";
	    }else{
	    	echo "false2";
	    }*/

	    //Turns the rel date into unix timestamp
	    /*$release_date2 = strtotime($date2->format('y-m-d'));

        if(get_field('number_of_videos') == 1) {
			the_field('title1');
				if(get_field('release_date_1') == "No") {
					echo "Unknown";
				}elseif ($release_date < $today || $release_date == $today) {
                                    if ($link == "http://www.beatport.com/release/") {
                                       echo "<span>Out Now!</span>";
                                    }else{
                                     echo "<a href=$link>Out Now!</a>";
                                    }
                                } else {
		  		echo $date->format('d-m-Y');
                                }
    	}elseif (get_field('number_of_videos') == 2) {	
                          the_field('title1');
				if(get_field('release_date_1') == "No") {
					echo "Unknown";
				}elseif ($release_date < $today || $release_date == $today) {
                                    if ($link == "http://www.beatport.com/release/") {
                                       echo "<span>Out Now!</span>";
                                    }else{
                                     echo "<a href=$link>Out Now!</a>";
                                    }
                                } else {
		  		echo $date->format('d-m-Y');
                                }
                          the_field('title2');
				if(get_field('release_date_2') == "No") {
					echo "Unknown";
				}elseif ($release_date2 < $today || $release_date2 == $today) {
			        if ($link == "http://www.beatport.com/release/") {
			           echo "<span>Out Now!</span>";
			        }else{
			         echo "<a href=$link2>Out Now!</a>";
			     	}
		    	} else {
		  		echo $date2->format('d-m-Y');
				}
		
		}*/
		 ?>


<?php endwhile; endif; 