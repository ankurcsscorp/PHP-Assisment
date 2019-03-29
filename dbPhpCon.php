<?php

$dbPassword = "ankur@12345";
$dbUserName = "ankur";
$dbServer = "localhost";
$dbName = "aks";

$connection = new mysqli($dbServer, $dbUserName, $dbPassword, $dbName);

if($connection->connect_errno)
{
    exit("Database Connection Failed. Reason: ".$connection->connect_error);
}

?>