<?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $server = htmlentities($_POST['server']);
    $user = htmlentities($_POST['user']);
    $password = htmlentities($_POST['password']);
    $database = htmlentities($_POST['database']);      
    echo 'Enviando datos';
 
$postData = array (
    'extra_vars' => 
    array (
      'server' => $server,
      'user' => $user,
      'password' => $password,
      'database' => $database,
    ),
  );

$ch = curl_init('https://10.100.18.6/api/v2/job_templates/310/launch/');
curl_setopt_array($ch, array(    
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
        'Authorization: Basic ZXZlbGl6Z0BjYW52aWEuY29tOk5hdmlkYWQyMDIxJCQ=',
        'Content-Type: application/json',
        'Accept: application/json',
        'X-Requested-With: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($postData),
    CURLOPT_SSL_VERIFYHOST => FALSE,
    CURLOPT_SSL_VERIFYPEER => FALSE
));
            
    $response = curl_exec($ch);

    // Check for errors
    if($response === FALSE){
        die(curl_error($ch));
    }
    
    // Decode the response
    $responseData = json_decode($response, TRUE);
    
    // Close the cURL handler
    curl_close($ch);
    
    // Print the date from the response
    echo $responseData['id'];
    }
?>
<form method="post">
Server: <input type="text" name="server">
    <br>
User: <input type="text" name="user">
    <br>
Password: <input type="text" name="password">
    <br>
Database: <input type="text" name="database">
    <br>
    <input type="submit" value="Enviar">
</form>