//(function() {
  var httpRequest,
      treehouse,
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
    httpRequest.onreadystatechange = function(){
      try {
        if (httpRequest.readyState === 4) {
          if (httpRequest.status === 200) {
            //Should just return the json
            var response = JSON.parse(httpRequest.responseText);
            // console.log(response);
            callback(response);
          } else {
            alert('There was a problem with the request.');
          }
        }
      } catch(e) {
        alert('Caught Exception: ' + e.description);
      }
    }
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
      };
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
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
  }
  /*Deletes all items within a list
   *Params: className - the class name of the ul tag. No . prefix required
   */
  function deleteListItems(className){
    listClass = document.getElementsByClassName(className)[0];
    while(listClass.firstChild){
      listClass.removeChild(listClass.firstChild)
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

function getTreehouseBadges(treehouse){
  var treehouseBadges = treehouse.badges,
      totalTreehouseBadges = treehouseBadges.length,
      badgesList = document.createElement('ul');
      badgesList.setAttribute('class', 'about-treehouse-badges')

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

//This makes the ajax request and then allows you to say what you want to do with the response.
makeRequest('//teamtreehouse.com/davidendersby.json', 'GET', function(responses){
  //console.log(responses);
  sortedTreehousePoints = sortObject(responses.points, 'DESC');
  getTotalPoints(responses);
  getPoints();
  getTreehouseBadges(responses);
});

 //Not Working
//  makeRequest('http://api.bf4stats.com/api/playerInfo?plat=xone&name=davetherave2010&output=json','post', function(response){
//   console.log(response);
// });
//})();