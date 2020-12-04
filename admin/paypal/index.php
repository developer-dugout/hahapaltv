<?php
if (isset($_GET['pay'])) 
   {
      $pay=$_GET['pay'];
      $coin=$_GET['coin'];
   }
?>
<html>
<title>Paypal Payment Gateway Integration in PHP</title>
<head>
<style>
body {
    font-family: Arial;
    line-height: 30px;
    color: #333;
}

#payment-box {
    padding: 40px;
    margin: 20px;
    border: #E4E4E4 1px solid;
    display: inline-block;
    text-align: center;
    border-radius: 3px;
}

#pay_now {
    padding: 10px 30px;
    background: #09f;
    border: #038fec 1px solid;
    border-radius: 3px;
    color: #FFF;
    width: 100%;
    cursor: pointer;
}

.txt-title {
    margin: 25px 0px 0px 0px;
    color: #4e4e4e;
}

.txt-price {
    margin-bottom: 20px;
    color: #08926c;
    font-size: 1.1em;
}
</style>
</head>
<body>
    <br><br><br>
    <center>
          <div id="payment-box">
        <img src="images/paypal-logo.png">
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr"
            method="post" target="_top">
            <input type='hidden' name='business' value='sb-mdxz473706825@business.example.com'>
            <input type='hidden' name='item_name' value='<?php echo $coin; ?>'> 
            <input type='hidden' name='item_number' value='CAM#N1'>
            <input type='hidden' name='amount' value='<?php echo $pay; ?>'> 
            <input type='hidden' name='no_shipping' value='1'>
            <input type='hidden' name='currency_code' value='USD'>
            <input type='hidden' name='notify_url' value='localhost/stream/paypal/notify.php'>
            <input type='hidden' name='cancel_return' value='localhost/stream/paypal/cancel.php'>
            <input type='hidden' name='return' value='localhost/stream/paypal/return.php'>
            <input type="hidden" name="cmd" value="_xclick"> 
            <input type="submit" name="pay_now" id="pay_now" Value="Pay Now">
        </form>
    </div> 
    </center>
 
</body>
</html>