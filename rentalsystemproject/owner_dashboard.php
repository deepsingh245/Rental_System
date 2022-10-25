 <?php  
 //login_success.php  
 session_start();  




 
 if(isset($_SESSION["username"]))  
 {  
      include 'o_dash_code.php'; 
      ?>

      
  
      <div class="home-content">
        <div class="overview-boxes">
          
          <div class="box">
           <div class="right-side">
              <div class="box-topic">My Properties</div>
              <div class="number">
                <?php echo $row['count'];?>
              </div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Total</span>
              </div>
            </div>
            <i class='bx bx-building-house bx-md ' style="padding-left: 20px"></i>
          </div>

          <div class="box" style=" margin:20px; padding:36px">
            <div class="rihgt-side">
              <a href="o_property_add.php">
              <div class="box-topic">Add Property</div></a>
          
              </div>
            
              <i class='bx bx-add-to-queue bx-md' style="padding-left: 20px"></i>
          </div>

          <div class="box" style=" margin:20px; padding:36px">
            <div class="rihgt-side">
              <a href="o_room_add.php">
              <div class="box-topic">Add Rooms</div></a>
          
              </div>
            
              <i class='bx bx-add-to-queue bx-md' style="padding-left: 20px"></i>
          </div>


          <div class="box">
            <div class="rihgt-side">
              <div class="box-topic">Total Tenants</div>
              <div class="number">18</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div>
            <i class='bx bxs-user-detail bxs-md' style="padding-left: 20px"></i>
          </div>

          
         
           
             
          </div>
        </div>
        <?php
 }  
 else  
 {  
      header("location:Home_Away.html");  
 }  
 ?>  

