<?php

session_start();
include 'dash.php';
$servername="localhost";
$serverusername="root";
$serverpassword="";
$dbname="rentalsystem";



?>

<html>
<head>
<title>Rooms Listing Page</title>

<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  

<link href="dash.css" rel="stylesheet">



<?php
try
{

        $connection=new PDO("mysql:host=$servername;dbname=$dbname", $serverusername, $serverpassword);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
                    
        $statement=$connection->prepare("SELECT roomID,room_no,images,category,bed_type,total_beds,almira,wifi,tv FROM ROOMS 
                                        INNER JOIN ROOM_CATEGORY ON ROOMS.ROOM_CATEGORY_ID=ROOM_CATEGORY.ROOM_CATEGORY_ID 
                                        INNER JOIN AMENITIES ON AMENITIES.A_ID=ROOMS.AMENITIES_ID");
        
        $statement->execute();

        $result=$statement->fetchAll(\PDO::FETCH_ASSOC);

?>


<div class="home-content">
        <div class="overview-boxes">

        <div class="box">
            <div class="left-side">
              <div class="box-topic">
                <a href="room_add.php" >Add Rooms</a>
                </div>
              
              
            </div>
            <i class='bx bx-cart cart three' ></i> 
          </div>
         
           
</div>
</div>  


<!-- <div class="container-fluid">
<div class="container" style="margin-top:100px;"> -->

          <h1>Room Listing</h1>
          
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Room Id</th>
                <th scope="col">Roon Number</th>
                <!-- <th scope="col">PG Name</th> -->
                <th scope="col">Images</th>
                <th scope="col">Room Category</th>
                <th scope="col">Bed Type</th>
                <th scope="col">Total Beds</th>
                <th scope="col">Almira</th>
                <th scope="col">Wifi</th>
                <th scope="col">T.V</th>
                
                
                
            </tr>
        </thead>

        <tbody>

    <?php

        foreach ($result as $row) 
        {
        ?>          <tr>
                    
                    <td> <?php echo $row['roomID'];?></td>
                    <td> <?php echo $row['room_no'];?></td>
                   
                    <td> <?php echo $row['images'];?></td>
                    <td> <?php echo $row['category'];?></td>
                    <td> <?php echo $row['bed_type'];?></td>
                    <td> <?php echo $row['total_beds'];?></td>
                    <td> <?php echo $row['almira'];?></td>
                    <td> <?php echo $row['wifi'];?></td>
                    <td> <?php echo $row['tv'];?></td>
                   
                    
                    

                    <td>
                    <a href="room_edit.php?id= <?php echo $row['roomID']; ?>">Edit</a>
                    </td>

                    <td>
                     <!-- <a href="room_delete.php?id= <?php echo $row['roomID']; ?>">Delete</a> -->
                    </td>
 

                    </tr>

                    </div>
 </div>


        <?php

        }
        $connection=null;
    }
    
    catch(PDOException$e) 
    {
        echo"Error: ".$e->getMessage();
    }

    ?>

    </tbody>
    </table>
</div>
</div>

</html>
