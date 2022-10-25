
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

$T_userid= $_GET['id'];
// prepare sql and bind parameters
       $statement=$connection->prepare("select * from tenants where T_userid='$T_userid'");
        
       $statement->execute();

       $result=$statement->fetchAll(\PDO::FETCH_ASSOC);

       foreach ($result as $row) 
       {
 
    
?>  


<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title> </title>
    </head>
    <body>
 
 

    <h1 >Edit Form</h1>
 
<form action="tenant_edit_process.php" method="post">
 
 <div class="conatiner" style="margin-top:90px"></div>
 
 
 <div class="container" style="margin:60px">
 <h2 style="text-align:center"> edit form </h2>
 
<table>


<tr>
    
    <td><input type="hidden"size="10"required name="T_userid" id="T_userid"value="<?php echo $row['T_userid'];?>">
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
    <td>Gender</td>
 
</tr>
 
<tr>

    <td><input type="text"size="10"required name="gender" id="gender"value="<?php echo $row['gender'];?>"></td>
 
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

    <td><input type="text"size="10"required name="T_username" id="T_username"value="<?php echo $row['T_username'];?>"></td>
 
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
        
    </body>
</html>
