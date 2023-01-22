<?php  
 session_start();  
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
           if(empty($_POST["username"]) ||empty($_POST["password"]))  
           {  
                $message='<label> All fields are required </label>';  
           }  
           else  
           {  
                $query="SELECT * FROM owners WHERE O_username = :username AND password = :mypassword";  
                $statement=$connect->prepare($query);  


               #echo $_POST["username"];
               #echo $_POST["password"];

                $statement->execute(  
                     array(  
                          'username' => $_POST["username"],  
                          'mypassword' => $_POST["password"] ,
                       
                          )  
                );  

               

                $count=$statement->rowCount();  
                
                
                
                if($count > 0)  
                {    
                    $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
                    foreach( $result as $row)
                    {
                         $_SESSION["O_userid"] =$row['O_userid']; 
                        $_SESSION["username"] =$_POST["username"]; 
                    }
                      
                     header("location:owner_dashboard.php");  
                }  
                else  
                {  
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
