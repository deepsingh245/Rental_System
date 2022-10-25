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

  $statement=$connection->prepare("insert into rooms(room_no) values (:room_no)");


  $statement->bindParam(':room_no', $room_no);
 
  // insert a row
$room_no=$_POST["room_no"];
  
 
 

  $statement->execute();

  
//   $countfiles=count($_FILES['files']['name']);

//   // Prepared statement
// for($i = 0; $i < $countfiles; $i++) {

// $filename = $_FILES['files']['name'][$i];


// $target_file = './upload/'.$filename;


// $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);   


// $file_extension = strtolower($file_extension);
  
// $valid_extension = array("png","jpeg","jpg");




  $statement2=$connection->prepare("insert into amenities(total_beds,almira,wifi,tv) 
                                    values(:total_beds,:almira,:wifi,:tv)");

                                    // insert a row
$room_no=$_POST["room_no"];
$total_beds=$_POST["total_beds"];
$almira=$_POST["almira"];
$wifi=$_POST["wifi"];
$tv=$_POST["tv"];



$statement2->bindParam(':bed_type', $bed_type);
$statement2->bindParam(':total_beds', $total_beds); 
$statement2->bindParam(':almira', $almira);
$statement2->bindParam(':wifi', $wifi);
$statement2->bindParam(':tv', $tv);
// $statement2->bindParam(':photos',$target_file);


// if(in_array($file_extension, $valid_extension)) {

//   echo 'if';
//     if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$target_file)) 
//     {
//         echo 'move_uploaded_file';
//         // Execute query
//         $statement2->execute();
//     }
// }

// }




// $id=$_POST['PGId']

// $statement3=$connection->prepare("SELECT PGId FROM property WHERE PGId='$id'");
// $statement3->execute();
// $result=$statement3->fetchAll(\PDO::FETCH_ASSOC); 

// $pgid=0;

// foreach($result as $row)
// {
// $pgid= $row['PGId'];
// }

// echo $pgid;
$connection=null;


header("location:a_property_listing.php"); 

} 
catch(PDOException $e) 
{
  echo"Error: ".$e->getMessage();
}
?>

