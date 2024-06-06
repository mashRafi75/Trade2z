<?php 
    include 'connection.php';
    if(isset($_POST['submit'])){
        
        $image = $_FILES['img']['name'];
        $tempname = $_FILES['img']['tmp_name'];  
        $folder = "../assets/seminar/".$image;
        
        if(move_uploaded_file($tempname,$folder)){
            echo 'Image uploaded successfully';
        } else {
        echo 'Failed to upload image';
        }

        $Title = $_POST['Title'];
        $Host_Id = $_POST['Host_Id'];
        $Date_Time  = $_POST['Date_Time'];
        $Link = $_POST['Link'];

        $requete = $con->prepare("INSERT INTO seminar(s_img,host_id,date_time,s_link) 
        VALUES('$image','$Host_Id','$Date_Time','$Link')");
        $requete->execute();
    }
    header('location:seminar.php')
?>