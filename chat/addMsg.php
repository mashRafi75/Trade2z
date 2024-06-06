
<?php
session_start();
include '../db_connect/db_connection.php';
$msg = $_GET["msg"];
$id= $_SESSION["user_id"];

//$q = "SELECT * FROM `userinfo` WHERE user_id='$id'";
//if ($rq = mysqli_query($conn, $q)) {
//  if (mysqli_num_rows($rq) == 1) {

    $q = "INSERT INTO `msg`(`id`, `msg`) VALUES ('$id','$msg')";
    $rq = mysqli_query($conn, $q);


//  }
//}



?>