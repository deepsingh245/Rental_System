<?php

session_start();
include 'o_dash_code.php';
$O_userid=$_SESSION["O_userid"];
$username=$_SESSION['username'];

$servername="localhost";
$serverusername="root";
$serverpassword="";
$dbname="rentalsystem";
?>

<html>
<head>
<title>Property Listing Page</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


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

</head>

<?php
try
{

       
        $connection=new PDO("mysql:host=$servername;dbname=$dbname", $serverusername, $serverpassword);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //  $userid=$_SESSION["O_userid"];

        // prepare sql and bind parameters

        
        
        $statement=$connection->prepare("SELECT  O_userid,PGId,PgName, state, address, PIN_CODE, city, no_of_rooms from property 
                                        where O_userid= '$O_userid' ");
        
        $statement->execute();

        $result=$statement->fetchAll(\PDO::FETCH_ASSOC);

        

?>


  
      
           
          

 <div class="home-content">
        <div class="overview-boxes">
         

          <div class="box">
            <div class="left-side">
              <div class="box-topic">
              <a href="o_property_add.php">Add Property</a>
                </div>
            </div>
            <i class='bx bx-add-to-queue bx-md' style="margin-left:20px"></i> 
          </div>
         

          
</div>
</div>


<div class="container">
        <div class="row">
          
    <?php foreach ($result as $row) 
    {
      ?>                  <div class="col-md-4 " >
                            <div class="card" >
                            
                           
                            
        
        
                            
                            <div class="card-body">
                            <h4 class="card-title"><a href="o_property_data.php?id= <?php echo $row['PGId']; ?> "  > 
                                                      <?php echo $row['PgName'];?>  </h4></a>
                            <br>
                                <img src="main 1.jpg" width="220px" style="border-radius:12px"></p>
                            
                            </div>
                            
                            <div class="card-footer" style="background-color:white">
                            <?php echo $row['address'].',' ;?>
                            <?php echo $row['city'].',' ;?>
                            <?php echo $row['PIN_CODE'].',' ;?>
                            <?php echo $row['state'];?>
                            <br>

                            <a href="o_property_edit.php?id= <?php echo $row['PGId']; ?>">
                            <i class='bx bxs-edit' style="margin:20px"></i></a>
                            <!-- <a href="o_property_delete.php?id= <?php echo $row['PGId']; ?>"> -->
                            <i class='bx bx-trash'></i>
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
