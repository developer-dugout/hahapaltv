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
                                         
                                            <img src="images/2$.png" height="300px" width="300px">
                                             
                                      
                                       </th>
                                       <th class="text-center prc-wrap">
                                  
                                             <img src="images/$5.png" height="300px" width="300px">
                                            
                                    
                                       </th>
                                       <th class="text-center prc-wrap">
                                          
                                            <img src="images/$10.png" height="300px" width="300px">
                                             

                                       </th>
                                       <th class="text-center prc-wrap">
                                    
                                            <img src="images/$50.png" height="300px" width="300px">
                                             
                            
                                       </th>
                                       <th class="text-center prc-wrap">
                            
                                            <img src="images/$100.png" height="300px" width="300px">
                                             
                            
                                       </th>
                                       <th class="text-center prc-wrap">
                                        
                                             <h4> <img src="images/$300.png" height="300px" width="300px">
                                            
                        
                                       </th>
                                       <th class="text-center prc-wrap">
                                
                                             <img src="images/$1000.png" height="300px" width="300px">
                                
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       
                                       <td class="text-center child-cell active">$2</td>
                                       <td class="text-center child-cell active">$5</td>
                                       <td class="text-center child-cell active">$10</td>
                                       <td class="text-center child-cell active">$50</td>
                                       <td class="text-center child-cell active">$100</td>
                                       <td class="text-center child-cell active">$300</td>
                                       <td class="text-center child-cell active">$1000</td>
                                    </tr>
                                    <tr>
                                       <td class="text-center">
                                          <a href="paymentmethod.php?pay=2&coin=10" class="btn btn-primary mt-3">Purchase</a>
                                       </td>
                                       <td class="text-center">
                                          <a href="paymentmethod.php?pay=5&coin=25" class="btn btn-primary mt-3">Purchase</a>
                                       </td>
                                       <td class="text-center">
                                          <a href="paymentmethod.php?pay=10&coin=50" class="btn btn-primary mt-3">Purchase</a>
                                       </td>
                                       <td class="text-center">
                                          <a href="paymentmethod.php?pay=50&coin=250" class="btn btn-primary mt-3">Purchase</a>
                                       </td>
                                       <td class="text-center">
                                          <a href="paymentmethod.php?pay=100&coin=500" class="btn btn-primary mt-3">Purchase</a>
                                       </td>
                                       <td class="text-center">
                                          <a href="paymentmethod.php?pay=300&coin=1500" class="btn btn-primary mt-3">Purchase</a>
                                       </td>
                                       <td class="text-center">
                                          <a href="paymentmethod.php?pay=1000&coin=5000" class="btn btn-primary mt-3">Purchase</a>
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