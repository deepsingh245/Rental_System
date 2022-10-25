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

  $statement=$connection->prepare("alter table amenities
                                    add ['$amenity_name'] varchar(10) ");


  $statement->bindParam(':amenity_name', $amenity_name);
 

  // insert a column
 
  $amenity_name= $_POST['amenity_name'];
  
  $statement->execute();

  $connection=null;
      echo '<h1> New record created</h1>';
      header("location:a_room_amenities.php"); 
} 
catch(PDOException $e) 
{
  echo"Error: ".$e->getMessage();
}
?>

