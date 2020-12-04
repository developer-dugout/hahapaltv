<?php
   session_start();
   include("inc/header.php");
   $pass=$_SESSION['password'];

   if(isset($_POST['confirm']))
   { 
      $cpass = $_POST['cpass'];
      if($cpass == $pass)
      {
        header("location: newpassword.php");
      }
      else 
      {
         $error="PASSWORD DOES NOT MATCH:";
      }
   }
?>
   <body style="background-color: black;">
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page">
          <div class="container">
            <div class="row justify-content-center align-items-center height-self-center">
               <div class="col-lg-5 col-md-12 align-self-center">
                  <?php
                  if (isset($error)) 
                  {
                 ?>
                  <div class="alert text-white bg-primary" role="alert">
                    <div class="iq-alert-icon">
                      <i class="ri-alert-line"></i>
                    </div>
                     <div class="iq-alert-text"><?php echo $error; ?></div>
                  </div>
                  <?php
                  }
                  ?>
                  <div class="sign-user_card ">                    
                     <div class="sign-in-page-data">
                        <div class="sign-in-from w-100 m-auto">
                           <img src="images/newlogo.png" height="200px" width="350px">
                           <h1></h1>
                           <form class="mt-4" action="" method="post">
                              <div class="form-group">                                 
                                 <input type="number" class="form-control mb-0" name="cpass" placeholder="Enter Confirmation Password" autocomplete="off" required>
                              </div>
                              
                              <div class="sign-info">
                                 <center>
                                   <button type="submit" name="confirm" class="btn btn-primary">CONFIRM</button>  
                                 </center>                          
                              </div>                                    
                           </form>
                        </div>
                     </div> 
                  </div>
               </div>
            </div>
            <!-- Sign in END -->
            <!-- color-customizer -->
         </div>
      </section>
      <!-- Sign in END -->
<?php
   include("inc/script.php");
?>