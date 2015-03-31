//(function() {
  var httpRequest,
      treehouse,
      aboutTreehouse = document.getElementsByClassName('about-treehouse')[0],
      aboutTreehouseSkills = document.getElementsByClassName('about-treehouse-skills')[0];


  makeRequest('//teamtreehouse.com/davidendersby.json');
  
  /*Tests to see if ajax is available then Creates an Ajax request. 
   *Params: url - the api url
   */
  function makeRequest(url) {
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
    httpRequest.onreadystatechange = getContents;
    httpRequest.open('GET', url);
    httpRequest.send();
  }
  // Turns the ajax response into JSON and updates the html by running other functions
  function getContents() {
    try {
      if (httpRequest.readyState === 4) {
        if (httpRequest.status === 200) {
          treehouse = JSON.parse(httpRequest.responseText);
          getTotalPoints();
          getPoints();
        } else {
          alert('There was a problem with the request.');
        }
      }
    } catch(e) {
      alert('Caught Exception: ' + e.description);
    }
  }
  //Loops though the treehouse points array and creates li elements that replace the non js fallback
  function getPoints(){
    deleteListItems('about-treehouse-skills');
    for(var prop in treehouse.points){
      //console.log(prop + " = " + treehouse.points[prop]);
      if (treehouse.points[prop] >= 50 && prop !== "total") {
        var listItem = document.createElement('li');
            listItem.appendChild(document.createTextNode(prop + " - " + formatNumber(treehouse.points[prop]) + " pts"));
            listItem.setAttribute('class', prop);

        aboutTreehouseSkills.appendChild(listItem);
      };
    }
  }
  //Gets the total number of treehouse points and updates the span tag
  function getTotalPoints(){
    var totalTreehousePoints = formatNumber(treehouse.points.total);
    aboutTreehouse.getElementsByTagName('span')[0].innerHTML = totalTreehousePoints;
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
 
//})();