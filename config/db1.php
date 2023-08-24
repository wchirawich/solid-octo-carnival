<?php

ini_set('display_errors', 1);
error_reporting(~0);
$servername = "10.3.1.20";
$connectioninfo=array("Database"=>"AggregatePlanning","UID"=>"sa","PWD"=>"p@ssw0rd","MultipleActiveResultSets"=>true,"CharacterSet"  => 'UTF-8');
$conn=sqlsrv_connect($servername,$connectioninfo);
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$query= "EXEC S_QA_Test_HC_QRCode '66070176M42'";
$stmt = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC) 

?>
