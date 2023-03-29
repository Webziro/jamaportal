<?php
// Database connection credentials
$hostname = 'localhost'; // specify host domain or IP, i.e. 'localhost' or '127.0.0.1' or server IP 'xxx.xxxx.xxx.xxx'
$database = 'jamaportal'; // specify database name
$db_user = 'root'; // specify username
$db_pass = ''; // specify password


$conn = mysqli_connect("$hostname", "$db_user", "$db_pass", "$database");

// if(!$conn){
//     die ("could not connect": . mysqli_error());
// }

    