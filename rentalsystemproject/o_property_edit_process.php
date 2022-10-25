
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

    $id=$_POST["PGId"];

    $PgName=$_POST["PgName"];
    $address=$_POST["address"];
    $PIN_CODE=$_POST["PIN_CODE"];
    $city=$_POST["city"];
    $no_of_rooms=$_POST["no_of_rooms"];
   


    
     $statement=$connection->prepare("update property set PgName=:PgName, address=:address, PIN_CODE=:PIN_CODE, city=:city,state=:state, no_of_rooms=:no_of_rooms where PGId='$id'");
     
     $statement->bindParam(':PgName',$_POST["PgName"],PDO::PARAM_STR);
     $statement->bindParam(':address',$_POST["address"],PDO::PARAM_STR);
     $statement->bindParam(':PIN_CODE',$_POST["PIN_CODE"],PDO::PARAM_STR);
     $statement->bindParam(':city',$_POST["city"],PDO::PARAM_STR);
     $statement->bindParam(':state',$_POST["state"],PDO::PARAM_STR);
     $statement->bindParam(':no_of_rooms',$_POST["no_of_rooms"],PDO::PARAM_STR);
             
     

     $statement->execute();
    
      
      echo$statement->rowCount() ." records UPDATED successfully";

      header("location:o_property_listing.php");  
    

}
catch(PDOException$e) 
{
  echo"Error: ".$e->getMessage();
}
?>


