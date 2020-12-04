<?php

$db['db_host']="localhost";
$db['db_user']="hahadzvz_user";
$db['db_password']="{3?.ry*624br";
$db['db_name']="hahadzvz_main";

foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

?>