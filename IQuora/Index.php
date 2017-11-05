<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="script.js">

  </script>
  <title>IQuora
  </title>
  <!-- Sets up the connection to the database -->
  <?php
  global $db;
$db = mysqli_connect('localhost',"root",'','quora')
or die('Error connecting to MySQL server.');
?>

<script>
  console.log("Compiled down here");
  function handleSubs(category,subcategory){
    var panel;
    if(category=="Computer Science"){
      panel=document.getElementById("real_a");
    }
    else if(category=="Fitness"){
      panel=document.getElementById("real_b");

    }
    else{
      panel=document.getElementById("real_c");
    }
    
    // 1. create a new XMLHttpRequest object -- an object like any other!
    var myRequest = new XMLHttpRequest();
    // 2. open the request and pass the HTTP method name and the resource as parameters
    console.log("Ctagory=",category);
    myRequest.open("GET", "api.php?category=" + category+"&subcategory="+subcategory);
    myRequest.send();
    console.log("Ready State old="+myRequest.readyState);
    // 3. write a function that runs anytime the state of the AJAX request changes
    myRequest.onreadystatechange = function () { 
      console.log("Ready State new="+myRequest.readyState);
    // 4. check if the request has a readyState of 4, which indicates the server has responded (complete)
    if (myRequest.readyState === 4) {
        // 5. insert the text sent by the server into the HTML of the 'ajax-content'
        console.log("My response was="+myRequest.responseText);
        panel.innerHTML =myRequest.responseText;
    }

};
  }
function initialize(category){
  
    var panel=document.getElementById("real_ques");
    
    // 1. create a new XMLHttpRequest object -- an object like any other!
    var myRequest = new XMLHttpRequest();
    // 2. open the request and pass the HTTP method name and the resource as parameters
    console.log("Ctagory=",category);
    myRequest.open("GET", "api_init.php?category=" + category);
    myRequest.send();
    console.log("Ready State old="+myRequest.readyState);
    // 3. write a function that runs anytime the state of the AJAX request changes
    myRequest.onreadystatechange = function () { 
      console.log("Ready State new="+myRequest.readyState);
    // 4. check if the request has a readyState of 4, which indicates the server has responded (complete)
    if (myRequest.readyState === 4) {
        // 5. insert the text sent by the server into the HTML of the 'ajax-content'
        console.log("My response was="+myRequest.responseText);
        panel.innerHTML =myRequest.responseText;
    }
  };
}

function setonscreen(continent){
  var panel=document.getElementById("Location");
  var myRequest = new XMLHttpRequest();
  myRequest.open("GET", "country_questions.php?country=" + continent);
  myRequest.send();
  myRequest.onreadystatechange = function () { 
    if (myRequest.readyState === 4) {
      console.log("From onScreen"+myRequest.responseText);
      var i, tabcontent, tablinks;
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        console.log("Setting for tabcontent i=",i);
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        console.log("Setting for tablink i=",i);        
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

      panel.innerHTML=myRequest.responseText;
      panel.style.display = "block";
        return ;
    }
  };
}

function requestContinent(lat,long){
  console.log("Making a request");
  var jsonObj;
  var country;
/*  var myRequest = new XMLHttpRequest();
  myRequest.open("GET", "http://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+long+"&sensor=false");
  myRequest.send();
  myRequest.onreadystatechange = function () { 
    if (myRequest.readyState === 4) {
      console.log(myRequest.responseText);
        jsonObj=(JSON.parse(myRequest.responseText));
        console.log(jsonObj.formatted_address);
        return country;
    }
  };*/
  country="India";
  return country;
}

</script>

</head>

<body>

<!-- Defining my PHP Functions -->


  <script>
    alert("Click on a topic from your topics to get started!");
