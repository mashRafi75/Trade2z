<?php 
    include 'connection.php';
    $id = $_GET['s_id'];

    if(isset($id)){
        $stmt = $con ->prepare("DELETE FROM seminar WHERE s_id=$id");
        $stmt -> execute();

    }
    header('location:seminar.php');
?>