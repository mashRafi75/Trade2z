<?php

    require '../db_connect/db_connection.php';
    session_start();

    $id= $_SESSION["user_id"];
    $name=$email=$country=$region='';
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $country=$_POST['country'];
        $region=$_POST['region'];

        $q = $q = "UPDATE `userinfo` 
                   SET `name` = '$name', `email` = '$email', `country` = '$country', `region` = '$region' 
                   WHERE `user_id` = '$id'";
        $rq = mysqli_query($conn, $q);      

       echo "<script> alert('User Info Updated!'); </script>";


    }
  
    $result=mysqli_query($conn,"SELECT * FROM userinfo WHERE user_id ='$id'");
    $row=mysqli_fetch_assoc($result);
    $name=$row['name'];
    $email=$row['email'];
    $country=$row['country'];
    $region=$row['region'];
    $img=$row['img'];



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>

    

    
    <div class="profile">

            <div class="popup-form">
                <div class="header">
                    <div class="image">
                        <img src="../admin/assets/img/<?php echo htmlspecialchars($img) ?>" alt="">
                    </div>
                    <h2>Personal Information</h2>
                </div>
                
                <form id="blog-form" method="POST">
                    <label for="blog-tit"> Account No: <?php echo htmlspecialchars($id) ?></label><br>

                    <label for="blog-tit"> Name:</label><br>
                    <input type="text" placeholder="Enter Rename" name="name" id="blog-tit" value="<?php echo htmlspecialchars($name) ?>"><br>

                    <label for="blog-tit"> Email:</label><br>
                    <input type="text" placeholder="Enter New email" name="email" id="blog-tit" value="<?php echo htmlspecialchars($email) ?>"><br>

                    <label for="blog-tit"> Country:</label><br>
                    <input type="text" placeholder="Enter/Change Country" name="country" id="blog-tit" value="<?php echo htmlspecialchars($country) ?>"><br>

                    <label for="blog-tit"> Region:</label><br>
                    <input type="text" placeholder="Enter/Change Region" name="region" id="blog-tit" value="<?php echo htmlspecialchars($region) ?>"><br>
                    
                    <label for="image">Your Image:</label>
                    <input type="file" accept="image/*" id="image" ><br>

                    <button type="submit" name="submit" value="submit">Submit</button>
                </form>
            
        </div>
    </div>
   
</body>
</html>