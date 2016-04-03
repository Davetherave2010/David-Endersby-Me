<?php
/*Template Name: About curl page */

//  Initiate curl

function getBattlefieldData($url, $jsonUrl){
	$ch = curl_init();
	// Disable SSL verification
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// Will return the response, if false it print the response
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// Set the url
	curl_setopt($ch, CURLOPT_URL,$url);
	// Execute
	$result=curl_exec($ch);
	// Closing
	curl_close($ch);

	$fp = fopen(get_template_directory() . '/data/' .$jsonUrl, 'w');
	fwrite($fp, $result);
	fclose($fp);

	if(curl_error($c)){
    echo 'error:' . curl_error($c) . +  '<br>';
	} else {
		echo strval($url) . ' curl completed' . '<br>';
	}
}

getBattlefieldData('http://api.bf4stats.com/api/playerRankings?plat=xone&name=davetherave2010&output=json', 'rankings.json');

getBattlefieldData('http://api.bf4stats.com/api/playerInfo?plat=xone&name=davetherave2010&output=json', 'playerInfo.json');

// If playerInfo.json exits
if (file_exists(get_template_directory() .'/data/playerInfo.json')) {
	$playerInfo = json_decode(file_get_contents(get_template_directory() .'/data/playerInfo.json'));
	$rankImgUrl = $playerInfo->player->rank->imgLarge;
	$imgFileName = explode('/', $rankImgUrl)[2];

	// If the image file isn't already on the server
	if (!file_exists(get_template_directory() .'/data/' . $imgFileName)) {
		getBattlefieldData('http://bf4stats.com/img/' . $rankImgUrl, $imgFileName);

		echo $imgFileName . ' downloaded' .  '<br>';
	}else{
		echo $imgFileName . ' already exists. Not updated.' . '<br>';
	}
 } 