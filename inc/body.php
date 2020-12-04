<?php
  session_start();
  include("inc/config.php");

?>
<body>

   <!-- loader Start -->
  
   <!-- loader END -->
   <!-- Wrapper Start -->
   <div class="wrapper">
      <!-- Sidebar-->
      <div class="iq-sidebar">
         <div class="iq-sidebar-logo d-flex justify-content-between"  style="background-color: black; height: 73px;">
            <a href="index.php" class="header-logo">
               <img src="images/newlogo.png" class="img-fluid rounded-normal">
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
                  <li style="color: black;"><a href="streamers.php" class="iq-waves-effect"><i class="las la-broadcast-tower"></i><span>Live</span></a></li>
                  <li style="color: black;"><a href="video.php" class="iq-waves-effect"><i class="las la-video"></i><span>VOD </span></a></li>
                  <li style="color: black;"><a href="myfav.php" class="iq-waves-effect"><i class="las la-star-half-alt"></i><span>My</span></a></li>
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
               <div class="iq-search-bar">
                  <form action="#" class="searchbox">
                     <input type="text" class="text search-input" placeholder="Search Here...">
                     <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                  </form>
               </div>
               <div class="iq-header-title"> 
                  <button style="font-size: 25px; color: white;" class="btn"  onclick="window.location.href='live/index.php';"><i class="las la-video"></i>Go Live</button>
               </div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
               </button>
               <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                  <ul class="navbar-nav">
                     <?php
                        if (!isset($_SESSION['user'])) 
                        {
                     ?>
                     <li class="nav-item nav-icon">
                        <a href="signin.php" class="iq-waves-effect rounded" style="color: white;">
                           <i class="las la-sign-in-alt"></i>
                           <span class="bg-primary dots"></span>
                           LogIn
                        </a>
                     </li>

                     <li class="nav-item nav-icon" style="padding-left: 30px; ">
                        <a href="signup.php" class="iq-waves-effect rounded" style="color: white;">
                           <i class="las la-user-plus"></i>
                           <span class="bg-primary dots"></span>
                           SignUp
                        </a>
                     </li>
                     <?php
                        }
                        else
                        {
                           $email=$_SESSION['user'];
                           $qry = "SELECT * FROM users WHERE email = '$email'";
                           $run = mysqli_query($connect,$qry);
                           $row = mysqli_fetch_array($run);
                           if(mysqli_num_rows($run) > 0)
                           {
                              $name=$row['name'];
                              $image=$row['image'];
                              
                           }
                           $cqry = "SELECT * FROM coins WHERE email = '$email'";
                           $crun = mysqli_query($connect,$cqry);
                           $crow = mysqli_fetch_array($crun);
                           if(mysqli_num_rows($crun) > 0)
                           {
                              $coins=$crow['coins'];
                             
                           }
                        
                     ?>
                     <li class="line-height pt-3">
                        <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                           <img src="upload/<?php echo $image; ?>" class="img-fluid rounded-circle mr-3" alt="user" height="30px" width="30px">
                        </a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                           <div class="iq-card shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height"><?php echo $name; ?></h5>
                                    <h5 class="mb-0 text-white"><?php echo $coins; ?><img src="images/coinnew.jpg" height="30px" width="30px"></h5>
                                 </div>
                                 <a href="buycoins.php" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <img src="images/coinnew.jpg" height="30px" width="30px">
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Buy Coins</h6>
                                          <p class="mb-0 font-size-12">Buy Coins for enjoying streaming .</p>
                                       </div>
                                    </div>
                                 </a>
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
      <!-- TOP Nav Bar END -->
