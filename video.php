<?php 
   include("inc/header.php"); 
   include("inc/body.php"); 
 
?>
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <div id="top-rated-item-slick-arrow" class="slick-aerrow-block"></div>
                     </div>
                     <div class="iq-card-body">
                        <div class="row">
                     <?php

                    $qry = "SELECT * FROM videos  ";
                    $run = mysqli_query($connect,$qry);

                    while($row = mysqli_fetch_array($run))
                    {
                        if(mysqli_num_rows($run) > 0)
                        {
                           $vid = $row['v_id'];
                           $title = $row['title'];
                           $thumb = $row['thumb'];
                           $category = $row['category'];
                           $description = $row['description'];
                           $video = $row['video'];
                           $viewers=rand(10,10000);
                           $down=rand(10,10000);

?>
                           <div class="col-sm-4">
                              <div class="iq-card mb-0">
                                 <div class="iq-card-body p-0">
                                    <div class="iq-thumb">
                                       <a href="hotclips.php?id=<?php echo $vid; ?>">
                                          <img src="upload/<?php echo $thumb; ?>" class="img-fluid w-100 img-border-radius" alt="">
                                       </a>
                                    </div>
                                    <div class="iq-feature-list">
                                       <h6 class="font-weight-600 mb-0"><?php echo $title; ?></h6>
                                       <p class="mb-0 mt-2"><?php echo $category; ?></p>
                                       <div class="d-flex align-items-center my-2">
                                          <p class="mb-0 mr-2"><i class="lar la-eye mr-1"></i> <?php echo $viewers; ?></p>
                                          <p class="mb-0 "><i class="las la-download ml-2"></i>  <?php echo $down; ?> k</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
<?php
                        }
                     }
                 ?>
                        </div>
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