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
<th>Objeto</th>
<th><pre>Metrica </pre></th>
<th>Valor</th>
<th><pre>Resultado </pre></th>
<th>JobName</th>
</tr>
<?php
$serverName = "10.100.13.23"; //serverName\instanceName
$connectionInfo = array( "Database"=>"demo", "UID"=>"sa", "PWD"=>"m3j0r4Passw0rd");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
// Check connection
if ($conn===false) {
die("Connection failed: ");
}
$sql = "SELECT Objeto, Metrica, Valor, Resultado, job_name FROM valid_jobs WHERE Objeto = '10.100.13.23'";
$result = sqlsrv_query( $conn, $sql);
if ($result) {
// output data of each row
while($row = sqlsrv_fetch_array( $result, 2)) {
echo "<tr><td>".$row["Objeto"]."&nbsp;"."</td><td>".$row["Metrica"]."</td><td>"
.$row["Valor"]."</td>";
if($row["Resultado"] == "Fallido"){
    echo '<td bgcolor=#852222">'. $row["Resultado"] . "</td>";
    }else{
        echo '<td>'.$row["Resultado"]."</td>";
    }
echo "<td>".$row["job_name"]."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
sqlsrv_close( $conn);
?>
</table>
</body>
</html>