<?php
function conectar(){
    $host="bexvkc2ghvcsisbu00jm-mysql.services.clever-cloud.com";
    $user="u9uiih9h61j5nfe9";
    $pass="1JRDDlCjsuaOmbF47Voh";

    $bd="bexvkc2ghvcsisbu00jm";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

    return $con;
}
?>
