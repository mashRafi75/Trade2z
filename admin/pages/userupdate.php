<?php
session_start();
//$id = $_SESSION['user_id'];
$id = $_POST['submit'];
include 'connection.php';
if (isset($_POST['submit'])){
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Country = $_POST['Country'];
    $Region = $_POST['Region'];
    
    if ($_FILES['img']['size'] > 0) {
        $image = $_FILES['img']['name'];
        $tempname = $_FILES['img']['tmp_name'];  
        $folder = "../assets/img/".$image;
        move_uploaded_file($tempname, $folder);
        $img_update_query = ", img = '$image'";
    } else {
        $img_update_query = "";
    }

    $requete = $con -> prepare("UPDATE userinfo 
    SET 
    name = '$Name',
    email = '$Email',
    country = '$Country',
    region = '$Region'
    $img_update_query
    WHERE user_id = $id");
    $res = $requete -> execute();
    header("location:userinfo.php");
}
?>