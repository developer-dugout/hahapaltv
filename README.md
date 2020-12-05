# hahapaltv
Live Streamer

for HAHAPAL.TV hosting you have to change setting file according to this :


/* Google App Client Id */
define('CLIENT_ID', '390537909736-u6v5s5b2khi4idukl47gue3olohpkgd8.apps.googleusercontent.com');

/* Google App Client Secret */
define('CLIENT_SECRET', 'cBH4XY-BgrAU6kYTXWsf0xeI');

/* Google App Redirect Url */
define('CLIENT_REDIRECT_URL', 'https://hahapal.tv/gauth.php');



and also go to inc/config.php and paste the code there:

$db['db_host']="localhost";
$db['db_user']="hahadzvz_user";
$db['db_password']="";
$db['db_name']="hahadzvz_main";



and then go to payment/config.php and the paste the code there:



define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'hahadzvz_user'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'hahadzvz_main');