</script>
  <header id="head_with_bg">
    <img src="res/logo.svg" alt="company_logo" style="margin-left:5px;">
    <div class="topnav" id="myTopnav">
      <a href="#trending" onclick="openNav()">Trending
        </a>
      <a href="#featured">Featured
        </a>
      <a href="#surprise">Surprise Me!
        </a>
    </div>
    <div id="mySidenav"class="sidenav">

    <button onclick="closeNav()" class="closebtn " style="float:right">Collapse</button>
    <div id="map"></div>
    </div>
    <script>
      function initMap() {
        // 28.6139° N, 77.2090° E
        var myLatlng = {lat: 28.6139, lng:77.2090};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: myLatlng
        });

        var marker = new google.maps.Marker({
          draggable:true,
          title:"Your Location",
          position: myLatlng,
          map: map
        });

        google.maps.event.addListener(marker, 'dragend', function(event) {
          console.log("lat=",event.latLng.lng());
          var continent=requestContinent(event.latLng.lat(),event.latLng.lng());
          setonscreen(continent);
          });


          google.maps.event.addListener(map, 'click', function(event) {
            marker.setPosition(event.latLng);
            console.log("lat=",event.latLng.lat());
            var continent=requestContinent(event.latLng.lat(),event.latLng.lng());
          setonscreen(continent);

          });
        }

      
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK5iAFTp91NY1BTNqdMqT-Xl6mz_W9rEQ&callback=initMap">
</script>
  </header>
  <aside>
    <!-- This is the profile card -->
    <div class="profile_card">
      <img src="res/avatar.png" id="avatar_image" style="height:40%; width:60% ;border-radius:25px;">
      <div class="container">
        <h1>Jane Doe
        </h1>
        <p>Manager, Example
        </p>
        <p>Harvard University
        </p>
        <a href="#">
            <i class="fa fa-twitter" style="padding-right:3px;">
            </i>
          </a>
        <a href="#">
            <i class="fa fa-facebook">
            </i>
          </a>
      </div>
    </div>
    <header style="border-top:1px solid grey;border-bottom:1px solid grey;padding-left:8px;padding-top:1px;padding-bottom:1px">
      <h1 style="padding-left:2px">My Topics
      </h1>
    </header>
    <!-- These are the list of favorite topics -->
    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'Computer Science')"> 
          <i class="material-icons">desktop_mac
          </i>Computer Science
        </button>
      <button class="tablinks" onclick="openCity(event, 'Fitness')"> 
          <i class="material-icons">fitness_center
          </i>Fitness
        </button>
      <button class="tablinks" onclick="openCity(event, 'Fashion')"> 
          <i class="material-icons">spa
          </i>Fashion
        </button>
    </div>
  </aside>
  <section style="width:74%;" id="questions_panel">
    <article id="Computer Science" class="tabcontent" class="active">
        <!-- Sub topic chips -->
        <button class="chip" onclick="handleSubs('Computer Science','Artificial Intelligence')">
            <img src="res/ai.jpeg" alt="Person" width="96" height="94">
            Artificial Intelligence
          </button>
        <button class="chip" onclick="handleSubs('Computer Science','Graph Theory')">
            <img src="res/graph.png" alt="Person" width="96" height="94">
            Graph Theory
          </button>
        <button class="chip" onclick="handleSubs('Computer Science','Cloud Computation')">
            <img src="res/cloud.png" alt="Person" width="96" height="94">
            Cloud Computation
          </button>
        <br>
        <section id="real_a">   
        <?php 
          // Step2
          $query = "SELECT * FROM `questions` WHERE ques_category=\"Computer Science\"";
          $result=mysqli_query($db,$query) or die(mysqli_error($db));
          while ($row = $result->fetch_assoc()) { 
          echo '<article class="question">
          <article class="question-head">'.
          $row['question'].
          '</article>
          <article class="question-body">'.
          $row['ques_answer'].
          '</article>
          </article>';   
          }
       ?>
      </section>
    </article>
    
    <article id="Fitness" class="tabcontent">
      <!-- Sub topic chips -->
      <button class="chip" onclick="handleSubs('Fitness','Workouts')">
          <img src="res/work.jpg" alt="Person" width="96" height="94">
          Workouts
        </button>
      <button class="chip" onclick="handleSubs('Fitness','Diet Programs')">
          <img src="res/diet.png" alt="Person" width="96" height="94">
          Diet Programs
        </button>
      <button class="chip" onclick="handleSubs('Fitness','Supplements')">
          <img src="res/supp.jpeg" alt="Person" width="96" height="94">
          Supplements
        </button>
      <!-- Question Cards -->
      <br>
      <section id="real_b">
      <?php
        //Step2
        $query = "SELECT * FROM `questions` WHERE ques_category=\"Fitness\"";
        // $query = "SELECT * FROM `questions` WHERE ;";
        $result=mysqli_query($db,$query) or die(mysqli_error($db)) ;
        while ($row = $result->fetch_assoc()) { 
        echo '<article class="question">
        <article class="question-head">'.
        $row['question'].
        '</article>
        <article class="question-body">'.
        $row['ques_answer'].
        '</article>
        </article>';   
        }
      ?>
      </section>
      <!-- jhn -->
    </article>

    <article id="Fashion" class="tabcontent">
      <!-- Sub topic chips -->
      <button class="chip" onclick="handleSubs('Fashion','Trends')">
          <img src="res/heels.png" alt="Person" width="96" height="94">
          Fashion Trends
        </button>
      <button class="chip" onclick="handleSubs('Fashion','Season')">
          <img src="res/cloth.png" alt="Person" width="96" height="94">
          Season's Collections
        </button>
      <button class="chip" onclick="handleSubs('Fashion','Makeup')">
          <img src="res/makeup.jpg" alt="Person" width="96" height="94">
          Makeup Trends
        </button>
      <!-- Question Cards -->
      <br>
      <section id="real_c">

      <?php
        //Step2
        $query = "SELECT * FROM `questions` WHERE ques_category=\"Fashion\"";
        // $query = "SELECT * FROM `questions` WHERE ;";
        $result=mysqli_query($db,$query) or die(mysqli_error($db));
        while ($row = $result->fetch_assoc()) { 
        echo '<article class="question">
        <article class="question-head">'.
        $row['question'].
        '</article>
        <article class="question-body">'.
        $row['ques_answer'].
        '</article>
        </article>';   
        }
      ?>
      </section>
    </article>

    <article id="Location" class="tabcontent">

    </article>
  </section>
  
  <script>
    var tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      console.log("i=" + i);
      tabcontent[i].style.display = "none";
    }
  </script>
  
</body>

</html>