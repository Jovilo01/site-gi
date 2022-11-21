<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "site_gi";
    $port = 3306;

    // $connPDO = new PDO("mysql:host=$host;port=$port;dbname=".$dbname, $user, $pass);
    $conn = mysqli_connect($host, $user, $pass , $dbname, $port);

?>