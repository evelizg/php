<?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $server = htmlentities($_POST['server']);
      $user = htmlentities($_POST['user']);
      $password = htmlentities($_POST['password']);
      $database = htmlentities($_POST['database']);      
      echo 'SERVER:   ' . $server . ', USER: ' .$user . ', CLAVE: ' .$password . ', DB: ' .$database;
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