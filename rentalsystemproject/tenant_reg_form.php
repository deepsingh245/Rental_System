<html>
<head>
<title>Tenant Registration Page</title>

<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  

<style>
.container-fluid .col-sm-12 .container  .form-group .form-control{
    border-radius: 25px;
}

.container-fluid .col-sm-12 .container   .form-group .btn {
    background-color: rgb(102, 102, 219);
    border-radius:25px;
    text-align: center;
    padding: 10px 200px;
    margin: 50px 310px;
}


</style>
</head>

<body>

<h1 style="text-align:center">Register Yourself Here</h1>

<div class="container-fluid " >
<div class="col-sm-12">

<div class="container ">


        <form action="tenant_reg_process.php"method="POST">

        <div class="row">
        <div class="col-md-6">
                

                <div class="form-group ">
                <label for="first_name" >Enter First Name</label>
                <input type="text" name="first_name" class="form-control" style="width: 500px;" id="first_name"  name="first_name" placeholder="Enter First Name">
                </div>
                </div>
        
                <div class="col-md-6">
                <div class="form-group">                
                <label for="last_name" >Enter Last Name</label>
                <input type="text" name="last_name" class="form-control" style="width: 500px;" id="last_name"   placeholder="Enter Last Name">
                </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">                
                <label for="gender" >Enter Your Gender</label>
                <input type="text" name="gender" class="form-control" style="width: 500px;" id="gender"   placeholder="Enter Your Gender">
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">                
                <label for="emailID" >Enter Your email id</label>
                <input type="text" name="emailID" class="form-control" style="width: 500px;" id="emailID"   placeholder="Enter Your Email id">
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">                
                <label for="phone_no" >Enter Your Phone Number</label>
                <input type="text" name="phone_no" class="form-control" style="width: 500px;" id="phone_no"   placeholder="Enter Your Phone Number">
                </div>
                </div>

                
                               

                <div class="col-md-6">
                <div class="form-group">                
                <label for="name" >Enter Username</label>
                <input type="text" name="username" class="form-control" style="width: 500px;" id="username"   placeholder="Enter Username">
                </div>
                

                <div class="form-group">
                <label for="password">Enter Password</label>
                <input type="password"name="password"class="form-control" style="width: 500px;" id="password" placeholder="Enter Password">
                </div>
                </div>

                </div>

                <div class="form-group">
                <button type="submit"class="btn btn-primary"  >Submit</button>
                </div>
                </div>

        </form>
</div>

</div>
</div>

</body>

</html>
