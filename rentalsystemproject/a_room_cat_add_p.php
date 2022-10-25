<?php
  
$servername="localhost";
$serverusername="root";
$serverpassword="";
$dbname="rentalsystem";

try
{

  $connection=new pdo("mysql:host=$servername; dbname=$dbname", $serverusername, $serverpassword);

  // set the PDO error mode to exception
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters

  $statement=$connection->prepare("insert into room_category(category) 
                                                values (:category)");


  $statement->bindParam(':category', $category);
 

  // insert a row
  $category=$_POST["category"];
  
  $statement->execute();

  $connection=null;
      echo '<h1> New record created</h1>';
      header("location:a_room_category.php"); 
} 
catch(PDOException $e) 
{
  echo"Error: ".$e->getMessage();
}
?>

