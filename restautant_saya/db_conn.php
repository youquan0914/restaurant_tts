<?php
$db_host = "localhost";
$db_user = "root";          		//username phpmyadmin
$db_pwd = "00000000";               //password phpmyadmin
$db_name = "restautant_titus";      //nama pangkalan data

//cipta sambungan ke pangkalan data
$conn = mysqli_connect($db_host, $db_user, $db_pwd, $db_name);

//semak sambungan
if (!$conn) {
    die(mysqli_connect_error());
}
//echo "Sambungan ke pangkalan data berjaya";
?>
