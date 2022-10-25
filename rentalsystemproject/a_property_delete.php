
<?php

$servername="localhost";
$serverusername="root";
$serverpassword="";
$databasename="rentalsystem";

try
{
  

  $connection = new PDO("mysql:host=$servername;dbname=$databasename", $serverusername, $serverpassword);
    
  

   
    $statement=$connection->prepare("DELETE FROM property WHERE property.PGid='$id'");

     

             //insert row                          
    $id=$_POST["PGId"];




 $connection=null;
 
 header("location:a_property_listing.php");  


}
catch(PDOException$e) 
{
echo"Error: ".$e->getMessage();
}
?>