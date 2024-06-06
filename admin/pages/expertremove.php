<?php 
    include 'connection.php';
    $id = $_GET['exp_id'];

    if(isset($id)){
        $stmt = $con ->prepare("DELETE FROM expert WHERE exp_id=$id");
        $stmt -> execute();

    }
    header('location:expert.php');
?>