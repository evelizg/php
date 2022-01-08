<?php
$serverName = "10.100.13.23"; //serverName\instanceName
$connectionInfo = array( "Database"=>"demo", "UID"=>"sa", "PWD"=>"m3j0r4Passw0rd");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";     
}

else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>