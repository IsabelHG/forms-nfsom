<?php
function conectar(){

    $host = 'localhost';
    $server = '92.204.133.204';
    $dbName = 'zitelco_nfsom';
    $username = 'zitelco_nfsom';
    $password = 'eaF{I0Qtf2EV';
    $port = 3306;

    $con=mysqli_connect($server,$username,$password);

    mysqli_select_db($con,$dbName);

    return $con;
    
}
?>