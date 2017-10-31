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
    var panel=document.getElementById("real_ques");
    
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
      <a href="#trending">Trending
        </a>
      <a href="#featured">Featured
        </a>
      <a href="#surprise">Surprise Me!
        </a>
    </div>
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
          </i>Runway Fashion
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
        <section id="real_ques">
        <script>initialize('Computer Science');</script>
    
        <?php 
          // Step2
          // $query = "SELECT * FROM `questions` WHERE ques_category=\"Computer Science\"";
          // $query = "SELECT * FROM `questions` WHERE ;";
          // $result=mysqli_query($db,$query) or die(mysql_error());
          // while ($row = $result->fetch_assoc()) { 
          // echo '<article class="question">
          // <article class="question-head">'.
          // $row['question'].
          // '</article>
          // <article class="question-body">'.
          // $row['ques_answer'].
          // '</article>
          // </article>';   
          // }
       ?>
      </section>
    </article>
    <article id="Fitness" class="tabcontent">
      <!-- Sub topic chips -->
      <button class="chip">
          <img src="res/work.jpg" alt="Person" width="96" height="94">
          Workouts
        </button>
      <button class="chip">
          <img src="res/diet.png" alt="Person" width="96" height="94">
          Diet Programs
        </button>
      <button class="chip">
          <img src="res/supp.jpeg" alt="Person" width="96" height="94">
          Supplements
        </button>
      <!-- Question Cards -->
      <br>
      <section id="real_ques">
      <?php
        //Step2
        $query = "SELECT * FROM `questions` WHERE ques_category=\"Fitness\"";
        // $query = "SELECT * FROM `questions` WHERE ;";
        $result=mysqli_query($db,$query) or die(mysql_error());
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
      <button class="chip">
          <img src="res/heels.png" alt="Person" width="96" height="94">
          Runway News
        </button>
      <button class="chip">
          <img src="res/cloth.png" alt="Person" width="96" height="94">
          Season's Collections
        </button>
      <button class="chip">
          <img src="res/makeup.jpg" alt="Person" width="96" height="94">
          Makeup Trends
        </button>
      <!-- Question Cards -->
      <br>
      <section id="real_ques">

      <?php
        //Step2
        $query = "SELECT * FROM `questions` WHERE ques_category=\"Fashion\"";
        // $query = "SELECT * FROM `questions` WHERE ;";
        $result=mysqli_query($db,$query) or die(mysql_error());
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