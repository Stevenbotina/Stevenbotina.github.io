<?php
    
    $host = 'localhost'; 
    $username = 'postgres';
    $password = 'admin';
    $dbName = 'Final';
    $port = '5432';

    $data_connection = "
        host        =   $host
        port        =   $port
        user        =   $username
        password    =   $password
        dbname      =   $dbName";

    $conn = pg_connect($data_connection);

    if (!$conn) {
        die("Connection failed: ". pg_last_error());
    }

?>