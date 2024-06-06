<?php 
    include 'connection.php';
    if(isset($_POST['submit'])){
        
        $image = $_FILES['img']['name'];
        $tempname = $_FILES['img']['tmp_name'];  
        $folder = "../assets/crypto/".$image;
        
        if(move_uploaded_file($tempname,$folder)){
            echo '';
        }

        $Name = $_POST['Name'];
        $Value = $_POST['Value'];
        $Graph = $_POST['Graph'];
        
        $requete = $con->prepare("INSERT INTO crypto_info(c_img,c_name,c_price,graph) 
        VALUES('$image','$Name','$Value','$Graph')");
        //$requete->execute(array($image,$Name,$Value));
        $requete->execute();
    }
    header('location:crypto.php')
?>