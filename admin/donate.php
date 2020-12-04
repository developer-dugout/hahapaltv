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
                        <div class="iq-card-body">
                           <div class="table-responsive pricing pt-2">
                              <table id="my-table" class="table">
                                 <thead>
                                    <tr>
                                     
                                       <th class="text-center prc-wrap">
                                          <div class="prc-box" style="background-color: green">
                                          
                                             <span class="type" style="background-color: green">Basic</span>
                                          </div>
                                       </th>
                                       <th class="text-center prc-wrap">
                                          <div class="prc-box" style="background-color: orange">
                                          
                                             <span class="type" style="background-color: orange">Standard</span>
                                          </div>
                                       </th>
                                       <th class="text-center prc-wrap">
                                          <div class="prc-box" style="background-color: purple">
                                            
                                             <span class="type" style="background-color: purple">Platinum</span>
                                          </div>
                                       </th>
                                       <th class="text-center prc-wrap">
                                          <div class="prc-box" style="background-color: pink">
                                           
                                             <span class="type" style="background-color: pink">Premium</span>
                                          </div>
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       
                                       <td class="text-center child-cell active"><h4>10 hahacoins</h4></td>
                                       <td class="text-center child-cell active"><h4>100 hahacoins</h4></td>
                                       <td class="text-center child-cell active"><h4>1000 hahacoins</h4></td>
                                       <td class="text-center child-cell active"><h4>10000 hahacoins</h4></td>
                                    </tr>
                                    <tr>
                                       <td class="text-center">
                                          <a href="donatesuccess.php?coin=10" class="btn btn-primary mt-3">Donate</a>
                                       </td>
                                       <td class="text-center">
                                          <a href="donatesuccess.php?coin=100" class="btn btn-primary mt-3">Donate</a>
                                       </td>
                                       <td class="text-center">
                                          <a href="donatesuccess.php?coin=1000" class="btn btn-primary mt-3">Donate</a>
                                       </td>
                                       <td class="text-center">
                                          <a href="donatesuccess.php?coin=10000" class="btn btn-primary mt-3">Donate</a>
                                       </td>
                                    </tr>
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