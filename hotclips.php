<?php 
   include("inc/header.php"); 
   include("inc/body.php"); 

                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $qry = "SELECT * FROM videos WHERE v_id = '$id'";
                    $run = mysqli_query($connect,$qry);
                    $row = mysqli_fetch_array($run);
                    if(mysqli_num_rows($run) > 0){
                        $vid = $row['v_id'];
                        $title = $row['title'];
                        $thumb = $row['thumb'];
                        $category = $row['category'];
                        $description = $row['description'];
                        $video = $row['video'];
                        $viewers=rand(10,10000);
                        $down=rand(10,10000);

                    }
                }
               
?>
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                  <!-- Video Start -->
                  <center>
                     <h1><?php echo $title; ?></h1>
                     
                  </center>
<?php

   if (isset($_POST['fav']))
   {
     $videoid=$_POST['videoid'];
     $email=$_SESSION['user'];

                                      // insert data into database
    $qry = "INSERT INTO `fav` (`email`, `videoid`) VALUES ('$email', '$videoid');";
    $run = mysqli_query($connect,$qry);
    if ($run)
    {
      $msg="Added to favourite";
    }
    else
    {
      $error="something went wrong";
    }
   }
?>
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
                 if (isset($msg))
                 {
               ?>
                 <div class="alert text-white bg-success" role="alert">
                   <div class="iq-alert-icon">
                     <i class="ri-alert-line"></i>
                   </div>
                   <div class="iq-alert-text"><?php echo $msg; ?></div>
                 </div>
                 <?php
                 }
                 ?>
                  <form method="POST">
                        <input type="hidden" name="videoid" value="<?php echo $vid; ?>">
                        <button type="submit" name="fav" class="btn btn-warning ml-auto"><i class="las la-star-half-alt"></i>Add to favourite</button>
                     
                     </form>
                  <div style="margin: auto;width: 60%;">
                     <div class="alert alert-success alert-dismissible" id="successfav" style="display:none;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                     </div>
                  </div>
                  
                  <section class="height-100-vh iq-main-slider">
                     <video class="video d-block" width="100%" height="100%" controls autoplay="autoplay">
                        <source src="upload/videos/<?php echo $video; ?>" type="video/mp4">
                     </video>
                     
                  </section>
                  <button class="btn btn-primary"><i class="lar la-eye"></i><?php echo $viewers; ?>k</button>
                  <button class="btn btn-info"><i class="las la-download"></i><?php echo $viewers; ?>k</button>
                  <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#exampleModal"><i class="las la-gifts"></i>Donate</button>

                  
                  
                  <!-- Vdeo End -->
                </div>
                <div class="col-lg-3">
                  <div class="iq-card">
                  <div class="iq-card-header d-flex justify-content-between">
                     <div class="iq-header-title">
                        <h4 class="card-title">Product Orders</h4>
                     </div>
                  </div>
                  <div class="iq-card-body">
                     <ul class="iq-timeline">
                        <li>
                           <div class="timeline-dots"><i class="ri-pantone-line"></i></div>
                           <h6 class="float-left mb-1">Client Meeting</h6>
                           <small class="float-right mt-1">19 November 2019</small>
                           <div class="d-inline-block w-100">
                              <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                           </div>
                        </li>
                        <li>
                           <div class="timeline-dots border-success"><i class="ri-pantone-line"></i></div>
                           <h6 class="float-left mb-1">Client Meeting</h6>
                           <small class="float-right mt-1">19 November 2019</small>
                           <div class="d-inline-block w-100">
                              <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                           </div>
                        </li>
                        
                        
                     </ul>
                  </div>
               </div>
                </div>  
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div style="margin: auto;width: 60%;">
         <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
         </div>
      </div>
      <div style="margin: auto;width: 60%;">
         <div class="alert alert-primary alert-dismissible" id="error" style="display:none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
         </div>
      </div>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Donate Coins </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="POST">
            <input type="number" name="editcoin" id="editcoin" class="form-control" placeholder="e.g. 10">
         </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="editSubmit" name="editSubmit">Save changes</button>
      </div>
    </div>
  </div>
</div>
         </div>
      </div>
   </div>
   <!-- Modal -->

   <!-- Wrapper END -->

<?php 
include("inc/footer.php"); 
include("inc/script.php"); 
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
 <script type="text/javascript">  
      $(document).ready(function(){  
             
           // User record update to mysqli from php using jquery ajax  
           $(document).on("click","#editSubmit", function(){  
                var coin = $("#editcoin").val();  
               
                $.ajax({  
                     url:"update.php",  
                     type:"POST",  
                     cache:false,  
                     data:{coin:coin},  
                     success:function(data){  
                          if (data ==1) {  
                              $("#editSubmit").removeAttr("disabled");
                              $('#fupForm').find('input:number').val('');
                              $("#success").show();
                              $('#success').html('Coins Have been updated successfully !');  

                               loadTableData();  
                          }else{  
                               $("#editSubmit").removeAttr("disabled");
                              $('#fupForm').find('input:text').val('');
                              $("#error").show();
                              $('#error').html('Something went wrong !');       
                          }  
                     }  
                });  
           });  
      });  
 </script>
