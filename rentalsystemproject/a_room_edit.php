
<?php
session_start();
// include 'a_dash.php';

$servername="localhost";
$serverusername="root";
$serverpassword="";
$dbname="rentalsystem";

$connection=new PDO("mysql:host=$servername;dbname=$dbname", $serverusername, $serverpassword);
// set the PDO error mode to exception
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$roomID= $_GET['id'];
// prepare sql and bind parameters
       $statement=$connection->prepare("SELECT  roomID,room_no,images,category,ROOMS.ROOM_CATEGORY_ID,total_beds,almira,wifi,tv,AMENITIES.A_ID ,beds.occupancy FROM ROOMS
                                        INNER JOIN ROOM_CATEGORY ON ROOMS.ROOM_CATEGORY_ID=ROOM_CATEGORY.ROOM_CATEGORY_ID 
                                        INNER JOIN BEDS ON BEDS.ROOMID=ROOMS.ROOMID
                                        INNER JOIN AMENITIES ON AMENITIES.A_ID=ROOMS.AMENITIES_ID  WHERE roomID='$roomID'");
        
       $statement->execute();

       $result=$statement->fetchAll(\PDO::FETCH_ASSOC);

       foreach ($result as $row) 
       {
 
    
?>  


<head>
        <title>Edit Room</title>

                
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
            .container {padding:0px; }
            .form-control:focus{box-shadow: none;border-color: #BA68C8}
            .profile-button{background: #0d3073 ;box-shadow: none;border: none}
            .profile-button:hover{background: #2697FF}
            .profile-button:focus{background: #2697FF;box-shadow: none}
            .profile-button:active{background: #2697FF;box-shadow: none}
            .back:hover{color: #2697FF;cursor: pointer}
            .labels{font-size: 14px}
            .btn{margin :10px;padding:5px;border-radius:5px;font-size:13px;background-color:#2697FF}
            
            
            </style>
    </head>
    <body>

    <div class="home-content">
        <div class="overview-boxes">
        <div class="sales-boxes"  >
       <div class="recent-sales box">
 
 
 
    
 
 
<form action="a_room_edit_proc.php" method="post">

 

<div class="row"> 
        <div class="col-md-4 border-right">
             <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" src="main 1.jpg" style="width:220px;height:220px">
            
                    </div>
                   </div> 

    <div class="col-md-5 ">
    <div class="p-4 py-3"> 
            <h4 class="text-center">Room Settings</h4> 
            </div>
            
                <div class="row mt-2"> 
                     <div class="col-md-6">
                     <label class="labels">Room Number</label>
                     <input type="text"size="5"required name="room_no" id="room_no" value="<?php echo $row['room_no'];?>">
                     <input type="hidden"required name="roomID" id="roomID"value="<?php echo $row['roomID'];?>">
                     
                    </div>

                    <div class="col-md-6">

                    <div class="form-group">
                <label for="class"class="labels">Category</label>
                <br>

                <?php

                echo"<select name=category_id id=category_id value=''>Category</option>"; 

                foreach ($result as $row)
                {

                echo"<option value=$row[categoty_id]>$row[category]</option>"; 

                }

                echo"</select>";

                ?>
                    </div> 
       </div>
            </div>

                    <div class="row mt-3"> 
                        <div class="col-md-6">
                            <label class="labels">Total Beds</label>
                            <input type="text"size="5"required name="total_beds" id="total_beds"value="<?php echo $row['total_beds'];?>">
                        </div>

                        <div class="col-md-6">
                        <label class="labels">Almira</label>
                        <input type="text"size="5"required name="almira" id="almira"value="<?php echo $row['almira'];?>">
                        </div>
                         </div>

                         <div class="row mt-3"> 
                         <div class="col-md-6">
                        <div class="form-group ">
                            <label for="wifi" >WiFi</label>
                            
                            <br>
                            <select name="wifi">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                </select>
                            
                            </div>
                            </div>

                            <div class="col-md-6">
                        <div class="form-group ">
                            <label for="tv" >T.V.</label>

                            <br>
                            <select name="tv">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                </select>
                            </div>
                            </div>

                                 
                        <div class="row mt-3"> 
                         <div class="col-md-6">
                         
                         <input class="btn btn-primary"type="submit"  value="Modify">                                       
                         </div> 
                                    </div>
                                 </div>
                                 
                                        </div>
</div>
</div>
</div>
 <?php

       }

?>
 
</form>
    
    </div>
    </div>
    </div>
    </div>

 
        
    </body>
</html>
