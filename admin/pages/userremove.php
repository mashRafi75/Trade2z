<?php 
    include 'connection.php';
    $id = $_GET['c_id'];

    if(isset($id)){
        $stmt = $con ->prepare("DELETE FROM crypto_info WHERE c_id=$id");
        $stmt -> execute();

    }
    header('location:userinfo.php');
?>