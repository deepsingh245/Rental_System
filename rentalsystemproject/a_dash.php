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
        $statement=$connection->prepare("select count(*) as count from owners ");
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
   
<link href="a_profile.css" rel="stylesheet">
  
     </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
      <i class='bx bx-building-house'></i>
      
        <span class="logo_name">Home Away</span>
 
      </div>
        <ul class="nav-links">

          <li>
            <a href="admin_dashboard.php" class="active">
              <i class='bx bx-grid-alt' ></i>
              <span class="links_name">Dashboard</span>
            </a>
          </li>

          <li>
            <a href="a_owner_listing.php">
              <i class='bx bx-box' ></i>
              <span class="links_name">Owners</span>
            </a>
          </li>

          <li>
            <a href="a_tenant_listing.php">
            <i class='bx bxs-t-shirt'></i>
              <span class="links_name">Tenants</span>
            </a>
          </li>
<!-- 
          <li>
            <a href="room_listing.php">
            <i class='bx bx-bed'></i>
              <span class="links_name">Rooms</span>
            </a>
          </li> -->

          <li>
            <a href="a_room_category.php">
            <i class='bx bxs-bed' ></i>
              <span class="links_name">Room Category</span>
            </a>
          </li>
<!-- 
          <li>
            <a href="room_amenities.php">
            <i class='bx bxs-dashboard'></i>
              <span class="links_name">Amenities</span>
            </a>
          </li> -->

          <li>
            <a href="a_property_listing.php">
            <i class='bx bx-building'></i>
              <span class="links_name">Properties</span>
            </a>
          </li>


          <li>
            <a href="admin_profile.php">
            <i class='bx bxs-user-circle'></i>
              <span class="links_name">Profile</span>
            </a>
          </li>
         
          <!-- <li>
            <a href="#">
              <i class='bx bx-cog' ></i>
              <span class="links_name">Setting</span>
            </a>
          </li> -->

          <li class="log_out">
            <a href="admin_logout.php">
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

  <div class="half">
    <label for="profile2" class="profile-dropdown">
      <input type="checkbox" id="profile2">
      <img src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_hipster_guy-512.png">
      
      <label for="profile2"><i class="mdi mdi-menu"></i></label>
      <ul>
        
        <li><a href="a_dash.php"><i class="mdi mdi-account"></i>Account</a></li>
        <li><a href="#"><i class="mdi mdi-settings"></i>Settings</a></li>
        <li><a href="admin_logout.php"><i class="mdi mdi-logout"></i>Logout</a></li>
      </ul>
    </label>
  </div>
</div>


        </div>
      </nav>
  
      








        
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




