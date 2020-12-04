



<?php 

// Include configuration file  
require_once 'config.php';
if (isset($_GET['pay'])) 
{
// Minimum amount is $0.50 US 

$itemName = $_GET['coin']; 
$itemPrice =$_GET['pay']; 
$currency = "USD"; 

} 
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style type="text/css">
    label{
        color: white;
    }
</style>
<body>	
<div class="container">

	<br>
	<br>
    <center>
        <img src="../images/newlogo.png" height="100px" width="600px">
    </center>
    <br>
    <br>
    <div class="row">
       
        
        <div class="col-sm-3">
        	<img src="../images/Icon.png" height="370px" width="250px">
        </div>
        <div class="col-sm-3" style="background-color: white;">
            <h1>Pay with Visa/Debit</h1>
            <br>
            <h3 class="panel-title">Charge <?php echo '$'.$itemPrice; ?> </h3>
            <br>
            <!-- Product Info -->
            <p><b>Coins:</b> <?php echo $itemName; ?> hahacoins</p>
            <br>
            <p><b>Price:</b> <?php echo '$'.$itemPrice.' '.$currency; ?></p>
        </div>
        <div class="col-sm-6">
            <!-- Display errors returned by createToken -->
            <div id="paymentResponse"></div>
        
            <!-- Payment form -->
            <form action="payment.php" method="POST" id="paymentFrm">
                <div class="form-group">
                    <input type="text" name="pr" id="pr" value="<?php echo $itemPrice; ?>" hidden>
                    <input type="text" name="in" id="in" value="<?php echo $itemName; ?>" hidden>
                    <input type="text" name="cr" id="cr" value="<?php echo $currency; ?>" hidden>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required="" autofocus="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required="">
                </div>
                <div class="form-group">
                    <label>Card Number</label>
                    <div id="card_number" class="form-control"></div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Expiry Date</label>
                            <div id="card_expiry" class="form-control"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>CVC Code</label>
                            <div id="card_cvc" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <center>
                <button type="submit" class="btn btn-success" id="payBtn">Submit Payment</button>
                <button type="submit" class="btn btn-danger" onclick="window.location.href='../buycoins.php';">Cancle Payment</button>
                </center>
            </form>
        </div>
    </div>    
</div>

<script>
// Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

// Create an instance of elements
var elements = stripe.elements();

var style = {
    base: {
        fontWeight: 400,
        fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
        fontSize: '16px',
        lineHeight: '1.4',
        color: '#555',
        backgroundColor: '#fff',
        '::placeholder': {
            color: '#888',
        },
    },
    invalid: {
        color: '#eb1c26',
    }
};

var cardElement = elements.create('cardNumber', {
    style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
    'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
    'style': style
});
cvc.mount('#card_cvc');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
    if (event.error) {
        resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
    } else {
        resultContainer.innerHTML = '';
    }
});

// Get payment form element
var form = document.getElementById('paymentFrm');

// Create a token when the form is submitted.
form.addEventListener('submit', function(e) {
    e.preventDefault();
    createToken();
});

// Create single-use token to charge the user
function createToken() {
    stripe.createToken(cardElement).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
        } else {
            // Send the token to your server
            stripeTokenHandler(result.token);
        }
    });
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
	
    // Submit the form
    form.submit();
}
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

