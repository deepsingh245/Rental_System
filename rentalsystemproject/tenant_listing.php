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
<title>Tenant Listing Page</title>

<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  



<?php
try
{

        $connection=new PDO("mysql:host=$servername;dbname=$dbname", $serverusername, $serverpassword);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters

        $statement=$connection->prepare("select * from tenants");
        
        $statement->execute();

        $result=$statement->fetchAll(\PDO::FETCH_ASSOC);
        
      



?>



      <!--
  
      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
           
          
            <div class="right-side">
              <div class="box-topic">My Properties</div>
              <div class="number">
                <?php echo$row['count'];?></div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Total</span>
              </div>
            </div>
            <i class='bx bx-building-house bx-lg'></i>
          </div>

          <div class="box" style=" margin:20px; padding:36px">
            <div class="left-side">
              <a href="property_add.php">
              <div class="box-topic">Add Property</div></a>
          
              </div>
            
             <i class='bx bx-cart cart three' ></i> 
          </div>


          <div class="box">
            <div class="left-side">
              <div class="box-topic">Total Tenants</div>
              <div class="number">
                9
              </div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div>
            <i class='bx bx-cart cart three' ></i> 
          </div>
         
           
         
          </div>
        </div>


          -->
<div class="container-fluid">
<div class="container" style="margin-top:100px;">
          
<h1>Tenant Listing</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Email ID</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Adhar Card</th>
                <th scope="col">Images</th>
            </tr>
        </thead>

        <tbody>

    <?php

        foreach ($result as $row) 
        {
            
        
        ?>      
            <tr>
                    
                    <td> <?php echo $row['T_userid'];?></td>
                    <td> <?php echo $row['first_name'];?></td>
                    <td> <?php echo $row['last_name'];?></td>
                    <td> <?php echo $row['gender'];?></td>
                    <td> <?php echo $row['emailID'];?></td>
                    <td> <?php echo $row['phone_no'];?></td>
                    <td> <?php echo $row['T_username'];?></td>
                    <td> <?php echo $row['password'];?></td>
                    <td> <?php echo $row['adhar_card'];?></td>
                    <td> <?php echo $row['images'];?></td>
                    
                    
                    <td>
                        
                    <a href="tenant_edit.php?id= <?php echo $row['T_userid']; ?>">Edit</a>
                    </td>

                    <td>
                     <a href="userdelete.php?id= <?php echo $row['T_userid']; ?>">Delete</a>
                    </td>
     
                
            </tr>

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
