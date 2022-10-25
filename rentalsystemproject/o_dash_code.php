<?php  
//login_success.php  
$servername="localhost";
$serverusername="root";
$serverpassword="";
$dbname="rentalsystem";

try{
  $connection=new PDO("mysql:host=$servername;dbname=$dbname", $serverusername, $serverpassword);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $statement=$connection->prepare("select count(*) as count from property ");
        $statement->execute();
        $result=$statement->fetchAll(\PDO::FETCH_ASSOC);
        
        
      foreach ($result as $row) 
        {
             ?>
            
            <tr>
            <td> <?php  $row['count'];?></td>
           </tr>
            <?php

            }
}

catch(PDOException$e) 
{
    echo"Error: ".$e->getMessage();
}




if(isset($_SESSION["username"]))  
 {


 ?>
    <!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
      <link rel="stylesheet" href="style.css">
      <!-- Boxicons CDN Link -->
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
  <link href="dash.css" rel="stylesheet">
   
  
     </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">      
      <i class='bx bx-building-house'></i>
      <a href="Home_Away.html">
        <span class="logo_name">Home Away</span>
    </a>
      </div>
        <ul class="nav-links">
          <li>
            <a href="owner_dashboard.php" class="active">
              <i class='bx bx-grid-alt' ></i>
              <span class="links_name">Dashboard</span>
            </a>
          </li>
          
          <li class="profile">
            <a href="owner_profile.php">
            <i class='bx bxs-user-circle'></i>
              <span class="links_name">Profile</span>
            </a>
          </li>

          <li>
            <a href="o_property_listing.php">
            <i class='bx bx-building'></i>
              <span class="links_name">My Property</span>
            </a>
          </li>

          <li>
            <a href="#">
              <i class='bx bxs-user-detail'></i>
              <span class="links_name">Tenants</span>
            </a>
          </li>
         
          <li>
            <a href="#">
              <i class='bx bx-cog' ></i>
              <span class="links_name">Setting</span>
            </a>
          </li>
          <li class="log_out">
            <a href="owner_logout.php">
              <i class='bx bx-log-out'></i>
              <span class="links_name">Log out</span>
            </a>
          </li>
        </ul>
    </div>
     
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class='bx bx-menu sidebarBtn'></i>
          <span class="dashboard">Dashboard</span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Search...">
          <i class='bx bx-search' ></i>
        </div>
        <div class="profile-details">
          <img src="images/main 4.jpg" alt="">
  
           <?php
                 echo'<h4>'.$_SESSION["username"].'</h4>'; ?>
                 

        </div>
      </nav>
      <!-- 
  
      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
           
          
            <div class="right-side">
              <div class="box-topic">My Properties</div>
              <div class="number">
                <?php echo $row['count'];?></div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Total</span>
              </div>
            </div>
            <i class='bx bx-building-house bx-lg'></i>
          </div>

          <div class="box" style=" margin:20px; padding:36px">
            <div class="left-side">
              <a href="property_add.php">
              <div class="box-topic">Add Property</div></a>
          
              </div>
            
             <i class='bx bx-cart cart three' ></i> 
          </div>


          <div class="box">
            <div class="left-side">
              <div class="box-topic">Total Tenants</div>
              <div class="number">18</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div>
            <i class='bx bx-cart cart three' ></i> 
          </div>
         
           
             <i class='bx bxs-cart-download cart four' ></i> -->
          








        
    <script>
     let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".sidebarBtn");
  sidebarBtn.onclick = function() {
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
    sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
  }else
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
  }
   </script>
  
  </body>
  
  </html>
  
   
  
  <?php
  
   }
?>




