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
<title>Add Property</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

 

  
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
        <div class="sales-boxes" style="margin:auto" >
       <div class="recent-sales box">
 


 <form action="o_property_add_process.php"method="POST">

        <div class="row">

        <div class="col-md-4 border-right">
             <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" src="main 1.jpg" style="width:220px; height:220px">
            
                    </div>
                   </div> 

       <div class="col-md-5 ">
    <div class="p-4 py-3"> 
    <h3 style="text-align:center">Add Your Property Here</h3>
</div>
                <div class="row mt-2"> 
                <div class="col-md-6">
                <label class="labels" > Property Name</label>
                <input type="text" size="20"name="PgName"   id="PgName"  required placeholder=" Property Name">
                </div>  
                </div>


                <div class="row mt-2">
                <div class="col-md-6">
                <label class="labels" >Address</label>
                <input type="text" name="address"   id="address"  required placeholder="Address">
                </div>
                </div>

                <div class="row mt-2">
                <div class="col-md-6">
                <label class="labels" > PIN CODE</label>
                <input type="text" size="5"name="PIN_CODE"   id="PIN_CODE" required  placeholder=" PIN CODE">
                </div>
                

                <div class="col-md-6">                              
                <label  class="labels"> Your City</label>
                <input type="text"size="5" name="city"   id="city" required  placeholder=" City">
                </div>
                </div>

                <div class="row mt-2">
                <div class="col-md-6">                              
                <label  class="labels"> State/Region <label>
                <input type="text"size="5" name="state"   id="state"  required placeholder=" state/region">
                </div>
                

                
                <div class="col-md-8">                
                <label class="labels"> Number of Rooms</label>
                <input type="text"name="no_of_rooms" size="5" id="no_of_rooms"required placeholder=" Number of Rooms">
                </div>
                </div>

                
                <div class="row mt-2">
                <div class="form-group">
                <button type="submit"class="btn btn-primary"  >ADD</button>
                </div>
                </div>

                </div>
                </div>

        </form>


</div>
</div>
</div>
</div>


</body>

</html>
