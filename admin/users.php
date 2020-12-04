<?php
   include("inc/header.php");
   include("inc/body.php");
?>
         
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">All Users</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div id="table" class="table-editable">
                              <span class="table-add float-right mb-3 mr-2">
                              
                              </span>
                              <table class="table table-bordered table-responsive-md table-striped text-center">
                                 <thead>
                                    <tr>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Date Of Birth</th>
                                       <th>Language</th>
                                       <th>Country</th>
                                       <th>Type</th>
                                     
                                    </tr>
                                 </thead>
                                 <tbody>
  <?php

                    $qry = "SELECT * FROM users  ";
                    $run = mysqli_query($connect,$qry);

                    while($row = mysqli_fetch_array($run))
                    {
                        if(mysqli_num_rows($run) > 0)
                        {
                           $id = $row['id'];
                           $name = $row['name'];
                           $email = $row['email'];
                           $date = $row['date'];
                           $language = $row['language'];
                           $country = $row['country'];
                           $type = $row['type'];
                          
?>
                                    <tr>
                                       <td contenteditable="true"><?php echo $name ; ?></td>
                                       <td contenteditable="true"><?php echo $email ; ?></td>
                                       <td contenteditable="true"><?php echo $date ; ?></td>
                                       <td contenteditable="true"><?php echo $language ; ?></td>
                                       <td contenteditable="true"><?php echo $country ; ?></td>
                                       <td contenteditable="true"><?php echo $type ; ?></td>
                                      
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