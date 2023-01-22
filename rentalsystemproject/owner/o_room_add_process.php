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

  $statement=$connection->prepare("insert into rooms(room_no) 
                                                values (:room_no");


  $statement->bindParam(':room_no', $room_no);

  // insert a row
  $room_no=$_POST["room_no"];
 
 

  $statement->execute();


  $statement2=$connection->prepare("insert into amenities(total_beds,almira,wifi,tv) 
                                    values(:total_beds,:almira,:wifi,:tv)");


                                    

$statement2->bindParam(':total_beds', $total_beds); 
$statement2->bindParam(':almira', $almira);
$statement2->bindParam(':wifi', $wifi);
$statement2->bindParam(':tv', $tv);


  // insert a row
$room_no=$_POST["room_no"];
$total_beds=$_POST["total_beds"];
$almira=$_POST["almira"];
$wifi=$_POST["wifi"];
$tv=$_POST["tv"];


$statement2->execute();


  $connection=null;
      echo '<h1> New record created</h1>';
      header("location:o_property_data.php"); 
} 
catch(PDOException $e) 
{
  echo"Error: ".$e->getMessage();
}
?>

