"use strict";

//(function() {
    var treehouse,
      aboutTreehouse = document.querySelector('.about-treehouse'),
      sortedTreehousePoints;
  
  //Hides no js warnings on load
  var hasJs = (function(){
    var warningElement = document.querySelector('.nojs-warning');
    warningElement.style.display = 'none';

    var ajaxElements = document.getElementsByClassName('ajax');
    for (var i = 0; i <= ajaxElements.length -1; i++) {
      ajaxElements[i].style.display = 'block';
    }
  }()); //Immediately invokes function

  /*Tests to see if ajax is available then Creates an Ajax request. 
  *Params: url - the api url
  *        type - the type of request (get, post). Default is get
  *        callback - function to process the ajax response
  */
  function makeRequest(url, type, callback) {
  type = typeof type !== 'undefined' ? type : 'GET';
  var httpRequest;
  if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    httpRequest = new XMLHttpRequest();
  } else if (window.ActiveXObject) { // IE
    try {
      httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
    } 
    catch (e) {
      try {
        httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
      } 
      catch (e) {}
    }
  }

  if (!httpRequest) {
    alert('Giving up :( Cannot create an XMLHTTP instance');
    return false;
  }
  httpRequest.onload = function(){
    try {
      if (httpRequest.readyState === 4) {
        if (httpRequest.status === 200) {
          //Should just return the json
          var response = JSON.parse(httpRequest.responseText);
          // console.log(response);
          return callback(response);
        } else {
          alert('There was a problem with the request.');
        }
      }
    } catch(e) {
      alert('Caught Exception: ' + e.description);
    }
  };
  httpRequest.open(type, url);
  //httpRequest.setRequestHeader('Content-Type', 'application/xml');
  httpRequest.send();
}
/*Formats numbers by adding thousand commas
 *Params: num - Number to format
 */
function formatNumber (num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
}
/*Deletes all items within a list
 *Params: className - the class name of the ul tag. No . prefix required
 */
function deleteListItems(className){
  var listClass = document.getElementsByClassName(className)[0];
  while(listClass.firstChild){
    listClass.removeChild(listClass.firstChild);
  }
}
function sortObject(obj, sortBy) {
  sortBy = typeof sortBy !== 'undefined' ? sortBy : 'ASC'; //Default sort is Ascending
  var arr = [];
  for (var prop in obj) {
      if (obj.hasOwnProperty(prop)) {
          arr.push({
              'key': prop,
              'value': obj[prop]
          });
      }
  }
  if (sortBy === 'DESC') {
    arr.sort(function(a, b) { return b.value - a.value; });
  }else{
    arr.sort(function(a, b) { return a.value - b.value; });
  }
  //arr.sort(function(a, b) { a.value.toLowerCase().localeCompare(b.value.toLowerCase()); }); //use this to sort as strings
  return arr; // returns array
}
function makeAjaxVisible(element){
  //element.style.display = 'block'; // Shows the element
  element.classList.remove('ajax'); //Removes only the ajax class
  element.classList.add('ajax-loaded'); //Adds ajax-loaded class to the list
}

