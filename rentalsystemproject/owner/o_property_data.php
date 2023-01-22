<?php

session_start();
include 'o_dash_code.php';

$servername="localhost";
$serverusername="root";
$serverpassword="";
$dbname="rentalsystem";
?>

<html>
<head>
<title>Room Listing Page</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
      .container .row .col-md-4 .card{
        display: flex;
  align-items: center;
  justify-content: center;
  
  background: #fff;
  padding: 15px 14px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
      }
      .container .row .col-md-4 .card
      {
        text-align:center;
      }

      
</style>


<?php
try
{

        $connection=new PDO("mysql:host=$servername;dbname=$dbname", $serverusername, $serverpassword);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id=$_GET["id"];

        // prepare sql and bind parameters
        $statement1=$connection->prepare("SELECT PROPERTY.PGId,PgName, state, address, PIN_CODE, city, no_of_rooms ,
                                    ROOMS.room_no,ROOMS.roomID,availability,category,total_beds,almira,wifi,tv FROM ROOMS 
                                        INNER JOIN ROOM_CATEGORY ON ROOMS.ROOM_CATEGORY_ID=ROOM_CATEGORY.ROOM_CATEGORY_ID 
                                        INNER JOIN AMENITIES ON AMENITIES.A_ID=ROOMS.AMENITIES_ID
                                        
                                        INNER JOIN PROPERTY ON PROPERTY.PGID=ROOMS.PGID WHERE PROPERTY.PGId='$id'");
        $statement1->execute();
        $result1=$statement1->fetchAll(\PDO::FETCH_ASSOC);    

        $statement2=$connection->prepare("SELECT PROPERTY.PGId,PgName, state, address, PIN_CODE, city FROM PROPERTY WHERE PGID='$id' ");
        $statement2->execute();
        $result2=$statement2->fetchAll(\PDO::FETCH_ASSOC); 

       

       
?>
<div class="container-fluid">
<div class="home-content">
    


        <div class="sales-boxes">
            <div class="recent-sales box">
                      
    <?php foreach ($result2 as $row2) 
    {
      ?>  
      <h2 style="text-align:center"> <?php echo $row2['PgName'];?> </h2>
    
    <h5 style="text-align:center"> <?php echo$row2['address'].',&nbsp ' .$row2['PIN_CODE']; ?>  </h5> 
    <?php 
             }  ?>
 
 
</div>
</div>
<div class="overview-boxes">

    <div class="box" style="margin-top:10px">
            <div class="left-side">
              <div class="box-topic">
              <a href="o_room_add.php" >Add Room</a>
                </div>
            </div>
            <i class='bx bx-add-to-queue bx-md' style="margin-left:20px"></i> 
          </div>

          <div class="box" style="margin-top:10px">
            <div class="left-side">
              <div class="box-topic">
              <h6><i class='bx bx-bed'></i>Total Beds
              <i class='bx bx-bed' style="color:green; margin-left:20px"></i>Available
                </div></h6>
            </div>
         

</div>
</div>



<div class="container">
        <div class="row">
          


    <?php foreach ($result1 as $row1) 
    {
      ?>                  <div class="col-md-4 " >
                            <div class="card" >
                            
                            <div class="card-header" style="background-color:white">
                              <a href="o_tenant_data.php?id= <?php echo $row1['roomID']; ?> " >
                            <h3>Room
                              <?php echo $row1['room_no'];?></h3></a>
        
        
                            </div>
                            <div class="card-body">
                          
                            <br>
                                <img src="main 1.jpg" width="220px"></p>
                            
                            </div>
                            
                            <div class="card-footer"  style="background-color:white">
                            <?php echo $row1['total_beds'];?>
                            <i class='bx bx-bed' style="margin-right:20px"></i>
    
                           



                            <?php

                            $cat=$row1['roomID'];
                           
                          $statement3=$connection->prepare("SELECT count( bedID ) AS bedcount, rooms.room_no,occupancy 
                          FROM rooms 
                          INNER JOIN beds ON rooms.roomID = beds.roomID
                          WHERE occupancy = 'available'and rooms.roomID = '$cat'
                          GROUP BY rooms.room_no ");

                          $statement3->execute(); 
                          
                          $result3=$statement3->fetchAll(\PDO::FETCH_ASSOC); 

                            foreach ($result3 as $row3)
                            {
                              echo $row3['bedcount']
                             ?> <i class='bx bx-bed' style="color:green; margin-right:20px"></i>
                             <?php 
                            }
                            ?>
                            
                         



                            <?php 
                          
                             
                            if ( $row1['tv'] =="Yes")
                            { 
                              ?> <i class='bx bx-tv'></i> <?php 
                            } 
                             
                            if (  $row1['wifi']  == "Yes")
                            { 
                               ?> <i class='bx bx-wifi'></i> <?php
                            }

                            elseif( $row1['wifi']  == "No")
                            { 
                              ?> <i class='bx bx-wifi-off'></i> <?php 

                            } ?> 
                            

                            <br>

                            <a href="o_room_edit.php?id= <?php echo $row1['roomID']; ?>">
                            <i class='bx bxs-edit' style="margin:20px"></i></a>
                            <!-- <a href="o_room_delete.php?id= <?php echo $row1['roomID']; ?>"> -->
                            <i class='bx bx-trash'></i>

                            
                            </div>
                         </div>
                    </div>
                           <?php }  ?>

           </div>
      </div>
           


    
                </div>
          







<?php 
 
$connection=null;
    }
    
    catch(PDOException$e) 
    {
        echo"Error: ".$e->getMessage();
    }

    ?>

    
    

</html>