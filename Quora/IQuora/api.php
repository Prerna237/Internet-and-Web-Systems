<?php
    // echo("In api.php");
       if (isset($_GET["category"]) && isset($_GET["subcategory"])) {
          $getDataString =getData($_GET["category"],$_GET["subcategory"]);
          echo ($getDataString); 
       }  

       function getData($cat,$subc){
        global $db;
        $db = mysqli_connect('localhost',"root",'','quora')
        or die('Error connecting to MySQL server.');
          $query = "SELECT * FROM `questions` WHERE ques_category='$cat' AND ques_subcategory='$subc'";
          $result=mysqli_query($db,$query) or die(mysql_error());
          $str='';
          while ($row = $result->fetch_assoc()) { 
           $str=$str.'<article class="question"><article class="question-head">'.$row['question'].'</article><article class="question-body">'.$row['ques_answer'].'</article></article>';   
          }
        return $str;
      }
?>