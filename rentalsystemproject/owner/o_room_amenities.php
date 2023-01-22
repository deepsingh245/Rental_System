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
<title> Amenities Listing</title>

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
        $statement=$connection->prepare("select * from amenities");
        
        $statement->execute();

        $result=$statement->fetchAll(\PDO::FETCH_ASSOC);


?>

</head>


<html>
   
<div class="home-content">
        <div class="overview-boxes">

<div class="box">
            <div class="left-side">
              <div class="box-topic">
                <a href="#" data-toggle="modal" data-target="#aModal" >Add Amenity structure</a>

                 <!-- Modal -->
                 <div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                    <div class="modal-dialog" role="document">
                        <div class="modal-content clearfix">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span >x</span></button>
                            <div class="modal-body">
                                <h3 class="title" style="margin:20px" >Add New amenity structure</h3>  

                                <form action="room_am_addproc.php" method="POST">


               <div class="row">

               <div class="col-md-6">
               <div class="form-group ">
                <label for="bed_type" >Select Bed Type</label>
                <br>
                <select name="bed_type">
                    <option value="Single">Single</option>
                    <option value="Double">Double</option>
                    <option value="Tripple">Tripple</option>
                    
                    </select>


                <?php
                // echo"<option><select name =bed_type id=bed_type value='select'>Bed Type</option>"; 

                // foreach ($result as $row)
                // {

                // echo"<option value=$row[A_ID]>$row[bed_type]</option>"; 

                // }

                // echo"</select>";

                // ?>

                <!-- <input type="text" name="bed_type" class="form-control" style="width: 250px;" id="bed_type" placeholder="Single/Double/Tripple"   required> -->
                </div>
                </div>

                <div class="col-md-6">
               <div class="form-group ">
                <label for="total_beds" >Enter Number of Beds</label>
                
                <br>
                <select name="total_beds">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    
                    </select>
                <!-- <input type="text" name="total_beds" class="form-control" style="width: 250px;" id="total_beds"  placeholder="1,2,3" required> -->
                </div>
                </div>

                <div class="col-md-6">
               <div class="form-group ">
                <label for="almira" >Almira</label>
                
                <br>
                <select name="almira">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <!-- <input type="text" name="almira" class="form-control" style="width: 250px;" id="almira"  placeholder="1,2,3" required> -->
                </div>
                </div>

                <div class="col-md-6">
               <div class="form-group ">
                <label for="wifi" >WiFi</label>
                
                <br>
                <select name="wifi">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    </select>
                   
                <!-- <input type="text" name="wifi" class="form-control" style="width: 250px;" id="wifi"  placeholder="Yes/No" required> -->
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
                <!-- <input type="text" name="tv" class="form-control" style="width: 250px;" id="tv"  placeholder="Yes/No" required> -->
                </div>
                </div>


                <div class="form-group">
                <button type="submit"class="btn btn-primary" style="margin:25px 25px ">Add</button>
</form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
             </div>
         </div>
     </div>
</div>







                     <div class="box">
                     <div class="left-side">
                     <div class="box-topic">
                     <a href="#" data-toggle="modal"  data-target="#odal" >Add Amenity</a>

                 <!-- Modal -->
                 <div class="modal fade" id="zModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                    <div class="modal-dialog" role="document">
                        <div class="modal-content clearfix">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span >x</span></button>
                            <div class="modal-body">
                                <h3 class="title" style=>Add Amenity</h3>  

                                <form action="room_new_am.php" method="POST">


               <div class="row">

               <div class="col-md-6">
               <div class="form-group ">
                <label for ="amenity_name" >Enter Amenity Name</label>
                <input type="text" name="amenity_name" class="form-control" style="width: 250px;" id="amenity_name"   required>
                
                <div class="form-group">
                <button type="submit"class="btn btn-primary" style="margin:25px 25px ">Add</button>

                </div>

                                </div>
                            </div>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
</div>
                


        <h2>Amenities structure List</h2>
<table class="table">
        <thead>
            <tr>
                <th scope="col">Bed Type</th>
                <th scope="col">Number of Beds</th>
                <th scope="col">Almira</th>
                <th scope="col">WiFi</th>
                <th scope="col">T.V.</th>
</tr>
</thead>

        <tbody>

    <?php

        foreach ($result as $row) 
        {
           ?>     
             <tr>
                    
                    <td> <?php echo $row['bed_type'];?></td>
                    <td> <?php echo $row['total_beds'];?></td>
                    <td> <?php echo $row['almira'];?></td>
                    <td> <?php echo $row['wifi'];?></td>
                    <td> <?php echo $row['tv'];?></td>
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

</html>
