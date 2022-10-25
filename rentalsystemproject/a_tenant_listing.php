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

        $statement=$connection->prepare("SELECT T_userid,TENANTS.roomID,first_name,last_name,gender,emailID,phone_no,T_username,password,adhar_card FROM TENANTS
                                        INNER JOIN ROOMS ON TENANTS.ROOMID=ROOMS.ROOMID ");
        
        $statement->execute();

        $result=$statement->fetchAll(\PDO::FETCH_ASSOC);
        

?>




<div class="home-content">
<div class="overview-boxes">

<div class="box" >
         <div class="right-side">
          
           <div class="box-topic" ><a href="a_tenant_add.php" > Add New Tenant </a>
           <i class='bx bx-add-to-queue bx-md' style="margin-left:20px"></i> </div>

           
         </div>
        
       </div>
</div>

<div class="sales-boxes">
       <div class="recent-sales box">
          
<h1>Tenant Listing</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Room Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Email ID</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Adhar Card</th>
                
            </tr>
        </thead>

        <tbody>

    <?php

        foreach ($result as $row) 
        {
            
        
        ?>      
            <tr>
                    
                    <td> <?php echo $row['T_userid'];?></td>
                    <td> <?php echo $row['roomID'];?></td>
                    <td> <?php echo $row['first_name'];?></td>
                    <td> <?php echo $row['last_name'];?></td>
                    <td> <?php echo $row['gender'];?></td>
                    <td> <?php echo $row['emailID'];?></td>
                    <td> <?php echo $row['phone_no'];?></td>
                    <td> <?php echo $row['T_username'];?></td>
                    <td> <?php echo $row['password'];?></td>
                    <td> <?php echo $row['adhar_card'];?></td>
                    
                    
                    
                    <td>
                        
                    <a href="a_tenant_edit.php?id= <?php echo $row['T_userid']; ?>">
                    <i class='bx bxs-edit'></i></a>
                    </td>

                    <td>
                     <!-- <a href="a_tenant_delete.php?id= <?php echo $row['T_userid']; ?>"> -->
                     <i class='bx bx-trash'></i>
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
</div>


</html>
