<?php
  session_start();
  include 'o_dash_code.php';

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

  $statement=$connection->prepare("insert into tenants(first_name,last_name,gender,emailID,phone_no) 
                                                values (:first_name,:last_name,:gender,:emailID,:phone_no)");


  $statement->bindParam(':first_name', $first_name);
  $statement->bindParam(':last_name', $last_name);
  $statement->bindParam(':gender', $gender);
  $statement->bindParam(':emailID', $emailID);
  $statement->bindParam(':phone_no', $phone_no);

  // insert a row
 
  $first_name=$_POST["first_name"];
  $last_name=$_POST["last_name"];
  $gender=$_POST["gender"];
  $emailID=$_POST["emailID"];
  $phone_no=$_POST["phone_no"];

  $statement->execute();

  $connection=null;
      echo '<h1> New record created</h1>';
      header("location:o_tenant_listing.php"); 
} 
catch(PDOException $e) 
{
  echo"Error: ".$e->getMessage();
}
?>

