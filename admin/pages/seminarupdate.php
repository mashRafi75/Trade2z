<?php
session_start();
$id = $_POST['submit'];
include 'connection.php';
if (isset($_POST['submit'])){

    $Title = $_POST['Title'];
    $Host_Id = $_POST['Host_Id'];
    $Date_Time  = $_POST['Date_Time'];
    $Link = $_POST['Link'];
    
    if ($_FILES['img']['size'] > 0) {
        $image = $_FILES['img']['name'];
        $tempname = $_FILES['img']['tmp_name'];  
        $folder = "../assets/seminar/".$image;
        move_uploaded_file($tempname, $folder);
        $img_update_query = ", s_img = '$image'";
    } else {
        $img_update_query = "";
    }

    $requete = $con -> prepare("UPDATE seminar
    SET 
    title = '$Title',
    host_id = '$Host_Id',
    date_time = '$Date_Time',
    s_link = '$Link'
    $img_update_query
    WHERE s_id = $id");
    $res = $requete -> execute();
    header("location:seminar.php");
}
?>