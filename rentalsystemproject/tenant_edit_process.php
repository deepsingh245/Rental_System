
<?php

$servername="localhost";
$serverusername="root";
$serverpassword="";
$databasename="rentalsystem";

try
{
  

    $connection=new PDO("mysql:host=$servername;dbname=$databasename", $serverusername, $serverpassword);

    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id=$_POST["T_userid"];

    $first_name=$_POST["first_name"];
    $last_name=$_POST["last_name"];
    $gender=$_POST["gender"];
    $emailID=$_POST["emailID"];
    $phone_no=$_POST["phone_no"];
    $username=$_POST["T_username"];
    $password=$_POST["password"];



    
     $statement=$connection->prepare("update tenants set first_name=:first_name, last_name=:last_name, gender=:gender, emailID=:emailID, phone_no=:phone_no, T_username=:T_username, password=:password where T_userid='$id'");
     
     $statement->bindParam(':first_name',$_POST["first_name"],PDO::PARAM_STR);
     $statement->bindParam(':last_name',$_POST["last_name"],PDO::PARAM_STR);
     $statement->bindParam(':gender',$_POST["gender"],PDO::PARAM_STR);
     $statement->bindParam(':emailID',$_POST["emailID"],PDO::PARAM_STR);
     $statement->bindParam(':phone_no',$_POST["phone_no"],PDO::PARAM_STR);
     $statement->bindParam(':T_username',$_POST["T_username"],PDO::PARAM_STR);
     $statement->bindParam(':password',$_POST["password"],PDO::PARAM_INT);            
     

     $statement->execute();
    
      
      echo$statement->rowCount() ." records UPDATED successfully";

      header("location:tenant_listing.php");  
    

}
catch(PDOException$e) 
{
  echo"Error: ".$e->getMessage();
}
?>


