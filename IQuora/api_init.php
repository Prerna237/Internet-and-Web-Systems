<?php
    // echo("In api.php");
       if (isset($_GET["category"])) {
          $getDataString =getData($_GET["category"]);
          echo ($getDataString); 
       }  

       function getData($cat){
        global $db;
        $db = mysqli_connect('localhost',"root",'','quora')
        or die('Error connecting to MySQL server.');
          $query = "SELECT * FROM `questions` WHERE ques_category='$cat'";
          $result=mysqli_query($db,$query) or die(mysqli_error($db));
          $str='';
          while ($row = $result->fetch_assoc()) { 
           $str=$str.'<article class="question"><article class="question-head">'.$row['question'].'</article><article class="question-body">'.$row['ques_answer'].'</article></article>';   
          }
        return $str;
      }
?>