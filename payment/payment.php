<?php 
// Include configuration file  
include('config.php') ; 
session_start();
$sesemail=$_SESSION['user'];
 
$payment_id = $statusMsg = ''; 
$ordStatus = 'error'; 
 
// Check whether stripe token is not empty 
if(!empty($_POST['stripeToken'])){ 
     
    // Retrieve stripe token, card and user info from the submitted form data 
    $token  = $_POST['stripeToken']; 
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $itemNumber =rand(10,100000000);
    $itemName = $_POST['in']; 
    $itemPrice =$_POST['pr']; 
    $currency = $_POST['cr']; 
     
    // Include Stripe PHP library 
    require_once 'stripe-php/init.php'; 
     
    // Set API key 
    \Stripe\Stripe::setApiKey(STRIPE_API_KEY); 
     
    // Add customer to stripe 
    try {  
        $customer = \Stripe\Customer::create(array( 
            'email' => $email, 
            'source'  => $token 
        )); 
    }catch(Exception $e) {  
        $api_error = $e->getMessage();  
    } 
     
    if(empty($api_error) && $customer){  
         
        // Convert price to cents 
        $itemPriceCents = ($itemPrice*100); 
         
        // Charge a credit or a debit card 
        try {  
            $charge = \Stripe\Charge::create(array( 
                'customer' => $customer->id, 
                'amount'   => $itemPriceCents, 
                'currency' => $currency, 
                'description' => $itemName 
            )); 
        }catch(Exception $e) {  
            $api_error = $e->getMessage();  
        } 
         
        if(empty($api_error) && $charge){ 
         
            // Retrieve charge details 
            $chargeJson = $charge->jsonSerialize(); 
         
            // Check whether the charge is successful 
            if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){ 
                // Transaction details  
                $transactionID = $chargeJson['balance_transaction']; 
                $paidAmount = $chargeJson['amount']; 
                $paidAmount = ($paidAmount/100); 
                $paidCurrency = $chargeJson['currency']; 
                $payment_status = $chargeJson['status']; 
                 
                // Include database connection file  
                include_once 'dbConnect.php'; 
                 
                // Insert tansaction data into the database 
                $sql = "INSERT INTO buy(name,email,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,created,modified,status) VALUES('".$name."','".$email."','".$itemName."','".$itemNumber."','".$itemPrice."','".$currency."','".$paidAmount."','".$paidCurrency."','".$transactionID."','".$payment_status."',NOW(),NOW(),'Pending')"; 
                $insert = $db->query($sql); 
                $payment_id = $db->insert_id; 
                 
                // If the order is successful 
                if($payment_status == 'succeeded')
                { 
                    $ordStatus = 'success'; 
                    $statusMsg = 'Your Payment has been Successful!'; 
                    // Insert tansaction data into the database 
                    $qry = "SELECT * FROM coins WHERE email = '$sesemail'";
                    $run = mysqli_query($db,$qry);
                    $row = mysqli_fetch_array($run);
                    if(mysqli_num_rows($run) > 0)
                    {
                        $reccoins=$row['coins'];
                        $upcoins=$reccoins + $itemName;
                        $updatequery=mysqli_query($db, "UPDATE coins set coins='" . $upcoins . "' WHERE email='" . $sesemail . "'");
                    }
                    else
                    {
                        $coinsql = "INSERT INTO coins(email,coins) VALUES('".$sesemail."','".$itemName."')"; 
                        $coininsert = $db->query($coinsql); 
                       
                    }
                }
                else
                { 
                    $statusMsg = "Your Payment has Failed!"; 
                } 
            }else{ 
                $statusMsg = "Transaction has been failed!"; 
            } 
        }else{ 
            $statusMsg = "Charge creation failed! $api_error";  
        } 
    }else{  
        $statusMsg = "Invalid card details! $api_error";  
    } 
}else{ 
    $statusMsg = "Error on form submission."; 
} 
?>
<!DOCTYPE html>
<html>
<head>
    <title>payment</title>

    <!-- Stripe JS library -->
    <script src="https://js.stripe.com/v3/"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background-color: black;">
<div class="container">
        <br>
    <br>
    <center>
        <img src="../images/logo.jpeg" height="100px" width="600px">
    </center>
   <br>
    <br>
    <div class="container">
        <center>
        <div class="status">
            <?php if(!empty($payment_id)){ ?>
            <h1 style="color: white;"> class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>
            
            <h4 style="color: white;">Payment Information</h4>
            <p style="color: white;"><b>Reference Number:</b> <?php echo $payment_id; ?></p>
            <p style="color: white;"><b>Transaction ID:</b> <?php echo $transactionID; ?></p>
            <p style="color: white;"><b>Paid Amount:</b> <?php echo $paidAmount.' '.$paidCurrency; ?></p>
            <p style="color: white;"><b>Payment Status:</b> <?php echo $payment_status; ?></p>
            
            <h4 style="color: white;">Product Information</h4>
            <p style="color: white;"><b>Name:</b> <?php echo $itemName; ?></p>
            <p style="color: white;"><b>Price:</b> <?php echo $itemPrice.' '.$currency; ?></p>
            <?php }else{ ?>
                <h1 class="error" style="color: white;">Your Payment has Failed</h1>
            <?php } ?>
        </div>
        <a href="../index.php" class="btn btn-success">Got to Home page</a>
        </center>
        
    </div>
</div>
        
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
