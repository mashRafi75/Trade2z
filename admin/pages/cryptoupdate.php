<?php
session_start();
//$id = $_SESSION['c_id'];
$id = $_POST['submit'];
include 'connection.php';
if (isset($_POST['submit'])){
    $Name = $_POST['Name'];
    $Value = $_POST['Value'];
    $Graph = $_POST['Graph'];
    
    if ($_FILES['img']['size'] > 0) {
        $image = $_FILES['img']['name'];
        $tempname = $_FILES['img']['tmp_name'];  
        $folder = "../assets/crypto/".$image;
        move_uploaded_file($tempname, $folder);
        $img_update_query = ", c_img = '$image'";
    } else {
        $img_update_query = "";
    }

    $requete = $con -> prepare("UPDATE crypto_info 
    SET 
    c_name = '$Name',
    c_price = '$Value',
    graph = '$Graph'
    $img_update_query
    WHERE c_id = $id");
    $res = $requete -> execute();
    header("location:crypto.php");
}
?>