<?php   

session_start();  

     include 'owner_dashboard.php';
$servername="localhost";
$serverusername="root";
$serverpassword="";
$dbname="rentalsystem";


  
?>



<html>
<head>
<title>User Profile</title>

<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<link href="dash.css" rel="stylesheet"> 

</head>

<?php
try
{
   
    $username = $_SESSION["username"];
    
        $connection=new PDO("mysql:host=$servername;dbname=$dbname", $serverusername, $serverpassword);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $statement=$connection->prepare("select * from tenants where T_username= '$username'");
        
        $statement->execute();

        $result=$statement->fetchAll(\PDO::FETCH_ASSOC);

?>
<!-- 
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="https://source.unsplash.com/600x300/?student" alt="student dp">
            <h3>Deep Singh</h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Student ID:</strong>321000001</p>
            <p class="mb-0"><strong class="pr-1">Class:</strong>4</p>
            <p class="mb-0"><strong class="pr-1">Section:</strong>A</p>
          </div>
        </div>
      </div>
 -->
 
<div class="sales-boxes">
          <div class="recent-sales box">

      
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email ID</th>
                <th scope="col">gender</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
            </tr>
        </thead>

        <tbody>

    <?php

        foreach ($result as $row) 
        {
            
        
        ?>          <tr>
                    
                    <td> <?php echo $row['T_userid'];?></td>
                    <td> <?php echo $row['first_name'];?></td>
                    <td> <?php echo $row['last_name'];?></td>
                    <td> <?php echo $row['emailID'];?></td>
                    <td> <?php echo $row['gender'];?></td>
                    <td> <?php echo $row['phone_no'];?></td>
                    <td> <?php echo $row['T_username'];?></td>
                    <td> <?php echo $row['password'];?></td>

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







