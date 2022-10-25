<?php


session_start();

     include 'a_dash.php';
$servername="localhost";
$serverusername="root";
$serverpassword="";
$dbname="rentalsystem";


  
?>



<html>
<head>
<title>Admin Profile Page</title>

<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link href="dash.css" rel="stylesheet"> 

<style>

    .row .col-md-4  img{
        width:250px;
        height:250px;
        border-radius:50%;
        margin:15px 15px 15px;}

       

    


    </style>
</head>

<?php
try
{
   
    $username = $_SESSION["username"];
    
        $connection=new PDO("mysql:host=$servername;dbname=$dbname", $serverusername, $serverpassword);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $statement=$connection->prepare("select * from admins where username= '$username'");
        
        $statement->execute();

        $result=$statement->fetchAll(\PDO::FETCH_ASSOC);

?>


<body>

<div class="container-fluid">
<div class="home-content">
<div class="sales-boxes"  >
       <div class="recent-sales box">



<div class="row">
    <div class="col-md-4">
<img src="main 1.jpg">
</div>

<div class="col-md-8">
<h2 > Admin Profile </h2>
<div style="margin-top:50px">
    <?php foreach ($result as $row) ?>
    <h5> Name : <?php echo $row['name']; ?></h5>
        
    <h5> Status : Admin </h5>
    <h5>  Username :<?php echo $_SESSION["username"] ?></h5>
    <h5> Password :<?php echo $row['password']; ?></h5>
</div>
</div>
</div>


</div>
</div>
</div>
</div>




<?php

        
        $connection=null;
    }
    
    catch(PDOException$e) 
    {
        echo"Error: ".$e->getMessage();
    }

    ?>
