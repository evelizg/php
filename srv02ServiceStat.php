<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>ServiceName</th>
<th>ServiceStatus</th>
<th>StatusDateTime</th>
<th>ServerName</th>
<th>PhysicalSrverName</th>
<th>STATUS</th>
</tr>
<?php
$serverName = "10.100.13.23"; //serverName\instanceName
$connectionInfo = array( "Database"=>"demo", "UID"=>"sa", "PWD"=>"m3j0r4Passw0rd");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
// Check connection
if ($conn===false) {
die("Connection failed: ");
}
$sql = "SELECT ServiceName, ServiceStatus, StatusDateTime, ServerName, PhysicalSrverName, STATUS FROM ServiceStatus WHERE PhysicalSrverName = 'GENDEVDB01'";
$result = sqlsrv_query( $conn, $sql);
if ($result) {
// output data of each row
while($row = sqlsrv_fetch_array( $result, 2)) {
echo "<tr><td>" . $row["ServiceName"]. "</td><td>" . $row["ServiceStatus"] . "</td><td>"
. $row["StatusDateTime"]->format('Y-m-d H:i:s') . "</td><td>" . $row["ServerName"] . "</td><td>" . $row["PhysicalSrverName"] . "</td><td>" . $row["STATUS"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
sqlsrv_close( $conn);
?>
</table>
</body>
</html>