
<?php

session_start();
include 'a_dash.php';

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


<head>
        <title>Owner Edit </title>
    </head>
    <body>
        
    <div class="home-content">
        <div class="overview-boxes">
        <div class="sales-boxes">
       <div class="recent-sales box">
 
 

    
 
<form action="a_owner_edit_process.php" method="post">
 
 
<h1 >Edit Form</h1>
 
<table>


<tr>
    
    <td><input type="hidden"size="10"required name="O_userid" id="O_userid"value="<?php echo $row['O_userid'];?>">
    </td>
 
  </td>
</tr>

<tr>
    <td>First Name</td>
 
</tr>
 
<tr>

    <td><input type="text"size="10"required name="first_name" id="first_name"value="<?php echo $row['first_name'];?>"></td>
 
  </td>
 
</tr>

<tr>
    <td>Last Name</td>
 
</tr>
 
<tr>

    <td><input type="text"size="10"required name="last_name" id="last_name"value="<?php echo $row['last_name'];?>"></td>
 
  </td>
 
</tr>


<tr>
    <td>email ID</td>
 
</tr>
 
<tr>

    <td><input type="text"size="10"required name="emailID" id="emailID"value="<?php echo $row['emailID'];?>"></td>
 
  </td>
 
</tr>

<tr>
    <td>Phone Number</td>
 
</tr>
 
<tr>

    <td><input type="text"size="10"required name="phone_no" id="phone_no"value="<?php echo $row['phone_no'];?>"></td>
 
  </td>
 
</tr>

<tr>
    <td>User Name</td>
 
</tr>
 
<tr>

    <td><input type="text"size="10"required name="O_username" id="O_username"value="<?php echo $row['O_username'];?>"></td>
 
  </td>
 
</tr>
 
 
<tr>
    <td>Password</td>
 
</tr>
 
<tr>
    <td><input type="text"size="50"required name="password"id="password"value="<?php echo $row['password'];?>"></td>
 
</tr>
 
 
 
 
</table>
 
    <br>
 
<input type="submit"value="Modify">
 
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
