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
<title>Category Page</title>

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
        $statement=$connection->prepare("select * from room_category");
        
        $statement->execute();

        $result=$statement->fetchAll(\PDO::FETCH_ASSOC);


?>

<html>
   
<div class="home-content">
        <div class="overview-boxes">

<div class="box">
            <div class="left-side">
              <div class="box-topic">
                <a href="#" data-toggle="modal" data-target="#nModal" >Add Category</a>

                 <!-- Modal -->
                 <div class="modal fade" id="nModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                    <div class="modal-dialog" role="document">
                        <div class="modal-content clearfix">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span >x</span></button>
                            <div class="modal-body">
                                <h3 class="title" style=>Add Category</h3>  

                                <form action="a_room_cat_add_p.php" method="POST">


               <div class="row">

               <div class="col-md-6">
               <div class="form-group ">
                <label for="category" >Enter Category Name</label>
                <input type="text" name="category" class="form-control" style="width: 250px;" id="category"   required>
                
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
                </div>
            </div>
        </div>


<div class="sales-boxes">
       <div class="recent-sales box">


        <h2>Room Classes</h2>
<table class="table">
        <thead>
            <tr>
                <th scope="col">Category ID</th>
                <th scope="col">Category</th>
</tr>
</thead>

        <tbody>

    <?php

        foreach ($result as $row) 
        {
           ?>     
             <tr>
                    
                    <td>  <?php echo $row['room_category_id'];?> </td>
                    <td> <a href="a_rooms_catwise.php ?id= <?php echo $row['room_category_id'];?> " > <?php echo $row['category']; ?> </a> </td>
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