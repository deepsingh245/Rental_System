
<?php

$servername="localhost";
$serverusername="root";
$serverpassword="";
$databasename="rentalsystem";

try
{
  

  $connection = new PDO("mysql:host=$servername;dbname=$databasename", $serverusername, $serverpassword);
    
  
  //  // set the PDO error mode to exception
  //  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
  //   $countfiles=count($_FILES['files']['name']);

  //     // Prepared statement
  //  for($i = 0; $i < $countfiles; $i++) {

  //   $filename = $_FILES['files']['name'][$i];
   

  //   $target_file = './upload/'.$filename;


  //   $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);   
    

  //   $file_extension = strtolower($file_extension);
      
  //   $valid_extension = array("png","jpeg","jpg");

   
    $statement=$connection->prepare("update property set PgName=:PgName, address=:address, PIN_CODE=:PIN_CODE,
                                       city=:city,state=:state, no_of_rooms=:no_of_rooms where PGId='$id'");

     

             //insert row                          
    $id=$_POST["PGId"];

    $PgName=$_POST["PgName"];
    $address=$_POST["address"];
    $PIN_CODE=$_POST["PIN_CODE"];
    $city=$_POST["city"];
    $no_of_rooms=$_POST["no_of_rooms"];


     $statement->bindParam(':PgName',$PgName);
     $statement->bindParam(':address',$address);
     $statement->bindParam(':PIN_CODE',$PIN_CODE);
     $statement->bindParam(':city',$city);
     $statement->bindParam(':state',$state);
     $statement->bindParam(':no_of_rooms',$no_of_rooms);
    //  $statement->bindParam(':photos',$target_file);


//      if(in_array($file_extension, $valid_extension)) {

//       echo 'if';
//         if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$target_file)) 
//         {
//             echo 'move_uploaded_file';
//             // Execute query
//             $statement->execute();
//         }
//     }
//     echo$statement->rowCount() ." records UPDATED successfully";
// }
     

    

    
 $connection=null;
 
      header("location:a_property_listing.php");  
    

}
catch(PDOException$e) 
{
  echo"Error: ".$e->getMessage();
}
?>


