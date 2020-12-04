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
                                          <div class="prc-box active">
                                             <div class="h3 pt-4 text-white"><h4>10 hahacoins</h4></div>
                                             <span class="type">Basic</span>
                                          </div>
                                       </th>
                                       <th class="text-center prc-wrap">
                                          <div class="prc-box active">
                                             <div class="h3 pt-4 text-white"><h4>100 hahacoins</h4></div>
                                             <span class="type">Standard</span>
                                          </div>
                                       </th>
                                       <th class="text-center prc-wrap">
                                          <div class="prc-box active">
                                             <div class="h3 pt-4 text-white"><h4>1000 hahacoins</h4></div>
                                             <span class="type">Platinum</span>
                                          </div>
                                       </th>
                                       <th class="text-center prc-wrap">
                                          <div class="prc-box active">
                                             <div class="h3 pt-4 text-white"><h4>10000 hahacoins</h4></div>
                                             <span class="type">Premium</span>
                                          </div>
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       
                                       <td class="text-center child-cell active">$1</td>
                                       <td class="text-center child-cell active">$10</td>
                                       <td class="text-center child-cell active">$100</td>
                                       <td class="text-center child-cell active">$1000</td>
                                    </tr>
                                    <tr>
                                       <td class="text-center">
                                          <a href="paymentmethod.php?pay=1&coin=10" class="btn btn-primary mt-3">Purchase</a>
                                       </td>
                                       <td class="text-center">
                                          <a href="paymentmethod.php?pay=10&coin=100" class="btn btn-primary mt-3">Purchase</a>
                                       </td>
                                       <td class="text-center">
                                          <a href="paymentmethod.php?pay=100&coin=1000" class="btn btn-primary mt-3">Purchase</a>
                                       </td>
                                       <td class="text-center">
                                          <a href="paymentmethod.php?pay=1000&coin=10000" class="btn btn-primary mt-3">Purchase</a>
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