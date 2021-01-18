<?php

    $host = "localhost";
    $username = "sudodmitry_krasn";
    $password = "%48PjBqv";
    $db_name = "sudodmitry_krasn";

    $dbconn = mysqli_connect($host, $username, $password) or die("cannot connect");
    mysqli_select_db($dbconn, $db_name) or die("cannot select DB");

    $query = "INSERT INTO `kommerch_nedviz`(`name`, `tel`) VALUES ( '$name', '$tel' ) ";
    mysqli_query($dbconn, $query);

?>