//Loops though the treehouse points array and creates li elements that replace the non js fallback
function getPoints(){
  var aboutTreehouseSkills = document.createElement('ul'); //Creates the list
      aboutTreehouseSkills.setAttribute('class', 'about-treehouse-skills'); //Adds the class
  for(var i in sortedTreehousePoints){
    //console.log(prop + " = " + treehouse.points[prop]);
    if (sortedTreehousePoints[i].value >= 50 && sortedTreehousePoints[i].key !== "total") {
      var bullet = document.createElement('span'); //creates the bullet points span
          bullet.appendChild(document.createTextNode('•'));
          bullet.setAttribute('class', 'bullet');

      var points = document.createElement('p'); //Creates the points p element
          points.appendChild(document.createTextNode(formatNumber(sortedTreehousePoints[i].value) + " pts"));
          

      var listItem = document.createElement('li'); //creates the li element
          listItem.appendChild(bullet);//adds the bullet point
          listItem.appendChild(document.createTextNode(sortedTreehousePoints[i].key));//Adds the skill name
          listItem.appendChild(points); //Adds the points element with value
          listItem.setAttribute('class', sortedTreehousePoints[i].key.toLowerCase()); //Adds the class name

      aboutTreehouseSkills.appendChild(listItem); //Appends the list element to the list
    }
  }
  aboutTreehouse.querySelector('.card').appendChild(aboutTreehouseSkills);//adds the list to the about treehouse element
}
//Gets the total number of treehouse points and updates the span tag
function getTotalPoints(treehouse){
  var totalTreehousePoints = document.createElement('span');
      totalTreehousePoints.setAttribute('class', 'total-points');
      totalTreehousePoints.textContent = formatNumber(treehouse.points.total);

  
  var totalCoursesCompleted = document.createElement('span');
      totalCoursesCompleted.setAttribute('class', 'completed-courses');
      totalCoursesCompleted.textContent = treehouse.badges.length;

  var totalTreehouseString = document.createElement('p');
      totalTreehouseString.innerHTML = 'Completed ';
      totalTreehouseString.appendChild(totalCoursesCompleted);
      totalTreehouseString.innerHTML += ' courses and earned ';  
      totalTreehouseString.appendChild(totalTreehousePoints);
      totalTreehouseString.innerHTML += ' points on Treehouse.';

  aboutTreehouse.querySelector('.card').appendChild(totalTreehouseString);

}
// Gets treehouse badge data from ajax response and inserts it into the dom
function getTreehouseBadges(treehouse){
  var treehouseBadges = treehouse.badges,
      totalTreehouseBadges = treehouseBadges.length,
      badgesList = document.createElement('ul');
      badgesList.setAttribute('class', 'about-treehouse-badges');

  for(var i = totalTreehouseBadges - 5; i <= totalTreehouseBadges - 1; i++){
    //console.log(treehouseBadges[i].name);
    var badgeImage = document.createElement('img');
        badgeImage.setAttribute('src', treehouseBadges[i].icon_url);
        badgeImage.setAttribute('alt', treehouseBadges[i].name);
        badgeImage.setAttribute('name', treehouseBadges[i].name);

    var badgesListItem = document.createElement('li');
        badgesListItem.appendChild(badgeImage);

        badgesList.appendChild(badgesListItem);
  }
  aboutTreehouse.querySelector('.card').insertBefore(badgesList, aboutTreehouse.getElementsByTagName('p')[0]);
}


