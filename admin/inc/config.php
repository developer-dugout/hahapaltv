<?php

$db['db_host']="localhost";
$db['db_user']="jaibscom_wp172";
$db['db_password']="R2!6~3b6Y2zA";
$db['db_name']="jaibscom_wp172";

foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

?>