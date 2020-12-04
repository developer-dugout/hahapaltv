<?php
session_start();
require_once('settings.php');
require_once('google-login-api.php');

// Google passes a parameter 'code' in the Redirect Url
if(isset($_GET['code'])) {
	try {
		$gapi = new GoogleLoginApi();
		
		// Get the access token 
		$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
		
		// Get user information
		$user_info = $gapi->GetUserProfileInfo($data['access_token']);
	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}
 include("inc/config.php");


    $name = $user_info['name'];
    $email = $user_info['email'];
    $password = 'no need';
    $date = date("Y/m/d");
    $language = 'any';
    $country = 'any';
    $user_id = rand(10,100000000);
    // qry for already registred cheking
    $chek_qry = "SELECT * FROM users WHERE email = '$email'";
    $chek_run = mysqli_query($connect,$chek_qry);
    $chek_row = mysqli_fetch_array($chek_run);
    if(mysqli_num_rows($chek_run) > 0)
    {
        $_SESSION['user'] = $email;
        header("location: index.php");
    }
    else
    {

      // insert data into database 
      $qry = "INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `date`, `language`,`country`,`type`) VALUES ('$user_id', '$name', '$email', '$password', '$date','$language', '$country','user');";
      $run = mysqli_query($connect,$qry);
      if ($run) 
      {
        $coqry = "INSERT INTO `coins` ( `email`, `coins`) VALUES ('$email', '0');";
        $corun = mysqli_query($connect,$coqry);
        if ($corun) 
        {
          $_SESSION['user'] = $email;
          header("location: index.php");
        }
        
      }
    }
  
?>
