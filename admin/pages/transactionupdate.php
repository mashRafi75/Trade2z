<?php
session_start();
//$id = $_SESSION['c_id'];
$id = $_POST['submit'];
include 'connection.php';
if (isset($_POST['submit'])){
    $Price = $_POST['Price'];
    
    $requete = $con -> prepare("UPDATE trade_transection 
    SET 
    price = '$Price'
    WHERE t_sl = $id");
    $res = $requete -> execute();
    header("location:transaction.php");
}
?>