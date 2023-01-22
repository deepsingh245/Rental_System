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

  $statement=$connection->prepare("insert into owners(first_name,last_name,emailID,phone_no,O_username,password) 
                                                values (:first_name,:last_name,:emailID,:phone_no,:O_username,:password)");


  $statement->bindParam(':first_name', $first_name);
  $statement->bindParam(':last_name', $last_name);
  $statement->bindParam(':emailID', $emailID);
  $statement->bindParam(':phone_no', $phone_no);
  $statement->bindParam(':O_username', $O_username);
  $statement->bindParam(':password', $password);

  // insert a row
  $first_name=$_POST["first_name"];
  $last_name=$_POST["last_name"];
  $emailID=$_POST["emailID"];
  $phone_no=$_POST["phone_no"];
  $O_username=$_POST["O_username"];
  $password=$_POST["password"];

  $statement->execute();

  $connection=null;
      echo '<h1> New record created</h1>';
      header("location:owner_dashboard.php"); 
} 
catch(PDOException $e) 
{
  echo"Error: ".$e->getMessage();
}
?>

