<?php

    require_once './include/connect.php';
    session_start();

    if(isset($_POST['submit'])){
        $uname = mysqli_real_escape_string($conn, $_POST['uname']);
        $passwd = mysqli_real_escape_string($conn, $_POST['passwd']);

        $sql = "SELECT * FROM register where uname='$uname'";
        $result = mysqli_query($conn, $sql);

        if($row = mysqli_fetch_assoc($result)){
            $hash = password_verify($passwd, $row['passwd']);
            if($hash == false){
                header('Location: ./login.php?Pinvalid');
                exit();
            }
            else if($hash == true){
                $_SESSION['fname'] = $row['fname'];
                header('Location: ./index.php');
                exit();
            }
        }else{
            header('Location: ./login.php?invalid');
            exit();
        }

    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
    </head>
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    <style>
        body{
            background-image: url('./images/back.jpg');
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6" class="register-div" style="background-color: rgba(0, 0, 0, 0.4); border-radius: 10px;"><br><br>
                    <h4 class="register-text">Login</h4><br><br>
                    
                    <?php
                        if(isset($_GET['Pinvalid'])){
                            $message = $_GET['Pinvalid'];
                            $message = "Invalid username or password";
                    ?>
                        <div class="alert-danger alert text-center"> <?php echo $message ?> </div>
                    <?
                        }
                    ?>

                    <form action="" method="POST">
                        <input type="email" name="uname" class="login-form" placeholder="Email" required><br><br>
                        <input type="password" name="passwd" class="login-form" placeholder="Password" required><br><br>
                        <input type="submit" name="submit" value="Login" class="btn btn-primary" style="margin-left: 43%; margin-right: 45%;"><br>
                        <h4 style="font-family: cursive; color: white; font-size: 18px;">Dont't have account?</h4><a href="./register.php" style="color: lightblue;">Sign up</a><br><br>
                    </form>
                </div>
        <div class="col-3"></div>
            </div>
        </div>

    </body>

</html> 