<?php
date_default_timezone_set('Asia/Taipei');
$db_host="localhost";
$db_username="root";
$db_password="";
$db_name="No.918";

//=================================================================
$dblink = mysqli_connect($db_host, $db_username, $db_password, $db_name);
if (mysqli_connect_errno()) {
    echo 'Connect failed: '.mysqli_connect_error(); exit();
}
if (!mysqli_set_charset($dblink, "utf8")) {
    echo 'Error loading character set utf8:'.'-'. 
		__FILE__ .'-'. mysqli_error($dblink); exit();
} 

?>
