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

  $statement=$connection->prepare("insert into amenities(bed_type,total_beds,almira,wifi,tv) 
                                                values(:bed_type,:total_beds,:almira,:wifi,:tv)");

  // insert a row
  $bed_type=$_POST["bed_type"];
  $total_beds=$_POST["total_beds"];
  $almira=$_POST["almira"];
  $wifi=$_POST["wifi"];
  $tv=$_POST["tv"];

  
  $statement->bindParam(':bed_type', $bed_type);
  $statement->bindParam(':total_beds', $total_beds);
  $statement->bindParam(':almira', $almira);
  $statement->bindParam(':wifi', $wifi);
  $statement->bindParam(':tv', $tv);
 

  $statement->execute();

  $connection=null;
      echo '<h1> New record created</h1>';
      header("location:a_room_add.php"); 
} 
catch(PDOException $e) 
{
  echo"Error: ".$e->getMessage();
}
?>

