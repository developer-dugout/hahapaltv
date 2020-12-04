<?php
   include("inc/header.php");
   include("inc/body.php");
?>
      <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Video Lists</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                           <a href="uploadvideo.php" class="btn btn-primary">Upload Video</a>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-view">
                           <table class="data-tables table movie_table " style="width:100%">
                              <thead>
                                 <tr>
                                    <th>Movie</th>
                                    <th>Quality</th>
                                    <th>Category</th>
                                    <th>Release Year</th>
                                    <th>Language</th>
                                    <th style="width: 20%;">Description</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody><?php
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
                           $date = $row['date'];
                           $viewers=rand(10,10000);
                           $down=rand(10,10000);

?>
                                 <tr>
                                    <td>
                                       <div class="media align-items-center">
                                          <div class="iq-movie">
                                             <a href="javascript:void(0);"><img
                                                   src="../upload/<?php echo $thumb; ?>"
                                                   class="img-border-radius avatar-40 img-fluid" alt=""></a>
                                          </div>
                                          <div class="media-body text-white text-left ml-3">
                                             <p class="mb-0"><?php echo $title; ?></p>
                                            
                                          </div>
                                       </div>
                                    </td>
                                    <td>Full HD</td>
                                    <td><?php echo $category; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td>English</td>
                                    <td>
                                       <p><?php echo $description; ?>
                                       </p>
                                    </td>
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                          <a class="iq-bg-warning" data-toggle="tooltip" data-placement="top" title=""
                                             data-original-title="View" href="#"><i class="lar la-eye"></i></a>
                                          <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title=""
                                             data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                             data-original-title="Delete" href="#"><i
                                                class="ri-delete-bin-line"></i></a>
                                       </div>
                                    </td>
                                 </tr>
<?php
                        }
                     }
?>

                              </tbody>
                           </table>
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
