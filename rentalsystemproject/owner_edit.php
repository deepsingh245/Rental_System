
<?php
session_start();
include 'o_dash_code.php';

$servername="localhost";
$serverusername="root";
$serverpassword="";
$dbname="rentalsystem";

$connection=new PDO("mysql:host=$servername;dbname=$dbname", $serverusername, $serverpassword);
// set the PDO error mode to exception
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$O_userid= $_GET['id'];
// prepare sql and bind parameters
       $statement=$connection->prepare("select * from owners where O_userid='$O_userid'");
        
       $statement->execute();

       $result=$statement->fetchAll(\PDO::FETCH_ASSOC);

       foreach ($result as $row) 
       {
 
    
?>  


<html lang="en">
    <head>
        <meta charset="utf-8"/>
        
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <title> property edit</title>



        <style>
            .container {padding:0px; }
            .form-control:focus{box-shadow: none;border-color: #BA68C8}
            .profile-button{background: #0d3073 ;box-shadow: none;border: none}
            .profile-button:hover{background: #2697FF}
            .profile-button:focus{background: #2697FF;box-shadow: none}
            .profile-button:active{background: #2697FF;box-shadow: none}
            .back:hover{color: #2697FF;cursor: pointer}
            .labels
            {font-size: 14px}
            .btn{margin:10px 10px 10px 10px;padding:5px;font-size:13px}

            
            
            </style>
    </head>
    <body>

   
 
    <div class="home-content">
        <div class="overview-boxes">
        <div class="sales-boxes"  >
       <div class="recent-sales box">


    <form action="owner_edit_process.php" method="post">

     <div class="row"> 
        <div class="col-md-3 border-right">
             <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" src="main 1.jpg" style="width:220px;height:220px">
            
                    </div>
                   </div> 

    <div class="col-md-5 ">
    <div class="p-2 py-3"> 
            <h4 class="text-center">Profile Settings</h4> 
            </div>
            
                <div class="row mt-3"> 
                     <div class="col-md-6">
                        
                     <label class="labels">First Name</label>
                     <input clas="form-control"type="text"size="10"required name="first_name" id="first_name" value="<?php echo $row['first_name'];?>">
                     <input clas="form-control"type="hidden"size="10"required name="O_userid" id="O_userid" value="<?php echo $row['O_userid'];?>">

                    </div>

                    <div class="col-md-6">
                        <label class="labels">Last Name</label>
                        <input type="text"size="10"required name="last_name" id="last_name"value="<?php echo $row['last_name'];?>">
                    </div> 
                    </div>

                    <div class="row mt-3"> 
                        <div class="col-md-6">
                        <label class="labels">Email ID</label>
                        <input type="text"size="10"required name="emailID" id="emailID"value="<?php echo $row['emailID'];?>">
                        </div>
                         
 
                        
                         <div class="col-md-6">
                        <label class="labels">Phone Number</label>
                        <input type="text"size="10"required name="phone_no" id="phone_no"value="<?php echo $row['phone_no'];?>">
                        </div>
                        </div>
                        
                        <div class="row mt-3">
                        <div class="col-md-6">
                        <label class="labels">Username</label>
                        <input type="text"size="10"required name="O_username" id="O_username"value="<?php echo $row['O_username'];?>">
                        </div>
                          

                        
                        <div class="col-md-6">
                        <label class="labels">Password</label>
                        <input type="text"size="10"required name="password" id="password"value="<?php echo $row['password'];?>">
                        </div>
                         </div>
                        
                        <div class="row mt-3"> 
                        <div class="col-md-6">
                         <input type="submit" class="btn btn-primary " value="Modify">    
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
