<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud-individuel";

    $db = new mysqli( $servername, $username, $password, $dbname);
    if($db->connect_error) {
        die("Connection Failed" . $db->connect_error);
    }