<?php
session_start();
  include("inc/header.php");
  include("inc/config.php");
  if(isset($_POST['update']))
  {
    $email=$_SESSION['cemail'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    if ($password == $conpassword) 
    {
      // insert data into database 
      $qry = "UPDATE users set password='" . $password . "' WHERE email='" . $email . "'";
      $run = mysqli_query($connect,$qry);
      if ($run) 
      {
        header("location: signin.php");
      }
      else
      {
        $error="Connection Error";
      }
    }
    else
    {
      $error="Confirm password doesnot match with original password";
    }
  }
?>
   <body>
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
                            <img src="images/newlogo.png" height="180px" width="350px">
                            <form class="mt-4" action="" method="post" enctype="multipart/form-data">
                              <div class="form-group">                                 
                                 <input type="password" class="form-control mb-0" name="password" placeholder="Enter New Password" required>
                              </div>
                              <div class="form-group">                                 
                                 <input type="password" class="form-control mb-0" name="conpassword" placeholder="Confirm Email" required>
                              </div>
                             
                               
                              <button type="submit" name="update" class="btn btn-primary">UPDATE</button>                                 
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