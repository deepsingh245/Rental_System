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
<title>Room Listing Page</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
      .container .row .col-md-4 .card{
        display: flex;
  align-items: center;
  justify-content: center;
  
  background: #fff;
  padding: 15px 14px 5px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
      }
      .container .row .col-md-4 .card
      {
        text-align:center;
      }
</style>

</head>

<?php
try
{

        $connection=new PDO("mysql:host=$servername;dbname=$dbname", $serverusername, $serverpassword);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id=$_GET["id"];

        // prepare sql and bind parameters
        $statement=$connection->prepare("SELECT roomID,room_no,availability,ROOMS.room_category_id,room_category.category,total_beds,almira,wifi,tv 
        ,PgName,city FROM ROOMS 
        INNER JOIN ROOM_CATEGORY ON ROOMS.ROOM_CATEGORY_ID=ROOM_CATEGORY.ROOM_CATEGORY_ID 
        INNER JOIN AMENITIES ON AMENITIES.A_ID=ROOMS.AMENITIES_ID 
        INNER JOIN PROPERTY ON PROPERTY.PGID=ROOMS.PGID WHERE ROOMS.ROOM_CATEGORY_ID='$id'");
        
        $statement->execute();

        $result=$statement->fetchAll(\PDO::FETCH_ASSOC);

        

?>


  
      
           
          

 <div class="home-content">
        <div class="overview-boxes">
         

          <div class="box">
            <div class="left-side">
              <div class="box-topic">
              <a href="a_room_add.php" >Add Room</a>
                </div>
            </div>
            <i class='bx bx-add-to-queue bx-md' style="margin-left:20px"></i> 
          </div>
         

          
</div>
</div>

<div class="container">
<?php foreach ($result as $row) 
    {
        ?>
        <h2 style="text-align:center"> <?php echo $row['category'].'&nbsp Rooms';?> </h2> 
    
        <div class="row">
          
    
               
              <div class="col-md-4 " >
                            <div class="card" style="padding:10px; margin:0px" >
                            
                            <div class="card-header">
                            <h3>
                              <?php echo $row['PgName'];?></h3>
                              
                              <p > <?php echo $row['city']; ?> </p>
                              
        
        
                            </div>
                            <div class="card-body">
                            <h4 class="card-title"><a href="a_tenant_data.php?id= <?php echo $row['roomID']; ?> "  > 
                                <img src="main 1.jpg" width="220px"></p>
                                Tenants
                                </a>
                            
                            </div>
                            
                            <div class="card-footer">
                            <?php echo $row['total_beds'];?>
                            <i class="fa-solid fa-bed"></i>

                            <i class="fa-solid fa-fan"></i>
                            


                            </div>
                            </div>
                    </div>
    <?php }  ?>
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

    
    </div>
    </div>
    </div>

</html>
