<?php
function connectDB()
{
    $serverName = "localhost";
    $userName = "root";
    $userPassword = "";
    $dbName = "wchira";

    $objCon = mysqli_connect($serverName, $userName, $userPassword, $dbName);
    mysqli_set_charset($objCon, "utf8");
    return $objCon;
}

