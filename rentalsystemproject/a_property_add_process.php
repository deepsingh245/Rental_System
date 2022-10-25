<?php
  session_start();
 

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

  $statement=$connection->prepare("insert into property(PgName,address,PIN_CODE,city,no_of_rooms) 
                                                values (:PgName,:address,:PIN_CODE,:city,:no_of_rooms)");


  $statement->bindParam(':PgName', $PgName);
  
  $statement->bindParam(':address', $address);
  $statement->bindParam(':PIN_CODE', $PIN_CODE);
  $statement->bindParam(':city', $city);
  $statement->bindParam(':no_of_rooms', $no_of_rooms);

  // insert a row
  $PgName=$_POST["PgName"];
  
  $address=$_POST["address"];
  $PIN_CODE=$_POST["PIN_CODE"];
  $city=$_POST["city"];
  $no_of_rooms=$_POST["no_of_rooms"];

  $statement->execute();

  $connection=null;
      echo '<h1> New record created</h1>';
      header("location:a_property_listing.php"); 
} 
catch(PDOException $e) 
{
  echo"Error: ".$e->getMessage();
}
?>

