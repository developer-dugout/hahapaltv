<?php
   include("inc/header.php");
   include("inc/body.php");

   if (isset($_POST['upload'])) {
     $title=$_POST['title'];
     $category=$_POST['category'];
     $date=$_POST['date'];
     $desc=$_POST['desc'];
     //moving
    $filename=$_FILES['image']['name'];
    $tempname1=$_FILES['image']['tmp_name'];
    move_uploaded_file($tempname1,"../upload/$filename");

                                  // moving thumbnail to thumbnails folder
    $video=$_FILES['video']['name'];
    $tempname2=$_FILES['video']['tmp_name'];
    move_uploaded_file($tempname2,"../upload/videos/$video");

                                      // insert data into database
    $qry = "INSERT INTO `videos` (`title`, `thumb`, `category`, `date`, `description`,`video`) VALUES ('$title', '$filename', '$category', '$date', '$desc', '$video');";
    $run = mysqli_query($connect,$qry);
    if ($run)
    {
      $msg="Successfully Uploaded";
    }
    else
    {
      $error="something went wrong";
    }
   }

?>
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
           <div class="row">
             <div class="col-sm-12">
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
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Upload Video</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <form action="" method="post" enctype="multipart/form-data">
                         <div class="row">
                            <div class="col-lg-7">
                               <div class="row">
                                  <div class="col-12 form-group">
                                     <input type="text" name="title" class="form-control" placeholder="Title">
                                  </div>
                                  <div class="col-12 form_gallery form-group">
                                     <label id="gallery2" for="form_gallery-upload">Upload Image</label>
                                     <input data-name="#gallery2" id="form_gallery-upload" name="image" class="form_gallery-upload"
                                        type="file" accept=".png, .jpg, .jpeg">
                                  </div>
                                  <div class="col-md-6 form-group">
                                     <select class="form-control" name="category">
                                        <option disabled="">Movie Category</option>
                                        <option>Comedy</option>
                                        <option>Crime</option>
                                        <option>Drama</option>
                                        <option>Horror</option>
                                        <option>Romance</option>
                                     </select>
                                  </div>
                                  <div class="col-sm-6 form-group">
                                     <input type="date" name="date" class="form-control">
                                  </div>
                                  <div class="col-12 form-group">
                                     <textarea name="desc" rows="5" class="form-control" placeholder="Description"></textarea>
                                  </div>
                               </div>
                            </div>
                            <div class="col-lg-5">
                               <div class="d-block position-relative">
                                  <div class="form_video-upload">
                                     <input type="file" name="video" accept="video/mp4,video/x-m4v,video/*" multiple>
                                     <p>Upload video</p>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-12 form-group ">
                              <center>
                                 <button type="submit" name="upload" class="btn btn-primary"> Upload </button>
                              </center>
                            </div>
                         </div>
                      </form>
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
