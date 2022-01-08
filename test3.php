<?php
$serverName = "10.100.13.23"; //serverName\instanceName
$connectionInfo = array( "Database"=>"demo", "UID"=>"sa", "PWD"=>"m3j0r4Passw0rd");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$tsql = "SELECT ServiceName, ServiceStatus, ServerName, PhysicalSrverName FROM ServiceStatus";
$stmt = sqlsrv_query( $conn, $tsql);    

if ( $stmt )    
{    
     echo "Statement executed.<br>\n";    
}     
else     
{    
     echo "Error in statement execution.\n";    
     die( print_r( sqlsrv_errors(), true));    
}    

/* Iterate through the result set printing a row of data upon each iteration.*/    

while( $row = sqlsrv_fetch_array( $stmt, 2))    
{    
     echo "Name: ".$row['ServiceName']."\n";    
     echo "Application No: ".$row['ServiceStatus']."\n";    
     //echo "Serial No: ".$row['StatusDateTime']."<br>\n";
     echo "Serial No: ".$row['ServerName']."<br>\n";    
     echo "Serial No: ".$row['PhysicalSrverName']."<br>\n";
     echo "-----------------<br>\n";    
} 

/* Free statement and connection resources. */    
sqlsrv_free_stmt( $stmt);    
sqlsrv_close( $conn);    
?>    