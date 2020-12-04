<?php
  session_start();
  include("inc/config.php");
  if (!isset($_SESSION['admin']))
  {
     header("location: signin.php");
  }

?>

<body>

   <!-- loader Start -->
  
   <!-- loader END -->
   <!-- Wrapper Start -->
   <div class="wrapper">
      <!-- Sidebar-->
      <div class="iq-sidebar">
         <div class="iq-sidebar-logo d-flex justify-content-between" style="background-color: black; height: 73px;">
            <a href="index.php" class="header-logo">
               <img src="images/newlogo.png" class="img-fluid rounded-normal" alt="">
            </a>
            <div class="iq-menu-bt-sidebar">
               <div class="iq-menu-bt align-self-center">
                  <div class="wrapper-menu">
                     <div class="main-circle"><i class="las la-bars"></i></div>
                  </div>
               </div>
            </div>
         </div>
         <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
               <ul id="iq-sidebar-toggle" class="iq-menu">
                  <li style="color: black;"><a href="index.php" class="iq-waves-effect"><i class="las la-home"></i><span>Index</span></a></li>
                  <li style="color: black;"><a href="users.php" class="iq-waves-effect"><i class="las la-users"></i><span>Users </span></a></li>
                  <li style="color: black;"><a href="#category" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-video"></i><span>Uploaded Videos</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     <ul id="category" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="uploadvideo.php"><i class="las la-file-upload"></i>Upload Video</a></li>
                        <li><a href="video-list.php"><i class="las la-film"></i>All Videos</a></li>
                     </ul>
                  </li>
                  <li style="color: black;"><a href="#" class="iq-waves-effect"><i class="las la-users"></i><span>Donors </span></a></li>
                  <li style="color: black;"><a href="#" class="iq-waves-effect"><i class="las la-users"></i><span>Live Streamers </span></a></li>
                  <li style="color: black;"><a href="#" class="iq-waves-effect"><i class="las la-users"></i><span>Viewers </span></a></li>
               </ul>
            </nav>
         </div>
      </div>
      <!-- TOP Nav Bar -->
      <div class="iq-top-navbar" style="background-color: black;">
         <div class="iq-navbar-custom">
            <nav class="navbar navbar-expand-lg navbar-light p-0 mt-3">
               <div class="iq-menu-bt d-flex align-items-center">
                  <div class="wrapper-menu">
                     <div class="main-circle"><i class="las la-bars"></i></div>
                  </div>
                  <div class="iq-navbar-logo d-flex justify-content-between">
                     <a href="index-2.html" class="header-logo">
                        <img src="images/newlogo.png" class="img-fluid rounded-normal" alt="">
                     </a>
                  </div>
               </div>
               
               
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
               </button>
               <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                  <ul class="navbar-nav">
                     <?php
                        if (!isset($_SESSION['admin'])) 
                        {
                     ?>
                     <li class="nav-item nav-icon" style="color: black;">
                        <a href="signin.php" class="iq-waves-effect text-gray rounded">
                           <i class="las la-sign-in-alt"></i>
                           <span class="bg-primary dots"></span>
                           LogIn
                        </a>
                     </li>

                     <li class="nav-item nav-icon" style="padding-left: 30px; color: black; ">
                        <a href="signup.php" class="iq-waves-effect text-gray rounded">
                           <i class="las la-user-plus"></i>
                           <span class="bg-primary dots"></span>
                           SignUp
                        </a>
                     </li>
                     <?php
                        }
                        else
                        {
                           $email=$_SESSION['admin'];
                           $qry = "SELECT * FROM users WHERE email = '$email'";
                           $run = mysqli_query($connect,$qry);
                           $row = mysqli_fetch_array($run);
                           if(mysqli_num_rows($run) > 0)
                           {
                              $name=$row['name'];
                              
                           }
                           $cqry = "SELECT * FROM coins WHERE email = '$email'";
                           $crun = mysqli_query($connect,$cqry);
                           $crow = mysqli_fetch_array($crun);
                           if(mysqli_num_rows($crun) > 0)
                           {
                              $coins=$crow['coins'];
                             
                           }
                        
                     ?>
                     <li class="line-height">
                        <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                           <img src="images/user.jpg" class="rounded-circle" alt="user" height="50px" width="50px">
                        </a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                           <div class="iq-card shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height"><?php echo $name; ?></h5>
                                    <h5 class="mb-0 text-white"><?php echo $coins; ?><i class="las la-coins"></i></h5>
                                 </div>
                                 <a href="profile.php" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-file-user-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Profile</h6>
                                       </div>
                                    </div>
                                 </a>
                                 <div class="d-inline-block w-100 text-center p-3">
                                    <a class="bg-primary iq-sign-btn" href="logout.php" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <?php
                        }
                     ?>
                  </ul>
               </div>
            </nav>
         </div>
      </div>