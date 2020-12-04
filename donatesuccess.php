<?php 
   include("inc/header.php"); 
   include("inc/body.php");

   if (isset($_GET['coin'])) 
   {
     
      $coin=$_GET['coin'];
      $email='shahramawan0@gmail.com';
      // Insert tansaction data into the database 
      $qry = "SELECT * FROM coins WHERE email = '$email'";
      $run = mysqli_query($connect,$qry);
      $row = mysqli_fetch_array($run);
      if(mysqli_num_rows($run) > 0)
      {
         $reccoins=$row['coins'];
         $upcoins=$reccoins + $coin;
         $updatequery=mysqli_query($connect, "UPDATE coins set coins='" . $upcoins . "' WHERE email='" . $email . "'");
         if ($updatequery) 
         {
            $msg="You donation has been seccesfully transfered";
         }
         else
         {
            $error="Somethign went wrog ";
         }
      }
                  
   }
?>
         
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <?php
                                  if (isset($msg)) 
                                  {
                                    
                              ?>
                              <h4 class="card-title"><?php echo $msg; ?> to <?php echo $email; ?></h4>
                              <?php
                                 }
                                 else
                                 {
                              ?>
                              <h4 class="card-title"><?php echo $error; ?> to <?php echo $email; ?></h4>
                              <?php
                                 }
                              ?>
                           </div>
                        </div>
                        <div class="iq-card-body">
                       
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
<?php 
include("inc/footer.php"); 
include("inc/script.php"); 
?>