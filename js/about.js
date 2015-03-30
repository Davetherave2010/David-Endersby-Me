//(function() {
  var httpRequest,
      treehouse,
      aboutTreehoueSkills = document.getElementsByClassName('about-treehouse-skills')[0];


  makeRequest('//teamtreehouse.com/davidendersby.json');
  

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

  function getContents() {
    try {
      if (httpRequest.readyState === 4) {
        if (httpRequest.status === 200) {
          treehouse = JSON.parse(httpRequest.responseText);
           getPoints();
        } else {
          alert('There was a problem with the request.');
        }
      }
    } catch(e) {
      alert('Caught Exception: ' + e.description);
    }
  }

  function getPoints(){
    // for (var i = 0; i <= treehouse.points.length - 1; i++) {
    //   console.log(treehouse.points[i]);
    // };
    for(var i in treehouse.points){
      console.log(i + " = " + treehouse.points[i]);
    }
  }
 
//})();