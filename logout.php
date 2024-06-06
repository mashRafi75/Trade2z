<?php 

 require 'db_connect/db_connection.php';
 $_SESSION=[];
 session_unset();
 session_destroy();
 header("Location: login-signup.php");


 ?>