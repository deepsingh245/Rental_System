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
<title>Owner Listing Page</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<link href="dash.css" rel="stylesheet">


<style>
      .container .row .col-md-4 .card{
        display: flex;
  align-items: center;
  justify-content: center;
  text-align:center;
  background: #fff;
  padding: 10px 10px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
      }
      .container .row .col-md-4 .card .card-footer
      {
        background-color:white;
        border-top:0;
        
      }

      
</style>
</head>
<?php
try
{

        $connection=new PDO("mysql:host=$servername;dbname=$dbname", $serverusername, $serverpassword);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $statement=$connection->prepare("SELECT first_name,last_name,phone_no,emailID,O_userid,O_username,password, property.PGId from owners
                                        INNER JOIN PROPERTY ON PROPERTY.PGID=OWNERS.PGID  ");
        
        $statement->execute();

        $result=$statement->fetchAll(\PDO::FETCH_ASSOC);

?>
         

         <div class="container-fluid">
         <div class="home-content">
      
         <h1> Owners List </h1>
<div class="container">

        <div class="row">
            
          
    <?php foreach ($result as $row) 
    {
      ?>                  <div class="col-md-4 " >
                            <div class="card" >
                            <div class="card-body">
        
                            
                                <img src="main 1.jpg" width="220px" height="220px" style="border-radius:50%"></p>
                            
                            </div>
                            
                            <div class="card-footer" style="text-align:left"> 
                            <h5 style="text-align:center; color:black">
                            <a href="a_property_data.php?id= <?php echo $row['PGId']; ?> ">
                            <?php echo $row['first_name'].'&nbsp;'. $row['last_name'];?></h5>
                            <table class="table">
                            <tbody>
                                <tr>
                        
                             <td>Phone No. :</td>
                             <td> <?php echo $row['phone_no'];?></td></tr>
                             <tr>
                            <td>Email id:</td>
                            <td> <?php echo $row['emailID'];?></td></tr>
                            <tr>
                             <td>Username:</td>
                            <td> <?php echo $row['O_username'];?></td></tr>
                            <tr>
                             <td>Password:</td>
                            <td><?php echo $row['password'];?></td></tr>
                            </tbody>
    </table>

                                
                    <a href="a_owner_edit.php?id= <?php echo $row['O_userid']; ?>">
                    <i class='bx bxs-edit' style="margin:10px 20px 0px 80px" ></i></a>
                    
                     <!-- <a href="a_owner_delete.php?id= <?php echo $row['O_userid']; ?>"> -->
                     <i class='bx bx-trash'></i>
    

                        
                        </div>
                            </div>
                    </div>
    <?php }  ?>
           </div>
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
