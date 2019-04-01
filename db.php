<?php
$db['db_host'] = 'localhost';
$db['db_user'] = 'visumzen_tmp';
$db['db_pass'] = ']*gw$oHa,k5^';
$db{'db_name'} = 'visumzen_tmp';

foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(!$connection){
    echo "we are not connected";
}
?>