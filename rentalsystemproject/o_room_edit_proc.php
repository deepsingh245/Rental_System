
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
    
    $ids=$_POST["roomID"];

    $room_no=$_POST["room_no"];
    // $images=$_POST["images"];
    $category_id=$_POST["category_id"];
    $A_ID=$_POST["A_ID"];
    $total_beds=$_POST["total_beds"];
    $username=$_POST["almira"];
    $wifi=$_POST["wifi"];
    $wifi=$_POST["tv"];


   
    
     $statement=$connection->prepare("UPDATE rooms set room_no=room_no=:room_no where roomID='$ids'");
     $statement1=$connection->prepare("UPDATE room_category set category=:category where room_category_id= '$category_id'");
     $statement2=$connection->prepare("UPDATE amenities set total_beds=:total_beds,almira=:almira, wifi=:wifi, tv=:tv where A_ID='$A_ID'");
     
     $statement->bindParam(':room_no',$_POST["room_no"],PDO::PARAM_STR);
    //  $statement->bindParam(':images',$_POST["images"],PDO::PARAM_STR);
     
     $statement1->bindParam(':category',$_POST["category"],PDO::PARAM_STR);
     $statement2->bindParam(':total_beds',$_POST["total_beds"],PDO::PARAM_STR);
     $statement2->bindParam(':almira',$_POST["almira"],PDO::PARAM_STR);
     $statement2->bindParam(':wifi',$_POST["wifi"],PDO::PARAM_INT);        
     $statement2->bindParam(':tv',$_POST["tv"],PDO::PARAM_INT);       
     

    
     $statement->execute();
     $statement1->execute();
     $statement2->execute();
      
      echo $statement->rowCount() ." records UPDATED successfully";

      $statement3=$connection->prepare("SELECT PGid FROM ROOMS WHERE roomID='$ids'");
      $statement3->execute();
      $result=$statement3->fetchAll(\PDO::FETCH_ASSOC); 

      $propertyid=0;
      
    foreach($result as $row)
    {
      $propertyid= $row['PGid'];
    }

    echo $propertyid;

      header("location:o_property_data.php?id=".$propertyid);  
    

}
catch(PDOException$e) 
{
  echo"Error: ".$e->getMessage();
}
?>


