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

  $statement=$connection->prepare("insert into tenants(first_name,last_name,gender,emailID,phone_no,username,password) 
                                                values (:first_name,:last_name,:gender,:emailID,:phone_no,:username,:password)");


  $statement->bindParam(':first_name', $first_name);
  $statement->bindParam(':last_name', $last_name);
  $statement->bindParam(':gender', $gender);
  $statement->bindParam(':emailID', $emailID);
  $statement->bindParam(':phone_no', $phone_no);
  $statement->bindParam(':username', $username);
  $statement->bindParam(':password', $password);

  // insert a row
  $first_name=$_POST["first_name"];
  $last_name=$_POST["last_name"];
  $gender=$_POST["gender"];
  $emailID=$_POST["emailID"];
  $username=$_POST["phone_no"];
  $username=$_POST["username"];
  $password=$_POST["password"];

  $statement->execute();

  $connection=null;
      echo '<h1> New record created</h1>';
} 
catch(PDOException $e) 
{
  echo"Error: ".$e->getMessage();
}
?>

