<?php
    if (isset($_GET["country"])) {
        $getDataString =getData($_GET["country"]);
        echo ($getDataString); 
     } 

     function getData($country){
        global $db;
        $db = mysqli_connect('localhost',"root",'','quora')
        or die('Error connecting to MySQL server.');
          $query = "SELECT * FROM `questions` WHERE ques_location='$country'";
          $result=mysqli_query($db,$query) ;
          $str='';
          while ($row = $result->fetch_assoc()) { 
           $str=$str.'<article class="question"><article class="question-head">'.$row['question'].'</article><article class="question-body">'.$row['ques_answer'].'</article></article>';   
          }
        return $str;
      }
?>