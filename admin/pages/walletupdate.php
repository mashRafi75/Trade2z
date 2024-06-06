<?php
session_start();
$id = $_SESSION['wallet_id'];
//$id = $_POST['submit'];
include 'connection.php';
if (isset($_POST['submit'])){
    $Current = $_POST['Current'];
    
    $requete = $con -> prepare("UPDATE wallet 
    SET 
    cur_balance = '$Current'
    WHERE wallet_id = $id");
    $res = $requete -> execute();
    header("location:wallet.php");
}
?>