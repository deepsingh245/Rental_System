<?php  
 //login_success.php  
 session_start();  

 if(isset($_SESSION["username"]))  
 {  
      include 't_dash_code.php';
 }  
 else  
 {  
      header("location:Home_Away.php");  
 }  
 ?>  

