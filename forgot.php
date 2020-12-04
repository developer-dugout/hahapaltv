<?php
   include("inc/header.php");
   include("inc/config.php");
   if(isset($_POST['signin']))
   { 
      $email = $_POST['email'];
      $qry = "SELECT * FROM users WHERE email = '$email' AND type='user'";
      $run = mysqli_query($connect,$qry);
      $row = mysqli_fetch_array($run);
      if(mysqli_num_rows($run) > 0)
      {
        header("location: phpmailer/index.php?email=$email");
      }
      else 
      {
         $error="EMAIL DOESNOT EXIST:";
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
                                 <input type="email" class="form-control mb-0" name="email" placeholder="Enter email" autocomplete="off" required>
                              </div>
                              
                              <div class="sign-info">
                                 <center>
                                   <button type="submit" name="signin" class="btn btn-primary">SIGN IN</button>  
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