<?php

    require 'db_connect/db_connection.php';
    session_start();
    $name = $email = $password ='';


//login......
    if(isset($_POST['submit'])){
        $email=$_POST['l_email'];
        $password=$_POST['l_password'];



        $sql =mysqli_query($conn, "SELECT EXISTS(SELECT 1 FROM admin WHERE Email ='$email') AS user_exists");
        $row=mysqli_fetch_assoc($sql);       

      if($row['user_exists'] == 1 ){

        $r=mysqli_query($conn,"SELECT * FROM admin WHERE email ='$email'");
        $row=mysqli_fetch_assoc($r);
        if($password==$row['Password']){    
                //session
                $_SESSION['login-signup']=true;
                $_SESSION['admin_id']=$row['admin_id'];
                header("Location: admin/pages/dashboard.php");
                echo "<script> alert('Logged In as an Admin'); </script>";
        }

      }

        $result=mysqli_query($conn,"SELECT * FROM userinfo WHERE email ='$email'");
        $row=mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            if($password==$row['password']){
                //session
                $_SESSION['login-signup']=true;
                $_SESSION['user_id']=$row['user_id'];
                header("Location: landing_page.php");
            }
            else{
                echo "<script> alert('Wrong Password'); </script>";
            }
        }
        else{
            echo "<script> alert('User Not Registered'); </script>";
        }

}




//signup.....
    $errors = array('name' => '', 'email' => '', 'password' => '');

    if(isset($_POST['Register'])){


        // check name
        if(empty($_POST['name'])){
            $errors['name'] = 'A User Name is required';
            echo "<script> alert('A User Name is required') </script>";
        } else{
            $name = $_POST['name'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
                $errors['name'] = 'Name must be letters and spaces only';
                echo "<script> alert('Name must be letters and spaces only') </script>";
            }
        }

        // check email
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required';
            echo "<script> alert('An email is required') </script>";
        } else{
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be a valid email address';
                echo "<script> alert('Email must be a valid email address') </script>";
            }
        }




       //Validates password & confirm passwords.
        if(!empty($_POST["password"])) {
           $password = $_POST["password"];
           if (strlen($_POST["password"]) <= '6') {
               $errors['password'] = "Your Password Must Contain At Least 6 Characters!";
               echo "<script> alert('Your Password Must Contain At Least 6 Characters!') </script>";
           }
           elseif(!preg_match("#[0-9]+#",$password)) {
               $errors['password'] = "Your Password Must Contain At Least 1 Number!";
               echo "<script> alert('Your Password Must Contain At Least 1 Number!') </script>";
           }
           elseif(!preg_match("#[A-Z]+#",$password)) {
               $errors['password'] = "Your Password Must Contain At Least 1 Capital Letter!";
               echo "<script> alert('Your Password Must Contain At Least 1 Capital Letter!') </script>";
           }
           elseif(!preg_match("#[a-z]+#",$password)) {
               $errors['password'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
               echo "<script> alert('Your Password Must Contain At Least 1 Lowercase Letter!') </script>";
           } 
        }



        if(array_filter($errors)){
            //echo 'errors in form';
        } 
        else {
            // escape sql chars
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            //check information repeat
            $duplicate= mysqli_query($conn,"SELECT * FROM userinfo WHERE email='$email'");
            if(mysqli_num_rows($duplicate)>0){
                echo "<script> alert('Email Has Already Taken') </script>";
            }

            else{
                // create sql
                $sql="INSERT INTO userinfo(name,email,password) VALUES('$name' ,'$email' ,'$password')";

                 // save to db and check
                if(mysqli_query($conn, $sql)){

                    echo "<script> alert('User Registered successfully!') </script>";
                    $tr= mysqli_query($conn,"SELECT * FROM userinfo WHERE '$email'=email");
                    $row=mysqli_fetch_assoc($tr);
                    $id=$row['user_id'];
                    $t= mysqli_query($conn,"INSERT INTO wallet(user_id,invest,cur_balance,profit) VALUES($id ,'10000.0000' ,'10000.0000','0.0000')");                    
                    // success
                   // header('Location: login-signup.php');
                }
                else {
                   echo 'query error: '. mysqli_error($conn);
                }
            }
            
        }

    } // end POST check    

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css">
    <title>signin-signup</title>
</head>
<body>
    <div class="container">
        <div class="signin-signup">
            <form action="login-signup.php" class="sign-in-form" method="POST">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="E-mail" name="l_email" value="<?php echo htmlspecialchars($email) ?>">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password"  name="l_password" value="<?php echo htmlspecialchars($password) ?>">
                </div>
                <input type="submit" name="submit" value="Login" class="btn">
                <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a></p>
            </form>

            <form action="login-signup.php" class="sign-up-form" method="POST">
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="name" value="<?php echo htmlspecialchars($name) ?>">
                    
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Email" name="email" value="<?php echo htmlspecialchars($email) ?>">
                    
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password"  value="<?php echo htmlspecialchars($password) ?>">
                    
                </div>
                <input type="submit" name="Register" value="Register" class="btn">
                <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign in</a></p>
            </form>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Already a Member?</h3>
                    <p>Let's Trade with Trade2z</p>
                    <button class="btn" id="sign-in-btn">Sign in</button>
                </div>
                <img src="sign-in.svg" alt="" class="image">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>New to Trade?</h3>
                    <p>Empower your financial future - Start trading with us today.</p>
                    <button class="btn" id="sign-up-btn">Sign up</button>
                </div>
                <img src="sign-up.svg" alt="" class="image">
            </div>
        </div>
    </div>
    <script src="app.js"></script>
</body>
</html>