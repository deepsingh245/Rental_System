<?php  
 session_start();  
 $errors=array();
 $host="localhost";  
 $username="root";  
 $password="";  
 $database="rentalsystem";  
 $message="";  
 try  
 {  
      $connect=new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["A_username"]) ||empty($_POST["password"]))  
           {  
                $message='<label> All fields are required </label>';  
           }  
           else  
           {  
                $query="SELECT * FROM admins WHERE username = :username AND password = :password";  
                $statement=$connect->prepare($query);  

                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["A_username"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  

                $count=$statement->rowCount();  
                echo $count;
                
                if($count>0)  
                {  
                     $_SESSION["username"] =$_POST["A_username"];  
                     header("location:admin_dashboard.php");  
                }  
                else  
                {  array_push($errors, "Username or Password incorrect");
                     $message='<label>Wrong Data</label>';  
                     echo $message;
                }  
           }  
      }  
 }  
 catch(PDOException$error)  
 {  
      $message=$error->getMessage();  
 }  
 ?>  
