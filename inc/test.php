<?php 

   /* function releaseDate ($relDate, $link){
      $day = idate("j");
      $month = idate("m");
      $year = idate("y");
      $today = $day . '/' . $month . '/' . $year;
      var_dump($today);
      var_dump($relDate);
      if ($relDate <= $today) {
        echo "<a href=$link>Out Now!</a>";
      }else{
        echo $newformat;
      }
    }
       
    
    releaseDate('2013-12-03',"http://www.beatport.com/track/beam-dannic-mix/4934412");
date_default_timezone_set('UTC');

function rel_function($rel_date, $link){         
  if ($rel_date === "unknown") {
    echo "Unknown";
  }else{
    $today= $_SERVER['REQUEST_TIME'];
    $rel_date_converted = date_create_from_format('d-m-y', $rel_date);
    $release_date = strtotime($rel_date_converted->format('y-m-d'));
    if ($release_date < $today || $release_date === $today) {
         echo "<a href=$link>Out Now!</a>";
    } else {
         echo $rel_date_converted->format('d-m-y');
    }
  }
}



// $Rel_date is the wrong way around yy/m/dd!! - needs converting
rel_function('unknown',"http://www.beatport.com/track/beam-dannic-mix/4934412");

exit;

$pageUrl = "http://localhost/davidendersby.me/inc/test.php";
function isActive($a){
	$currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if ($currentUrl == $a) {
	 echo "class = 'active'";
	}
}
isActive($pageUrl);

echo "http://$_SERVER[HTTP_HOST]/";
echo "<br>";
echo "$_SERVER[REQUEST_URI]";
echo "<br>";
echo "$_SERVER[DOCUMENT_ROOT]";

define("ROOT_PATH","");
${ROOT_PATH} = "$_SERVER[DOCUMENT_ROOT]/inc/head.php";
include ($ROOT_PATH);

?>*/
//$youtubeVidId = "lDWvQhawCVM";
//$youtubeVidArtist = "Mako";
//$youtubeVidTitle = "Beam (Dannic Remix)";
//$youtubeVidReleaseDate = "'2-12-13'";
//$youtubeVidLink = "'//www.beatport.com/track/beam-dannic-mix/4934412'";

/*  function youtube($vidNo,$youtubeVidId,$youtubeVidArtist,$youtubeVidTitle,$youtubeVidReleaseDate,$youtubeVidLink,$postDate){
    if ($vidNo == 1) {
        echo "<div class='home1 row blogRow'>";
            
          echo "<div class='col-md-8 col-md-offset-2 youtube8'>";
            echo "<iframe width='100%' height='100%' src='//www.youtube.com/embed/" . $youtubeVidId . "?rel=0&controls=0&iv_load_policy=3&showinfo=0' frameborder='0' allowfullscreen></iframe>";
          echo "</div>";
            echo "<h3 class='col-sm-12 col-md-8 col-md-offset-2'>" . $youtubeVidArtist . "-" .  $youtubeVidTitle . "&nbsp;"; echo "Release Date:";        
              rel_function($youtubeVidReleaseDate, $youtubeVidLink);
          echo "</h3>";
          
          echo "<h4 class='col-md-4 col-md-offset-8'>Date: $postDate</h4>";

        echo "</div>";
        }elseif ($vidNo == 2) {
        <div class="home1 row blogRow">

          <div class="col-md-5 col-md-offset-1 youtube">
          <iframe width="100%" height="100%" src="//www.youtube.com/embed/V7HQsSteW1c?rel=0&controls=0&iv_load_policy=3&showinfo=0" frameborder="0" allowfullscreen></iframe>
          </div>
          
          <div class="col-md-5 youtube">
          <iframe width="100%" height="100%" src="//www.youtube.com/embed/fRh7BGmqvrw?rel=0&controls=0&iv_load_policy=3&showinfo=0" frameborder="0" allowfullscreen></iframe>
          </div>
          <h3 class="col-sm-12 col-md-5 col-md-offset-1">Audien - Elysium<br>Release Date: 
            <?php         
              rel_function('03-01-14', "//www.beatport.com/release/");
            ?></h3>
          <h3 class="col-sm-12 col-md-5">GLOWINTHEDARK ft. Chuckie - NRG<br>Release Date: 
            <?php         
              rel_function('23-12-13', "//www.beatport.com/");
            ?></h3>
          <h4 class="col-md-4 col-md-offset-8">Date: 14th December 2013</h4>

        </div>
    }elseif ($vidNo > 2) {
      echo "You got an error&excl; Too many video's";
    }
  }

  youtube(1,"lDWvQhawCVM","Mako","Beam (Dannic Remix)",'2-12-13','//www.beatport.com/track/beam-dannic-mix/4934412','15th December 2013');*/

$pageName = 'david';

session_start();
if (isset($_SESSION[$pageName . 'views'])) {
  $_SESSION[$pageName . 'views']++;
}else{
  $_SESSION[$pageName . 'views'] = 0;
}
$views = $_SESSION[$pageName . 'views'];
echo $views;
echo $pageName;


