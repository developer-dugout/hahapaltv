<?php 
   include("inc/header.php"); 
   include("inc/body.php"); 
   if (isset($_GET['pay'])) 
   {
      $pay=$_GET['pay'];
      $coin=$_GET['coin'];
   }
?>
         
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <center>
                        <h4 class="card-title">Choose a payment method</h4>
                     </center>
                  </div>
                  <hr>
                  <div class="col-sm-6">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Credit Card Payment</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                       
                           <a href="payment/index.php?pay=<?php echo $pay; ?>&coin=<?php echo $coin; ?>" class="btn btn-primary mt-3">Pay Now</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Paypal</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           
                           <a href="paypal/index.php?pay=<?php echo $pay; ?>&coin=<?php echo $coin; ?>" class="btn btn-primary mt-3">Pay Now</a>
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