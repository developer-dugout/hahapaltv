<?php
session_start();
   require_once('settings.php');
   include("inc/header.php");
   include("inc/config.php");
   if(isset($_POST['signin']))
   { 
      $email = $_POST['email'];
      $password = $_POST['password'];
      $qry = "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND type='user'";
      $run = mysqli_query($connect,$qry);
      $row = mysqli_fetch_array($run);
      if(mysqli_num_rows($run) > 0)
      {
         $_SESSION['user'] = $email;
         header("location: index.php");
      }
      else 
      {
         $error="Email/ Password is wrong";
      }
   }
?>
   <body>
      
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
                           <img src="images/newlogo.png" height="200px" style="width: 100%;">
                           <h1></h1>
                           <form class="mt-4" action="" method="post">
                              <div class="form-group">                                 
                                 <input type="email" class="form-control mb-0" name="email" placeholder="Enter email" autocomplete="off" required>
                              </div>
                              <div class="form-group">                                 
                                 <input type="password" class="form-control mb-0" name="password" placeholder="Password" required>
                              </div>
                              <div class="sign-info">
                                 <center>
                                   <button type="submit" name="signin" class="btn btn-primary">SIGN IN</button>  
                                 </center>                          
                              </div>                                    
                           </form>
                           
                           <div class="d-flex justify-content-center links">
                              <a href="forgot.php" class="f-link">FORGOT PASSWORD?</a>
                           </div>
                          
                           <center>
                              <div class="row">
                                 <div class="col-sm-5">
                                    <hr>
                                 </div>
                                 <div class="col-sm-2">
                                    <label>OR</label>
                                 </div>
                                 <div class="col-sm-5">
                                    <hr>
                                 </div>
                              </div>
                              
                           </center>
                           <center>
                              <a id="login-button" href="<?= 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online' ?>"><img src="images/google.jpeg" height="50px" width="50px"></i></a>
                           </center>
                        </div>
                     </div>
                     <center>
                        <div class="row">
                           <div class="col-sm-2">
                              <hr>
                           </div>
                           <div class="col-sm-8">
                              <P style="color: black;">DON'T HAVE AN ACCOUNT?</P>
                           </div>
                           <div class="col-sm-2">
                              <hr>
                           </div>
                        </div>  
                     </center>
                     <div class="mt-3">
                        <div class="d-flex justify-content-center links">
                            <a href="signup.php" class="btn btn-info">CREATE ACCOUNT</a>
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