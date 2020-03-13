window.onload = () => { 

  var url_api = '/projects/Project%20PHP/api/countries.php';
  var url_api2 = '/projects/Project%20PHP/api/classmates.php';

  // var url_api = 'http://localhost:5000/Project%20PHP/api/countries.php';
  // var url_api2 = 'http://localhost:5000/Project%20PHP/api/classmates.php';


  function listconvert(myData){
    let mapData=[['Country', 'Population','Life Expectation']];
    for(let i=0; i< myData.length;i++){
      if(myData[i].selected){
        mapData.push([myData[i].name,myData[i].Population,parseInt(myData[i].LifeExpectancy)]);
      }
      
    }
    return mapData;
  }
  let chart = {};
  worldData();
  async function worldData(){
    var response = await fetch(url_api);
    var myData = await response.json();
    let setcountry = document.getElementById('listcountry');
    //myData[37].selected=true;

    for( let i=0; i< myData.length;i++){
      myData[37].selected=true;
      let myObject = document.createElement('div');
      myObject.className = "selected";
      myObject.dataset.index = i;
      myObject.innerHTML=myData[i].name;
      myObject.innerHTML=`<input type='checkbox' unchecked  />${myData[i].name}`;
      setcountry.appendChild(myObject);
      myObject.addEventListener("click", (el) => {
          myData[i].selected = !myData[i].selected; 
          el.srcElement.className = myData[i].selected ? "" : "selected";
          let data = google.visualization.arrayToDataTable(listconvert(myData));
          chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

          chart.draw(data, {});
      });
    }

    mapData=listconvert(myData);


google.charts.load('current', {
    'packages':['geochart'],
    'mapsApiKey': 'AIzaSyA7tUYEHCeErR2VV4v9-KWQqvAPCt9R7BU'
  });
  google.charts.setOnLoadCallback(drawRegionsMap);

  function drawRegionsMap() {

    var data = google.visualization.arrayToDataTable(mapData);
    // console.log("Google "+mapData2);

    var options = {};

    chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

    chart.draw(data, options);
  }

}

classData();
async function classData(){
  var response = await fetch(url_api2);
  var myDataclass = await response.json();

  let classData=[['Country', 'Gross National Product','Area']];
  for( let i=0; i< myDataclass.length;i++){
    classData.push([myDataclass[i].Name,parseInt(myDataclass[i].GNP),parseInt(myDataclass[i].SurfaceArea)]);
  }

google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable(classData);

  var options = {
    chart: {
      title: '',
      subtitle: 'International Web Programming 2020 Class',
    }
  };

  var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

  chart.draw(data, google.charts.Bar.convertOptions(options));
}
}

};
