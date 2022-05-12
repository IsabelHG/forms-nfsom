<?php
function conectar(){

    $host = 'localhost';
    $server = '173.231.182.168';
    $dbName = 'db_nfsom';
    $username = 'db_nfsom';
    $password = 'X2a4f1?v';
    $port = 3306;

    $con=mysqli_connect($server,$username,$password);

    mysqli_select_db($con,$dbName);

    return $con;
    
}
?>