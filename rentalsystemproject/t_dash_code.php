<?php  
//login_success.php  



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
        <span class="logo_name">Home Away</span>
      </div>
        <ul class="nav-links">
          <li>
            <a href="tenant_dashboard.php" class="active">
              <i class='bx bx-grid-alt' ></i>
              <span class="links_name">Dashboard</span>
            </a>
          </li>
          
          <li>
            <a href="tenant_profile.php">
            <i class='bx bxs-user-circle'></i>
              <span class="links_name">Profile</span>
            </a>
          </li>
         
          <li>
            <a href="#">
              <i class='bx bx-cog' ></i>
              <span class="links_name">Setting</span>
            </a>
          </li>
          <li class="log_out">
            <a href="tenant_logout.php">
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
                 echo'<h3>'.$_SESSION["username"].'</h3>'; ?>
            
        </div>
      </nav>
  
      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
           
          
            <div class="right-side">
              <div class="box-topic">Saved PG's</div>
              <div class="number">3</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Total</span>
              </div>
            </div>
            <i class='bx bx-building-house bx-lg'></i>
          </div>
          <!--  
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
          </div> -->
          
           
            <!-- <i class='bx bxs-cart-download cart four' ></i> -->
          </div>
        </div>
   
        <div class="sales-boxes">
          <div class="recent-sales box">


 </div>
 </div>








        
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




