<html>  
      <head>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
     
    <style>


    .container{
        display:flex;
        justify-content:center;
        align-items:center;
        width: 100%;
  
    } 
    .container .center{
        
        width: 400px;
        height: 500px;
        background: grey;
        border-style:solid;
        padding:10px;
        margin:20px;        
    }

    
        </style>

        </head>  
      <body>  

      
        
           <div class="container"> 
               <div class="center">

                    <?php  
                    if(isset($message))  
                    {  
                         echo'<label class="text-danger">'.$message.'</label>';  
                    }  
                    ?>  
                    <h3 style=" text-align: center">Owner Login</h3>
                    <br/>  

                    <form method="POST" action="owner_login_process.php">  

                         <label >Username</label>  
                         <input type="text" name="username" id="username" class="form-control" required/>  
                         <br/>  

                         <label>Password</label>  
                         <input type="password" name="password" id="password" class="form-control" required/>  
                         <br/>  

                         <input type="submit" name="login" class="btn btn-info" value="Login"/>  

                    </form>  

               </div>  
            </div> 
      </body>  
 </html>  
