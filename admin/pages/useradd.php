<?php 
    include 'connection.php';
    if(isset($_POST['submit'])){
        
        $image = $_FILES['img']['name'];
        $tempname = $_FILES['img']['tmp_name'];  
        $folder = "../assets/img/".$image;
        
        if(move_uploaded_file($tempname,$folder)){
            echo 'images est uplade';
        }

        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Country = $_POST['Country'];
        $Region = $_POST['Region'];

        $requete = $con->prepare("INSERT INTO userinfo(img,name,email,country,region) 
        VALUES('$image','$Name','$Email','$Country','$Region')");
        //$requete->execute(array($image,$Name,$Email,$Country,$Region));
        $requete->execute();
    }
    header('location:userinfo.php')
?>