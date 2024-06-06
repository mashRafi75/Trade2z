<?php 
    include 'connection.php';
    $id = $_GET['b_id'];

    if(isset($id)){
        $stmt = $con ->prepare("DELETE FROM blogs WHERE b_id=$id");
        $stmt -> execute();

    }
    header('location:blogs.php');
?>