//A function that returns the url for the player emblem
function getBattlefieldEmblem(battlefield){
  var battlefieldEmblemImage = battlefield.player.rank.imgLarge;

  battlefieldEmblemImage = '//www.bf4stats.com/img/' + battlefieldEmblemImage;
  return battlefieldEmblemImage;
}
// Gets battlefield ajax response and inserts it into the summary div
function getBattlefieldSummaryData(battlefield){
  var battlefieldSummaryData = document.querySelector('.about-battlefield-summary'),
      battlefieldEmblem = battlefieldSummaryData.querySelector('img'),
      battlefieldUsername = battlefieldSummaryData.querySelector('#battlefieldUserName'),
      battlefieldRank = battlefieldSummaryData.querySelector('#battlefieldRank'),
      battlefieldScore = battlefieldSummaryData.querySelector('#battlefieldScore');

 battlefieldEmblem.setAttribute('src', getBattlefieldEmblem(battlefield));

  battlefieldUsername.textContent = battlefield.player.name;
  battlefieldRank.textContent = battlefield.player.rank.name;
  battlefieldScore.getElementsByTagName('span')[0].textContent = formatNumber(battlefield.player.score);
}
// Gets battlefield ajax response and inserts it into the detailed stats div
function getBattlefieldDetailedStats(battlefield){
  var battlefieldDetailedStats = document.querySelector('.about-battlefield-detailed-stats'),
      battlefieldTimeSpentPlaying = battlefieldDetailedStats.querySelector('#battlefieldTimePlayed'),
      battlefieldKills = battlefieldDetailedStats.querySelector('#battlefieldKills'),
      battlefieldDeaths = battlefieldDetailedStats.querySelector('#battlefieldDeaths'),
      battlefieldShotsFired = battlefieldDetailedStats.querySelector('#battlefieldShotsFired'),
      battlefieldLongestHeadshot = battlefieldDetailedStats.querySelector('#battlefieldLongestHeadshot'),
      battlefieldAccuracy = document.querySelector('.about-battlefield-detailed-stats span.battlefield-accuracy');


      battlefieldTimeSpentPlaying.getElementsByTagName('span')[0].textContent = getBattlefieldTimePlayed(battlefield);
      battlefieldKills.getElementsByTagName('span')[0].textContent = formatNumber(battlefield.stats.kills);
      battlefieldDeaths.getElementsByTagName('span')[0].textContent = formatNumber(battlefield.stats.deaths);
      battlefieldShotsFired.getElementsByTagName('span')[0].textContent = formatNumber(battlefield.stats.shotsFired);
      battlefieldLongestHeadshot.getElementsByTagName('span')[0].textContent = battlefield.stats.longestHeadshot + 'm';
      battlefieldAccuracy.textContent = getBattlefieldShotsMissed(battlefield);
}
/* Calculates how long I have been playing.
 * @Param battlefield - json ajax response 
 * @Returns formatted string 
*/ 
function getBattlefieldTimePlayed(battlefield){
  var battlefieldTimeSpentPlaying = document.querySelector('.about-battlefield-detailed-stats #battlefieldTimePlayed');

  //Math truncation polyfill for browsers that don't support it
  Math.trunc = Math.trunc || function(x) { 
    return x < 0 ? Math.ceil(x) : Math.floor(x);
  }

  var battlefieldTotalSeconds = battlefield.player.timePlayed,
      hours = Math.trunc(battlefieldTotalSeconds / 3600),
      minutes = Math.trunc((battlefieldTotalSeconds / 60) % 60),
      seconds = Math.trunc(battlefieldTotalSeconds % 60);

  var timePlayed = hours + 'hours ' + minutes + 'mins ' + seconds + 'secs';
  
  return timePlayed;
}
function getBattlefieldShotsMissed(battlefield){
  var shotsFired = battlefield.stats.shotsFired,
      shotsHit = battlefield.stats.shotsHit;

  var accuracy = Math.round(shotsFired/shotsHit),
      missed = 100 - accuracy;

  return missed + '%';
}
//Calculates rank percentage and inputs into dom
function getBattlefieldWorldRanking(battlefieldRankings){
  var battlefieldWorldRank = document.querySelector('#battlefieldWorldRank span');

  var totalUserCount = battlefieldRankings.rankings[0].count,
      myRank = battlefieldRankings.rankings[0].rank,
      percentageRank = Math.round((myRank/totalUserCount) * 100);

  battlefieldWorldRank.textContent = 'Top ' + percentageRank + "%";
  //return percentageRank;
}


//This makes the ajax request and then allows you to say what you want to do with the response.
makeRequest('//teamtreehouse.com/davidendersby.json', 'GET', function(treehouseData){
  //console.log(treehouseData);
  sortedTreehousePoints = sortObject(treehouseData.points, 'DESC');
  getTotalPoints(treehouseData);
  getPoints();
  getTreehouseBadges(treehouseData);
  makeAjaxVisible(document.querySelector('.about-treehouse'));
});

 makeRequest('http://api.bf4stats.com/api/playerInfo?plat=xone&name=davetherave2010&output=json','POST', function(battlefieldData){
  //console.log(battlefieldData);
  getBattlefieldSummaryData(battlefieldData);
  getBattlefieldDetailedStats(battlefieldData);
  makeAjaxVisible(document.querySelector('.about-battlefield'));
});

makeRequest('http://api.bf4stats.com/api/playerRankings?plat=xone&name=davetherave2010&output=json','POST', function(battlefieldRankings){
  getBattlefieldWorldRanking(battlefieldRankings);
});
//})();