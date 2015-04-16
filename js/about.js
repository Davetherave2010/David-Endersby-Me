"use strict";

//(function() {
    var treehouse,
      aboutTreehouse = document.getElementsByClassName('about-treehouse')[0],
      aboutTreehouseSkills = document.getElementsByClassName('about-treehouse-skills')[0],
      sortedTreehousePoints;
  
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

 
//Loops though the treehouse points array and creates li elements that replace the non js fallback
function getPoints(){
  deleteListItems('about-treehouse-skills');
  for(var i in sortedTreehousePoints){
    //console.log(prop + " = " + treehouse.points[prop]);
    if (sortedTreehousePoints[i].value >= 50 && sortedTreehousePoints[i].key !== "total") {
      var bullet = document.createElement('span');
          bullet.appendChild(document.createTextNode('•'));
          bullet.setAttribute('class', 'bullet');

      var points = document.createElement('p');
          points.appendChild(document.createTextNode(formatNumber(sortedTreehousePoints[i].value) + " pts"));
          

      var listItem = document.createElement('li');
          listItem.appendChild(bullet);
          listItem.appendChild(document.createTextNode(sortedTreehousePoints[i].key));
          listItem.appendChild(points);
          listItem.setAttribute('class', sortedTreehousePoints[i].key.toLowerCase());

      aboutTreehouseSkills.appendChild(listItem);
    }
  }
}
//Gets the total number of treehouse points and updates the span tag
function getTotalPoints(treehouse){
  var totalTreehousePoints = formatNumber(treehouse.points.total),
      totalCoursesCompleted = treehouse.badges.length;

  aboutTreehouse.getElementsByClassName('completed-courses')[0].innerHTML = totalCoursesCompleted;   
  aboutTreehouse.getElementsByClassName('total-points')[0].innerHTML = totalTreehousePoints;
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

    var badgesListItem = document.createElement('li');
        badgesListItem.appendChild(badgeImage);

        badgesList.appendChild(badgesListItem);
  }
  aboutTreehouse.appendChild(badgesList);
}
// Gets battlefield ajax response and inserts it into the summary div
function getBattlefieldSummaryData(battlefield){
  var battlefieldSummaryData = document.querySelector('.about-battlefield-summary'),
      battlefieldUsername = battlefieldSummaryData.querySelector('#battlefieldUserName'),
      battlefieldRank = battlefieldSummaryData.querySelector('#battlefieldRank'),
      battlefieldScore = battlefieldSummaryData.querySelector('#battlefieldScore');

  battlefieldUsername.textContent = battlefield.player.name;
  battlefieldRank.textContent = battlefield.player.rank.name;
  battlefieldScore.getElementsByTagName('span')[0].textContent = formatNumber(battlefield.player.score);
}
// Calculates the world rank. Unfinished. Needs new ajax call
function getBattlefieldWorldRank(battlefieldRankData){
  var battlefieldWorldRank = document.querySelector('#battlefieldWorldRank');
  //battlefieldWorldRank.getElementsByTagName('span')[0].innerHTML = 'Top ' + battlefield.
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
//This makes the ajax request and then allows you to say what you want to do with the response.
makeRequest('//teamtreehouse.com/davidendersby.json', 'GET', function(treehouseData){
  //console.log(treehouseData);
  sortedTreehousePoints = sortObject(treehouseData.points, 'DESC');
  getTotalPoints(treehouseData);
  getPoints();
  getTreehouseBadges(treehouseData);
});

//  //Not Working
 makeRequest('http://api.bf4stats.com/api/playerInfo?plat=xone&name=davetherave2010&output=json','POST', function(battlefieldData){
  //console.log(battlefieldData);
  getBattlefieldSummaryData(battlefieldData);
  getBattlefieldDetailedStats(battlefieldData);
});

//})();