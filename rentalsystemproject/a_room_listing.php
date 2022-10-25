<?php

session_start();
 include 'a_dash.php';
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

<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
try
{

        $connection=new PDO("mysql:host=$servername;dbname=$dbname", $serverusername, $serverpassword);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
                    
        $statement=$connection->prepare("SELECT roomID,room_no,images,availability,category,total_beds,almira,wifi,tv FROM ROOMS 
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
                <a href="a_room_add.php" >Add Rooms</a>
                </div>
              
              
            </div>
            <i class='bx bx-add-to-queue bx-md' style="margin-left:20px"></i> 
          </div>
         
           
</div>
 


<!-- <div class="container-fluid">
<div class="container" style="margin-top:100px;"> -->

<div class="sales-boxes">
       <div class="recent-sales box">

          <h1 style="text-align:left">Room Listing</h1>
          
    <table class="table">
        <thead>
            <tr>
                <!-- <th scope="col">Room Id</th> -->
                <th scope="col">Room Number</th>
                <!-- <th scope="col">PG Name</th> -->
                <th scope="col">Images</th>
                <th scope="col">Room Category</th>
                
                <th scope="col">Total Beds</th>
                <th scope="col">Almira</th>
                <th scope="col">Wifi</th>
                <th scope="col">T.V</th>
                <th scope="col">Availability</th>
                
                
                
            </tr>
        </thead>

        <tbody>

    <?php

        foreach ($result as $row) 
        {
        ?>          <tr>
                    
                    <!-- <td> <?php echo $row['roomID'];?></td> -->
                    <td> <?php echo $row['room_no'];?></td>
                   
                    <td> <?php echo $row['images'];?></td>
                    <td> <?php echo $row['category'];?></td>
                    
                    <td> <?php echo $row['total_beds'];?></td>
                    <td> <?php echo $row['almira'];?></td>
                    <td> <?php echo $row['wifi'];?></td>
                    <td> <?php echo $row['tv'];?></td>
                    <td> <?php echo $row['availability'];?></td>

                   
                    
                    

                    <td>
                    <a href="a_room_edit.php?id= <?php echo $row['roomID']; ?>">
                    <i class='bx bxs-edit'></i></a>
                    </td>

                    <td>
                     <!-- <a href="a_room_delete.php?id= <?php echo $row['roomID']; ?>"> -->
                     <i class='bx bx-trash'></i>
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
</div> 

</html>
