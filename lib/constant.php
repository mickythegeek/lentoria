<?php


define('LINK', 'http://localhost/livepetal/api/onlinecourse/api.php');


date_default_timezone_set('Africa/Lagos');
define("DB_SERVER", "localhost");
define("DB_USER", "root"); //enter your database username
define("DB_PASS", ""); //databse password
define("DB_NAME", "lentoria"); //database name

$db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// if ($db == true) {
//     echo "Connected Successfully";
// }
