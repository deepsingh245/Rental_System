

<?php  
//login_success.php  

session_start();  


if(isset($_SESSION["username"]))  
 { 
     include 'a_dash.php';
     ?>

     <div class="home-content">
     <div class="overview-boxes">
       <div class="box">
         <div class="right-side">

           <!-- TOTAL NO.OF OWNERS -->

           <div class="box-topic">Total Owners</div>
           <div class="number">
           <?php echo $row['count'];?> </div>
           <div class="indic">
           <i class='bx bx-add-to-queue'></i>
             <a href="#"><span class="text">Add New Owner</span></a>
           </div>
         </div>
         <i class='bx bx-box bx-md' style="color:#2697FF" ></i>
       </div>
       
       <div class="box">
         <div class="right-side">
           <div class="box-topic">Total properties</div>
           <div class="number">388</div>
           <div class="indic">
             <i class='bx bx-up-arrow-alt'></i>
             <a href="#"><span class="text">Add New Property</span></a>
           </div>
         </div>
         <i class='bx bx-building-house bx-md' style="color:#2697FF"></i>
       </div>


       <div class="box">
         <div class="right-side">
           <div class="box-topic">Total Tenants</div>
           <div class="number">1,876</div>
           <div class="indic">
           <i class='bx bx-add-to-queue'></i>
             <a href="#"><span class="text">Add New Tenant</span></a>
           </div>
         </div>
         <i class='bx bxs-t-shirt bx-md' style="color:#2697FF"></i>
      </div>
       </div>
       
       

       
       

     

<?php
         
}
     
else  
    {  
        header("location:admin_login.php");  
    }  
?> 







