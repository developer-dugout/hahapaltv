<?php
session_start();
include("inc/config.php");
// insert data student table  
      $coin = $_POST['coin']; 
      $email="shahramawan0@gmail.com"  
      $query = "UPDATE coins SET coins='{$coin}' WHERE email='{$email}'";  
      if ($connect->query($query)) {  
           echo 1;  
      }else{  
           echo 0;  
      } 
?>